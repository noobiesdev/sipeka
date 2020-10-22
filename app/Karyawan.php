<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Karyawan extends Model
{
    use SoftDeletes;

    protected $table = 'karyawan';
    protected $fillable = ['username', 'nama_lengkap', 'email', 'user_id'];
}
