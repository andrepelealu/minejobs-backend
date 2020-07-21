<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KandidatVerification extends Model
{
    protected $table = 'user_kandidat_verification';
    public $timestamps = false;
    //data yang bisa di isi
    protected $fillable = [            
    'email',
    'token'
];
}
