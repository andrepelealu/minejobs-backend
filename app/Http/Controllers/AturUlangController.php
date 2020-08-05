<?php

namespace App\Http\Controllers;
use App\UndanganInterview;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class AturUlangController extends Controller
{
    //Route::post('atur-ulang','AturUlangController@PostAturUlang');
    public function GetAturUlang(Request $req){
        $data = UndanganInterview::where('id_kandidat',$id)
                ->where('status','atur ulang')
                ->get();
        if(count($data)>0){
            $res['count'] = count($data);
            $res['message'] = 'data ditemukan';
            $res['data'] = $data;
            return $res;
        }else{
            $res['count'] = count($data);
            $res['message'] = 'tidak ada permintaan atur ulang';
            return $res;
        }
}
}