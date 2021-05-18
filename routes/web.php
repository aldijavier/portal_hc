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

/* ---------------------------------Untuk Data Pelamar---------------------------------------------- */
// Route untuk menampilkan halaman Upload
Route::get('/upload', 'UploadController@index');

// Route untuk menyimpan data Proses Upload di Controller
Route::post('/upload/proses', 'UploadController@proses_upload');

// Route untuk mendapatkan data Upload di Controller Upload
Route::get('/data-pelamar', 'UploadController@upload')->name('data-pelamar');

// Route untuk melihat detail data di Controller Upload
Route::get('/detail/{id}', 'UploadController@detail')->name('detail-data-pelamar');

// Route untuk melihat penilaian interview berdasarkan id pelamar di Controller Upload
Route::get('/nilai-interview/{id}', 'UploadController@nilai_interview')->name('nilai-interview');

// Route untuk menyimpan file nilai Proses Upload di Controller
Route::patch('/upload/proses/{id}', 'UploadController@proses_upload_nilai')->name('update-proses');

// Route untuk menyimpan nilai Controller
Route::patch('/upload/proses2/{id}', 'UploadController@proses_upload_nilai_interview')->name('update-proses-interview');

Route::get('upload-form', 'UploadFormController@index');
Route::post('/upload/proses', 'UploadFormController@proses_upload');
/* --------------------------------------------------------------------------------------------------- */

// Route::get('/guests/logbook', 'GuestController@lokasi');
Route::get('/json-pajak', 'ControllerKaryawan@pajak')->name('jsonPajak');

/* ---------------------------------Untuk Data Karyawan----------------------------------------------- */
// Route untuk Halaman Depan
Route::get('/', function () {
    return view('HalamanDepan.beranda-utama');
});

// Route untuk menampilkan form login di Controller Login HC
Route::get('/login_hc', 'LoginController@login_hc')->name('login_hc');

Route::get('/beranda-utama', 'UploadController@berandaUtama')->name('beranda-utama');
Route::get('/beranda-hc', 'UploadController@berandaHC')->name('beranda-hc');

//pajak dan nikah
Route::get('myform',array('as'=>'myform','uses'=>'ControllerKaryawan@myform'));
Route::get('myform/ajax/{id}',array('as'=>'myform.ajax','uses'=>'ControllerKaryawan@myformAjax'));

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

// Route untuk mendapatkan data karyawan di Controller Upload
Route::get('/data-karyawan', 'ControllerKaryawan@datakaryawan')->name('data-karyawan');

Route::get('dropdownlist','ControllerKaryawan@getCountries');
Route::get('dropdownlist/getstates/{id}','ControllerKaryawan@getStates');
Route::get('dropdownlist/getbank/{id}','ControllerKaryawan@getBank');

// Route untuk mendapatkan filter data karyawan di Filter Controller
Route::get('/filter-data-karyawan', 'FilterController@index')->name('filter-data-karyawan');

// Route untuk mendapatkan filter data karyawan di Filter Controller
Route::get('/filter-data-karyawan2', 'FilterController@index2')->name('filter-data-karyawan2');

// Route untuk tambah data karyawan di Controller Karyawan
Route::get('/tambah-data-karyawan', 'ControllerKaryawan@tambahdatakaryawan')->name('tambah-data-karyawan');

// Route untuk menampilkan halaman tambah data karyawan
Route::get('/tambah-data-karyawan', 'ControllerKaryawan@index')->name('tambah-data-karyawan');

// Route untuk menyimpan data Proses Tambah di Controller
Route::post('/tambah/proses/datakaryawan', 'ControllerKaryawan@proses_tambah');

// Route untuk menampilkan halaman edit data karyawan di Controller Karyawan
Route::get('/editdatakaryawan/{id}', 'ControllerKaryawan@editdatakaryawan')->name('edit-data-karyawan');

// Route untuk update data karyawan di Controller Karyawan
Route::patch('update-proses-datakaryawan/{id}', 'ControllerKaryawan@proses_update')->name('update-proses-datakaryawan');

// Route untuk melihat detail data karyawan di Controller Karyawan
Route::get('/detaildatakaryawan/{id}', 'ControllerKaryawan@detaildatakaryawan')->name('detail-data-karyawan');

// Route untuk menampilkan report line di tambah data karyawan
Route::get('/findReportLineName','ControllerKaryawan@findReportLineName');

// Route untuk export data karyawan aktif berupa excel di Controller Karyawan
Route::get('/export_excel', 'ControllerKaryawan@export_excel')->name('export-excel');

// Route untuk export data karyawan tidak aktif berupa excel di Controller Karyawan
Route::get('/export_excel2', 'ControllerKaryawan@export_excel2')->name('export-excel2');

// Route untuk menampilkan import data karyawan berupa excel di Controller Karyawan
Route::get('/import_form_karyawan', 'ControllerKaryawan@importFormkaryawan');

// Route untuk proses upload import data karyawan berupa excel di Controller Karyawan
Route::post('/import_karyawan', 'ControllerKaryawan@importkaryawan')->name('importkaryawan');

/* ---------------------------------Untuk Data Karyawan Temporary----------------------------------------------- */

// Route untuk mendapatkan data karyawan di Controller Karyawan Temporary
Route::get('/data-karyawan-temporary', 'KaryawanTemporaryController@datakaryawantemporary')->name('data-karyawan-temporary');

Route::get('/tambah-data-karyawan-temporary', 'KaryawanTemporaryController@tambahdatakaryawantemporary')->name('tambah-data-karyawan-temporary');

Route::post('/tambah/proses', 'KaryawanTemporaryController@proses_tambah');

Route::get('/editdatakaryawantemporary/{id}', 'KaryawanTemporaryController@editdatakaryawantemporary')->name('edit-data-karyawan-temporary');

Route::patch('update-proses/{id}', 'KaryawanTemporaryController@proses_update')->name('update-proses');

Route::get('/detaildatakaryawantemporary/{id}', 'KaryawanTemporaryController@detaildatakaryawantemporary')->name('detail-data-karyawan-temporary');

Route::get('/import_form', 'KaryawanTemporaryController@importForm');

Route::post('/import', 'KaryawanTemporaryController@import')->name('import');