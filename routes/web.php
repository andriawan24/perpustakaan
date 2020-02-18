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
Route::get("/tambah-peminjaman", "PeminjamanController@create")->name("peminjaman.pinjam");
Route::post("/tambah-peminjaman-murid", "PeminjamanController@peminjaman_murid")->name("peminjaman.pinjam.murid");
Route::post("/tambah-peminjaman-anggota", "PeminjamanController@peminjaman_anggota")->name("peminjaman.pinjam.anggota");

Route::get("/anggota", "AnggotaController@index")->name("anggota.index");
Route::get("/anggota/detail/{anggota}", "AnggotaController@detail")->name("anggota.detail");
Route::get("/anggota/search", "AnggotaController@search")->name("anggota.search");
Route::get("/anggota/tambah", "AnggotaController@create")->name("anggota.create");
Route::post("/anggota/tambah", "AnggotaController@store")->name("anggota.store");
Route::get("/anggota/edit/{id}", "AnggotaController@edit")->name("anggota.edit");
Route::put("/anggota/edit/{id}", "AnggotaController@update")->name("anggota.update");
Route::delete("/anggota/hapus/{id}", "AnggotaController@destroy")->name("anggota.destroy");

Route::get("/buku", "BukuController@index")->name("buku.index");
Route::get("/buku/search", "BukuController@search")->name("buku.search");
Route::get("/buku/tambah", "BukuController@create")->name("buku.create");
Route::post("/buku/tambah", "BukuController@store")->name("buku.store");
Route::get("/buku/edit/{id}", "BukuController@edit")->name("buku.edit");
Route::put("/buku/edit/{id}", "BukuController@update")->name("buku.update");
Route::delete("/buku/destroy/{id}", "BukuController@destroy")->name("buku.destroy");

Route::get("/daftar-kunjungan", "KunjunganController@list")->name("kunjungan.list");
Route::get("/kunjungan/filter-kunjungan", "KunjunganController@filter")->name("kunjungan.filter");

Auth::routes();

// Laporan Excel
Route::get("/laporan/anggota", "AnggotaController@export_excel")->name("anggota.laporan");
