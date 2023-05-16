<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class User
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
        if (in_array($request->user()->role, ['umum','mhs','alumni'])) {
            return $next($request);
        }
        else if($request->user()->role == 'admin'){
            return redirect('dashboard');
        }
        else if($request->user()->role == 'company'){
            return redirect('company');

        }
    
       abort(403);
    }
}
