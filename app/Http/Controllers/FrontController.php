<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Job;
use App\Models\Event;
use App\Models\Gallery;
use App\Models\Partner;
use App\Models\Rundown;
use App\Models\Careerfair;
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
    public function partner()
    {
        $aocf = Careerfair::where('status', 'active')->latest()->first();
        $partners = Partner::where([
            ['status','active'],
            ['careerfair_id', $aocf->id],
        ])->latest()->paginate(5);
        return view('landing-page.partners', compact('partners', 'aocf'));
    }
    public function singlepartner($id)
    {
        $aocf = Careerfair::where('status', 'active')->latest()->first();
        $sidebar = Partner::latest()->get();
        $partner = Partner::findorFail($id);
        $partner->incrementReadCount();
        $jobs = Job::where('partner_id', $partner->id)->get();  
        return view('landing-page.single-partner', compact('partner', 'sidebar','aocf','jobs'));
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
