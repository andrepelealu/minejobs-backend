<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Iklan_Perusahaan;
use Illuminate\Support\Facades\Validator;

class IklanPerusahaanController extends Controller
{
    public function PostIklanPerusahaan(Request $req){
        $validator = Validator::make($req->all(), [
            'id_perusahaan' => 'required',
            'nama_depan' => 'required|string',
            'nama_belakang' =>'required|string',
            'nomor_telepon' =>'required|string',
            'provinsi'=>'required|string',
            'kota'=>'required|string',
            'tentang'=>'required|string',
            'foto_profile'=>'required|string'
        ]
    );
    if($validator->fails()){
        return response()->json($validator->errors()->toJson(), 400);
    }
    $input = new IklanPerusahaanModel;
    $input->id_perusahaan = $req->id_perusahaan;
    $input->posisi_pekerjaan = $req->posisi_pekerjaan;
    $input->gaji_min = $req->gaji_min;
    $input->gaji_max = $req->gaji_max;
    $input->provinsi = $req->provinsi;
    $input->kota = $req->kota;
    $input->bidang_pekerjaan = $req->bidang_pekerjaan;
    $input->tingkat_pendidikan = $req->tingkat_pendidikan;
    $input->pengalaman_kerja = $req->pengalaman_kerja;
    $input->persyaratan = $req->tingkat_pendidikan;
    $input->benefit_perusahaan = $req->benefit_perusahaan;
    $input->url_header = $req->url_header;

    $input->save();

    $res['message'] = 'berhasil post';
    $res['data'] = $input;
    return response()->json($res, 200);
    }
    public function GetIklanPerusahaanById($id){
        $data = IklanPerusahaanModel::where('id',$id)->get();
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
    public function GetIklanPerusahaan(){
        $data = IklanPerusahaan::all();
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
    public function UpdateIklanPerusahaan(Request $req , $id){

        $data = IklanPerusahaanModel::find($id,'id_perusahaan')->first();
        // $data->id_perusahaan = $req->id_perusahaan;
        $data->id_perusahaan = $req->id_perusahaan;
        $data->posisi_pekerjaan = $req->posisi_pekerjaan;
        $data->gaji_min = $req->gaji_min;
        $data->gaji_max = $req->gaji_max;
        $data->provinsi = $req->provinsi;
        $data->kota = $req->kota;
        $data->bidang_pekerjaan = $req->bidang_pekerjaan;
        $data->tingkat_pendidikan = $req->tingkat_pendidikan;
        $data->pengalaman_kerja = $req->pengalaman_kerja;
        $data->persyaratan = $req->tingkat_pendidikan;
        $data->benefit_perusahaan = $req->benefit_perusahaan;
        $data->url_header = $req->url_header;
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
    public function DeleteIklanPerusahaan(){
        $data = IklanPerusahaanModel::find($id,'id_perusahaan')->first();
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
    } //
}
