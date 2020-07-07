<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UploadCv extends Model
{
    //
    protected $table = 'upload_cv';
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
