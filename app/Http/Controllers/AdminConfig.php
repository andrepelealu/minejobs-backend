<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserKandidat;
use App\UserPerusahaan;
use App\Iklan_Perusahaan;
use App\PicPerusahaan;
use App\DataPribadiModel;
use App\ProfilPerusahaan;

class AdminConfig extends Controller
{

    public function UpdateStatusUserPerusahaan(Request $idPerusahaan)
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
    public function GetUserPerusahaanById(Request $idPerusahaan)
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
    public function GetUserKandidatById(Request $idUserKandidat)
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
    public function UpdateStatusUserKandidat(Request $idUserKandidat = null)
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
    public function UpdateIklan(Request $idIklan)
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

        $data = Iklan_Perusahaan::find($id,'id_perusahaan')->first();
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

}
