<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        return response('WELCOME TO MINEJOBS API', 200);
    }
}