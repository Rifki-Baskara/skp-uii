<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\PengajuanSkpPilihan;
use App\DataMhsSkpWajib;


class SKPProdiRekapitulasiController extends Controller
{
    public function index()
    {
        if (Auth::guard('fakultas')->user()){
        $mhsSkpWajib = DataMhsSkpWajib::where('mahasiswa_username', 'like', '%%'.Auth::user()->kode.'%%%%%')->get();

        $kepribadianIslami = PengajuanSkpPilihan::where([
            ['domain_profil', 'Kepribadian Islami'],
            ['status', 'Disetujui'],
            ['nim', 'like', '%%'.Auth::user()->kode.'%%%%%'], 
        ])->count();
        $keterampilanTransformatif = PengajuanSkpPilihan::where([
            ['domain_profil', 'Keterampilan Transformatif'],
            ['status', 'Disetujui'],
            ['nim', 'like', '%%'.Auth::user()->kode.'%%%%%']
        ])->count();
        $kepemimpinanProfetik = PengajuanSkpPilihan::where([
            ['domain_profil', 'Ketpemimpinan Profetik'],
            ['status', 'Disetujui'],
            ['nim', 'like', '%%'.Auth::user()->kode.'%%%%%']
        ])->count();
        $pengetahuanIntegratif = PengajuanSkpPilihan::where([
            ['domain_profil', 'Pengetahuan Integratif'],
            ['status', 'Disetujui'],
            ['nim', 'like', '%%'.Auth::user()->kode.'%%%%%']
        ])->count();
        }
        else if (Auth::guard('prodi')->user()){
            $mhsSkpWajib = DataMhsSkpWajib::where('mahasiswa_username', 'like', '%%'.Auth::user()->kode.'%%%')->get();
    
            $kepribadianIslami = PengajuanSkpPilihan::where([
                ['domain_profil', 'Kepribadian Islami'],
                ['status', 'Disetujui'],
                ['nim', 'like', '%%'.Auth::user()->kode.'%%%'], 
            ])->count();
            $keterampilanTransformatif = PengajuanSkpPilihan::where([
                ['domain_profil', 'Keterampilan Transformatif'],
                ['status', 'Disetujui'],
                ['nim', 'like', '%%'.Auth::user()->kode.'%%%']
            ])->count();
            $kepemimpinanProfetik = PengajuanSkpPilihan::where([
                ['domain_profil', 'Ketpemimpinan Profetik'],
                ['status', 'Disetujui'],
                ['nim', 'like', '%%'.Auth::user()->kode.'%%%']
            ])->count();
            $pengetahuanIntegratif = PengajuanSkpPilihan::where([
                ['domain_profil', 'Pengetahuan Integratif'],
                ['status', 'Disetujui'],
                ['nim', 'like', '%%'.Auth::user()->kode.'%%%']
            ])->count();
            }

        return view('SKPProdi.SKPProdi-rekapitulasi',
        compact('kepribadianIslami',
        'keterampilanTransformatif',
        'kepemimpinanProfetik',
        'pengetahuanIntegratif',
        'mhsSkpWajib'));
    }
    public function create()
    {
        return view('SKPProdi.SKPProdi-peserta-formTambah');
    }
}
