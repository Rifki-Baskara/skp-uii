<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\SkpWajib;

class SKPNonProdiMasterController extends Controller
{
    public function index()
    {
        $skpWajib = SkpWajib::all();
        return view('SKPNonProdi.SKPNonProdi-master-aktivitas',compact('skpWajib'));
    }
    public function create()
    {
        return view('SKPNonProdi.SKPNonProdi-master-aktivitas-form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_aktivitas' => 'required',
            'nama_kegiatan' => 'required',
            'bahan_kajian' => 'required',
            'jenjang_pendidikan' => 'required',
            'poin_skp' => 'required',
            'penyelenggara' => 'required'
        ],
        [
            'nama_aktivitas.required' => 'Nama Aktivitas Harus Diisi',
            'nama_kegiatan.required'  => 'Nama Kegiatan Harus Diisi',
            'bahan_kajian.required' => 'Bahan Jaian Harus Diisi',
            'jenjang_pendidikan.required'  => 'Jenjang Pendidikan Harus Diisi',
            'poin_skp.required'  => 'Poin SKP Harus Diisi',
            'penyelenggara.required' => 'Penyelenggara Harus Diisi'
        ]);

        $skpwajib = new SkpWajib;
        $skpwajib->nama_aktivitas = $request->nama_aktivitas;
        $skpwajib->nama_kegiatan = $request->nama_kegiatan;
        $skpwajib->bahan_kajian = $request->bahan_kajian;
        $skpwajib->jenjang_pendidikan = $request->jenjang_pendidikan;
        $skpwajib->poin_skp = $request->poin_skp;
        //$skpwajib->penyelenggara = $request->penyelenggara;
        $skpwajib->penyelenggara = implode(",",$request->penyelenggara);

        $skpwajib->save();

        return redirect('/nonprodi/master')->with('status','SKP Wajib Berhasil Ditambahkan !');
    }
    public function edit($id)
    {
        $skpwajib = SkpWajib::find($id);
        $finds = SkpWajib::whereId($id)->first();
        $penyelenggara = explode(",", $finds->penyelenggara);
        return view('SKPNonProdi.SKPNonProdi-master-aktivitas-edit',compact('skpwajib','penyelenggara'));
    }
    public function update(Request $request, $id)
    {
        $skpwajib = SkpWajib::find($id);
        
        $request->validate([
            'nama_aktivitas' => 'required',
            'nama_kegiatan' => 'required',
            'bahan_kajian' => 'required',
            'jenjang_pendidikan' => 'required',
            'poin_skp' => 'required',
            'penyelenggara' => 'required'
        ],
        [
            'nama_aktivitas.required' => 'Nama Aktivitas Harus Diisi',
            'nama_kegiatan.required'  => 'Nama Kegiatan Harus Diisi',
            'bahan_kajian.required' => 'Bahan Jaian Harus Diisi',
            'jenjang_pendidikan.required'  => 'Jenjang Pendidikan Harus Diisi',
            'poin_skp.required'  => 'Poin SKP Harus Diisi',
            'penyelenggara.required' => 'Penyelenggara Harus Diisi'
        ]);
        $skpwajib->update ([
            'nama_aktivitas' =>$request->nama_aktivitas,
            'nama_kegiatan' =>$request->nama_kegiatan,
            'bahan_kajian' =>$request->bahan_kajian,
            'jenjang_pendidikan' =>$request->jenjang_pendidikan,
            'poin_skp' =>$request->poin_skp,
            //'penyelenggara' =>$request->penyelenggara
            'penyelenggara' => implode(",",$request->penyelenggara)
        ]);
        return redirect('/nonprodi/master')->with('status','SKP Wajib Berhasil Diubah !');
    }

    public function delete($id)
    {
        $skpwajib = SkpWajib::find($id);
        $skpwajib->delete($skpwajib);
        return redirect('/nonprodi/master')->with('status','SKP Wajib Berhasil DiHapus !');
    }
}
