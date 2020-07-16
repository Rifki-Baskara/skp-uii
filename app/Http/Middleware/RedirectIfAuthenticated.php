<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        // if (Auth::guard($guard)->check()) {
        //     return redirect('/home');
        // }
        if(Auth::guard('mahasiswa')->check()){
            return redirect('/mahasiswa');
        }
        else if(Auth::guard('superadmin')->check()){
            return redirect('/superadmin');
        }
        else if(Auth::guard('fakultas')->check()){
            return redirect('/prodi');
        }
        else if(Auth::guard('prodi')->check()){
            return redirect('/prodi');
        }
        else if(Auth::guard('dppai')->check()){
            return redirect('/nonprodi');
        }
        
        
        return $next($request);
    }
}
