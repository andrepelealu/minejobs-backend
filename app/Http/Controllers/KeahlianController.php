<?php

namespace App\Http\Controllers;
use App\Keahlian;
use Illuminate\Support\Facades\Validator;

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
            'id_kandidat' => 'required',
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
    public function UpdateKeahlian(Request $req, $id)
    {
        $data = Keahlian::find($id,'id_kandidat')->first();
        // $data->id_kandidat = $req->id_kandidat;
        $data->id_kandidat = $req->id_kandidat;
        $data->nama_keahlian = $req->nama_keahlian;
        $data->tingkatan = $req->tingkatan;
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
        $data = Keahlian::find($id,'id_kandidat')->first();
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
