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


Route::get('/', 'IndexController@index');
Route::post('register', 'UserController@register');
Route::post('login', 'UserController@login');
Route::post('company_register', 'CompanyController@register');
Route::post('company_login', 'CompanyController@login');



Route::get('/sortby', 'ControllerPostCandidate@sortBy');

Route::group(['middleware' => 'jwt.verify'], function(){
    Route::get('user', 'UserController@getAuthenticatedUser');
    Route::post('logout', 'UserController@logout');
    Route::post('datapribadi-candidate/{id}', 'ControllerPostCandidate@dataPribadi');
    Route::post('preferensi-candidate/{id}', 'ControllerPostCandidate@preferensiPekerjaan');
    Route::post('pengalaman/{id}', 'ControllerPostCandidate@Pengalaman');
    Route::post('pendidikan/{id}', 'ControllerPostCandidate@Pendidikan');
    Route::post('keahlian/{id}', 'ControllerPostCandidate@Keahlian');
    Route::post('bahasa/{id}', 'ControllerPostCandidate@Bahasa');
    Route::post('resume/{id}', 'ControllerPostCandidate@Resume');
    Route::post('verifikasi_perusahaan/{id}', 'ControllerPostCompany@halamanVerifikasi');
    Route::post('profil_perusahaan/{id}','ControllerPostCompany@ProfilPerusahaan');
    
});