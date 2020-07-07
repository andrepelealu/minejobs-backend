<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfilPerusahaan extends Model
{
    protected $table = 'profile_perusahaan';
    public $timestamps = false;
    protected $fillable = [
    'id_perusahaan',
    'nama_perusahaan',
    'alamat_perusahaan',
    'tentang_perusahaan',
    'url_banner',
    'foto_perusahaan',
    'website_perusahaan',
    'jenis_industri'];
//
}
