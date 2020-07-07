<?php

namespace App\Http\Controllers;
use App\Pengalaman;

use Illuminate\Http\Request;

class PengalamanController extends Controller
{
    // Route::post('pengalaman','PengalamanController@PostPengalaman');
    // Route::get('pengalaman','PengalamanController@GetPengalaman');
    // Route::put('pengalaman','PengalamanController@UpdatePengalaman');
    // Route::delete('pengalaman','PengalamanController@DeletePengalaman');

    public function PostPengalaman(Request $id)
    {
        $validator = Validator::make($req->all(), [
            'id_kandidat' => 'required|unique:pengalaman',
            'posisi_pekerjaan' => 'required|string',
            'nama_perusahaan' =>'required|string',
            'tahun_mulai' =>'required|string',
            'tahun_selesai'=>'required|string',
            'jabatan'=>'required|string',
            'gaji'=>'required|string',
            'deskripsi_pekerjaan'=>'required|string'
        ]
    );
    if($validator->fails()){
        return response()->json($validator->errors()->toJson(), 400);
    }
    $input = new Pengalaman;
    $input->id_kandidat = $req->id_kandidat;
    $input->posisi_pekerjaan = $req->posisi_pekerjaan;
    $input->nama_perusahaan = $req->nama_perusahaan;
    $input->tahun_mulai = $req->tahun_mulai;
    $input->tahun_selesai = $req->tahun_selesai;
    $input->jabatan = $req->jabatan;
    $input->gaji = $req->gaji;
    $input->save();

    $res['message'] = 'berhasil post';
    $res['data'] = $input;
    return response()->json($res, 200);
    }

    public function GetPengalaman($id)
    {
        $data = Pengalaman::where('id_kandidat',$id)->get();
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

    public function UpdatePengalaman($id)
    {
        $data = DataPribadiModel::find($id,'id_kandidat')->first();
        // $data->id_kandidat = $req->id_kandidat;
        $data->nama_depan       = $req->nama_depan;
        $data->nama_belakang    = $req->nama_belakang;
        $data->nomor_telepon    = $req->nomor_telepon;
        $data->provinsi         = $req->provinsi;
        $data->kota             = $req->kota;
        $data->tentang          = $req->tentang;
        $data->foto_profile     = $req->foto_profile;
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

    public function DeletePengalaman($id)
    {
        # code...
    }
}
