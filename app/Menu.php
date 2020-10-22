<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{

  protected $table = 'menu';
  protected $fillable = ['nama_menu', 'harga', 'foto', 'tipe', 'ketersediaan', 'deskripsi'];
}
