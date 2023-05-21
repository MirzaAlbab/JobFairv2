<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\User;
use App\Models\View;
use App\Models\Event;
use App\Models\Partner;
use App\Models\Presence;
use App\Models\Careerfair;
use Illuminate\Http\Request;
use App\Models\JobApplication;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{   
    
    public function index()
    {
        
        $this->authorize('admin');
        $aocf = Careerfair::where('status', 'active')->latest()->first();
        $countpartner = Partner::where('careerfair_id','=',$aocf->id)->count();
        $counterevent = Event::where('status', 'active')->where('careerfair_id', '=', $aocf->id)->count();
        $countuser = User::whereIn('role', ["mhs","alumni","umum"])->where('careerfair_id','=', $aocf->id)->count();
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
        $countjob = Job::where('partner_id','=',$user->address)->count();
        return view('company.dashboard', compact('countlamaran','countjob'));
    }

    public function presence (){
     
        $user = auth()->user();
        $status = Presence::where('user_id', $user->id)->whereDate('created_at','=', date('Y-m-d'))->get();
       
        return view ('user.presence', compact('status'));
    }

    public function presencestore (Request $request){
       
        $user = auth()->user();
        $careerfair = Careerfair::where('status', 'active')->latest()->first();
        if($request->id == 'http://career_fair.test/presence'){
            try {
                
                Presence::create([
                    'user_id' => $user->id,
                    'careerfair_id' => $careerfair->id,
                ]);
                return response()->json(['status' => 200], 200);
            } catch (\Throwable $th) {
                //throw $th;
               return response()->json(['status' => 404], 404);
            }
        }
    }
    public function indexAdmin(){
        $presence = Presence::whereDate('created_at', '=', date('Y-m-d'))->get();
        return view('admin.presence', compact('presence'));
    }
    // current career fair
    public function getCurrentUserEducation(){
        $aocf = Careerfair::where('status', 'active')->latest()->first();
        $edu = User::select(DB::raw('count(users.id) as sum'))->whereIn('role',['mhs','alumni','umum'])->where('careerfair_id','=',$aocf->id)->groupBy('users.education')->get()->pluck('sum');
        $education = User::select('education')->whereIn('role',['mhs','alumni','umum'])->where('careerfair_id','=',$aocf->id)->groupBy('users.education')->get()->pluck('education');
        return response()->json(['edu' => $edu,'education' => $education], 200);
    }

    public function getCurrentJobQualification(){
        $aocf = Careerfair::where('status', 'active')->latest()->first();
        $education = Careerfair::select('education')->join('partners','partners.careerfair_id', '=', 'careerfairs.id')->join('jobs', 'jobs.partner_id', '=', 'partners.id')->groupBy('jobs.education')->get()->pluck('education');
        $edu = Job::select(DB::raw('count(jobs.id) as sum'))->join('partners', 'partners.id', '=', 'jobs.partner_id')->join('careerfairs', 'careerfairs.id','=','partners.careerfair_id')->where('careerfairs.id','=',$aocf->id)->groupBy('jobs.education')->get()->pluck('sum');
        return response()->json(['edu' => $edu,'education' => $education], 200);
    }
    
    // all time career fair
    public function getFullReport(){
        $company = Careerfair::select(DB::raw('count(partners.id) as sum'))->join('partners', 'careerfairs.id', '=', 'partners.careerfair_id')->groupBy('careerfairs.id')->get()->pluck('sum');
        $job = Careerfair::select( DB::raw('count(jobs.id) as sum'))->join('partners', 'careerfairs.id', '=', 'partners.careerfair_id')->join('jobs', 'jobs.partner_id','=','partners.id')->groupBy('careerfairs.id')->get()->pluck('sum');
        $user = Careerfair::select(DB::raw('count(users.id) as sum'))->join('users', 'users.careerfair_id','=','careerfairs.id')->whereIn('users.role',['mhs','alumni','umum'])->groupBy('careerfairs.id')->get()->pluck('sum');
        $careerfair = Careerfair::select('title')->get()->pluck('title');
        return response()->json(['company' => $company,'job' => $job,'careerfair' => $careerfair, 'user'=>$user], 200);
    }

    public function getUserEduReport(){
        $education = User::select('education')->whereIn('role',['mhs','alumni','umum'])->groupBy('users.education')->get()->pluck('education');
        $edu = User::select(DB::raw('count(users.id) as sum'))->whereIn('role',['mhs','alumni','umum'])->groupBy('users.education')->get()->pluck('sum');
        return response()->json(['edu' => $edu,'education' => $education], 200);
    }

    public function getJobEduReport(){
        $education = Job::select('education')->groupBy('jobs.education')->get()->pluck('education');
        $edu = Job::select(DB::raw('count(jobs.id) as sum'))->groupBy('jobs.education')->get()->pluck('sum');
        return response()->json(['edu' => $edu,'education' => $education], 200);
    }

    // company
    public function getViews(){
        $user = auth()->user();
        // created at to ymd  and group by created at
        $views = View::select(DB::raw('count(views.id) as sum'))->where('partner_id','=',$user->address)->groupBy(DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d')"))->get()->pluck('sum');
        $unique = View::select(DB::raw('count(DISTINCT ip) as sum'))->where('partner_id','=',$user->address)->groupBy(DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d')"))->get()->pluck('sum');
        $times = View::select(DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d') as time"))->where('partner_id','=',$user->address)->groupBy(DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d')"))->get()->pluck('time');
        return response()->json(['views' => $views, 'unique' => $unique, 'time' => $times], 200);
    }

    // call artisan maintenance
    public function maintenance($secret){
        $this->authorize('admin');
        $exitCode = Artisan::call('down', ['--secret' => $secret]);
        // rediret to url
        return redirect()->route('dashboard', [$secret]);
    }

    public function maintenanceStatus(){
        $this->authorize('admin');
        $status = app() -> isDownForMaintenance();
        return response()->json(['status' => $status], 200);
    }

    // call artisan live
    public function live(){
        $this->authorize('admin');
        $exitCode = Artisan::call('up');
        return redirect()->back();
    }

    public function companyPassword(){
        $user = auth()->user();
        return view('company.password', compact('user'));
    }

    public function adminPassword(){
        $user = auth()->user();
        return view('admin.password', compact('user'));
    }




}
