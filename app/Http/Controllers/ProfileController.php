<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Faculty;
use App\Models\Major;
use App\Models\User;
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
        
        return view('user.editprofile', [
            'user' => $request->user(),
            'faculties' => $faculties,
              
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
            'education' => 'required',
            'faculty' => 'required',
            'major' => 'required',
           
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
            'education' => $request->education,
            'faculty' => $request->faculty,
            'major' => $request->major,
            'instagram' => $request->instagram,
            'linkedin' => $request->linkedin,
            
        ]);

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
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

        return Redirect::route('profile.edit')->with('status', 'cv-updated');
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
}
