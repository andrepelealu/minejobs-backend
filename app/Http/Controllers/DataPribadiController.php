<?php

namespace App\Http\Controllers;
use App\DataPribadiModel;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DataPribadiController extends Controller
{
    //PostDataPribadi
    public function PostDataPribadi(Request $req){
        $validator = Validator::make($req->all(), [
            'id_kandidat' => 'required|unique:data_pribadi',
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
    $input = new DataPribadiModel;
    $input->id_kandidat = $req->id_kandidat;
    $input->nama_depan = $req->nama_depan;
    $input->nama_belakang = $req->nama_belakang;
    $input->nomor_telepon = $req->nomor_telepon;
    $input->provinsi = $req->provinsi;
    $input->kota = $req->kota;
    $input->tentang = $req->tentang;
    $input->foto_profile = $req->foto_profile;
    $input->save();

    $res['message'] = 'berhasil post';
    $res['data'] = $input;
    return response()->json($res, 200);
    }
    public function GetDataPribadiById($id){
        $data = DataPribadiModel::where('id_kandidat',$id)->get();
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
    public function GetDataPribadi(){
        $data = DataPribadiModel::all();
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
    public function UpdateDataPribadi(Request $req , $id){

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
    public function DeleteDataPribadi($id){
        $data = DataPribadiModel::find($id,'id_kandidat')->first();
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
