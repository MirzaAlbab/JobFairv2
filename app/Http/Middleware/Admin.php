<?php

namespace App\Http\Middleware;


use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->user()->role == 'admin') {
            return $next($request);
        }
        else if(in_array($request->user()->role, ['umum','mhs','alumni'])){
            return redirect('user');
        }
        else if($request->user()->role == 'company'){
            return redirect('user');

        }
    
       abort(403);
    }
        
            
        
    
}
