<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LamaranTersimpan extends Model
{
    //
    protected $table = 'lamaran_tersimpan';
    public $timestamps = false;
    //data yang bisa di isi
    protected $fillable = [
        'id_kandidat',
        'id_iklan',
        'id_kandidat'
    ];
}
