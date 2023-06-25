<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use Illuminate\Http\Request;
use App\Notifications\CompanyNotification;
use App\Models\PartnersNotification;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Notification as Notification;
use Illuminate\Support\Facades\Redis;
use SebastianBergmann\Diff\Diff;

class CompanyNotifController extends Controller
{
    public function index()
    {
        $id = auth()->user()->address;
        $notif = PartnersNotification::where('partner_id', $id)->get();
        return view('company.notif', compact('notif'));
    }

    public function create()
    {
        return view('company.notif-new');
    }

    public function store(Request $request){
        
        $request->validate([
            'title' => 'required',
            'message' => 'required',
            'user' => 'required',
        ]);

        PartnersNotification::create([
            'title' => $request->title,
            'message' => $request->message,
            'user' => $request->user,
            'partner_id' => auth()->user()->address,
        ]);

        
        

        return redirect()->route('company-job-notification')->with('status', 'Notification has been created!');
    }

    public function show(PartnersNotification $notif)
    {
        return view('company.notif-view', compact('notif'));
    }
   

    public function edit(){
        
        $notif = PartnersNotification::where('partner_id', auth()->user()->address)->get()->first();
        
        return view('company.notif-update', compact('notif'));
    }

    public function update(Request $request, PartnersNotification $notif){
        $request->validate([
            'title' => 'required',
            'message' => 'required',
            'user' => 'required',
        ]);


        
        PartnersNotification::where('id', $notif->id)
        ->update([
            'title' => $request->title,
            'message' => $request->message,
            'user' => $request->user,
            'partner_id' => auth()->user()->address,

        ]);
        

        return redirect()->route('company-job-notification')->with('status', 'Notification has been updated!');
    }


    public function sendNotif(Request $request){
        
        $notif = PartnersNotification::where('id', $request->id)->get();
        $userlist = JobApplication::where('partner_id', auth()->user()->address)->where('status','=','process')->pluck('user_id');
        $message = $notif[0]->message;

        $users = User::whereIn('id', $userlist)->get();

        // through the array of users to send notification
        Notification::send($users, new CompanyNotification($message, $notif[0]->title));

        // updating the status of the notification to delivered
        PartnersNotification::where('id', $request->id)
        ->update([
            'status' => 'delivered',
        ]);


        return redirect()->route('company-job-notification')->with('status', 'Notification has been sent!');
    }
    
}
