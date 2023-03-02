<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\Careerfair;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::latest()->get();

        return view('admin.event', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $careers = Careerfair::all();
        return view('admin.event-new', compact('careers'));
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
            'deskripsi' => 'required',
            'waktu' => 'required',
            'periode' => 'required',
            'image' => 'image|file|max:2048',
            'link' => 'required',
            'status' => 'required',
        ]);
        if($request->file('image')){
            $img = $request->file('image')->store('public/uploads/events');
        }else{
            $img = null;
        }
        Event::create([
            'title' => $request->judul,
            'description' => $request->deskripsi,
            'time' => $request->waktu,
            'careerfair_id' => $request->periode,
            'link' => $request->link,
            'img' => $img,
            'status' => $request->status,
        ]);
        return redirect('/dashboard/event')->with('status', 'Event berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        return view('admin.event-view', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        $careers = Careerfair::all();
        return view('admin.event-update', compact('event', 'careers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'waktu' => 'required',
            'periode' => 'required',
            'link' => 'required',
            'image' => 'image|file|max:2048',
            'status' => 'required',
        ]);
        if($request->file('image')){
            Storage::delete($event->img);
            $img = $request->file('image')->store('public/uploads/events');
            
        }else{
            $img = $event->img;
        }
        
        Event::where('id', $event->id)
                ->update([
                    'title' => $request->judul,
                    'description' => $request->deskripsi,
                    'time' => $request->waktu,
                    'careerfair_id' => $request->periode,
                    'link' => $request->link,
                    'img' => $img,
                    'status' => $request->status,
                ]);
        return redirect('/dashboard/event')->with('status', 'Event berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $event = Event::find($request->id);
        Storage::delete($event->img);
        Event::destroy($request->id);
        return redirect('/dashboard/event')->with('status', 'Event berhasil dihapus');
    }
}
