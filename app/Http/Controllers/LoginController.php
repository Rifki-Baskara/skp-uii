<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Mahasiswa;
use App\Dpa;
use App\SuperAdmin;

class LoginController extends Controller {

    public function index(){
        return view('login.login');
    }

    public function login(Request $request) {
        if(Auth::guard('mahasiswa')->attempt(['username'=>$request->username, 'password'=>$request->password])){
            return redirect('/mahasiswa');
        }
        else if (Auth::guard('dpa')->attempt(['username'=>$request->username, 'password'=>$request->password])){
            return redirect('/dpa');
        }
        else if (Auth::guard('superadmin')->attempt(['username'=>$request->username, 'password'=>$request->password])){
            return redirect('/superadmin');
        }
        else if (Auth::guard('fakultas')->attempt(['username'=>$request->username, 'password'=>$request->password])){
            return redirect('/prodi');
        }
        else if (Auth::guard('prodi')->attempt(['username'=>$request->username, 'password'=>$request->password])){
            return redirect('/prodi');
        }
        else if (Auth::guard('dppai')->attempt(['username'=>$request->username, 'password'=>$request->password])){
            return redirect('/nonprodi');
        }
        else{
            return view('login.login');
        }
    }

    public function logout(){
        if(Auth::guard('mahasiswa')->check()){
            Auth::guard('mahasiswa')->logout();
        }
        else if(Auth::guard('dpa')->check()){
            Auth::guard('dpa')->logout();
        }
        else if(Auth::guard('superadmin')->check()){
            Auth::guard('superadmin')->logout();
        }
        else if(Auth::guard('fakultas')->check()){
            Auth::guard('fakultas')->logout();
        }
        else if(Auth::guard('prodi')->check()){
            Auth::guard('prodi')->logout();
        }
        else if(Auth::guard('dppai')->check()){
            Auth::guard('dppai')->logout();
        }
        return redirect('/login');
    }
}