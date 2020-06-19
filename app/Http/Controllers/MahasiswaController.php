<?php

namespace App\Http\Controllers;

use App\DataMhsSkpWajib;
use App\PengajuanSkpPilihan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MahasiswaController extends Controller
{
    public function dashboardSKPMahasiswa()
    {
        if (Auth::guard('mahasiswa')->user()->jenjang_pendidikan == 'Sarjana')
        {
            $pndi = DataMhsSkpWajib::where ('mahasiswa_username', Auth::guard('mahasiswa')->user()->username)->where ('skp_wajib_nama_kegiatan', 'like', '%PNDI%' )->get();
            $jumlahpndi = 0;
            foreach ($pndi as $pndijumlah) {
                $jumlahpndi = $pndijumlah->poin_skp + $jumlahpndi;
            }
            $pdq = DataMhsSkpWajib::where ('mahasiswa_username', Auth::guard('mahasiswa')->user()->username)->where ('aktivitas_kemahasiswaan', 'like', '%Pengembangan Diri Qurani%' )->latest()->first();
            $ppd = DataMhsSkpWajib::where ('mahasiswa_username', Auth::guard('mahasiswa')->user()->username)->where ('aktivitas_kemahasiswaan', 'like', '%Pelatihan Pengembangan Diri%' )->latest()->first();
            $pkd = DataMhsSkpWajib::where ('mahasiswa_username', Auth::guard('mahasiswa')->user()->username)->where ('skp_wajib_nama_kegiatan', 'like', '%PKD%' )->get();
            $jumlahpkd = 0;
            foreach ($pkd as $pkdjumlah) {
                $jumlahpkd = $pkdjumlah->poin_skp + $jumlahpkd;
            }
            $pilihansarjana = PengajuanSkpPilihan::where ('nim', Auth::guard('mahasiswa')->user()->username)->get();
            $jumlahsarjana = 0;
            foreach ($pilihansarjana as $jmls) {
                $jumlahsarjana = $jmls->poin + $jumlahsarjana;
            }
        }
        else if (Auth::guard('mahasiswa')->user()->jenjang_pendidikan == 'Diploma')
        {
            $pndidiploma = DataMhsSkpWajib::where ('mahasiswa_username', Auth::guard('mahasiswa')->user()->username)->where ('aktivitas_kemahasiswaan', 'like', '%Pendalaman Nilai Dasar Islam%' )->latest()->first();
            $pdqdiploma = DataMhsSkpWajib::where ('mahasiswa_username', Auth::guard('mahasiswa')->user()->username)->where ('aktivitas_kemahasiswaan', 'like', '%Pengembangan Diri Qurani%' )->latest()->first();
            $ppddiploma = DataMhsSkpWajib::where ('mahasiswa_username', Auth::guard('mahasiswa')->user()->username)->where ('aktivitas_kemahasiswaan', 'like', '%Pelatihan Pengembangan Diri%' )->latest()->first();
            $pkddiploma = DataMhsSkpWajib::where ('mahasiswa_username', Auth::guard('mahasiswa')->user()->username)->where ('aktivitas_kemahasiswaan', 'like', '%Pelatihan Kepemimpinan dan Dakwah%' )->latest()->first();
            $pilihandiploma = PengajuanSkpPilihan::where ('nim', Auth::guard('mahasiswa')->user()->username)->get();
            $jumlahdiploma = 0;
            foreach ($pilihandiploma as $jmld) {
                $jumlahdiploma = $jmld->poin + $jumlahdiploma;
            }    
        }
        else if (Auth::guard('mahasiswa')->user()->jenjang_pendidikan == 'Magister'||Auth::guard('mahasiswa')->user()->jenjang_pendidikan == 'Doktor'||Auth::guard('mahasiswa')->user()->jenjang_pendidikan == 'Profesi')
        {
            $studi = DataMhsSkpWajib::where ('mahasiswa_username', Auth::guard('mahasiswa')->user()->username)->where ('aktivitas_kemahasiswaan', 'like', '%Study Intensif Al-Quran%' )->latest()->first();
            $islam = DataMhsSkpWajib::where ('mahasiswa_username', Auth::guard('mahasiswa')->user()->username)->where ('aktivitas_kemahasiswaan', 'like', '%Islam Rahmatan lil Alamin%' )->latest()->first();
            $pengabdian = DataMhsSkpWajib::where ('mahasiswa_username', Auth::guard('mahasiswa')->user()->username)->where ('aktivitas_kemahasiswaan', 'like', '%Pengabdian kepada Masyarakat%' )->latest()->first();

            $pilihan3 = PengajuanSkpPilihan::where ('nim', Auth::guard('mahasiswa')->user()->username)->get();
            $jumlah3 = 0;
            foreach ($pilihan3 as $jml3) {
                $jumlah3 = $jml3->poin + $jumlah3;
            }    
        } 
        return view('mahasiswa.dashboard-skp-mahasiswa', compact('pndi','jumlahpndi','pdq','ppd','pkd','pilihansarjana','jumlahsarjana','jumlahpkd','pndidiploma','pdqdiploma','pkddiploma','ppddiploma'
    ,'pilihandiploma','jumlahdiploma','studi','islam','pengabdian','pilihan3','jumlah3'));
    }
    public function laporanSKPMahasiswa()
    {
        $mahasiswa = \App\Mahasiswa::all();
        return view('mahasiswa.laporan-skp-mahasiswa',compact('mahasiswa'));
    }
    public function pengajuanSKPPilihan()
    {
        return view('mahasiswa.form-skp-pilihan');
    }
    public function infoSKPMahasiswa()
    {
        return view('mahasiswa.info-skp-mahasiswa');
    }
}
