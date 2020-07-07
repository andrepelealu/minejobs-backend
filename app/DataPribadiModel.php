<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataPribadiModel extends Model
{
    //
    // protected $table = 'my_table_name';
    protected $table = 'data_pribadi';
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
    
    // protected $primaryKey = 'id_data_pribadi';

    
}
