<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\JobApplication;
use Illuminate\Support\Facades\Response;

use function Pest\Laravel\get;

class JobApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth()->user()->id;
        if(in_array(Auth()->user()->role, ['mhs','umum','alumni'])){
            $jobs = JobApplication::where('user_id','=',$id)->get();
        }
        
        return view('user.jobapplication', compact('jobs'));

    }
    
    public function viewcv(){
        $id = Auth()->user()->id;
        $cv = User::where('id','=',$id)->first();
      
        
        return view('user.cv', compact('cv'));
        
    }
    public function indexCompany()
    {
        $user = auth()->user();
        $jobapps = JobApplication::where('partner_id','=',$user->address )->get();
        return view('company.jobapplication', compact('jobapps'));
    }

    public function indexAdmin()
    {
        $user = auth()->user();
        $jobapps = JobApplication::all();
        return view('admin.jobapplication', compact('jobapps'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = Auth()->user()->id;
        JobApplication::create([
            'user_id' => $user_id,
            'job_id' => $request->job_id,
            'partner_id' => $request->partner_id,
        ]);
        return redirect()->back()->with('status', 'Berhasil melamar job');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JobApplication  $jobApplication
     * @return \Illuminate\Http\Response
     */
    public function show(JobApplication $jobApplication)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JobApplication  $jobApplication
     * @return \Illuminate\Http\Response
     */
    public function edit(JobApplication $jobApplication)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JobApplication  $jobApplication
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JobApplication $jobApplication)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JobApplication  $jobApplication
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobApplication $jobApplication)
    {
        //
    }
}
