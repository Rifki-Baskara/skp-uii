<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SkpWajib extends Model
{
    //
    protected $table = 'skpwajib';
    protected $fillable = ['nama_aktivitas','nama_kegiatan','bahan_kajian','jenjang_pendidikan', 'poin_skp','penyelenggara'];

    public function mahasiswa()
    {
    	return $this->belongsToMany(Mahasiswa::class);
    }

}
