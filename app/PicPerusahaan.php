<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PicPerusahaan extends Model
{
    //
    protected $table = 'pic_perusahaan';
    public $timestamps = false;
    //data yang bisa di isi
    protected $fillable = [
        'id_perusahaan',
        'nama_pic',
        'no_telp_pic',
        'url_ktp_pic'   
    ];
}
