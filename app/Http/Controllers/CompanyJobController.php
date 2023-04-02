<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Partner;
use Illuminate\Http\Request;
use App\Models\JobApplication;

class CompanyJobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $jobs = Job::where('partner_id','=',$user->address )->get();
        return view('company.job', compact('jobs'));
    }
    
    public function list()
    {
        $user = auth()->user();
        $jobapps = JobApplication::where('partner_id','=',$user->address )->get();
        
        return view('company.jobapplication', compact('jobapps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('company.job-new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $request->validate([
            'title' => 'required',
            'type'=> 'required',
            'category'=>'required',
            'education'=> 'required',
            'description' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'partner_id' => 'required',
        ]);
      
        Job::create([
            'title' => $request->title,
            'type'=> $request->type,
            'category' => $request->category,
            'salary' => $request->salary,
            'education' => $request->education,
            'description' => $request->description,
            'city' => $request->city,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'partner_id' => $request->partner_id,
        
        ]);
        return redirect('/company/job')->with('status', 'Job berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
        return view('company.job-view', compact('job'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit(Job $job)
    {
        $job = Job::find($job->id);
        return view('company.job-update', compact('job'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Job $job)
    {
        $request->validate([
            'title' => 'required',
            'type'=> 'required',
            'category'=>'required',
            'education'=> 'required',
            'description' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'partner_id' => 'required',
        ]);
        
       
        Job::where('id', $job->id)
                ->update([
                    'title' => $request->title,
                    'type'=> $request->type,
                    'category' => $request->category,
                    'salary' => $request->salary,
                    'education' => $request->education,
                    'description' => $request->description,
                    'city' => $request->city,
                    'start_date' => $request->start_date,
                    'end_date' => $request->end_date,
                    'partner_id' => $request->partner_id,
                ]);
        return redirect('/company/job')->with('status', 'Job berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job, Request $request)
    {
        Job::destroy($request->id);
        return redirect('/company/job')->with('status', 'Job berhasil dihapus');
    }
}
