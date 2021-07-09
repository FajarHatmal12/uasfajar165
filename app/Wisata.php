<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/*  NAMA : Fajar Agsa Hatmal
    NIM  : 1810530165
*/

class Wisata extends Model
{
    public $timestamps = false;
    protected $fillable = ['nama', 'alamat', 'umur', 'telp'];
}
