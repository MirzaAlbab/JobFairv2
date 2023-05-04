<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\User;
use App\Models\Event;
use App\Models\Partner;
use App\Models\Careerfair;
use App\Models\Presence;
use App\Models\JobApplication;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{   
    
    public function index()
    {
        
        // $partners = Partner::latest()->get();
        // $events = Event::latest()->get();
        // $test[] = $partners->merge($events);
        // // dd($test);
        // $aocf = Careerfair::where('status', 'active')->latest()->first();
        $countpartner = Partner::where('status', 'active')->count();
        $counterevent = Event::where('status', 'active')->count();
        $countuser = User::select("*")->whereIn('role', ["mhs","alumni","umum"])->count();
        $countjob = Job::all()->count();
        return view('admin.dashboard', compact('countpartner', 'counterevent', 'countuser','countjob'));
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

}
