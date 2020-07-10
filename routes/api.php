<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*LOGIN REGISTER KANDIDAT*/
Route::post('kandidat/register', 'UserKandidatController@register');
Route::post('kandidat/login', 'UserKandidatController@login');
Route::post('kandidat/logout', 'UserKandidatController@logout');
Route::post('kandidat/recover', 'UserKandidatController@recover');

/*END LOGIN REGISTER */
Route::post('kirim/undangan','UndanganInterviewController@PostUndanganInterview');
/*LOGIN REGISTER KANDIDAT*/
Route::post('perusahaan/register', 'UserPerusahaanController@register');
Route::post('perusahaan/login', 'UserPerusahaanController@login');
Route::post('perusahaan/logout', 'UserPerusahaanController@logout');

/*END LOGIN REGISTER */

/* DATA PRIBADI */
Route::post('data-pribadi','DataPribadiController@PostDataPribadi');
Route::get('data-pribadi','DataPribadiController@GetDataPribadi')->middleware('jwt.verify');
Route::get('data-pribadi/{id}','DataPribadiController@GetDataPribadiById');
Route::put('data-pribadi/{id}','DataPribadiController@UpdateDataPribadi');
// Route::delete('data-pribadi','DataPribadiController@DeleteDataPribadi');
/* END DATA PRIBADI */

/* PREFERENSI PEKERJAAN */
Route::post('preferensi-pekerjaan','PreferensiPekerjaanController@PostPreferensiPekerjaan');
Route::get('preferensi-pekerjaan/{$id}','PreferensiPekerjaanController@GetPreferensiPekerjaan');
Route::put('preferensi-pekerjaan/{$id}','PreferensiPekerjaanController@UpdatePreferensiPekerjaan');
Route::delete('preferensi-pekerjaan/{$id}','PreferensiPekerjaanController@DeletePreferensiPekerjaan');
/* END PREFERENSI PEKERJAAN */

/* PENGALAMAN */
Route::post('pengalaman','PengalamanController@PostPengalaman');
Route::get('pengalaman/{id}','PengalamanController@GetPengalaman');
Route::put('pengalaman/{$id}','PengalamanController@UpdatePengalaman');
Route::delete('pengalaman/{$id}','PengalamanController@DeletePengalaman');
/* END PENGALAMAN */

/* PENDIDIKAN */
Route::post('pendidikan','PendidikanController@PostPendidikan');
Route::get('pendidikan/{$id}','PendidikanController@GetPendidikan');
Route::put('pendidikan/{$id}','PendidikanController@UpdatePendidikan');
Route::delete('pendidikan/{$id}','PendidikanController@DeletePendidikan');
/* END PENDIDIKAN */

/* KEAHLIAN */
Route::post('keahlian/{$id}','KeahlianController@PostKeahlian');
Route::get('keahlian/{$id}','KeahlianController@GetKeahlian');
Route::put('keahlian/{$id}','KeahlianController@UpdateKeahlian');
Route::delete('keahlian/{$id}','KeahlianController@DeleteKeahlian');
/* END KEAHLIAN */

/* BAHASA */
Route::post('bahasa','BahasaController@PostBahasa');
Route::get('bahasa/{$id}','BahasaController@GetBahasa');
Route::put('bahasa/{$id}','BahasaController@UpdateBahasa');
Route::delete('bahasa/{$id}','BahasaController@DeleteBahasa');
/* END BAHASA */

/* Upload CV */
Route::post('uploadcv','UploadCvController@PostCv');
Route::get('uploadcv/{$id}','UploadCvController@GetCv');
Route::put('uploadcv/{$id}','UploadCvController@UpdateCv');
Route::delete('uploadcv/{$id}','UploadCvController@DeleteCv');
/* END BAHASA */

/*LAMARAN Terkirim*/

Route::get('lamaran-terkirim/{$id}','LamaranTerkirim@GetLamaranTerkirim');

/*END*/

/*LAMARAN TERSIMPAN*/
//Here is the protected User Routes Group,  
// Route::group(['middleware' => 'jwt.auth', 'prefix' => 'user'], function(){
//     Route::get('logout', 'Api\User\UserController@logout');
//     Route::get('dashboard', 'Api\User\UserController@dashboard');
// });

Route::group(['prefix' => 'kandidat','middleware' => ['jwt.verify:kandidat','jwt.auth']],function ()
{
	Route::get('lamaran-tersimpan','LamaranTersimpanController@GetLamaranTersimpan');
});

// Route::get('lamaran-tersimpan','LamaranTersimpanController@GetLamaranTersimpan')->middleware('jwt.verify:kandidat');
Route::post('lamaran-tersimpan','LamaranTersimpanController@GetLamaranTersimpan');

/*END*/

/*LAMARAN JADWAL INTERVIEW*/

Route::get('jadwal-interview/{id}','JadwalInterviewController@GetJadwalInterview');

/*END*/

/*UNDANGAN INTERVIEW*/
Route::get('undangan-interview/{id}','UndanganInterviewController@GetUndanganInterview');

/*END*/

/*ATUR ULANG INTERVIEW*/
Route::post('atur-ulang','AturUlangController@PostAturUlang');

/*END*/

/*PROFIL PERUSAHAAN*/
Route::post('profil-perusahaan/{id}','ProfilPerusahaanController@PostProfilPerusahaan');
Route::get('profil-perusahaan/{id}','ProfilPerusahaanController@GetProfilPerusahaan');
Route::put('profil-perusahaan/{id}','ProfilPerusahaanController@UpdateProfilPerusahaan');

/*END*/

/*IKLAN PERUSAHAAN*/
Route::post('iklan-perusahaan/{id}','IklanPerusahaanController@PostIklanPerusahaan');
Route::get('iklan-perusahaan/{id}','IklanPerusahaanController@GetIklanPerusahaan');
Route::put('iklan-perusahaan/{id}','IklanPerusahaanController@UpdateIklanPerusahaan');
Route::delete('iklan-perusahaan/{id}','IklanPerusahaanController@DeleteIklanPerusahaan');

/*END*/

/*PELAMAR PERUSAHAAN*/
Route::post('pelamar-perusahaan/{id}','PelamarPerusahaanController@PostPelamarPerusahaan');
Route::get('pelamar-perusahaan/{id}','PelamarPerusahaanController@GetPelamarPerusahaan');
Route::put('pelamar-perusahaan/{id}','PelamarPerusahaanController@UpdatePelamarPerusahaan');
Route::delete('pelamar-perusahaan/{id}','PelamarPerusahaanController@DeletePelamarPerusahaan');

/*END*/
