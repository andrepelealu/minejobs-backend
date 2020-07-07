<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bahasa extends Model
{
    //
    protected $table = 'bahasa';
    public $timestamps = false;
    //data yang bisa di isi
    protected $fillable = [            
    'id_kandidat',
    'bahasa_dikuasai',
    'kemampuan_verbal',
    'kemampuan_tulisan'
];
}
