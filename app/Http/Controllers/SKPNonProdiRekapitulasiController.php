<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\PengajuanSkpPilihan;
use App\DataMhsSkpWajib;

class SKPNonProdiRekapitulasiController extends Controller
{
    public function index()
    {
        $mhsSkpWajib = DataMhsSkpWajib::all();

        $pndi = DataMhsSkpWajib::where([
            ['aktivitas_kemahasiswaan', 'Pendalaman Nilai Dasar Islam'],
        ])->count();
        $pdq = DataMhsSkpWajib::where([
            ['aktivitas_kemahasiswaan', 'Pengembangan Diri Qurani'],
        ])->count();
        $ppd = DataMhsSkpWajib::where([
            ['aktivitas_kemahasiswaan', 'Pelatihan Pengembangan Diri'],
        ])->count();
        $pkd = DataMhsSkpWajib::where([
            ['aktivitas_kemahasiswaan', 'Pelatihan Kepemimpinan dan Dakwah'],
        ])->count();

        return view('SKPNonProdi.SKPNonProdi-rekapitulasi',
        compact('pndi',
        'pdq',
        'ppd',
        'pkd',
        'mhsSkpWajib'));
    }

    public function filter()
    {
        $fakultas = DataMhsSkpWajib::all();
        
    }
}
