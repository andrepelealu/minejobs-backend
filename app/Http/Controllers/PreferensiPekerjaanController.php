<?php

namespace App\Http\Controllers;
use App\PreferensiPekerjaan;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class PreferensiPekerjaanController extends Controller
{
    // Route::post('preferensi-pekerjaan','PreferensiPekerjaanController@PostPreferensiPekerjaan');
    // Route::get('preferensi-pekerjaan','PreferensiPekerjaanController@GetPreferensiPekerjaan');
    // Route::put('preferensi-pekerjaan','PreferensiPekerjaanController@UpdatePreferensiPekerjaan');
    // Route::delete('preferensi-pekerjaan','PreferensiPekerjaanController@DeletePreferensiPekerjaan');

    public function PostPreferensiPekerjaan(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'id_kandidat' => 'required|unique:preferensi_pekerjaan',
            'gaji_diharapkan' => 'required|string',
            'provinsi' =>'required|string',
            'kota' =>'required|string',
            'bidang_pekerjaan'=>'required|string'
        ]
    );
    if($validator->fails()){
        return response()->json($validator->errors()->toJson(), 400);
    }
    $input = new PreferensiPekerjaan;
    $input->id_kandidat = $req->id_kandidat;
    $input->gaji_diharapkan = $req->gaji_diharapkan;
    $input->provinsi = $req->provinsi;
    $input->kota = $req->kota;
    $input->provinsi = $req->provinsi;
    $input->kota = $req->kota;
    $input->bidang_pekerjaan = $req->bidang_pekerjaan;
    $input->save();

    $res['message'] = 'berhasil post';
    $res['data'] = $input;
    return response()->json($res, 200);
    }

    public function GetPreferensiPekerjaan($id)
    {
        $data = PreferensiPekerjaan::where('id_kandidat',$id)->get();
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
    public function UpdatePreferensiPekerjaan(Request $req, $id)
    {
        $data = PreferensiPekerjaan::find($id,'id_kandidat')->first();
        // $data->id_kandidat = $req->id_kandidat;
        $data->id_kandidat = $req->id_kandidat;
        $data->gaji_diharapkan = $req->gaji_diharapkan;
        $data->provinsi = $req->provinsi;
        $data->kota = $req->kota;
        $data->bidang_pekerjaan = $req->bidang_pekerjaan;
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
    public function DeletePreferensiPekerjaan($id)
    {
        $data = PreferensiPekerjaan::find($id,'id_kandidat')->first();
        // if(count($data)>0){
            if($data->delete()){
                $res['message'] = 'Berhasil Dihapus';
                $res['data'] = $data;
                return $res;
            }else{
                $res['message'] = 'Gagal Dihapus';
                $res['data'] = $data;
                return $res;
            }
        // }else{
        //     $res['count'] = count($data);
        //     $res['message'] = 'data tidak ditemukan';
        //     return $res;
        // }
    }

}
