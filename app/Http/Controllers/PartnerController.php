<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use App\Models\Careerfair;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partners = Partner::latest()->get();
        return view('admin.partner', compact('partners'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $careers = Careerfair::all();
        return view('admin.partner-new', compact('careers'));
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
            'nama' => 'required',
            'deskripsi'=> 'required',
            'periode' => 'required',
            'image' => 'image|file|max:2048',
            'jenis' => 'required',
            'status' => 'required',
        ]);
      
        if($request->file('image')){
            $img = $request->file('image')->store('public/uploads/partner');
        }else{
            $img = null;
        }

        $path = "/public/storage/".$img;
        $qr = QrCode::format('png')->merge($path)->errorCorrection('H')->size(300)->generate(URL::to('/singlepartner/'.$request->id));
        // $qr = QrCode::format('png')->size(300)->generate($request->judul);
        $output_file = 'public/uploads/img/img-' . time() . '.png';
        Storage::disk('public')->put($output_file, $qr);


        Partner::create([
            'company' => $request->nama,
            'description'=> $request->deskripsi,
            'careerfair_id' => $request->periode,
            'position' => $request->jenis,
            'img' => $img,
            'qr' => $output_file,
            'status' => $request->status,
        ]);
        return redirect('/dashboard/partner')->with('status', 'Partner berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function show(Partner $partner)
    {
        return view('admin.partner-view', compact('partner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function edit(Partner $partner)
    {
        $partner = Partner::find($partner->id);
        $careers = Careerfair::all();
        return view('admin.partner-update', compact('partner', 'careers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Partner $partner)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi'=> 'required',
            'periode' => 'required',
            'jenis' => 'required',
            'image' => 'image|file|max:2048',
            'status' => 'required',
        ]);
        
        if($request->file('image')){
            Storage::delete($partner->img);
            $img = $request->file('image')->store('public/uploads/partner');
            
        }else{
            $img = $partner->img;
        }
        Partner::where('id', $partner->id)
                ->update([
                    'company' => $request->nama,
                    'description'=> $request->deskripsi,
                    'careerfair_id' => $request->periode,
                    'position' => $request->jenis,
                    'img' => $img,
                    'status' => $request->status,
                ]);
        return redirect('/dashboard/partner')->with('status', 'Partner berhasil diperbarui');
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $partner = Partner::find($request->id);
        Storage::delete($partner->img);
        Partner::destroy($request->id);
        return redirect('/dashboard/partner')->with('status', 'Partner berhasil dihapus');
    }

    public function viewQRCode(Request $request)
    {
       
        $qr = Partner::findorFail($request->id);
        if($qr->qr == null){
            $path = "/public/storage/".$qr->img;
            $qr = QrCode::format('png')->merge($path)->errorCorrection('H')->size(300)->generate(URL::to('/singlepartner/'.$request->id));
            // $qr = QrCode::format('png')->size(300)->generate($request->judul);
            $output_file = 'public/uploads/img/img-' . time() . '.png';
            Storage::disk('public')->put($output_file, $qr);
    
            Partner::where('id', $request->id)
                    ->update([
                        'qr' => $output_file,
                    ]);
            $qr = Partner::findorFail($request->id);
        }
       
        return view('admin.partner-qr', compact('qr'));

    }
    
    public function downloadQRCode (Request $request)
    {
        $qr = Partner::findorFail($request->id);
        $file = public_path()."/storage/".$qr->qr;
        
        $filename = $qr->company . '.png';
        
        $headers = array(
             'Content-Type: application/png',
         );
        return response()->download($file, $filename, $headers);
    }

}