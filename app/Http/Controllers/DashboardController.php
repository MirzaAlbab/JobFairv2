<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\User;
use App\Models\Event;
use App\Models\Partner;
use App\Models\Presence;
use App\Models\Careerfair;
use App\Models\JobApplication;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{   
    
    public function index()
    {
        
        // $partners = Partner::latest()->get();
        // $events = Event::latest()->get();
        // $test[] = $partners->merge($events);
        // // dd($test);
        $aocf = Careerfair::where('status', 'active')->latest()->first();
        $countpartner = Partner::where('careerfair_id','=',$aocf->id)->count();
        $counterevent = Event::where('status', 'active')->where('careerfair_id', '=', $aocf->id)->count();
        $countuser = User::whereIn('role', ["mhs","alumni","umum"])->count();
        $countjob = Job::join('partners', 'partners.id', '=', 'jobs.partner_id')->join('careerfairs', 'careerfairs.id', '=', 'partners.careerfair_id')->where('careerfairs.id','=',$aocf->id)->count();

        
        return view('admin.dashboard', compact('countpartner', 'counterevent', 'countuser','countjob','aocf'));
    }

    public function user(){
        $user = auth()->user();
        $countlamaran = JobApplication::where('user_id','=',$user->id)->count();
        return view('user.dashboard', compact('user','countlamaran'));
    }
    public function company(){
        $user = auth()->user();
        $countlamaran = JobApplication::where("partner_id","=",$user->address)->count();
        $views = Partner::where('id','=',$user->address )->get(['views']);
        return view('company.dashboard', compact('countlamaran','views'));
    }

    public function presence (){
     
        $user = auth()->user();
        $status = Presence::where('user_id', $user->id)->whereDate('created_at','=', date('Y-m-d'))->get();
       
        return view ('user.presence', compact('status'));
    }

    public function presencestore (){
        $user = auth()->user();
        $careerfair = Careerfair::where('status', 'active')->latest()->first();
        try {
            
            $presence = Presence::create([
                'user_id' => $user->id,
                'careerfair_id' => $careerfair->id,
            ]);
            return response()->json(['status' => 200], 200);
        } catch (\Throwable $th) {
            //throw $th;
           return response()->json(['status' => 404], 404);
        }

       
    }
    public function indexAdmin(){
        $presence = Presence::whereDate('created_at', '=', date('Y-m-d'))->get();
        return view('admin.presence', compact('presence'));
    }

    public function getCompany(){
        // query join table orm to join between company and user
    //    $sumcompany = Careerfair::select("careerfairs.title","sum")->join('partners', 'careerfairs.id', '=', 'partners.careerfair_id')->groupBy('careerfairs.id')->get();
    //    selectcount company
    // orm select count company
        //  $company = Partner::select("partners.company","partners.careerfair_id","careerfairs.title",DB::raw("count(partners.id) as sum"))->join('careerfairs', 'partners.careerfair_id', '=', 'careerfairs.id')->groupBy('partners.careerfair_id')->get();
        $company = Careerfair::select(DB::raw('count(partners.id) as sum'))->join('partners', 'careerfairs.id', '=', 'partners.careerfair_id')->groupBy('careerfairs.id')->get()->pluck('sum');
        $job = Careerfair::select( DB::raw('count(jobs.id) as sum'))->join('partners', 'careerfairs.id', '=', 'partners.careerfair_id')->join('jobs', 'jobs.partner_id','=','partners.id')->groupBy('careerfairs.id')->get()->pluck('sum');

        $careerfair = Careerfair::select('title')->get()->pluck('title');
    //   str replace careerfair
        // $careerfair = str_replace('"', "", $careerfair);
        // $careerfair = str_replace('[', '', $careerfair);
        // $careerfair = str_replace(']', '', $careerfair);
      
        
        return response()->json(['company' => $company,'job' => $job,'careerfair' => $careerfair], 200);
    //    return view('admin.dummy', compact('company','job','careerfair'));
       
       
    }



}
