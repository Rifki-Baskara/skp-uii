<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\SkpWajib;
use App\DataMhsSkpWajib;
use App\Http\Requests\DataMhsSkpWajib\Store;

class SKPNonProdiPesertaController extends Controller
{
    public function index()
    {
        $dataMhs = DataMhsSkpWajib::all();
        $skpwajib = SkpWajib::where('penyelenggara', 'like', '%Universitas%')->get();
        return view('SKPNonProdi.SKPNonProdi-peserta-kegiatan',compact('skpwajib','dataMhs'));
    }
    
    /*public function tambah(){
        return view('SKPNonProdi.SKPNonProdi-peserta-tambahKegiatan');
    }*/

    public function show(\App\SkpWajib $skpwajib)
    {
        $dataMhs = DataMhsSkpWajib::where([
            ['skp_wajib_nama_kegiatan', '=', $skpwajib->nama_kegiatan],
            ['jenjang_pendidikan','=', $skpwajib->jenjang_pendidikan],
        ])->get();
        return view('SKPNonProdi.SKPNonProdi-peserta-kegiatan-showMhs', compact('skpwajib','dataMhs'));
    }

    public function create(\App\SkpWajib $skpwajib)
    {
        return view('SKPNonProdi.SKPNonProdi-peserta-kegiatan-form',compact('skpwajib'));
    }
    public function store(Store $request)
    {
        $data = json_decode(request()->get('data'));

        
        foreach ($data as $row) {
        $dataMhs = new DataMhsSkpWajib();
        $dataMhs->mahasiswa_nama = $row[0];
        $dataMhs->mahasiswa_username = $row[1];
        $dataMhs->mahasiswa_fakultas = $request->mahasiswa_fakultas;
        $dataMhs->mahasiswa_jurusan = $request->mahasiswa_jurusan;
        $dataMhs->jenjang_pendidikan = $request->jenjang_pendidikan;
        $dataMhs->aktivitas_kemahasiswaan = $request->aktivitas_kemahasiswaan;
        $dataMhs->skp_wajib_nama_kegiatan = $request->skp_wajib_nama_kegiatan;
        $dataMhs->poin_skp = $request->poin_skp;
        $dataMhs->save();
        }

        return redirect()->back()->with('status','Berhasil menyimpan data mahasiswa');
    }
}
