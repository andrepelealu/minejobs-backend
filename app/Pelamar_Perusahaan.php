<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelamar_Perusahaan extends Model
{
   protected $table = 'pelamar_perusahaan';
   public $timestamps = false;
   protected $fillable = [

   'id_kandidat',
   'id_iklan',
   'id_perusahaan',
   'tanggal_lamaran'
   ];
}
