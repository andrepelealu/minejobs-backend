<?php

namespace App\Http\Controllers;
use App\UndanganInterview;

use Illuminate\Http\Request;

class JadwalInterviewController extends Controller
{
    //
    // public function ConfirmLamaran(Type $var = null)
    // {
    //     $validator = Validator::make($req->all(), [
    //         'id_undangan_interview' =>  'required',
    //         'id_kandidat'           =>  'required|string',
    //         'id_perusahaan'         =>  'required|string',
    //     ]
    // );
    // if($validator->fails()){
    //     return response()->json($validator->errors()->toJson(), 400);
    // }
    // $input = new JadwalInterview;
    // $input->id_undangan_interview     = $req->id_undangan_interview;
    // $input->id_kandidat               = $req->id_kandidat;
    // $input->id_perusahaan             = $req->id_perusahaan;

    // $input->save();

    // $res['message'] = 'berhasil post';
    // $res['data'] = $input;
    // return response()->json($res, 200);
    // }

    public function OrderByDate($id){
        // $data = JadwalInterview::where('id_perusahaan',$id)->get();
        // $data = JadwalInterview::where('id_perusahaan',$id)->orderBy('tanggal_interview', 'ASC')->get();
        $data = DB::table('undangan_interview')->where('id_perusahaan', $id)
                    ->orderBy('tanggal_interview', 'ASC')
                    ->get();


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
        $data = UndanganInterview::where('id_kandidat',$id)
                ->where('status','diterima')
                ->get();
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
        $data = UndanganInterview::where('id_perusahaan',$id)
        ->where('status','diterima')
        ->get();
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
