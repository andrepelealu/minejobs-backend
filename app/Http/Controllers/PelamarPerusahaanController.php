<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PelamarPerusahaanController extends Controller
{
    public function PostPelamarPerusahaan(Request $req){
        $validator = Validator::make($req->all(), [
            'id_kandidat' => 'required|',
            'id_iklan' => 'required|string',
            'tanggal_lamaran' =>'required|string',
        ]
    );
    if($validator->fails()){
        return response()->json($validator->errors()->toJson(), 400);
    }
    $input = new PelamarPerusahaanModel;
    $input->id_kandidat = $req->id_kandidat;
    $input->id_iklan = $req->id_iklan;
    $input->tanggal_lamaran = $req->tanggal_lamaran;
    
    $input->save();

    $res['message'] = 'berhasil post';
    $res['data'] = $input;
    return response()->json($res, 200);
    }
    public function GetPelamarPerusahaanById($id){
        $data = PelamarPerusahaanModel::where('id',$id)->get();
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
    public function GetPelamarPerusahaan(){
        $data = PelamarPerusahaan::all();
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
    public function UpdatePelamarPerusahaan(Request $req , $id){

        $data = PelamarPerusahaanModel::find($id,'id_perusahaan')->first();
        // $data->id_perusahaan = $req->id_perusahaan;
        $data->id_kandidat = $req->id_kandidat;
        $data->id_iklan = $req->id_iklan;
        $data->tanggal_lamaran = $req->tanggal_lamaran;            
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
    public function DeletePelamarPerusahaan(){
        $data = PelamarPerusahaanModel::find($id,'id_perusahaan')->first();
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
//
}
