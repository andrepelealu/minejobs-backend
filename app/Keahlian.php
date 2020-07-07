<?php

namespace App;
use App\Keahlian;

use Illuminate\Database\Eloquent\Model;

class Keahlian extends Model
{
    protected $table = 'keahlian';
    public $timestamps = false;
    //data yang bisa di isi
    protected $fillable = [
        'id_kandidat',
        'nama_keahlian',
        'tingkatan'
    ];
}
