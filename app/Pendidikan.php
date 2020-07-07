<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
    //
    protected $table = 'pendidikan';
    public $timestamps = false;
    //data yang bisa di isi
    protected $fillable = [
        'id_kandidat',
        'jurusan',
        'tahun_mulai',
        'tahun_selesai',
        'nama_instansi' 
];
}
