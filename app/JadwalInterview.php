<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JadwalInterview extends Model
{
    //
    protected $table = 'jadwal_interview';
    public $timestamps = false;

    protected $fillable = [
    'id_undangan_interview',
    'id_kandidat',
    'id_perusahaan'
    ];
}
