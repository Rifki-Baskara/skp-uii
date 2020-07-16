<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuperAdmin extends Model
{
    protected $table = 'superadmin';
    protected $fillable = ['nama','username','email','password'];

}
