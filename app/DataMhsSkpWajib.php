<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataMhsSkpWajib extends Model
{
    protected $table = 'mahasiswaskpwajib';

    protected $fillable = ['mahasiswa_nama','mahasiswa_username','aktivitas_kemahasiswaan','jenjang_pendidikan','skp_wajib_nama_kegiatan', 'poin_skp'];


}
