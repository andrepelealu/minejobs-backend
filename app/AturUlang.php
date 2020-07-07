<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AturUlang extends Model
{
    //
    protected $table = 'atur_ulang_interview';
    public $timestamps = false;
    //data yang bisa di isi
    protected $fillable = [
    'id_undangan_interview',
    'id_kandidat',
    'id_perusahaan'
];
}
