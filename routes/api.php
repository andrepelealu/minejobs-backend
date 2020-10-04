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

// Route::group(['namespace' => 'kandidat', 'middleware' => ['jwt.verify'], 'prefix' => 'kandidat'], function () {

// });



Route::group(['middleware' => ['web']], function () {
	Route::get('kandidat/auth/{provider}', 'UserKandidatController@redirectToProvider');
	Route::get('perusahaan/auth/{provider}', 'UserPerusahaanController@redirectToProvider');
	Route::get('auth/{provider}/{user}', 'UserPerusahaanController@handleProviderCallback');
	// Route::get('auth/{provider}/callback', 'UserPerusahaanController@handleProviderCallback');

});


/*LOGIN REGISTER KANDIDAT*/
Route::post('kandidat/register', 'UserKandidatController@register'); //checked
Route::post('kandidat/login', 'UserKandidatController@login'); //checked
Route::post('kandidat/forgot', 'ForgotPasswordKandidatController@sendResetLinkEmail');//checked
Route::post('kandidat/reset', 'ResetPasswordKandidatController@reset');//checked
// Route::get('kandidat/getuser', 'UserKandidatController@getAuthenticatedUser');
/*END LOGIN REGISTER */

/*LOGIN REGISTER KANDIDAT*/
Route::post('perusahaan/register', 'UserPerusahaanController@register');//checked
Route::post('perusahaan/login', 'UserPerusahaanController@login');//checked
Route::post('perusahaan/forgot', 'ForgotPasswordPerusahaanController@sendResetLinkEmail');//checked
Route::post('perusahaan/reset', 'ResetPasswordPerusahaanController@reset');//checked
/*END LOGIN REGISTER */

Route::post('admin/login', 'UserAdminController@login');//checked
Route::post('admin/add','AdminConfig@InviteAdmin');//checked
Route::post('admin/verify','AdminConfig@VerifyAdmin');//checked
Route::post('admin/forgot', 'ForgotPasswordAdminController@sendResetLinkEmail');//checked
Route::post('admin/reset', 'ResetPasswordAdminController@reset');//checked

