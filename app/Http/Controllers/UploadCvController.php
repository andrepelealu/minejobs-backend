<?php

namespace App\Http\Controllers;
use App\UploadCv;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class UploadCvController extends Controller
{
    // Route::post('uploadcv','UploadCvController@PostCv');
    // Route::get('uploadcv','UploadCvController@GetCv');
    // Route::put('uploadcv','UploadCvController@UpdateCv');
    // Route::delete('uploadcv','UploadCvController@DeleteCv');

    public function PostCv(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'id_kandidat' => 'required|unique:upload_cv',
            'url_cv' => 'required|string'
        ]
    );
    if($validator->fails()){
        return response()->json($validator->errors()->toJson(), 400);
    }
    $input = new UploadCv;
    $input->id_kandidat = $req->id_kandidat;
    $input->url_cv = $req->url_cv;
    $input->save();

    $res['message'] = 'berhasil post';
    $res['data'] = $input;
    return response()->json($res, 200);
    }
    public function GetCv($id)
    {
        $data = UploadCv::where('id_kandidat',$id)->get();
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
    public function UpdateCv(Request $req, $id)
    {
        $data = UploadCv::find($id,'id_kandidat')->first();
        // $data->id_kandidat = $req->id_kandidat;
        $data->id_kandidat = $req->id_kandidat;
        $data->url_cv = $req->url_cv;
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
    public function DeleteCv($id)
    {
        $data = UploadCv::find($id,'id_kandidat')->first();
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
