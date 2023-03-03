<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Partner;
use App\Models\Careerfair;



use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{   
    
    public function index()
    {
        $auth = auth()->user();
       
        // $partners = Partner::all();
        $partners = Partner::latest()->get();
        $events = Event::latest()->get();
        $test[] = $partners->merge($events);
        // dd($test);
        $aocf = Careerfair::where('status', 'active')->latest()->first();
        $countpartner = Partner::where('status', 'active')->count();
        $counterevent = Event::where('status', 'active')->count();
        return view('admin.dashboard', compact('auth', 'countpartner', 'counterevent', 'partners', 'test','aocf'));
    }

    public function user(){
        $user = auth()->user();
        return view('user.dashboard', compact('user'));
    }
}
