<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JadwalInterview extends Model
{
    //
    protected $table = 'undangan_interview';
    public $timestamps = false;

    protected $fillable = [
    'id_kandidat',
    'nama_depan',
    'nama_belakang',
    'nomor_telepon',
    'provinsi',
    'kota',
    'tentang',
    'foto_profile'];
}
