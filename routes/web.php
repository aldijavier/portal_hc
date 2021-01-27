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

Route::post('dropdown/regencies2', 'DynamicDependent@regencies2')->name('dynamicdependent.regencies2');
Route::post('dropdown/districts2', 'DynamicDependent@districts2')->name('dynamicdependent.districts2');
Route::post('dropdown/villages2', 'DynamicDependent@villages2')->name('dynamicdependent.villages2');

Route::get('/dropdown2', 'DynamicDependent2@index');
Route::post('dropdown2/regencies2', 'DynamicDependent2@regencies2')->name('dynamicdependent2.regencies2');
Route::post('dropdown2/districts2', 'DynamicDependent2@districts2')->name('dynamicdependent2.districts2');
Route::post('dropdown2/villages2', 'DynamicDependent2@villages2')->name('dynamicdependent2.villages2');

//Route untuk mendapatkan Upload dan Proses Upload di Controller Upload

// Route untuk menyimpan data Proses Upload di Controller
Route::post('/upload/proses', 'UploadController@proses_upload');


// Route untuk menampilkan halaman Upload
Route::get('/upload', 'UploadController@index');

// Route untuk mendapatkan kota, kecamatan, kelurahan di Controller Upload
Route::post('upload/regencies', 'UploadController@regencies')->name('UploadController.regencies');
Route::post('upload/districts', 'UploadController@districts')->name('UploadController.districts');
Route::post('upload/villages', 'UploadController@villages')->name('UploadController.villages');

// Route untuk mendapatkan kota, kecamatan, kelurahan di Controller Upload
Route::post('upload/regencies2', 'UploadController@regencies2')->name('UploadController.regencies2');
Route::post('upload/districts2', 'UploadController@districts2')->name('UploadController.districts2');
Route::post('upload/villages2', 'UploadController@villages2')->name('UploadController.villages2');

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

// Route untuk melihat data form di Controller Upload
Route::get('/data_form', 'UploadController@data_form')->name('data_form');

// Route untuk mendapatkan data karyawan di Controller Upload
Route::get('/data-karyawan', 'ControllerKaryawan@datakaryawan')->name('data-karyawan');

Route::get('/filter-data-karyawan')->name('filter-data-karyawan')->uses('ControllerKaryawan@datatablesIndex');

Route::get('/filter-data-karyawan2', 'FilterController@index')->name('filter-data-karyawan2');

// Route untuk tambah data karyawan di Controller Karyawan
Route::get('/tambah-data-karyawan', 'ControllerKaryawan@tambahdatakaryawan')->name('tambah-data-karyawan');

// Route untuk menyimpan data Proses Tambah di Controller
Route::post('/tambah/proses', 'ControllerKaryawan@proses_tambah');

// Route untuk menampilkan halaman tambah data karyawan
Route::get('/tambah-data-karyawan', 'ControllerKaryawan@index')->name('tambah-data-karyawan');

// Route untuk menampilkan report line di tambah data karyawan
Route::get('/findReportLineName','ControllerKaryawan@findReportLineName');

// Route untuk melihat detail data karyawan di Controller Karyawan
Route::get('/detaildatakaryawan/{id}', 'ControllerKaryawan@detaildatakaryawan')->name('detail-data-karyawan');

// Route untuk menampilkan halaman edit data karyawan di Controller Karyawan
Route::get('/editdatakaryawan/{id}', 'ControllerKaryawan@editdatakaryawan')->name('edit-data-karyawan');

// Route untuk update data karyawan di Controller Karyawan
Route::patch('update-proses/{id}', 'ControllerKaryawan@proses_update')->name('update-proses');

// Route untuk export data karyawan aktif berupa excel di Controller Karyawan
Route::get('/export_excel', 'ControllerKaryawan@export_excel')->name('export-excel');

// Route untuk export data karyawan tidak aktif berupa excel di Controller Karyawan
Route::get('/export_excel2', 'ControllerKaryawan@export_excel2')->name('export-excel2');
