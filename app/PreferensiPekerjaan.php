<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PreferensiPekerjaan extends Model
{
    //
    protected $table = 'preferensi_pekerjaan';
    public $timestamps = false;
    //data yang bisa di isi
    protected $fillable = [
        'id_kandidat',
        'gaji_diharapkan',
        'provinsi',
        'kota',
        'bidang_pekerjaan' 
    ];
}
