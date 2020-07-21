<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AddAdmin extends Model
{
    protected $table = 'user_admin_verification';
    public $timestamps = false;
    //data yang bisa di isi
    protected $fillable = [            
    'email',
    'token'
];
}
