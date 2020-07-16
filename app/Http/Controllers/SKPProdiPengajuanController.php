<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class SKPProdiPengajuanController extends Controller
{
    public function index()
    {
        return view('SKPProdi.SKPProdi-pengajuan-skp');
    }
    public function create()
    {
        return view('SKPProdi.SKPProdi-pengajuan-form');
    }
}
