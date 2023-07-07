<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Faculty;
use App\Models\JobType;
use App\Models\Major;
use App\Models\User;
use App\Models\UserAchievement;
use App\Models\UserCertification;
use App\Models\UserExperience;
use App\Models\UserOrganization;
use App\Models\UserTraining;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Symfony\Component\HttpKernel\Profiler\Profile;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $faculties = Faculty::all();
        $experiences = UserExperience::where('user_id', $request->user()->id)->get();
        $organizations = UserOrganization::where('user_id', $request->user()->id)->get();
        $certificates = UserCertification::where('user_id', $request->user()->id)->get();
        $training = UserTraining::where('user_id', $request->user()->id)->get();
        $achievements = UserAchievement::where('user_id', $request->user()->id)->get();
        $jobtype = JobType::skip(24)->take(161)->get();
        
        
        return view('user.editprofile', [
            'user' => $request->user(),
            'faculties' => $faculties,
            'experiences' => $experiences,
            'organizations' => $organizations,
            'certificates' => $certificates,
            'training' => $training,
            'achievements' => $achievements,
            'jobtype' => $jobtype,
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
       
        $request->validate([
            'photo' => 'image|file|max:2048',
            'name' => 'required',
            'about' => 'required',
            'phone' => 'required',
            'province' => 'required',
            'city' => 'required',
            'address' => 'required',
            'university' => 'required',
            'education' => 'required',
            'faculty' => 'required',
            'major' => 'required',
            'gpa' => 'required',
            'graduation_year' => 'required',
           
            // 'instagram' => 'required',
            // 'linkedin' => 'required',


        ]);
        if($request->file('photo')){
            $img = $request->file('photo')->store('public/uploads/profile');
        }else{
            $img = null;
        }
       
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        // $request->user()->save();
        User::where('id', $request->id)
        ->update([
            'photo' => $img,
            'name' => $request->name,
            'about' => $request->about,
            'phone' => $request->phone,
            'province' => $request->province,
            'city' => $request->city,
            'address' => $request->address,
            'university' => $request->university,
            'education' => $request->education,
            'faculty' => $request->faculty,
            'major' => $request->major,
            'gpa' => $request->gpa,
            'graduation_year' => $request->graduation_year,
            'instagram' => $request->instagram,
            'linkedin' => $request->linkedin,
            
        ]);

        return Redirect::route('profile.edit')->with('status', 'Berhasil memperbarui profil');
    }
    public function cv(ProfileUpdateRequest $request): RedirectResponse
    {
        
        $request->validate([
            'cv' => 'required|file|max:2048|mimes:pdf',
        ]);
       
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }
        if($request->file('cv')){
            $cv = $request->file('cv')->store('public/uploads/cv');
        }else{
            $cv = null;
        }

        // $request->user()->save();
        User::where('id', $request->id)
        ->update([
            'cv' => $cv,
        ]);

        return Redirect::route('profile.edit')->with('status', 'Berhasil memperbarui CV');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function getMajor ($id){
        $majors = Major::where("faculty_id",$id)->pluck("name","id");
        return response()->json(['major'=>$majors]);
    }

    public function addExperience (Request $request){
        
        $request->validate([
            'company_name' => 'required',
            'job_title' => 'required',
            'job_description' => 'required',
            'start_date' => 'required',
            'status' => 'required',
        ]);
        
        if($request->current_job){
            UserExperience::create([
                'company_name' => $request->company_name,
                'job_title' => $request->job_title,
                'job_description' => $request->job_description,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'is_current_job' => $request->current_job,
                'status' => $request->status,
                'user_id' => $request->user_id,
            ]);
        }else{
            UserExperience::create([
                'company_name' => $request->company_name,
                'job_title' => $request->job_title,
                'job_description' => $request->job_description,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'status' => $request->status,
                'user_id' => $request->user_id,
            ]);
        
        }
    return Redirect::route('profile.edit')->with('status', 'Berhasil menambahkan pengalaman');
    
    }

    public function deleteExperience (Request $request){
        UserExperience::where('id', $request->expid)->delete();
        return Redirect::route('profile.edit')->with('status', 'Berhasil menghapus pengalaman');
    }

    public function addOrganization(Request $request){
        
        $request->validate([
            'organization_name' => 'required',
            'job_title' => 'required',
            'job_description' => 'required',
            'start_date' => 'required',
            
        ]);
        
        
        if($request->is_current_organization){
           
            UserOrganization::create([
                'organization_name' => $request->organization_name,
                'job_title' => $request->job_title,
                'job_description' => $request->job_description,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'is_current_organization' => $request->is_current_organization,
                'user_id' => $request->user_id,
            ]);
        }else{
            UserOrganization::create([
                'organization_name' => $request->organization_name,
                'job_title' => $request->job_title,
                'job_description' => $request->job_description,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'user_id' => $request->user_id,
            ]);
        
        }
    return Redirect::route('profile.edit')->with('status', 'Berhasil menambahkan organisasi');
    
    }

    public function deleteOrganization (Request $request){
        UserOrganization::where('id', $request->orgid)->delete();
        return Redirect::route('profile.edit')->with('status', 'Berhasil menghapus organisasi');
    }

    public function addCertificate(Request $request){
        
        $request->validate([
            'certificate_name' => 'required',
            'certificate_ins' => 'required',
            'certificate_year' => 'required',
            
        ]);
        UserCertification::create([
            'certification_name' => $request->certificate_name,
            'certification_institution' => $request->certificate_ins,
            'certification_date' => $request->certificate_year,
            'user_id' => $request->user_id,
        ]);

        return Redirect::route('profile.edit')->with('status', 'Berhasil menambahkan sertifikat');


    }

    public function deleteCertificate (Request $request){
        UserCertification::where('id', $request->certid)->delete();
        return Redirect::route('profile.edit')->with('status', 'Berhasil menghapus sertifikat');
    }


    public function addTraining(Request $request){
        
        $request->validate([
            'training_name' => 'required',
            'training_ins' => 'required',
            'training_year' => 'required',

            
        ]);

        if($request->is_training_expired){
            UserTraining::create([
                'training_name' => $request->training_name,
                'training_institution' => $request->training_ins,
                'training_date' => $request->training_year,
                'is_training_expired' => $request->is_training_expired,
                'user_id' => $request->user_id,
            ]);
        }else{
            UserTraining::create([
                'training_name' => $request->training_name,
                'training_institution' => $request->training_ins,
                'training_date' => $request->training_year,
                'training_expiration_date' => $request->training_exp,
                'user_id' => $request->user_id,
            ]);
        }

        return Redirect::route('profile.edit')->with('status', 'Berhasil menambahkan pelatihan');
    }

    public function deleteTraining (Request $request){
        UserTraining::where('id', $request->trainid)->delete();
        return Redirect::route('profile.edit')->with('status', 'Berhasil menghapus pelatihan');
    }

    public function addAchievement(Request $request){
        
        $request->validate([
            'achievement_name' => 'required',
            'achievement_desc' => 'required',
            'achievement_year' => 'required',
            'achievement_level' => 'required',
            
        ]);
        UserAchievement::create([
            'achievement_name' => $request->achievement_name,
            'achievement_description' => $request->achievement_desc,
            'achievement_level' => $request->achievement_level,
            'achievement_date' => $request->achievement_year,
            'user_id' => $request->user_id,
        ]);

        return Redirect::route('profile.edit')->with('status', 'Berhasil menambahkan prestasi');
    }

    public function deleteAchievement (Request $request){
        UserAchievement::where('id', $request->trainid)->delete();
        return Redirect::route('profile.edit')->with('status', 'Berhasil menghapus prestasi');
    }
        
        
        
}