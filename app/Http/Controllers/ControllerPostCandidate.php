<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\DataPribadi;
use App\PreferensiPekerjaan;
use App\Pengalaman;
use App\Pendidikan;
use App\Keahlian;
use App\Bahasa;
use App\Resume;


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
    public function Pengalaman(request $req, $idUser) {

        $validator = Validator::make($req->all(), [
            'posisi' => 'required|string|max:255',
            'nama_perusahaan' => 'required|string|max:255',
            'id_user' => 'required|unique:data_pribadis,id_user,$idUser',
            'tahun_mulai' =>'required|date',
            'tahun_selesai' =>'required|date',
            'jabatan'=>'required',
            'gaji'=>'required',
            'deskripsi_pekerjaan'=>'required|string'
        ]
    );

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        $input                      = new Pengalaman;
        $input->id_user             = $idUser;
        $input->posisi              = $req->posisi;
        $input->nama_perusahaan     = $req->nama_perusahaan;
        $input->tahun_mulai         = $req->tahun_mulai;
        $input->tahun_selesai       = $req->tahun_selesai;
        $input->jabatan             = $req->jabatan;
        $input->gaji                = $req->gaji;
        $input->deskripsi_pekerjaan = $req->deskripsi_pekerjaan;
        
        //save into DB
        $input->save();

        $res['message'] = 'berhasil post';
        $res['data'] = $input;
        return response()->json($res, 200);
    }

    public function Pendidikan(request $req, $idUser) {

        $validator = Validator::make($req->all(), [
            'jenjang_pendidikan' => 'required|string|max:255',
            'jurusan' => 'required|string|max:255',
            'id_user' => 'required|unique:data_pribadis,id_user,$idUser',
            'tahun_mulai' =>'required|date',
            'tahun_selesai' =>'required|date',
            'nama_instansi'=>'required',
            
        ]
    );

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        $input                      = new Pendidikan;
        $input->id_user             = $idUser;
        $input->jenjang_pendidikan  = $req->jenjang_pendidikan;
        $input->jurusan             = $req->jurusan;
        $input->tahun_mulai         = $req->tahun_mulai;
        $input->tahun_selesai       = $req->tahun_selesai;
        $input->nama_instansi       = $req->nama_instansi;
        
        //save into DB
        $input->save();

        $res['message'] = 'berhasil post';
        $res['data'] = $input;
        return response()->json($res, 200);
    }
    public function Keahlian(request $req, $idUser) {

        $validator = Validator::make($req->all(), [
            'nama_keahlian' => 'required|string|',
            'tingkatan' => 'required|string|max:100|',
            
     
        ]
    );

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        $input                  = new Keahlian;
        $input->id_user         = $idUser;
        $input->nama_keahlian   = $req->nama_keahlian;
        $input->tingkatan       = $req->tingkatan;
        
       
        //save into DB
        $input->save();

        $res['message'] = 'berhasil post';
        $res['data'] = $input;
        return response()->json($res, 200);
    }
    public function Bahasa(request $req, $idUser) {

        $validator = Validator::make($req->all(), [
            'jenis_bahasa' => 'required|string|',
            'kemampuan_verbal' => 'required|string|max:100|',
            'kemampuan_tulisan' => 'required|string|'
     
        ]
    );

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        $input                      = new Bahasa;
        $input->id_user             = $idUser;
        $input->jenis_bahasa        = $req->jenis_bahasa;
        $input->kemampuan_verbal    = $req->kemampuan_verbal;
        $input->kemampuan_tulisan   = $req->kemampuan_tulisan;
       
        //save into DB
        $input->save();

        $res['message'] = 'berhasil post';
        $res['data'] = $input;
        return response()->json($res, 200);
    }
    public function Resume(request $req, $idUser) {

        $validator = Validator::make($req->all(), [
            'upload_resume' => 'required|string|',
     
        ]
    );

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        $input                      = new Resume;
        $input->id_user             = $idUser;
        $input->upload_resume       = $req->upload_resume;
       
        //save into DB
        $input->save();

        $res['message'] = 'berhasil post';
        $res['data'] = $input;
        return response()->json($res, 200);
    }


}