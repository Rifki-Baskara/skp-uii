<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MahasiswaSkpwajib extends Model
{
    protected $table = 'mahasiswa_skpwajib';
    protected $fillable = ['mahasiswa_username','skpwajib_id'];

}
