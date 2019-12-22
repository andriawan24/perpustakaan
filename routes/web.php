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

Route::get('/', function() {
    return redirect('/dashboard');
});

Route::get('/kunjungan', 'KunjunganController@index')->name('kunjungan.index');
Route::post('/kunjungan/getKelas', 'KunjunganController@getKelas')->name('kunjungan.getKelas');
Route::post('/kunjungan/murid', 'KunjunganController@murid')->name('kunjungan.murid');
Route::post("/kunjungan/anggota", "KunjunganController@anggota")->name("kunjungan.anggota");

// Admin Section
Route::get("/dashboard", "AdminController@index")->name("admin.index");
Route::get("/anggota", "AdminController@anggota_index")->name("anggota.index");
Route::get("/anggota/tambah", "AdminController@anggota_tambah")->name("anggota.tambah");
Route::post("/anggota/tambah", "AdminController@anggota_proses_tambah")->name("anggota.tambahkan");
Route::get("/anggota/edit/{id}", "AdminController@anggota_edit")->name("anggota.edit");
Route::put("/anggota/edit/{id}", "AdminController@anggota_proses_edit")->name("anggota.editkan");

Auth::routes();
