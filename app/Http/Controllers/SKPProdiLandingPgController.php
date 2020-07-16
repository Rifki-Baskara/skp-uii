<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class SKPProdiLandingPgController extends Controller
{
    public function index()
    {
        return view('SKPProdi.SKPProdi-landingPage');
    }
}
