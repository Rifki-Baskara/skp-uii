<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\PengajuanSkpPilihan;
use App\DataMhsSkpWajib;

class SKPSUperAdminRekapitulasiController extends Controller
{
    public function index()
    {
        $mhsSkpWajib = DataMhsSkpWajib::all();

        $kepribadianIslami = PengajuanSkpPilihan::where([
            ['domain_profil', 'Kepribadian Islami'],
            ['status', 'Disetujui'],
        ])->count();
        $keterampilanTransformatif = PengajuanSkpPilihan::where([
            ['domain_profil', 'Keterampilan Transformatif'],
            ['status', 'Disetujui'],
        ])->count();
        $kepemimpinanProfetik = PengajuanSkpPilihan::where([
            ['domain_profil', 'Ketpemimpinan Profetik'],
            ['status', 'Disetujui'],
        ])->count();
        $pengetahuanIntegratif = PengajuanSkpPilihan::where([
            ['domain_profil', 'Pengetahuan Integratif'],
            ['status', 'Disetujui'],
        ])->count();

        return view('SKPSuperAdmin.SKPSuperAdmin-rekapitulasi',
        compact('kepribadianIslami',
        'keterampilanTransformatif',
        'kepemimpinanProfetik',
        'pengetahuanIntegratif',
        'mhsSkpWajib'));
    }

    public function filter()
    {
        $fakultas = DataMhsSkpWajib::all();
        
    }
}
