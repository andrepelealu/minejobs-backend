<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PerusahaanVerification extends Model
{
    protected $table = 'user_perusahaan_verification';
    public $timestamps = false;
    //data yang bisa di isi
    protected $fillable = [            
    'email',
    'token'
];
}
