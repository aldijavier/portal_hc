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

//Route::get('/', function () {
//    return view('welcome');
//});


Route::get('/dropdown', 'DynamicDependent@index');
Route::post('dropdown/regencies', 'DynamicDependent@regencies')->name('dynamicdependent.regencies');
Route::post('dropdown/districts', 'DynamicDependent@districts')->name('dynamicdependent.districts');
Route::post('dropdown/villages', 'DynamicDependent@villages')->name('dynamicdependent.villages');

//Route untuk mendapatkan Upload dan Proses Upload di Controller Upload

Route::get('/upload', 'UploadController@upload');

// Route untuk menyimpan data Proses Upload di Controller
Route::post('/upload/proses', 'UploadController@proses_upload');

//Route::view('data_form', 'data_form');


// Route untuk menampilkan Upload di Index
Route::get('/upload', 'UploadController@index');

// Route untuk mendapatkan kota, kecamatan, kelurahan di Controller Upload
Route::post('upload/regencies', 'UploadController@regencies')->name('UploadController.regencies');
Route::post('upload/districts', 'UploadController@districts')->name('UploadController.districts');
Route::post('upload/villages', 'UploadController@villages')->name('UploadController.villages');

// Route untuk mendapatkan data Upload di Controller Upload
Route::get('/data', 'UploadController@upload');

// Route untuk Halaman Depan
Route::get('/', function () {
    return view('HalamanDepan.beranda-utama');
});

Route::get('/beranda-utama', 'UploadController@berandaUtama')->name('beranda-utama');

Route::get('/beranda-hc', 'UploadController@berandaHC')->name('beranda-hc');

// Route untuk mendapatkan data Upload di Controller Upload
Route::get('/data-pelamar', 'UploadController@upload')->name('data-pelamar');

// Route untuk melihat detail data di Controller Upload
Route::get('/detail/{id}', 'UploadController@detail')->name('detail_data');
