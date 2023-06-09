<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Partner;
use App\Models\Careerfair;
use App\Models\JobType;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Job::latest()->get();
        return view('admin.job', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $aocf = Careerfair::where('status', 'active')->latest()->first();
        $partner = Partner::where('careerfair_id', $aocf->id)->get();
        $jobtype = JobType::all();

        return view ('admin.job-new', compact('partner','jobtype'));
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
            'start_date' => 'required|date',
            'end_date' => 'required|date',
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
        return redirect('/dashboard/job')->with('status', 'Job berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
        return view('admin.job-view', compact('job'));
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
        $aocf = Careerfair::where('status', 'active')->latest()->first();
        $partner = Partner::where('careerfair_id', $aocf->id)->get();
        $jobtype = JobType::all();
        return view('admin.job-update', compact('partner','job','jobtype'));
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
        return redirect('/dashboard/job')->with('status', 'Job berhasil diperbarui');
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
        return redirect('/dashboard/job')->with('status', 'Job berhasil dihapus');
    }
}
