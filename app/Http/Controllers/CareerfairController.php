<?php

namespace App\Http\Controllers;

use App\Models\Careerfair;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CareerfairController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $careers = Careerfair::latest()->get();
       
        return view('admin.career-fair', compact('careers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.career-fair-new');
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
            'judul' => 'required',
            'tglmulai' => 'required',
            'deskripsi' => 'required',
            'tglselesai' => 'required',
            'image' => 'image|file|max:2048',
            'status' => 'required',
        ]);
        if($request->file('image')){
            $img = $request->file('image')->store('public/uploads/careerfair');
        }else{
            $img = null;
        }
        Careerfair::create([
            'title' => $request->judul,
            'description' => $request->deskripsi,
            'start_date' => $request->tglmulai,
            'end_date' => $request->tglselesai,
            'img' => $img,
            'status' => $request->status,
        ]);
        return redirect('/dashboard/career-fair')->with('status', 'Career Fair berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Careerfair  $careerfair
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $careerfair = Careerfair::find($request->id);
        // dd($careerfair);
        return view('admin.career-fair-view', compact('careerfair'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Careerfair  $careerfair
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $id = $request->id;
        $careerfair = Careerfair::find($id);
        // dd($request->id);
        return view('admin.career-fair-update', compact('careerfair'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Careerfair  $careerfair
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Careerfair $careerfair)
    {
        $careerfair = Careerfair::find($request->id);
        
        $request->validate([
            'judul' => 'required',
            'tglmulai' => 'required',
            'deskripsi' => 'required',
            'image' => 'image|file|max:2048',
            'tglselesai' => 'required',
            'status' => 'required',
        ]);
        if($request->file('image')){
            Storage::delete($careerfair->img);
            $img = $request->file('image')->store('public/uploads/careerfair');
            
        }else{
            $img = $careerfair->img;
        }
        Careerfair::where('id', $request->id)
                ->update([
                    'title' => $request->judul,
                    'description' => $request->deskripsi,
                    'start_date' => $request->tglmulai,
                    'end_date' => $request->tglselesai,
                    'img' => $img,
                    'status' => $request->status,
                ]);
        return redirect('/dashboard/career-fair')->with('status', 'Career Fair berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Careerfair  $careerfair
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $careerfair = Careerfair::find($request->id);
        Storage::delete($careerfair->img);
        Careerfair::destroy($request->id);
        return redirect('/dashboard/career-fair')->with('status', 'Career Fair berhasil dihapus');
    }
}