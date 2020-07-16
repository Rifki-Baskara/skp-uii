<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswa';
    protected $fillable = ['nama','username','email','password','jenjang_pendidikan','fakultas','jurusan'];

    public function skpwajib()
    {
    	return $this->belongsToMany(SkpWajib::class);
    }

    public function dpa(){
    	return $this->belongsTo('App\Dpa');
    }
}
