<?php

namespace App\Http\Controllers;
use App\Keahlian;

use Illuminate\Http\Request;

class KeahlianController extends Controller
{
    // Route::post('keahlian','KeahlianController@PostKeahlian');
    // Route::get('keahlian','KeahlianController@GetKeahlian');
    // Route::put('keahlian','KeahlianController@UpdateKeahlian');
    // Route::delete('keahlian','KeahlianController@DeleteKeahlian');

    public function PostKeahlian(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'id_kandidat' => 'required|unique:keahlian',
            'nama_keahlian' => 'required|string',
            'tingkatan' =>'required|string',
        ]
    );
    if($validator->fails()){
        return response()->json($validator->errors()->toJson(), 400);
    }
    $input = new Keahlian;
    $input->id_kandidat = $req->id_kandidat;
    $input->nama_keahlian = $req->nama_keahlian;
    $input->tingkatan = $req->tingkatan;
    $input->save();

    $res['message'] = 'berhasil post';
    $res['data'] = $input;
    return response()->json($res, 200);
    }
    public function GetKeahlian($id)
    {
        $data = Keahlian::where('id_kandidat',$id)->get();
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
    public function UpdateKeahlian($id)
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
    public function DeleteKeahlian($id)
    {
        # code...
    }
}
