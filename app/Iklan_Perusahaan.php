<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Iklan_Perusahaan extends Model
{
    protected $table = 'iklan_perusahaan';
    public $timestamps = false;
    protected $fillable = [

                'id_perusahaan',
                'posisi_pekerjaan',
                'gaji_min',
                'gaji_max',
                'provinsi',
                'kota',
                'bidang_pekerjaan',
                'tingkat_pendidikan',
                'pengalaman_kerja',
                'persyaratan',
                'benefit_perusahaan',
                'url_header'
    ];
}
