<?php

namespace App\Http\Controllers;

use App\Models\User;
use Barryvdh\DomPDF\PDF as PDF;
use Illuminate\Http\Request;
use App\Models\JobApplication;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\JobApplicationExport;
use App\Models\Careerfair;
use Illuminate\Support\Facades\Response;

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
        $user_agent = $_SERVER['HTTP_USER_AGENT'];
       
        if($cv->cv == null || $cv->cv == ''){
            $cv = null;
            return view('user.cv', compact('cv'));
        }
    //    make if for mobile
        if(strpos($user_agent, 'Mobile') !== false){
            $device = 'mobile';
            $cv = '../../../../storage/'.$cv->cv;
            return view('user.cv', compact('cv','device'));
            
        }
        else{
            $cv = '/storage/'.$cv->cv;
            $device = 'desktop';
            return view('user.cv', compact('cv','device'));
        }
        
    }
    public function indexCompany()
    {
        $user = auth()->user();
        $jobapps = JobApplication::where('partner_id','=',$user->address )->get();
        return view('company.jobapplication', compact('jobapps'));
    }

    public function exportExcel(){
        return Excel::download(new JobApplicationExport, 'JobApplication.xlsx', \Maatwebsite\Excel\Excel::XLSX, [
            'Content-Type' => 'application/vnd.ms-excel',
        ]);
    }
        
    public function exportCsv(){
        return Excel::download(new JobApplicationExport, 'JobApplication.csv', \Maatwebsite\Excel\Excel::CSV, [
            'Content-Type' => 'text/csv',
        ]);
    }

    public function indexAdmin()
    {
        $user = auth()->user();
        $aocf = Careerfair::where('status','=','active')->first();
        // get all job application of current career fair
        // job application where job_id is in job where careerfair_id is current career fair

        $jobapps = JobApplication::whereHas('company', function($q) use ($aocf){
            $q->where('careerfair_id','=',$aocf->id);
        })->get();
        return view('admin.jobapplication', compact('jobapps'));
    }

    public function CompanyViewCV($id){
        $cv = User::where('id','=',$id)->first();
        $cv = '/storage/'.$cv->cv;
        return view('company.cv', compact('cv'));
    }
    public function downloadCV($id){
        $cv = User::where('id','=',$id)->first();
        $cv = '/storage/'.$cv->cv;
        return Response::download(public_path($cv));
    }

    public function proceedJobseeker($id){
        $jobapp = JobApplication::where('id','=',$id)->first();
        $jobapp->status = 'process';
        $jobapp->save();
        return redirect()->back()->with('status', 'Berhasil memproses lamaran jobseeker');
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
