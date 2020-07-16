<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class SKPSuperAdminLandingPgController extends Controller
{
    public function index()
    {
        return view('SKPSuperAdmin.SKPSuperAdmin-landingPage');
    }
}
