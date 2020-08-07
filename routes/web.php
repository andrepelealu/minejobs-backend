<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $res['status'] = true;
     $res['message'] = 'welcome to minejobs api';
     return $res;

});
Route::get('perusahaan/verify/{verification_code}', 'UserPerusahaanController@verifyUser');
Route::get('admin/verify/{verification_code}', 'UserAdminController@verifyUser');
Route::get('user/verify/{verification_code}', 'UserKandidatController@verifyUser');

Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.request');
Route::post('password/reset', 'Auth\ResetPasswordController@postReset')->name('password.reset');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
