<?php

namespace App\Http\Controllers;
use App\Pendidikan;
use Illuminate\Support\Facades\Validator;

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
    public function UpdatePendidikan(Request $req, $id)
    {
        $data = Pendidikan::find($id,'id_kandidat')->first();
        // $data->id_kandidat = $req->id_kandidat;
        $data->id_kandidat = $req->id_kandidat;
        $data->jurusan = $req->nama_depan;
        $data->tahun_mulai = $req->nama_belakang;
        $data->tahun_selesai = $req->nomor_telepon;
        $data->nama_instansi = $req->provinsi;
        if(count($data)>0){
            if($input->save()){
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
        $data = Pendidikan::find($id,'id_kandidat')->first();
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
