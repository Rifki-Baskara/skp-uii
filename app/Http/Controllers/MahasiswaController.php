<?php

namespace App\Http\Controllers;

use App\DataMhsSkpWajib;
use App\PengajuanSkpPilihan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\VarDumper\Cloner\Data;

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
            $wajibsarjana = DataMhsSkpWajib::where ('mahasiswa_username', Auth::guard('mahasiswa')->user()->username)->get();
            $wajibs = 0;
            foreach ($wajibsarjana as $jmlwajibs) {
                $wajibs = $jmlwajibs->poin_skp + $wajibs;
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
                $jumlahdiploma = $jmld->poin_skp + $jumlahdiploma;
            }
            $wajibdiploma = DataMhsSkpWajib::where ('mahasiswa_username', Auth::guard('mahasiswa')->user()->username)->get();
            $wajibd = 0;
            foreach ($wajibdiploma as $jmlwajibd) {
                $wajibd = $jmlwajibd->poin + $wajibd;
            }    
        }
        else if (Auth::guard('mahasiswa')->user()->jenjang_pendidikan == 'Magister'||Auth::guard('mahasiswa')->user()->jenjang_pendidikan == 'Doktor')
        {
            $studi = DataMhsSkpWajib::where ('mahasiswa_username', Auth::guard('mahasiswa')->user()->username)->where ('aktivitas_kemahasiswaan', 'like', '%Study Intensif Al-Quran%' )->latest()->first();
            $islam = DataMhsSkpWajib::where ('mahasiswa_username', Auth::guard('mahasiswa')->user()->username)->where ('aktivitas_kemahasiswaan', 'like', '%Islam Rahmatan lil Alamin%' )->latest()->first();
            $pengabdian = DataMhsSkpWajib::where ('mahasiswa_username', Auth::guard('mahasiswa')->user()->username)->where ('aktivitas_kemahasiswaan', 'like', '%Pengabdian kepada Masyarakat%' )->latest()->first();
            $pilihan3 = PengajuanSkpPilihan::where ('nim', Auth::guard('mahasiswa')->user()->username)->get();
            $jumlah3 = 0;
            foreach ($pilihan3 as $jml3) {
                $jumlah3 = $jml3->poin + $jumlah3;
            }
            $wajib3 = DataMhsSkpWajib::where ('mahasiswa_username', Auth::guard('mahasiswa')->user()->username)->get();
            $jumlahwajib3 = 0;
            foreach ($wajib3 as $jmlwajib3) {
                $jumlahwajib3 = $jmlwajib3->poin_skp + $jumlahwajib3;
            }    
        } 
        else if (Auth::guard('mahasiswa')->user()->jenjang_pendidikan == 'Profesi')
        {
            $studip = DataMhsSkpWajib::where ('mahasiswa_username', Auth::guard('mahasiswa')->user()->username)->where ('aktivitas_kemahasiswaan', 'like', '%Study Intensif Al-Quran%' )->latest()->first();
            $islamp = DataMhsSkpWajib::where ('mahasiswa_username', Auth::guard('mahasiswa')->user()->username)->where ('aktivitas_kemahasiswaan', 'like', '%Islam Rahmatan lil Alamin%' )->latest()->first();
            $pengabdianp = DataMhsSkpWajib::where ('mahasiswa_username', Auth::guard('mahasiswa')->user()->username)->where ('aktivitas_kemahasiswaan', 'like', '%Pengabdian kepada Masyarakat%' )->latest()->first();
            $pilihan4 = PengajuanSkpPilihan::where ('nim', Auth::guard('mahasiswa')->user()->username)->get();
            $jumlah4 = 0;
            foreach ($pilihan4 as $jml4) {
                $jumlah4 = $jml4->poin + $jumlah4;
            }
            $wajib4 = DataMhsSkpWajib::where ('mahasiswa_username', Auth::guard('mahasiswa')->user()->username)->get();
            $jumlahwajib4 = 0;
            foreach ($wajib4 as $jmlwajib4) {
                $jumlahwajib4 = $jmlwajib4->poin_skp + $jumlahwajib4;
            }
        } 
        return view('mahasiswa.dashboard-skp-mahasiswa', compact('pndi','jumlahpndi','pdq','ppd','pkd','pilihansarjana',
        'jumlahsarjana','jumlahpkd','pndidiploma','pdqdiploma','pkddiploma','ppddiploma'
        ,'pilihandiploma','jumlahdiploma','studi','islam','pengabdian','pilihan3','jumlah3','studip','islamp','pengabdianp','pilihan4','jumlah4',
        'wajib4','jumlahwajib4','wajib3','jumlahwajib3','wajibdiploma','wajibd','wajibsarjana','wajibs'));
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
