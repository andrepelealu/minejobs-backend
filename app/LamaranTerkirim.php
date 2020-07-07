<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LamaranTerkirim extends Model
{
    //
    protected $table = 'lamaran_terkirim';
    public $timestamps = false;
    //data yang bisa di isi
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
