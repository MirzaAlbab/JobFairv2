<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Partner;
use App\Models\Careerfair;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller 
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('admin');
        $users = User::latest()->get();
       
        return view('admin.user', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('admin');
        $users = User::all();
        $partner = Partner::all();
        $aocf = Careerfair::where('status', 'active')->latest()->first();
        return view('admin.user-new', compact('users','partner','aocf'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('admin');
        $request->validate([
            'name' => 'required',
            'email'=> 'required | unique:users,email',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => 'required',
            'status' => 'required',
        ]);
        

        User::create([
            'name' => $request->name,
            'email'=> $request->email,
            'address'=>$request->partner_id,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'status' => $request->status,
        ]);
        
        return redirect('/dashboard/user')->with('status', 'User berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $this->authorize('admin');
        return view('admin.user-view', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $this->authorize('admin');
        return view('admin.user-update', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->authorize('admin');
        $past_email = $user->email;
        if ($request->email != $past_email) {
            $request->validate([
                'name' => 'required',
                'email'=> 'required | unique:users,email',
                'status' => 'required',
            ]);
        }
        $request->validate([
            'name' => 'required',
            'email'=> 'required',
            'status' => 'required',
        ]);

        User::where('id', $user->id)
                ->update([
                    'name' => $request->name,
                    'email'=> $request->email,
                    'status' => $request->status,
                ]);
        
        return redirect('/dashboard/user')->with('status', 'User berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $this->authorize('admin');
        $id = $request->id;
        $user = User::find($id);
        $auth = Auth::user()->id;
        if ($user->id == $auth || $user->role == 'superAdmin') {
            return redirect('/dashboard/user')->withErrors(['error'=>'User ini tidak dapat dihapus!']);
        }
        User::destroy($id);
        return redirect('/dashboard/user')->with('status', 'User berhasil dihapus');
    }
}
