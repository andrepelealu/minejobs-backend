<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\DataPribadi;
use App\PreferensiPekerjaan;

use Illuminate\Support\Facades\Validator;

class ControllerPostCandidate extends Controller
{
    public function sortBy(request $req){
        $column = $req->column;
        $value = $req->value;

        $users = DataPribadi::where($column, $value)->get();
        if(count($users) == 0){
            $res['data_count'] = count($users);
            $res['messages'] = 'Data Tidak Ditemukan';
            $res['status'] = 200;
            return response()->json($res);

        }else{
            $res['data_count'] = count($users);
            $res['messages'] = 'Data Ditemukan';
            $res['status'] = 200;
            $res['data'] = $users;
            return response()->json($res);
        }
        
    }
    public function dataPribadi(request $req, $idUser) {

        $validator = Validator::make($req->all(), [
            'nama_depan' => 'required|string|max:255|',
            'nama_belakang' => 'required|string|max:255|',
            'id_user' => 'required|unique:data_pribadis,id_user,$idUser',
            'nomor_telepon' =>'required|string|max:20|',
            'provinsi'=>'required',
            'kota'=>'required',
        ]
    );

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        $input                = new DataPribadi;
        $input->id_user       = $idUser;
        $input->nama_depan    = $req->nama_depan;
        $input->nama_belakang = $req->nama_belakang;
        $input->nomor_telepon = $req->nomor_telepon;
        $input->provinsi      = $req->provinsi;
        $input->kota          = $req->kota;
        $input->url_foto      = $req->url_foto;
        //save into DB
        $input->save();

        $res['message'] = 'berhasil post';
        $res['data'] = $input;
        return response()->json($res, 200);
    }
    public function preferensiPekerjaan(request $req, $idUser) {

        $validator = Validator::make($req->all(), [
            'gaji_diharapkan' => 'required|integer|',
            'provinsi' => 'required|string|max:100|',
            'kota' => 'required|string|max:50|',
            'id_user' => 'required|unique:preferensi_pekerjaans,id_user,$idUser',
            'bidang_pekerjaan' =>'required|string|max:20|'
     
        ]
    );

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        $input                  = new PreferensiPekerjaan;
        $input->id_user         = $idUser;
        $input->gaji_diharapkan = $req->gaji_diharapkan;
        $input->provinsi        = $req->provinsi;
        $input->kota            = $req->kota;
        $input->bidang_pekerjaan= $req->bidang_pekerjaan;
       
        //save into DB
        $input->save();

        $res['message'] = 'berhasil post';
        $res['data'] = $input;
        return response()->json($res, 200);
    }


}