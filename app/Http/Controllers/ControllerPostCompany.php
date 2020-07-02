<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\DataPerusahaan;
use App\halamanVerifikasi;
use App\ProfilPerusahaan;

use Illuminate\Support\Facades\Validator;


class ControllerPostCompany extends Controller
{

    public function halamanVerifikasi(request $req, $idUser) {

        $validator = Validator::make($req->all(), [
            'id_user'                => 'required|unique:data_pribadis,id_user,$idUser',
            'nama_perusahaan'        => 'required|string|max:255|',
            'alamat_perusahaan'      => 'required|string|max:255|',
            'nomor_telepon_kantor'   => 'required|string|max:20|',
            'jenis_industri'         => 'required',
            'nama_pic'               => 'required',
            'jabatan_pic'            => 'required',
            'nomor_telepon_pic'      => 'required',
            'website_perusahaan'     => 'required',
            'upload_npwp_perusahaan' => 'required',
            'upload_ktp_pic'         => 'required',
        ]
    );

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        $input                          = new halamanVerifikasi;
        $input->id_user                 = $idUser;
        $input->nama_perusahaan         = $req->nama_perusahaan;
        $input->alamat_perusahaan       = $req->alamat_perusahaan;
        $input->nomor_telepon_kantor    = $req->nomor_telepon_kantor;
        $input->jenis_industri          = $req->jenis_industri;
        $input->nama_pic                = $req->nama_pic;
        $input->jabatan_pic             = $req->jabatan_pic;
        $input->nomor_telepon_pic       = $req->nomor_telepon_pic;
        $input->website_perusahaan      = $req->website_perusahaan;
        $input->upload_npwp_perusahaan  = $req->upload_npwp_perusahaan;
        $input->upload_ktp_pic          = $req->upload_ktp_pic;

        //save into DB
        $input->save();

        $res['message'] = 'berhasil post';
        $res['data'] = $input;
        return response()->json($res, 200);
    }
    public function ProfilPerusahaan(request $req, $idUser) {

        $validator = Validator::make($req->all(), [
            'id_user'                => 'required|unique:data_pribadis,id_user,$idUser',
            'tentang_perusahaan'        => 'required|string|max:255|',
            'foto_perusahaan'      => 'required|string|max:255|',
            'banner_perusahaan'      => 'required|string|max:255|',
        ]
    );

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        $input                      = new ProfilPerusahaan;
        $input->id_user             = $idUser;
        $input->tentang_perusahaan  = $req->tentang_perusahaan;
        $input->foto_perusahaan     = $req->foto_perusahaan;
        $input->banner_perusahaan   = $req->banner_perusahaan;

        //save into DB
        $input->save();

        $res['message'] = 'berhasil post';
        $res['data'] = $input;
        return response()->json($res, 200);
    }

}
