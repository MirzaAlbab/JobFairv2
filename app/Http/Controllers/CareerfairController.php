<?php

namespace App\Http\Controllers;

use App\Models\Careerfair;
use App\Models\Presence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

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
        // generate qr code with url of present
        // $qr = QrCode::format('png')->size(300)->generate('https://career_fair.test/presence');
        // merege with image
        // $qr = QrCode::format('png')->merge("/public/assets/img/dpkka-mini.png")->errorCorrection('H')->size(300)->generate(URL::to('/presence'));
        //     // $qr = QrCode::format('png')->size(300)->generate($request->judul);
        // $output_file = 'public/uploads/img/img-' . time() . '.png';
        // Storage::disk('public')->put($output_file, $qr);
       

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
        // check wheether any career fair is active
        if($request->status == "inactive"){
            $active = Careerfair::where('status', 'active')->count();
           
            if($active != 1){
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
            else{
                return redirect('/dashboard/career-fair')->with('failed', 'Update gagal. Minimal 1 Career Fair harus aktif');
            }
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

    public function viewQRCode(Request $request)
    {
       
        $qr = Careerfair::find($request->id);
        if($qr->qr == null){
            $qr = QrCode::format('png')->merge("/public/assets/img/dpkka-mini.png")->errorCorrection('H')->size(300)->generate(URL::to('user/presence'));
            // $qr = QrCode::format('png')->size(300)->generate($request->judul);
            $output_file = 'public/uploads/img/img-' . time() . '.png';
            Storage::disk('public')->put($output_file, $qr);
    
            Careerfair::where('id', $request->id)
                    ->update([
                        'qr' => $output_file,
                    ]);
            $qr = Careerfair::find($request->id);
        }
       
        return view('admin.career-fair-qr', compact('qr'));

    }
    
    public function downloadQRCode (Request $request)
    {
        $qr = Careerfair::find($request->id);
        $file = public_path()."/storage/".$qr->qr;
        
        $filename = $qr->title . '.png';
        
        $headers = array(
             'Content-Type: application/png',
         );
        return response()->download($file, $filename, $headers);
    }

   
}