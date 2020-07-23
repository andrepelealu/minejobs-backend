<?php

namespace App\Http\Controllers;
use App\Pengalaman;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class PengalamanController extends Controller
{
    // Route::post('pengalaman','PengalamanController@PostPengalaman');
    // Route::get('pengalaman','PengalamanController@GetPengalaman');
    // Route::put('pengalaman','PengalamanController@UpdatePengalaman');
    // Route::delete('pengalaman','PengalamanController@DeletePengalaman');

    public function PostPengalaman(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'id_kandidat' => 'required',
            'posisi_pekerjaan' => 'required|string',
            'nama_perusahaan' =>'required|string',
            'bulan_mulai' =>'required|string',
            'bulan_selesai'=>'required|string',
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
    $input->bulan_mulai = $req->bulan_mulai;
    $input->bulan_selesai = $req->bulan_selesai;
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

    public function UpdatePengalaman(Request $req , $id)
    {
        $data = Pengalaman::find($id,'id_kandidat')->first();
        // $data->id_kandidat = $req->id_kandidat;
        $data->id_kandidat = $req->id_kandidat;
        $data->posisi_pekerjaan = $req->posisi_pekerjaan;
        $data->nama_perusahaan = $req->nama_perusahaan;
        $data->bulan_mulai = $req->bulan_mulai;
        $data->bulan_selesai = $req->tahun_selesai;
        $data->tahun_mulai = $req->tahun_mulai;
        $data->tahun_selesai = $req->tahun_selesai;
        $data->jabatan = $req->jabatan;
        $data->gaji = $req->gaji;
        $data->deskripsi_pekerjaan = $req->deskripsi_pekerjaan;

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
        $data = Pengalaman::find($id,'id_kandidat')->first();
        if(count($data)>0){
            if($data->delete()){
                $res['message'] = 'Berhasil Dihapus';
                $res['data'] = $data;
                return $res;
            }else{
                $res['message'] = 'Gagal Dihapus';
                $res['data'] = $data;
                return $res;
            }
        }else{
            $res['count'] = count($data);
            $res['message'] = 'data tidak ditemukan';
            return $res;
        }
    }
}
