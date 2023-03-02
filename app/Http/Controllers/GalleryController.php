<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gallery = Gallery::latest()->get();
        return view('admin.gallery', compact('gallery'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gallery-new');
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
            'image' => 'required|image|file|max:2048',
            'status' => 'required',
        ]);
       

        if($request->file('image')){
            $img = $request->file('image')->store('public/uploads/gallery');
        }else{
            $img = null;
        }
        Gallery::create([
            'title' => $request->judul,
            'img' => $img,
            'status' => $request->status,
        ]);
        return redirect('/dashboard/gallery')->with('status', 'Galeri berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        return view('admin.gallery-view', compact('gallery'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallery $gallery)
    {
        return view('admin.gallery-update', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gallery $gallery)
    {
        
        $request->validate([
            'judul' => 'required',
            'status' => 'required',
            'image' => 'required|image|file|max:2048',
        ]);
       
        if($request->file('image')){
            Storage::delete($gallery->img);
            $img = $request->file('image')->store('public/uploads/gallery');
            
        }else{
            $img = $gallery->img;
        }
        Gallery::where('id', $gallery->id)
                ->update([
                    'title' => $request->judul,
                    'img' => $img,
                    'status' => $request->status,
                ]);
        return redirect('/dashboard/gallery')->with('status', 'Galeri berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,Gallery $gallery)
    {
        $gallery = Gallery::find($request->id);
        Storage::delete($gallery->img);
        Gallery::destroy($request->id);
        return redirect('/dashboard/gallery')->with('status', 'Galeri berhasil dihapus');
    }
}
