<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DPPAI extends Model
{
    protected $table = 'dppai';
    protected $fillable = ['nama','username','email','password'];

}
