<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\SkpPilihan;
use App\SkpWajib;

class SKPSuperAdminMasterAktivitasController extends Controller
{
    public function index()
    {
        $skpWajib = SkpWajib::all();
        $skpPilihan = SkpPilihan::all();
        return view('SKPSuperAdmin.SKPSuperAdmin-masterAktivitas',compact('skpPilihan','skpWajib'));
    }

    public function createW()
    {
        return view('SKPSuperAdmin.SKPSuperAdmin-masterAktivitas-formWajib');
    }

    public function storeW(Request $request)
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

        return redirect('/superadmin/masterA')->with('status','SKP Wajib Berhasil Ditambahkan !');
    }

    public function editW($id)
    {
        $skpwajib = SkpWajib::find($id);
        $finds = SkpWajib::whereId($id)->first();
        $penyelenggara = explode(",", $finds->penyelenggara);
        return view('SKPSuperAdmin.SKPSuperAdmin-masterAktivitas-editWajib',compact('skpwajib','penyelenggara'));
    }

    public function updateW(Request $request, $id)
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
        return redirect('/superadmin/masterA')->with('status','SKP Wajib Berhasil Diubah !');
    }

    public function deleteW($id)
    {
        $skpwajib = SkpWajib::find($id);
        $skpwajib->delete($skpwajib);
        return redirect('/superadmin/masterA')->with('status','SKP Wajib Berhasil DiHapus !');
    }

    public function createP()
    {
        $domain = \App\DomainProfilLulusan::all();
        return view('SKPSuperAdmin.SKPSuperAdmin-masterAktivitas-formPilihan',compact('domain'));
    }

    public function storeP(Request $request) 
    {
        $request->validate([
            'domain_profil_lulusan_nama' => 'required',
            'aktivitas_kemahasiswaan' => 'required',
            'bukti_kegiatan' => 'required',
            'poin_skp' => 'required',
            'jenjang_pendidikan' => 'required'
        ],
        [
            'domain_profil_lulusan_nama.required' => 'Domain Profil Lulusan Harus Diisi',
            'aktivitas_kemahasiswaan.required' => 'Aktivitas Kemahasiswaan Harus Diisi',
            'bukti_kegiatan.required' => 'Bukti Kegiatan Harus Diisi',
            'poin_skp.required' => 'Poin SKP Harus Diisi',
            'jenjang_pendidikan.required' => 'Jenjang Pendidikan Harus Diisi'
        ]);

        $skpPilihan = new SkpPilihan;
            $skpPilihan->domain_profil_lulusan_nama = $request->domain_profil_lulusan_nama;
            $skpPilihan->aktivitas_kemahasiswaan = $request->aktivitas_kemahasiswaan;
            $skpPilihan->bukti_kegiatan = $request->bukti_kegiatan;
            $skpPilihan->poin_skp = $request->poin_skp;
            $skpPilihan->jenjang_pendidikan = implode(",",$request->jenjang_pendidikan);
            $skpPilihan->save();
        return redirect('/superadmin/masterA/createP')->with('status','SKP Pilihan Berhasil Ditambahkan !');
    }
    public function editP($id)
    {
        $domains = \App\DomainProfilLulusan::all();
        $domain = SkpPilihan::find($id);
        $finds = SkpPilihan::whereId($id)->first();
        $jenjang_pendidikan = explode(",", $finds->jenjang_pendidikan);

        return view('SKPSuperAdmin.SKPSuperAdmin-masterAktivitas-editPilihan',compact('domain','jenjang_pendidikan','domains'));
    }

    public function updateP(Request $request, $id)
    {
        $domain = SkpPilihan::find($id);
        
        $request->validate([
            'domain_profil_lulusan_nama' => 'required',
            'aktivitas_kemahasiswaan' => 'required',
            'bukti_kegiatan' => 'required',
            'poin_skp' => 'required',
            'jenjang_pendidikan' => 'required'
        ],
        [
            'domain_profil_lulusan_nama.required' => 'Domain Profil Lulusan Harus Diisi',
            'aktivitas_kemahasiswaan.required' => 'Aktivitas Kemahasiswaan Harus Diisi',
            'bukti_kegiatan.required' => 'Bukti Kegiatan Harus Diisi',
            'poin_skp.required' => 'Poin SKP Harus Diisi',
            'jenjang_pendidikan.required' => 'Jenjang Pendidikan Harus Diisi'
        ]);
        $domain->update ([
            'domain_profil_lulusan_nama' =>$request->nama,
            'domain_profil_lulusan_nama' => $request->domain_profil_lulusan_nama,
            'aktivitas_kemahasiswaan' => $request->aktivitas_kemahasiswaan,
            'bukti_kegiatan' => $request->bukti_kegiatan,
            'poin_skp' => $request->poin_skp,
            'jenjang_pendidikan' => implode(",",$request->jenjang_pendidikan)
        ]);
        return redirect('/superadmin/masterA')->with('status','SKP Pilihan Berhasil Diubah !');
    }

    public function deleteP($id)
    {
        $domain = SkpPilihan::find($id);
        $domain->delete($domain);
        return redirect('/superadmin/masterA')->with('status','Data SKP Pilihan Berhasil DiHapus !');
    }
}
