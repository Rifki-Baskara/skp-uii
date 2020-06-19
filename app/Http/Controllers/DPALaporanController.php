<?php

namespace App\Http\Controllers;
use App\PengajuanSkpPilihan;
use App\Dpa;
use App\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\SKPI;

class DPALaporanController extends Controller
{
    public function landingPg()
    {
        return view('dpa.landing-page');
    }
    public function skpmasuk()
    {
        $skpmasuk = PengajuanSkpPilihan::leftJoin('mahasiswa', 'mahasiswa.username', 'pengajuan_skp_pilihan.nim')
        ->select('pengajuan_skp_pilihan.*','mahasiswa.dpa_id')
        ->where ('status', '=', 'Belum Terverifikasi')
        ->where('mahasiswa.dpa_id', Auth::guard('dpa')->user()->id)->get();
        return view('dpa.laporan-masuk', compact('skpmasuk'));
    }

    public function show($id)
    {
        $detail = PengajuanSkpPilihan::find($id);

        return view('dpa.verifikasi-pengajuan', compact('detail'));
    }

    // public function edit($id)
    // {
    //     $skpi = \App\PengajuanSkpPilihan::all();
    //     $skpi = PengajuanSkpPilihan::find($id);

    //     return view('dpa.verifikasi-pengajuan',compact('skpi'));
    // }
    public function update(Request $request, $id)
    {
        $detail = PengajuanSkpPilihan::find($id);
        
        if ($request->status == "Disetujui dan layak masuk SKPI"){
            $skpi = new SKPI();
            $skpi->id = $detail->id;
            $skpi->nama_kegiatan = $detail->nama_kegiatan;
            $skpi->domain_profil = $detail->domain_profil;
            $skpi->aktivitas_kemahasiswaan = $detail->aktivitas_kemahasiswaan;
            $skpi->lokasi = $detail->lokasi;
            $skpi->penyelenggara = $detail->penyelenggara;
            $skpi->prestasi = $detail->prestasi;
            $skpi->tanggal_mulai = $detail->tanggal_mulai;
            $skpi->tanggal_selesai = $detail->tanggal_selesai; 
            $skpi->berkas_kegiatan = $detail->berkas_kegiatan;
            $skpi->level_kegiatan = $detail->level_kegiatan;
            $skpi->deskripsi = $detail->deskripsi;
            $skpi->nim = $detail->nim;
            $skpi->nama_mhs = $detail->nama_mhs;
            $skpi->jenjang = $detail->jenjang;
            $skpi->kategori = $request->kategori;
            $skpi->save();
            
        }
        //dd($request->komentar);
        $detail->update ([
            'poin' => $request->poin,
            'status' => $request->status,
            'komentar' => $request->komentar,

        ]);
        
        return redirect('/dpa/laporan');
    }
    public function tampil()
    {
        $daftarmhs = Mahasiswa::where ('dpa_id', Auth::guard('dpa')->user()->id)
        ->leftJoin('mahasiswaskpwajib','mahasiswa.username','mahasiswaskpwajib.mahasiswa_username')
        ->leftJoin('pengajuan_skp_pilihan','mahasiswa.username','pengajuan_skp_pilihan.nim')
        ->where('pengajuan_skp_pilihan.status', 'Disetujui')
        // ->orWhere()
        ->get();
        //dd($daftarmhs);
        // foreach ($daftar as $pndijumlah) {
        //     $jumlahpkd = $pndijumlah->poin_skp + $jumlahpkd;

        return view('dpa.daftar-mahasiswa',compact('daftarmhs'));
    }

    
}