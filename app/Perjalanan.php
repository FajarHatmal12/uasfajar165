<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/*  NAMA : Fajar Agsa Hatmal
    NIM  : 1810530165
*/

class Perjalanan extends Model
{
    public $timestamps = false;
    protected $fillable = ['wisata_id', 'nama_perjalanan', 'tujuan_perjalanan', 'tanggal', 'fasilitas', 'keterangan'];

    public function wisata()
    {
        return $this->belongsTo(Wisata::class, 'wisata_id');
    }
}
