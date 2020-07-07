<?php

namespace App\Http\Controllers;
use App\Bahasa;

use Illuminate\Http\Request;

class BahasaController extends Controller
{
    // Route::post('bahasa','BahasaController@PostBahasa');
    // Route::get('bahasa','BahasaController@GetBahasa');
    // Route::put('bahasa','BahasaController@UpdateBahasa');
    // Route::delete('bahasa','BahasaController@DeleteBahasa');
    public function PostBahasa(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'id_kandidat' => 'required|unique:bahasa',
            'bahasa_dikuasai' => 'required|string',
            'kemampuan_verbal' =>'required|string',
            'kemampuan_tulisan' =>'required|string'
         
        ]
    );
    if($validator->fails()){
        return response()->json($validator->errors()->toJson(), 400);
    }
    $input = new Bahasa;
    $input->id_kandidat = $req->id_kandidat;
    $input->bahasa_dikuasai = $req->bahasa_dikuasai;
    $input->kemampuan_verbal = $req->kemampuan_verbal;
    $input->kemampuan_tulisan = $req->kemampuan_tulisan;
    $input->save();

    $res['message'] = 'berhasil post';
    $res['data'] = $input;
    return response()->json($res, 200);
    }

    public function GetBahasa($id)
    {
        $data = Bahasa::where('id_kandidat',$id)->get();
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

    public function UpdateBahasa($id)
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
    public function DeleteBahasa($id)
    {
        # code...
    }

}
