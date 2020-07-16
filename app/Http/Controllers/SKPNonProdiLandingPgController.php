<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class SKPNonProdiLandingPgController extends Controller
{
    public function index()
    {
        return view('SKPNonProdi.SKPNonProdi-landingPage');
    }
}
