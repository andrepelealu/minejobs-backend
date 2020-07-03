<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Pengalaman;
class PengalamanControllers extends Controller
{
    //
    public function postPengalaman(req $req){
        $validator = Validator::make($req->all(), [
            'id_kandidat' => 'required|unique:pengalaman',
            'posisi_pekerjaan' => 'required|string',
            'nama_perusahaan' =>'required|string',
            'tahun_mulai' =>'required|string',
            'tahun_selesai'=>'required|string',
            'jabatan'=>'required|string',
            'gaji'=>'required|string',
            'deskripsi_pekerjaan=>required|string'
        ]
    );
    if($validator->fails()){
        return response()->json($validator->errors()->toJson(), 400);
    }
    $input = new Pengalaman;
    $input->id_kandidat = $req->id_kandidat;
    $input->posisi_pekerjaan = $req->id_kandidat;
    $input->nama_perusahaan = $req->nama_perusahaan;
    $input->tahun_mulai = $req->tahun_mulai;
    $input->tahun_selesai = $req->tahun_selesai;
    $input->jabatan = $req->jabatan;
    $input->gaji = $req->gaji;
    $input->deskripsi_pekerjaan = $req->deskripsi_pekerjaan;
    $input->save();

    $res['message'] = 'berhasil post';
    $res['data'] = $input;
    return response()->json($res, 200);
    }
}
