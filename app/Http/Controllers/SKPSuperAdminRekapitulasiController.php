<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\PengajuanSkpPilihan;
use App\DataMhsSkpWajib;

class SKPSuperAdminRekapitulasiController extends Controller
{
    public function index()
    {
        $mhsSkpWajib = DataMhsSkpWajib::all();
        $mhsSkpPilihan = PengajuanSkpPilihan::all();

        $kepribadianIslami = PengajuanSkpPilihan::where([
            ['domain_profil', 'Kepribadian Islami'],
            ['status', 'Disetujui'],
        ])->count();
        $keterampilanTransformatif = PengajuanSkpPilihan::where([
            ['domain_profil', 'Keterampilan Transformatif'],
            ['status', 'Disetujui'],
        ])->count();
        $kepemimpinanProfetik = PengajuanSkpPilihan::where([
            ['domain_profil', 'Kepemimpinan Profetik'],
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
        'mhsSkpWajib',
        'mhsSkpPilihan'));
    }

    public function filter()
    {
        $fakultas = DataMhsSkpWajib::all();
        
    }
}
