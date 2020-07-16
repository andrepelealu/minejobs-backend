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
Route::get('kandidat/getuser', 'UserKandidatController@getAuthenticatedUser');

Route::group(['middleware' => ['web']], function () {
	Route::get('kandidat/auth/{provider}', 'UserKandidatController@redirectToProvider');
	Route::get('perusahaan/auth/{provider}', 'UserPerusahaanController@redirectToProvider');
	Route::get('auth/{provider}/callback', 'UserPerusahaanController@handleProviderCallback');
});

/*END LOGIN REGISTER */
/*LOGIN REGISTER KANDIDAT*/
Route::post('perusahaan/register', 'UserPerusahaanController@register');
Route::post('perusahaan/login', 'UserPerusahaanController@login');
Route::post('perusahaan/logout', 'UserPerusahaanController@logout');

/*END LOGIN REGISTER */

/*LAMARAN TERSIMPAN*/
//Here is the protected User Routes Group,  
// Route::group(['middleware' => 'jwt.auth', 'prefix' => 'user'], function(){
//     Route::get('logout', 'Api\User\UserController@logout');
//     Route::get('dashboard', 'Api\User\UserController@dashboard');
// });
Route::middleware(['jwt.verify','jwt.auth'])->group(function () {
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

Route::get('lamaran-tersimpan','LamaranTersimpanController@GetLamaranTersimpan');

// Route::get('lamaran-tersimpan','LamaranTersimpanController@GetLamaranTersimpan')->middleware('jwt.verify:kandidat');
Route::post('lamaran-tersimpan','LamaranTersimpanController@GetLamaranTersimpan');

/*END*/

/*LAMARAN JADWAL INTERVIEW*/

Route::get('jadwal-interview/{id}','JadwalInterviewController@GetJadwalInterview');
Route::get('jadwal-perusahaan/{id}','GetJadwalController@GetJadwalPerusahaan');
Route::get('semua-jadwal/{id}','JadwalInterviewController@OrderByDate');


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
Route::get('filter-gaji/{gaji}','IklanPerusahaanController@GetIklanPerusahaanByGaji');
// Route::get('filter-kota/{kota}','IklanPerusahaanController@GetIklanPerusahaanByKota');
Route::post('filter-lokasi','IklanPerusahaanController@GetIklanPerusahaanByLokasi');
Route::get('filter-bidang/{bidang}','IklanPerusahaanController@GetIklanPerusahaanByBidang');
Route::post('cari-iklan/','IklanPerusahaanController@CariIklanPerusahaan');



/*END*/

/*PELAMAR PERUSAHAAN*/


/*END*/
/*UNDANGAN INTERVIEW*/
Route::get('undangan-interview/{id}','UndanganInterviewController@GetUndanganInterview');

/* KIRIM UNDANGAN */
Route::post('kirim/undangan','UndanganInterviewController@PostUndanganInterview');
/*END*/
/*END*/
Route::post('pelamar-perusahaan/','PelamarPerusahaanController@PostPelamarPerusahaan');
Route::get('pelamar-perusahaan/{id}','PelamarPerusahaanController@GetPelamarPerusahaan');
Route::put('pelamar-perusahaan/{id}','PelamarPerusahaanController@UpdateStatusPerusahaan');
Route::delete('pelamar-perusahaan/{id}','PelamarPerusahaanController@DeletePelamarPerusahaan');

/*DATA PIC PERUSAHAAN*/
Route::post('pic-perusahaan/{idperusahaan}','PelamarPerusahaanController@PostPelamarPerusahaan');
Route::get('pic-perusahaan/{idperusahaan}','PelamarPerusahaanController@GetPelamarPerusahaan');
Route::put('pic-perusahaan/{id}','PelamarPerusahaanController@UpdateStatusPerusahaan');
/* END*/

/*ADMIN */
Route::post('admin-verifikasi/{idperusahaan}','AdminConfig@UpdateStatusUserPerusahaan');
Route::post('admin-getallperusahaan/{idperusahaan}','AdminConfig@GetAllUserPerusahaan');
Route::post('admin-getperusahaanbyid/{idperusahaan}','AdminConfig@GetUserPerusahaanById');
Route::post('admin-getallkandidat/{idperusahaan}','AdminConfig@GetAllUserKandidat');
Route::post('admin-getkandidatbyid/{idperusahaan}','AdminConfig@GetUserKandidatById');
Route::post('admin-updatestatuskandidat/{idperusahaan}','AdminConfig@UpdateStatusUserKandidat');
Route::post('admin-getalliklan/{idperusahaan}','AdminConfig@GetAllIklan');
Route::post('admin-updateiklan/{idperusahaan}','AdminConfig@UpdateIklan');
Route::post('admin-deleteiklan/{idperusahaan}','AdminConfig@DeleteIklanPerusahaan');
Route::post('admin-updatestatusiklan/{idperusahaan}','AdminConfig@UpdateStatusIklan');

/* END*/

});
