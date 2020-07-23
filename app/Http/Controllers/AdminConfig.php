<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserKandidat;
use App\UserPerusahaan;
use App\Iklan_Perusahaan;
use App\PicPerusahaan;
use App\DataPribadiModel;
use App\ProfilPerusahaan;
use App\AddAdmin;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Validator;
use JWTFactory;
use JWTAuth;
use JWTAuthException;
use Mail,DB;
use App\UserAdmin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Password;

class AdminConfig extends Controller
{

    public function InviteAdmin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255|unique:user_admin_verification'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        // $user = AddAdmin::create([
        //     // 'name' => $request->get('name'),
        //     'email' => $request->get('email'),
        // ]);
        $email = $request->email;
        $verification_code = str_random(30); //Generate verification code
        DB::table('user_admin_verification')->insert(['email'=>$email,'token'=>$verification_code]);
        $role = 'admin';
        $subject = "Minejobs | Undangan Admin";
        Mail::send('email.admin_invite', ['verification_code' => $verification_code, 'user'=>$role],
            function($mail) use ($email, $subject){
                $mail->from('donotreply@minejobs.id');
                $mail->to($email);
                $mail->subject($subject);
            });
            $res['status'] = true;
            $res['message'] = 'Succes sending email verification';
            $res['token'] = $verification_code;
            return $res;
  
    }
    public function VerifyAdmin(Request $req)
    {
        $check = DB::table('user_admin_verification')->where('token',$req->token)->first();
        // $check_email = DB::table('user_admin_verification')->where('email',$req->email)->first();

        if(!is_null($check)){
            // $user = UserAdmin::find($check->id_kandidat);

            // if($user == 1){
                
                $validator = Validator::make($req->all(), [
                    // 'email' => 'required|string|email|max:255|unique:user_admin',
                    'password' => 'required|string|min:6|confirmed',
                    'token'=> 'required|string'
                ]);

                if($validator->fails()){
                    return response()->json($validator->errors()->toJson(), 400);
                }
                $email = DB::table('user_admin_verification')->where('token',$req->token)->get('email');

                $user = UserAdmin::create([
                    // 'name' => $request->get('name'),
                    'email' => $email[0]->email,
                    'password' => Hash::make($req->get('password'))
                ]);
                DB::table('user_admin_verification')->where('token',$req->token)->delete();
                $token = JWTAuth::fromUser($user);
                $res['status'] = 200;
                $res['messages'] = 'this token has special treatment [code:2]';
                $res['user'] = $user;
                $res['token'] = $token.rand(0, 9).rand(0,9);
                // $res['real_token'] = substr($res['token'], 0, -1);
                return response()->json($res);
                // return response()->json(compact('user','token'),201);

            // }
            
            // if($user->update(['status_akun' => 1])){
            //     return response()->json([
            //         'success'=> true,
            //         'message'=> 'You have successfully verified your email address.'
            //     ]);
            // }else{
            //     return response()->json([
            //         'success'=> true,
            //         'message'=> 'Fail'
            //     ]);
            // }
           
        }

        return response()->json(['status'=> false, 'error'=> "Verification code is invalid or email not match with token"]);

    }
    public function UpdateStatusUserPerusahaan($idPerusahaan)
    {
        # update status 0= belum verifikasi,  1 = terverifikasi email ,3 = verifikasi admin, 5 = dibatasi
        $data = UserPerusahaan::find($idPerusahaan,'id')->first();
        // $data->id_perusahaan = $req->id_perusahaan;
        $data->status_akun = $req->status_akun;
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
    public function GetAllUserPerusahaan()
    {
        $data = ProfilPerusahaan::all();
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
    public function GetUserPerusahaanById($idPerusahaan)
    {
        $data = ProfilPerusahaan::where('id_perusahaan',$id)->get();
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
    public function GetAllUserKandidat()
    {
        $data = DataPribadiModel::all();
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
    public function GetUserKandidatById($idUserKandidat)
    {
        $data = DataPribadiModel::where('id_kandidat',$id)->get();
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
    public function UpdateStatusUserKandidat($idUserKandidat)
    {
        # update status user kandidat : 0= unverif email, 1= verif email, 2=restricted
        $data = UserKandidat::find($idUserKandidat,'id')->first();
        // $data->id_perusahaan = $req->id_perusahaan;
        $data->status_akun = $req->status_akun;
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
    public function GetAllIklan()
    {
        # get all iklan
        $data = IklanPerusahaanModel::all();
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
    public function UpdateIklan($idIklan)
    {
        $data = Iklan_Perusahaan::find($idIklan,'id_perusahaan')->first();
        // $data->id_perusahaan = $req->id_perusahaan;
        $data->id_perusahaan = $req->id_perusahaan;
        $data->posisi_pekerjaan = $req->posisi_pekerjaan;
        $data->gaji_min = $req->gaji_min;
        $data->gaji_max = $req->gaji_max;
        $data->provinsi = $req->provinsi;
        $data->kota = $req->kota;
        $data->bidang_pekerjaan = $req->bidang_pekerjaan;
        $data->tingkat_pendidikan = $req->tingkat_pendidikan;
        $data->pengalaman_kerja = $req->pengalaman_kerja;
        $data->persyaratan = $req->tingkat_pendidikan;
        $data->benefit_perusahaan = $req->benefit_perusahaan;
        $data->url_header = $req->url_header;
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
    public function DeleteIklanPerusahaan($id){
        $data = IklanPerusahaanModel::find($id,'id_perusahaan')->first();
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
    public function UpdateStatusIklan(Request $req , $id){

        $data = Iklan_Perusahaan::find($id,'id')->first();
        // $data->id_perusahaan = $req->id_perusahaan;
        $data->status_iklan = 1;
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

}
