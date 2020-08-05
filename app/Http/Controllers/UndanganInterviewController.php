<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\UndanganInterview;
use App\UserKandidat;
use App\ProfilPerusahaan;
use App\Iklan_Perusahaan;
use Mail,DB;
use Illuminate\Mail\Message;


class UndanganInterviewController extends Controller
{
    //
    public function PostUndanganInterview(Request $req)
    {

        $validator = Validator::make($req->all(), 
        [
        'id_kandidat' => 'required',
        'id_perusahaan' => 'required|string',
        'id_iklan'=>'required',
        'pesan' =>'required|string',
        'tanggal_interview' =>'required',
        'waktu_mulai' =>'required',
        'waktu_selesai' =>'required',
        'metode_interview'=>'required'
        ]
    );
    if($validator->fails()){
        return response()->json($validator->errors()->toJson(), 400);
        }
            $input = new UndanganInterview;
            $input->id_kandidat = $req->id_kandidat;
            $input->id_perusahaan = $req->id_perusahaan;
            $input->id_iklan = $req->id_iklan;
            $input->pesan = $req->pesan;
            $input->tanggal_interview = $req->tanggal_interview;
            $input->waktu_mulai = $req->waktu_mulai;
            $input->waktu_selesai = $req->waktu_selesai;
            $input->metode_interview = $req->metode_interview;
            $input->url_concall = $req->url_concall;
            $input->status = 'menunggu konfirmasi';
            
    $detailIklan = Iklan_Perusahaan::select('posisi_pekerjaan')->where('id',$req->id_iklan)->get();
    $detailPerusahaan = ProfilPerusahaan::select('nama_perusahaan')->where('id_perusahaan',$req->id_perusahaan)->get();
    
    $email = DB::table('user_kandidat')->select('email')->where('id', $req->id_kandidat)->first();

    // $detailIklan = 'test';
    // $detailPerusahaan = 'test';
    $subject = "Minejobs | Undangan Interview dari ".$detailPerusahaan[0]->nama_perusahaan;
    
    if($input->save()){
        Mail::send('email.undangan_interview', 
        [
            'nama_lowongan'     =>  $detailIklan[0]->posisi_pekerjaan,
            'perusahaan'        =>  $detailPerusahaan[0]->nama_perusahaan,
            'tanggal'           =>  $req->tanggal_interview,
            'waktu_mulai'       =>  $req->waktu_mulai,
            'waktu_selesai'     =>  $req->waktu_selesai,
            'metode_interview'  =>  $req->metode_interview,
            'pesan'             =>  $req->pesan
        ],
            function($mail) use ($email, $subject){
                $mail->from('donotreply@minejobs.id');
                $mail->to((string) $email->email);
                $mail->subject($subject);
            });
    
    }

        $res['message'] = 'berhasil post';
        $res['data'] = $input;
        return response()->json($res, 200);
    }

    public function UpdateStatusInterview(Request $req, $id)
    {
        $data = UndanganInterview::find($id,'id')->first();
        // $data->id_perusahaan = $req->id_perusahaan;
        $data->status_iklan = $req->status;
            if(count($data)>0){
            if($req->status === 'diterima'){
                $data->save();
                //insert into jadwal interview
                $res['message'] = 'Undangan diterima';
                $res['data'] = $data;
                return $res;
            }else if($req->status === 'atur ulang'){
                //insert into atur ulang interview
                $data->save();
                $res['message'] = 'Permintaan Atur Ulang';
                $res['data'] = $data;
                return $res;
            }else{
                $res['message'] = 'Gagal di Update';
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
