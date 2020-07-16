<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\SkpWajib;
use App\DataMhsSkpWajib;
use App\PengajuanSkpPilihan;
use App\Http\Requests\DataMhsSkpWajib\Store;
use App\Http\Requests\SKPPilihan\Store2;


class SKPProdiPesertaWController extends Controller
{
    public function index()
    {
        $dataMhs = DataMhsSkpWajib::all();
        $skpwajib = SkpWajib::where('penyelenggara', 'like', '%Fakultas%')->get();
        return view('SKPProdi.SKPProdi-peserta-kegiatan', compact('skpwajib','dataMhs'));
    }
    public function show(\App\SkpWajib $skpwajib)
    {
        $dataMhs = DataMhsSkpWajib::where([
            ['skp_wajib_nama_kegiatan', '=', $skpwajib->nama_kegiatan],
            ['jenjang_pendidikan','=', $skpwajib->jenjang_pendidikan],
        ])->get();
        return view('SKPProdi.SKPProdi-peserta-kegiatan-showMhs', compact('skpwajib','dataMhs'));
    }
    public function createW(\App\SkpWajib $skpwajib)
    {
        return view('SKPProdi.SKPProdi-peserta-kegiatan-formWajib',compact('skpwajib'));
    }
    public function storeW(Store $request)
    {
        $data = json_decode(request()->get('data'));

        
        foreach ($data as $row) {
            $pengajuanPilihan = new PengajuanSkpPilihan();
            $pengajuanPilihan->nama_mhs = $row[0];
            $pengajuanPilihan->nim = $row[1];
            $pengajuanPilihan->nama_kegiatan = $request->nama_kegiatan;
            $pengajuanPilihan->domain_profil = $request->domain_profil;
            $pengajuanPilihan->aktivitas_kemahasiswaan = $request->aktivitas_kemahasiswaan;
            $pengajuanPilihan->lokasi = $request->lokasi;
            $pengajuanPilihan->penyelenggara = $request->penyelenggara;
            $pengajuanPilihan->prestasi = $request->prestasi;
            $pengajuanPilihan->tanggal_mulai = $request->tanggal_mulai;
            $pengajuanPilihan->tanggal_selesai = $request->tanggal_selesai;
            $pengajuanPilihan->level_kegiatan = $request->level_kegiatan;
            $pengajuanPilihan->deskripsi = $request->deskripsi;
            $pengajuanPilihan->poin = $request->poin;
            $pengajuanPilihan->status = 'Disetujui';
            $pengajuanPilihan->jenjang = $request->jenjang;
            $pengajuanPilihan->komentar = $request->komentar;
            $berkas = $request->file('berkas_kegiatan');
                $temp = [];
                // dd($berkas);
                if(!empty($berkas)):
                    foreach($berkas as $berkass):
                        $temp[] = $berkass->getClientOriginalName();
                        // ($berkass->getClientOriginalName());
                        // Storage::put($berkass->getClientOriginalName(), file_get_contents($berkass)); 
                    $berkass->move('berkas_pengajuan', /*$request->berkas_kegitaan,*/ $berkass->getClientOriginalName()/*.$ekstensiBerkas*/);
                    endforeach;
                endif;    
            $pengajuanPilihan->berkas_kegiatan = $temp;
    
            $pengajuanPilihan->save();
        }

        return redirect()->back()->with('status','Berhasil menyimpan data mahasiswa');
    }

    public function createP()
    {
        $domain = \App\DomainProfilLulusan::all();
        $aktivitas = \App\SkpPilihan::all();
        return view('SKPProdi.SKPProdi-peserta-kegiatan-formPilihan', compact('domain','aktivitas'));
    }

    public function storeP(Request $request)
    {
        $request->validate([
            'nama_kegiatan' => 'required',
            'domain_profil' => 'required',
            'aktivitas_kemahasiswaan' => 'required',
            'lokasi' => 'required',
            'penyelenggara' => 'required',
            'prestasi' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
            'level_kegiatan' => 'required',
            'deskripsi' => 'required',
            'poin' => 'required',
            'jenjang' => 'required',
            
            'berkas_kegiatan' => 'required',
        ],
        [
            'nama_kegiatan.required'  => 'Nama Kegiatan Harus Diisi',
            'domain_profil.required' => 'Domain Profil Harus Diisi',
            'aktivitas_kemahasiswaan.required'  => 'Aktivitas Harus Diisi',
            'lokasi.required'  => 'Lokasi Harus Diisi',
            'penyelenggara.required' => 'Penyelenggara Harus Diisi',
            'prestasi.required' => 'Prestasi Harus Diisi',
            'tanggal_mulai.required' => 'Tanggal Harus Diisi',
            'tanggal_selesai.required' => 'Tanggal Harus Diisi',
            'level_kegiatan.required' => 'Level Harus Diisi',
            'deskripsi.required' => 'Deskripsi Harus Diisi',
            'poin.required' => 'Bobot Harus Diisi',
            'jenjang.required' => 'Jenjang Harus Diisi',
            'komentar.required' => 'Komentar Harus Diisi',
            'berkas_kegiatan.required' => 'Berkas Harus Diisi',
            
        ]);

        $data = json_decode(request()->get('data'));

        
        foreach ($data as $row) {
        $pengajuanPilihan = new PengajuanSkpPilihan();
        $pengajuanPilihan->nama_mhs = $row[0];
        $pengajuanPilihan->nim = $row[1];
        $pengajuanPilihan->nama_kegiatan = $request->nama_kegiatan;
        $pengajuanPilihan->domain_profil = $request->domain_profil;
        $pengajuanPilihan->aktivitas_kemahasiswaan = $request->aktivitas_kemahasiswaan;
        $pengajuanPilihan->lokasi = $request->lokasi;
        $pengajuanPilihan->penyelenggara = $request->penyelenggara;
        $pengajuanPilihan->prestasi = $request->prestasi;
        $pengajuanPilihan->tanggal_mulai = $request->tanggal_mulai;
        $pengajuanPilihan->tanggal_selesai = $request->tanggal_selesai;
        $pengajuanPilihan->level_kegiatan = $request->level_kegiatan;
        $pengajuanPilihan->deskripsi = $request->deskripsi;
        $pengajuanPilihan->poin = $request->poin;
        $pengajuanPilihan->status = 'Disetujui';
        $pengajuanPilihan->jenjang = $request->jenjang;
        $pengajuanPilihan->komentar = $request->komentar;
        $berkas = $request->file('berkas_kegiatan');
            $temp = [];
            // dd($berkas);
            if(!empty($berkas)):
                foreach($berkas as $berkass):
                    $temp[] = $berkass->getClientOriginalName();
                    // ($berkass->getClientOriginalName());
                    // Storage::put($berkass->getClientOriginalName(), file_get_contents($berkass)); 
                $berkass->move('berkas_pengajuan', /*$request->berkas_kegitaan,*/ $berkass->getClientOriginalName()/*.$ekstensiBerkas*/);
                endforeach;
            endif;    
        $pengajuanPilihan->berkas_kegiatan = $temp;

        $pengajuanPilihan->save();
        }
        return redirect()->back()->with('status','Berhasil menyimpan data mahasiswa');
    }
    
}
