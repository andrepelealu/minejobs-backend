<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PicPerusahaan;
use Illuminate\Support\Facades\Validator;

class PicPerusahaanController extends Controller
{
    public function PostProfilPic(Request $req)
    {

        $validator = Validator::make($req->all(), 
        [
        'id_perusahaan' => 'required',
        'nama_pic' => 'required|string',
        'no_telp_pic' =>'required|string',
        'url_ktp_pic' =>'required|string',
        ]
    );
    if($validator->fails()){
        return response()->json($validator->errors()->toJson(), 400);
        }
            $data                  = new PicPerusahaan;
            $data->id_perusahaan   = $req->id_perusahaan;
            $data->nama_pic        = $req->nama_pic;
            $data->no_telp_pic     = $req->no_telp_pic;
            $data->url_ktp_pic     = $req->url_ktp_pic;
            $data->url_foto_profile = $req->url_foto_profile;


            $data->save();

        $res['message'] = 'berhasil post';
        $res['data'] = $data;
        return response()->json($res, 200);
    }
    public function UpdatePicPerusahaan(Request $req,$id)
    {
        $data = PicPerusahaan::find($req,'id_perusahaan')->first();
        // $data->id_kandidat = $req->id_kandidat;
        $data->id_perusahaan   = $req->id_perusahaan;
        $data->nama_pic        = $req->nama_pic;
        $data->no_telp_pic     = $req->no_telp_pic;
        $data->url_ktp_pic     = $req->url_ktp_pic;
        $data->url_foto_profile = $req->url_foto_profile;

        // if(count($data)>0){
            if($data->save()){
                $res['message'] = 'Berhasil Update';
                $res['data'] = $data;
                return $res;
            }else{
                $res['message'] = 'Gagal Update';
                $res['data'] = $data;
                return $res;
            }
        // }else{
        //     $res['count'] = count($data);
        //     $res['message'] = 'data tidak ditemukan';
        //     return $res;
        // }
    }
    public function GetPicPerusahaan($id)
    {
        $data = PicPerusahaan::where('id_perusahaan',$id)->get();
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
