<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Job;
use App\Models\Event;
use App\Models\Gallery;
use App\Models\Partner;
use App\Models\Rundown;
use App\Models\Careerfair;
use App\Models\View;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class FrontController extends Controller
{
    
    public function index()
    {
        $aocf = Careerfair::where('status', 'active')->latest()->first();
       
        $partners = Partner::where([
            ['status', 'active'],
            ['position', '1'],
            ['careerfair_id', $aocf->id],
        ])->get();
        
        $participant = Partner::where([
            ['status', 'active'],
            ['careerfair_id', $aocf->id],
        ])->get();
        
        $rundown = Rundown::where([
            ['status', 'active'],
            ['careerfair_id', $aocf->id],
        ])->get();
        $rundown->map(function ($rd) {
            $rd->time = Carbon::parse($rd->time)->isoFormat('dddd, D MMMM YYYY');
            return $rd;
        });
        $countpartner = Partner::where('status', 'active')->count();
        $countevent = Event::where('status', 'active')->count();
        $gallery = Gallery::where('status', 'active')->take(3)->get();
        $faq = Faq::where('status', 'active')->get();
        $faqs = $faq->split(2);
        return view('landing-page.landing', compact('aocf', 'partners', 'rundown', 'countpartner', 'countevent', 'gallery', 'faqs', 'participant'));
        
    }
    public function about()
    {
        $aocf = Careerfair::where('status', 'active')->latest()->first();
        $partners = Partner::where([
            ['status', 'active'],
            ['position', '1'],
            ['careerfair_id', $aocf->id],
        ])->get();
        $participant = Partner::where([
            ['status', 'active'],
            ['careerfair_id', $aocf->id],
        ])->get();
        return view('landing-page.about',compact('aocf', 'partners', 'participant'));
    }
    public function partner(Request $request)
    {
        $aocf = Careerfair::where('status', 'active')->latest()->first();
        // $partners = Partner::where([
        //     ['status','active'],
        //     ['careerfair_id', $aocf->id],
        // ])->latest()->paginate(6);
        $partners = Partner::query()->paginate(6);
        
        if($request->ajax()){
            $partners = Job::query()
                        ->when($request->seach_term, function($q)use($request){
                            $q->where('title', 'like', '%'.$request->seach_term.'%');})
                        ->when($request->status, function($q)use($request){
                            $q->where('status',$request->status);
                        })
                        ->paginate(6);
            return response()->json($partners);
        }
        
        return view('landing-page.partners', compact('partners', 'aocf'));
    }
    public function search(Request $request)
    {
        $query = $request->input('query');
        $category = $request->input('category');
        // how to separate when user only filter by categories without using any query
        $results = Job::query()
            ->when($query, function ($query, $search) {
                return $query->where('title', 'like', "%{$search}%");
            })
            ->when($category, function ($query, $category) {
                return $query->where('education', $category);
            })->get();
            // get partner_id of each results
            $partner_ids = $results->pluck('partner_id');
            $partner_ids = $partner_ids->unique();

        
        // $results = Job::query()
        //     ->when($query, function ($query, $search) {
        //         return $query->where('title', 'like', "%{$search}%");
        //     })
        //     ->when($category, function ($query, $category) {
        //         return $query->where('education', $category);
        //     })->get();
        //     // get partner_id of each results
        //     $partner_ids = $results->pluck('partner_id');
        //     $partner_ids = $partner_ids->unique();
            
            // get partners with the ids
            $partners = Partner::whereIn('id', $partner_ids)->paginate(6);
            
        
        return view('landing-page.partners-filter', compact('partners'));
    }
    public function singlepartner(Request $request)
    {
        $aocf = Careerfair::where('status', 'active')->latest()->first();
        $sidebar = Partner::latest()->limit(10)->get();
        $partner = Partner::findorFail($request->id);
        View::create([
            'ip' => $request->ip(),
            'user_agent' => $request->header('User-Agent'),
            'partner_id' => $partner->id,
        ]);
        $jobs = Job::where('partner_id', $partner->id)->get();  
        return view('landing-page.single-partner', compact('partner', 'sidebar','aocf','jobs'));
    }
    public function jobdetails($id)
    {
        $aocf = Careerfair::where('status', 'active')->latest()->first();
        $job = Job::findorFail($id);
        $sidebar = Partner::latest()->limit(10)->get();
        $partner = Partner::findorFail($job->partner_id);
       
        return view('landing-page.job-details', compact('job', 'partner','aocf','sidebar'));
    }
    public function events()
    {
        $aocf = Careerfair::where('status', 'active')->latest()->first();
        $events = Event::where([
            ['status','active'],
            ['careerfair_id', $aocf->id],
        ])->latest()->paginate(5);
        $events->map(function ($ev) {
            $ev->time = Carbon::parse($ev->time)->isoFormat('dddd, D MMMM YYYY');
            return $ev;
        });
        return view('landing-page.event', compact('events','aocf'));
    }
    public function eventdetail($id)
    {
        $aocf = Careerfair::where('status', 'active')->latest()->first();
        $event = Event::find($id);
        $event->time = Carbon::parse($event->time)->isoFormat('dddd, D MMMM YYYY');
        return view('landing-page.event-details', compact('event','aocf'));
    }
    public function gallery()
    {
        $aocf = Careerfair::where('status', 'active')->latest()->first();
        $gallery = Gallery::where('status', 'active')->latest()->paginate(9);
        return view('landing-page.gallery', compact('gallery', 'aocf'));
    }
    public function login(Request $request)
    {   
        $career = Careerfair::find($request->id);
        $career->increment('user');
        return redirect('https://dpkka.unair.ac.id/site/login');
    }
    public function counter(Request $request){
        
        $user = Careerfair::find($request->id);
        $user = $user['user'];
        return response()->json(['user' => $user]);
    }
    public function team(){
        $aocf = Careerfair::where('status', 'active')->latest()->first();
        return view('landing-page.teams',compact('aocf'));
    }

    

}
