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

    // DOWNLOAD TEMPLATE USER
    Route::get('/user/download-template/', 'Admin\UserController@exportTemplate')->name('download-template');
    Route::get('/user/{user}/', 'Admin\UserController@show')->name('show-user'); //hapus
    Route::resource('/user', 'Admin\UserController');

    // IMPORT USER BARU
    Route::post('/user', 'Admin\UserController@importUser')->name('importuser');

    //rekap surat DI KEPEGAWAIAN
    Route::get('/kelompokk/cetak-surat', 'Admin\KelompokkController@cetakSurat')->name('cetak-surat');
    Route::get('/kelompokk/cetak-surat-form', 'Admin\KelompokkController@cetakForm')->name('cetak-surat-form');
    Route::get('/kelompokk/cetak-surat-pertanggal/{tglawal}/{tglakhir}', 'Admin\KelompokkController@cetakSuratPertanggal')->name('cetak-surat-pertanggal');

    // PELAPORAN KEUANGAN
    Route::resource('/pelaporann', 'Admin\PelaporannController');

    
    // KARYAWAN
    Route::get('/findnip', 'Admin\PerorangannController@findnip'); //nanti di hapus
    Route::get('/arsip', 'Admin\KelompokkController@arsipIndex')->name('arsip');
    Route::resource('/kelompokk', 'Admin\KelompokkController');
    Route::get('/perorangann/cetakperorangann', 'Admin\PerorangannController@cetak')->name('perorangann.cetak');//nanti di hapus
    Route::resource('/perorangann', 'Admin\PerorangannController');

    //PENUGASAN KARYAWAN
    Route::resource('/penugasankaryawan', 'Admin\PenugasankaryawanController');

    //KAJUR ACC
    Route::post('/perorangann/disetujui/{id}', 'Admin\PerorangannController@acc')->name('acc');// nanti di hapus karna index acc gabung ke kelompokk
    Route::post('/kelompokk/disetujui/{id}', 'Admin\KelompokkController@acc')->name('acckelompokk');
    
    // DISPOSISI SEKDIR
    Route::resource('/disposisi', 'Admin\disposisiController');
    Route::post('/kelompokk-file','Admin\KelompokkController@sendLetter')->name('kirimsurat');
    Route::get('/kelompokk-file/{id}','Admin\KelompokkController@getDisposisiFile')->name('disposisidownload');
    
    // SURAT TUGAS KEPEG
    Route::resource('/surattugas', 'Admin\surattugasController');
    Route::get('/surattugas-kelompok/{id}', 'Admin\SurattugasController@showKelompok')->name('surattugaskelompok');
    Route::post('/surattugas-file/{id}','Admin\SurattugasController@sendLetter')->name('surattugaskirim');
    Route::get('/kelompok/{id}','Admin\KelompokkController@getSurattugasfile')->name('surrattugasdownload');
    
    // ACC KEUANGAN
    Route::post('/pelaporann/disetujui/{id}', 'Admin\PelaporannController@acc')->name('accpelaporann');
    //UNDUH DOKUMEN PENDUKUNG
    Route::get('/pelaporann/download-dokumen/{id}','Admin\PelaporannController@getDokumenPendukungfile')->name('dokumenpendukungdownload');
    
    // PROFILE
    Route::resource('/profile', 'Admin\ProfileController');

});
