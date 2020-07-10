<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UndanganInterview extends Model
{
    //
    protected $table = 'undangan_interview';
    public $timestamps = false;
    protected $fillable = [
    'id_kandidat',
    'id_perusahaan',
    'id_iklan',
    'pesan',
    'tanggal_interview',
    'waktu_mulai',
    'waktu_selesai',
    'metode_interview',
    'status'];
}
