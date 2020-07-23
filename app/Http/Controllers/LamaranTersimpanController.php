<?php

namespace App\Http\Controllers;
use App\LamaranTersimpan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LamaranTersimpanController extends Controller
{
    //Route::get('lamaran-tersimpan','LamaranTersimpanController@GetLamaranTersimpan');
    //Route::post('lamaran-tersimpan','LamaranTersimpanController@PostLamaranTersimpan');

    public function GetLamaranTersimpan(){
        $data = LamaranTersimpan::all();
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

    public function PostLamaranTersimpan(Request $req){
        $validator = Validator::make($req->all(), [
            'id_kandidat' => 'required',
            'id_iklan' => 'required'
        ]
    );
    if($validator->fails()){
        return response()->json($validator->errors()->toJson(), 400);
    }
    $input = new LamaranTersimpan;
    $input->id_kandidat = $req->id_kandidat;
    $input->id_iklan = $req->id_iklan;
    $input->id_kandidat = $req->id_kandidat;
    $input->save();

    $res['message'] = 'berhasil post';
    $res['data'] = $input;
    return response()->json($res, 200);
    }
}
