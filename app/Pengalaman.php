<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengalaman extends Model
{
    //
    protected $table = 'pengalaman';
    public $timestamps = false;
    //data yang bisa di isi
    protected $fillable = [
        'id_kandidat',
        'posisi_pekerjaan',
        'nama_perusahaan',
        'tahun_mulai',
        'tahun_selesai',
        'jabatan',
        'gaji',
        'deskripsi_pekerjaan'   
    ];
}
