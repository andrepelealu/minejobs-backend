<?php

namespace App\Http\Controllers;
use App\AturUlang;

use Illuminate\Http\Request;

class AturUlangController extends Controller
{
    //Route::post('atur-ulang','AturUlangController@PostAturUlang');
    public function PostAturUlang(Request $req){
        $validator = Validator::make($req->all(), [
            'id_undangan_interview' => 'required',
            'id_kandidat' => 'required',
            'id_perusahaan' =>'required',
        ]
    );
    if($validator->fails()){
        return response()->json($validator->errors()->toJson(), 400);
    }
    $input = new AturUlang;
    $input->id_undangan_interview = $req->id_undangan_interview;
    $input->id_kandidat = $req->id_kandidat;
    $input->id_perusahaan = $req->id_perusahaan;

    $input->save();

    $res['message'] = 'berhasil post';
    $res['data'] = $input;
    return response()->json($res, 200);
        
    }
}
