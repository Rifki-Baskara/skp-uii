<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\DomainProfilLulusan;

class SKPSuperAdminMasterDomainController extends Controller
{
    public function index()
    {
        $domain = DomainProfilLulusan::all();
        return view('SKPSuperAdmin.SKPSuperAdmin-masterDomain',compact('domain'));
    }

    public function create()
    {
        return view('SKPSuperAdmin.SKPSuperAdmin-masterDomain-form');
    }

    public function store(Request $request) 
    {
        $request->validate([
            'nama' => 'required',
        ],
        [
            'nama.required' => 'Domain Profil Lulusan Harus Diisi'
        ]);

        $domain = new DomainProfilLulusan;
        $domain->nama = $request->nama;

        $domain->save();
        return redirect('/superadmin/masterD/create')->with('status','Domain Profil Lulusan Berhasil Ditambahkan !');
    }

    public function edit($id)
    {
        $domain = DomainProfilLulusan::find($id);
        return view('SKPSuperAdmin.SKPSuperAdmin-masterDomain-edit',compact('domain'));
    }

    public function update(Request $request, $id)
    {
        $domain = DomainProfilLulusan::find($id);
        
        $request->validate([
            'nama' => 'required'
        ],
        [
            'nama.required' => 'Domain Profil Lulusan Harus Diisi'
        ]);
        $domain->update ([
            'nama' =>$request->nama,
        ]);
        return redirect('/superadmin/masterD')->with('status','Domain Profil Lulusan Berhasil Diubah !');
    }

    public function delete($id)
    {
        $domain = DomainProfilLulusan::find($id);
        $domain->delete($domain);
        return redirect('/superadmin/masterD')->with('status','Data Berhasil DiHapus !');
    }
}
