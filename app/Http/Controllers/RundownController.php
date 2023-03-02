<?php

namespace App\Http\Controllers;

use App\Models\Rundown;
use App\Models\Careerfair;
use Illuminate\Http\Request;
use Carbon\Carbon;

class RundownController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rundowns = Rundown::latest()->get();
        $rundowns->map(function ($rundown) {
            $rundown->time = Carbon::parse($rundown->time)->format('l, d M Y H:i:s');
            return $rundown;
        });
        
        return view('admin.rundown', compact('rundowns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $careers = Careerfair::all();
        return view('admin.rundown-new', compact('careers'));
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
            'hari_tanggal' => 'required',
            'rincian'=> 'required',
            'periode' => 'required',
            'status' => 'required',
        ]);
        
        
        Rundown::create([
            'time' => $request->hari_tanggal,
            'event'=> $request->rincian,
            'careerfair_id' => $request->periode,
            'status' => $request->status,
        ]);
        return redirect('/dashboard/rundown')->with('status', 'Rundown berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rundown  $rundown
     * @return \Illuminate\Http\Response
     */
    public function show(Rundown $rundown)
    {
        return view('admin.rundown-view', compact('rundown'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rundown  $rundown
     * @return \Illuminate\Http\Response
     */
    public function edit(Rundown $rundown)
    {
        $rundown = Rundown::find($rundown->id);
        $careers = Careerfair::all();
        return view('admin.rundown-update', compact('rundown', 'careers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rundown  $rundown
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rundown $rundown)
    {
        $request->validate([
            'hari_tanggal' => 'required',
            'rincian'=> 'required',
            'periode' => 'required',
            'status' => 'required',
        ]);
        Rundown::where('id', $rundown->id)
                ->update([
                    'time' => $request->hari_tanggal,
                    'event'=> $request->rincian,
                    'careerfair_id' => $request->periode,
                    'status' => $request->status,
                ]);
        return redirect('/dashboard/rundown')->with('status', 'Rundown berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rundown  $rundown
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        Rundown::destroy($id);
        return redirect('/dashboard/rundown')->with('status', 'Rundown berhasil dihapus');
    }
}
