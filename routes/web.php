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

Route::get('karyawan','App\Http\Controllers\KaryawanController@index');

Route::get('karyawan/tambah','App\Http\Controllers\KaryawanController@tambah');

Route::post('karyawan/store','App\Http\Controllers\KaryawanController@store');

Route::get('karyawan/edit/{id}','App\Http\Controllers\KaryawanController@edit');

Route::put('karyawan/update/{id}','App\Http\Controllers\KaryawanController@update');

Route::get('karyawan/hapus/{id}','App\Http\Controllers\KaryawanController@hapus');

Route::get('karyawan/cetak/{id}','App\Http\Controllers\KaryawanController@cetak');