<?php

namespace App\Http\Controllers;

use App\ProfilPerusahaan;
use Illuminate\Http\Request;

class ProfilPerusahaanController extends Controller
{
    public function PostProfilPerusahaan(Request $id)
    {

        $validator = Validator::make($req->all(), 
        [
        'id_perusahaan' => 'required|unique:profile_perusahaan',
        'nama_perusahaan' => 'required|string',
        'alamat_perusahaan' =>'required|string',
        'tentang_perusahaan' =>'required|string',
        'url_banner'=>'required|string',
        'foto_perusahaan'=>'required|string',
        'website_perusahaan'=>'required|string',
        'jenis_industri'=>'required|string',

        ]
    );
    if($validator->fails()){
        return response()->json($validator->errors()->toJson(), 400);
        }
            $input = new ProfilPerusahaan;
            $input->id_perusahaan = $req->id_perusahaan;
            $input->nama_perusahaan = $req->nama_perusahaan;
            $input->alamat_perusahaan = $req->alamat_perusahaan;
            $input->tentang_perusahaan = $req->tentang_perusahaan;
            $input->url_banner = $req->url_banner;
            $input->foto_perusahaan = $req->foto_perusahaan;
            $input->website_perusahaan = $req->website_perusahaan;
            $input->jenis_industri = $req->jenis_industri;
            $input->save();

        $res['message'] = 'berhasil post';
        $res['data'] = $input;
        return response()->json($res, 200);
    }

    public function GetProfilPerusahaan($id)
    {
        $data = ProfilPerusahaan::where('id_perusahaan',$id)->get();
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
    public function UpdateProfilPerusahaan($id)
    {
        $data = ProfilPerusahaanModel::find($id,'id_perusahaan')->first();
        // $data->id_kandidat = $req->id_kandidat;
        $data->id_perusahaan      = $req->id_perusahaan;
        $data->nama_perusahaan    = $req->nama_perusahaan;
        $data->alamat_perusahaan  = $req->alamat_perusahaan;
        $data->tentang_perusahaan = $req->tentang_perusahaan;
        $data->url_banner         = $req->url_banner;
        $data->foto_perusahaan    = $req->foto_perusahaan;
        $data->website_perusahaan = $req->website_perusahaan;
        $data->jenis_industri     = $req->jenis_industri;
    if(count($data)>0){
            if($data->save()){
                $res['message'] = 'Berhasil Update';
                $res['data'] = $data;
                return $res;
            }else{
                $res['message'] = 'Gagal Update';
                $res['data'] = $data;
                return $res;
            }
        }else{
            $res['count'] = count($data);
            $res['message'] = 'data tidak ditemukan';
            return $res;
        }
    }
    public function DeleteProfilPerusahaan($id)
    {
        # code...
    }
}
