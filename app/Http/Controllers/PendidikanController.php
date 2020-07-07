<?php

namespace App\Http\Controllers;
use App\Pendidikan;

use Illuminate\Http\Request;

class PendidikanController extends Controller
{
    // Route::post('pendidikan','PendidikanController@PostPendidikan');
    // Route::get('pendidikan','PendidikanController@GetPendidikan');
    // Route::put('pendidikan','PendidikanController@UpdatePendidikan');
    // Route::delete('pendidikan','PendidikanController@DeletePendidikan');

    public function PostPendidikan(Request $id)
    {
        $validator = Validator::make($req->all(), [
            'id_kandidat' => 'required|unique:pendidikan',
            'jurusan' => 'required|string',
            'tahun_mulai' =>'required|string',
            'tahun_selesai' =>'required|string',
            'nama_instansi'=>'required|string'
        ]
    );
    if($validator->fails()){
        return response()->json($validator->errors()->toJson(), 400);
    }
    $input = new Pendidikan;
    $input->id_kandidat = $req->id_kandidat;
    $input->jurusan = $req->nama_depan;
    $input->tahun_mulai = $req->nama_belakang;
    $input->tahun_selesai = $req->nomor_telepon;
    $input->nama_instansi = $req->provinsi;
    $input->save();

    $res['message'] = 'berhasil post';
    $res['data'] = $input;
    return response()->json($res, 200);
    }
    public function GetPendidikan($id)
    {
        $data = Pendidikan::where('id_kandidat',$id)->get();
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
    public function UpdatePendidikan($id)
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
    public function DeletePendidikan($id)
    {
        # code...
    }
}
