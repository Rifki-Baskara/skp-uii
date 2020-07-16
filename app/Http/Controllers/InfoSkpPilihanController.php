<?php

namespace App\Http\Controllers;
use App\SkpPilihan;
use App\SkpWajib;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InfoSkpPilihanController extends Controller
{
    public function infoskp()
    {
        //dd('blablabla');
        if (Auth::guard('mahasiswa')->user()->jenjang_pendidikan == 'Sarjana'){
        
            $info = SkpPilihan::Latest()->where ('jenjang_pendidikan', 'like', '%Sarjana%') ->get();
            $infowajib = SkpWajib::Latest()->where ('jenjang_pendidikan', '=', 'Sarjana') ->get();
            return view('mahasiswa.info-skp-sarjana',compact('info','infowajib'));

        }else if(Auth::guard('mahasiswa')->user()->jenjang_pendidikan == 'Diploma') {

            $info = SkpPilihan::Latest()->where ('jenjang_pendidikan', 'like', '%Diploma%') ->get();
            $infowajib = SkpWajib::Latest()->where ('jenjang_pendidikan', '=', 'Diploma') ->get();
            return view('mahasiswa.info-skp-diploma',compact('info','infowajib'));

        }else if(Auth::guard('mahasiswa')->user()->jenjang_pendidikan == 'Magister'){

            $info = SkpPilihan::Latest()->where ('jenjang_pendidikan', 'like', '%Magister%') ->get();
            $infowajib = SkpWajib::Latest()->where ('jenjang_pendidikan', '=', 'Magister') ->get();
            return view('mahasiswa.info-skp-magister',compact('info','infowajib'));

        }else if(Auth::guard('mahasiswa')->user()->jenjang_pendidikan == 'Doktor'){

            $info = SkpPilihan::Latest()->where ('jenjang_pendidikan', 'like', '%Doktor%') ->get();
            $infowajib = SkpWajib::Latest()->where ('jenjang_pendidikan', '=', 'Doktor') ->get();
            return view('mahasiswa.info-skp-doktor',compact('info','infowajib'));

        }else if(Auth::guard('mahasiswa')->user()->jenjang_pendidikan == 'Profesi'){

            $info = SkpPilihan::Latest()->where ('jenjang_pendidikan', 'like', '%Profesi%') ->get();
            $infowajib = SkpWajib::Latest()->where ('jenjang_pendidikan', '=', 'Profesi') ->get();
            return view('mahasiswa.info-skp-profesi',compact('info','infowajib'));
        }
    }
}    