/*LAMARAN TERSIMPAN*/
//Here is the protected User Routes Group,  
// Route::group(['middleware' => 'jwt.auth', 'prefix' => 'user'], function(){
//     Route::get('logout', 'Api\User\UserController@logout');
//     Route::get('dashboard', 'Api\User\UserController@dashboard');
// });
Route::middleware(['jwt.verify'])->group(function () {

Route::post('kandidat/logout', 'UserKandidatController@logout'); //checked
Route::post('admin/logout', 'UserAdminController@logout');//checked
Route::post('perusahaan/logout', 'UserPerusahaanController@logout');//checked
	/* DATA PRIBADI */


Route::post('data-pribadi'		,'DataPribadiController@PostDataPribadi');//checked
Route::get('data-pribadi'		,'DataPribadiController@GetDataPribadi');//checked
Route::get('data-pribadi/{id}'	,'DataPribadiController@GetDataPribadiById');//checked
Route::put('data-pribadi/{id}'	,'DataPribadiController@UpdateDataPribadi');//checked
// Route::delete('data-pribadi/{id}','DataPribadiController@DeleteDataPribadi');
/* END DATA PRIBADI */
/* PREFERENSI PEKERJAAN */
Route::post('preferensi-pekerjaan'			,'PreferensiPekerjaanController@PostPreferensiPekerjaan');//checked
Route::get('preferensi-pekerjaan/{id}'		,'PreferensiPekerjaanController@GetPreferensiPekerjaan');//checked
Route::put('preferensi-pekerjaan/{id}'		,'PreferensiPekerjaanController@UpdatePreferensiPekerjaan');//checked
Route::delete('preferensi-pekerjaan/{id}'	,'PreferensiPekerjaanController@DeletePreferensiPekerjaan');//checked
/* END PREFERENSI PEKERJAAN */

/* PENGALAMAN */
Route::post('pengalaman'			,'PengalamanController@PostPengalaman');//checked
Route::put('pengalaman/{id}'	,'PengalamanController@UpdatePengalaman');//route not found
Route::get('pengalaman/{id}'		,'PengalamanController@GetPengalaman');//checked
Route::delete('pengalaman/{id}'		,'PengalamanController@DeletePengalaman');
/* END PENGALAMAN */

/* PENDIDIKAN */
Route::post('pendidikan'		,'PendidikanController@PostPendidikan');//checked
Route::get('pendidikan/{id}','PendidikanController@GetPendidikan');//checked
Route::put('pendidikan/{id}'	,'PendidikanController@UpdatePendidikan');//checked
Route::delete('pendidikan/{id}'	,'PendidikanController@DeletePendidikan');
/* END PENDIDIKAN */

/* KEAHLIAN */
Route::post('keahlian'			,'KeahlianController@PostKeahlian');//checked
Route::get('keahlian/{id}'		,'KeahlianController@GetKeahlian');//checked
Route::put('keahlian/{id}'		,'KeahlianController@UpdateKeahlian');//checked
Route::delete('keahlian/{id}'	,'KeahlianController@DeleteKeahlian');
/* END KEAHLIAN */

/* BAHASA */
Route::post('bahasa'		,'BahasaController@PostBahasa');//checked
Route::get('bahasa/{id}'	,'BahasaController@GetBahasa');//checked
Route::put('bahasa/{id}'	,'BahasaController@UpdateBahasa');//checked
Route::delete('bahasa/{id}'	,'BahasaController@DeleteBahasa');
/* END BAHASA */

/* Upload CV */
Route::post('uploadcv'			,'UploadCvController@PostCv');//checked
Route::get('uploadcv/{id}'		,'UploadCvController@GetCv');//checked
Route::put('uploadcv/{id}'		,'UploadCvController@UpdateCv');//checked
Route::delete('uploadcv/{id}'	,'UploadCvController@DeleteCv');
/* END BAHASA */

/*LAMARAN Terkirim*/

// Route::get('lamaran-terkirim/{id}','LamaranTerkirimController@GetLamaranTerkirim');
//u
/*END*/

Route::get('lamaran-tersimpan/{id}','LamaranTersimpanController@GetLamaranTersimpan');//checked

// Route::get('lamaran-tersimpan','LamaranTersimpanController@GetLamaranTersimpan')->middleware('jwt.verify:kandidat');
Route::post('lamaran-tersimpan','LamaranTersimpanController@PostLamaranTersimpan');//checked

/*END*/

/*LAMARAN JADWAL INTERVIEW*/

Route::get('jadwal-interview/{id}','JadwalInterviewController@GetJadwalInterview');
Route::get('jadwal-perusahaan/{id}','JadwalInterviewController@GetJadwalPerusahaan');
Route::get('semua-jadwal/{id}','JadwalInterviewController@OrderByDate');


/*END*/

/*ATUR ULANG INTERVIEW*/
Route::get('atur-ulang','AturUlangController@GetAturUlang');//ok

/*END*/

/*PROFIL PERUSAHAAN*/
Route::post('profil-perusahaan/{id}','ProfilPerusahaanController@PostProfilPerusahaan');//checked
Route::get('profil-perusahaan/{id}','ProfilPerusahaanController@GetProfilPerusahaan');//checked
Route::put('profil-perusahaan/{id}','ProfilPerusahaanController@UpdateProfilPerusahaan');//ok

/*END*/

/*IKLAN PERUSAHAAN*/
Route::post('iklan-perusahaan/{id}','IklanPerusahaanController@PostIklanPerusahaan');//checked
Route::get('iklan-perusahaan/{id}','IklanPerusahaanController@GetIklanPerusahaan');//checked
Route::put('iklan-perusahaan/{id}','IklanPerusahaanController@UpdateIklanPerusahaan');//checked
Route::delete('iklan-perusahaan/{id}','IklanPerusahaanController@DeleteIklanPerusahaan');
Route::get('filter-gaji/{gaji}','IklanPerusahaanController@GetIklanPerusahaanByGaji');//checked
// Route::get('filter-kota/{kota}','IklanPerusahaanController@GetIklanPerusahaanByKota');
Route::post('filter-lokasi','IklanPerusahaanController@GetIklanPerusahaanByLokasi');//checked
Route::get('filter-bidang/{bidang}','IklanPerusahaanController@GetIklanPerusahaanByBidang');//checked
Route::post('cari-iklan/','IklanPerusahaanController@CariIklanPerusahaan');//checked



/*END*/

/*PELAMAR PERUSAHAAN*/


/*END*/
/*UNDANGAN INTERVIEW*/
Route::get('undangan-interview/{id}','UndanganInterviewController@GetUndanganInterview');//checked

/* KIRIM UNDANGAN */
Route::post('kirim/undangan','UndanganInterviewController@PostUndanganInterview');//checked
/*END*/
/*END*/
Route::post('pelamar-perusahaan/','PelamarPerusahaanController@PostPelamarPerusahaan');//checked
Route::get('pelamar-perusahaan/{id}','PelamarPerusahaanController@GetPelamarPerusahaan');//checked
Route::patch('pelamar-perusahaan/{id}','PelamarPerusahaanController@UpdateStatusPelamar');//ok
Route::delete('pelamar-perusahaan/{id}','PelamarPerusahaanController@DeletePelamarPerusahaan');//ok

/*DATA PIC PERUSAHAAN*/
Route::post('pic-perusahaan/{idperusahaan}','PicPerusahaanController@PostProfilPic');//checked
Route::get('pic-perusahaan/{idperusahaan}','PicPerusahaanController@GetPicPerusahaan');//checked
Route::put('pic-perusahaan/{id}','PicPerusahaanController@UpdatePicPerusahaan');//checked
/* END*/

/*ADMIN */
Route::patch('admin-verifikasi/{idperusahaan}','AdminConfig@UpdateStatusUserPerusahaan');
Route::get('admin-getallperusahaan','AdminConfig@GetAllUserPerusahaan');
Route::get('admin-getperusahaanbyid/{idperusahaan}','AdminConfig@GetUserPerusahaanById');
Route::get('admin-getallkandidat','AdminConfig@GetAllUserKandidat');
Route::get('admin-getkandidatbyid/{idUserKandidat}','AdminConfig@GetUserKandidatById');
Route::put('admin-updatestatuskandidat/{idUserKandidat}','AdminConfig@UpdateStatusUserKandidat');
Route::get('admin-getalliklan/{idperusahaan}','AdminConfig@GetAllIklan');
Route::put('admin-updateiklan/{idIklan}','AdminConfig@UpdateIklan');
Route::delete('admin-deleteiklan/{idperusahaan}','AdminConfig@DeleteIklanPerusahaan');
Route::patch('admin-updatestatusiklan/{idperusahaan}','AdminConfig@UpdateStatusIklan');//checked

/* END*/

});
