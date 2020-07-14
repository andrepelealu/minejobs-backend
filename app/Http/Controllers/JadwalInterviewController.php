<?php

namespace App\Http\Controllers;
use App\JadwalInterview;

use Illuminate\Http\Request;

class JadwalInterviewController extends Controller
{
    //
    public function OrderByDate($id){
        // $data = JadwalInterview::where('id_perusahaan',$id)->get();
        $data = JadwalInterview::where('id_perusahaan',$id)->orderBy('tanggal_interview', 'ASC')->get();

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
    public function GetJadwalPerusahaan($id){
        $data = JadwalInterview::where('id_perusahaan',$id)->get();
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
    //Route::get('jadwal-perusahaan/{id}',GetJadwalController@GetJadwalPerusahaan);
    

}
