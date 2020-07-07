<?php

namespace App\Http\Controllers;
use App\JadwalInterview;

use Illuminate\Http\Request;

class JadwalInterviewController extends Controller
{
    //
    public function GetJadwalInterview($id){
        $data = JadwalInterview::where('id_kandidat',$id)->get();
        if(count($data)>0){
            $res['count'] = count($data);
            $res['message'] = 'data ditemukan';
            $res['data'] = $data;
            return $res;
        }else{
            $res['count'] = count($data);
            $res['message'] = 'data tidak ditemukan';
            return $res;
        }

    }
}
