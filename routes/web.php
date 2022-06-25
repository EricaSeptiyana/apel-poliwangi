<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'admin', 'middleware'=>'auth'], function(){
    Route::get('/', 'Admin\DashboardController@index');
    Route::resource('/jabatan', 'Admin\JabatanController');
    Route::resource('/prodi', 'Admin\ProdiController');
    Route::resource('/roles', 'Admin\RoleController');
    Route::get('/user/{user}', 'Admin\UserController@show')->name('show-user');
    Route::get('/user/download-template', 'Admin\UserController@exportTemplate')->name('download-template');
    Route::resource('/user', 'Admin\UserController');
    Route::post('/user', 'Admin\UserController@importUser')->name('importuser');

    // KEPEGAWAIAN
    // Route::resource('/perorangan', 'Admin\PeroranganController');
    // Route::resource('/kelompok', 'Admin\KelompokController');
    
    // KEUANGAN
    Route::resource('/pelaporann', 'Admin\PelaporannController');
    // Route::resource('/undangan', 'Admin\UndanganController');
    
    // KARYAWAN
    Route::resource('/perorangann', 'Admin\PerorangannController');
    Route::get('/findnip', 'Admin\PerorangannController@findnip');
    Route::get('/perorangann/cetakperorangann', 'Admin\PerorangannController@cetak')->name('perorangann.cetak');
    Route::resource('/kelompokk', 'Admin\KelompokkController');
    // Route::post('/kelompokk/suratdisposisi', [App\Http\Controllers\Admin\KelompokkController::class, 'suratdisposisi'])->name('kelompokk.suratdisposisi');
    // Route::put('/kelompokk/uploadsurattugas', [App\Http\Controllers\Admin\KelompokkController::class, 'uploadsurattugas'])->name('kelompokk.uploadsurattugas');
    Route::resource('/penugasankaryawan', 'Admin\PenugasankaryawanController');

    //KAJUR
    Route::post('/perorangann/disetujui/{id}', 'Admin\PerorangannController@acc')->name('acc');
    Route::post('/kelompokk/disetujui/{id}', 'Admin\KelompokkController@acc')->name('acckelompokk');
    
    // SEKDIR
    Route::resource('/disposisi', 'Admin\disposisiController');
    
    // KEPEG
    Route::resource('/surattugas', 'Admin\surattugasController');

    //KEUANGAN
    Route::post('/pelaporann/disetujui/{id}', 'Admin\PelaporannController@acc')->name('accpelaporann');
    
    // PROFILE
    Route::resource('/profile', 'Admin\ProfileController');
    // Route::get('/profile', 'UserController@index')->name('profile');
    // Route::put('/profile', 'UserController@update')->name('profile.update');
});
