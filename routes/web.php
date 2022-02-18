<?php

use Illuminate\Support\Facades\Route;

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
    Route::resource('/user', 'Admin\UserController');
    Route::resource('/perorangan', 'Admin\PeroranganController');
    Route::get('/perorangan/cetakperorangan', 'Admin\PeroranganController@cetak')->name('perorangan.cetak');
    Route::resource('/kelompok', 'Admin\KelompokController');
    Route::resource('/pelaporann', 'Admin\PelaporannController');
    Route::resource('/undangan', 'Admin\UndanganController');
});
