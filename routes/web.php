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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/kunjungan', 'KunjunganController@index')->name('kunjungan.index');
Route::post('/kunjungan/getKelas', 'KunjunganController@getKelas')->name('kunjungan.getKelas');
Route::post('/kunjungan/murid', 'KunjunganController@murid')->name('kunjungan.murid');
Route::post("/kunjungan/anggota", "KunjunganController@anggota")->name("kunjungan.anggota");


Auth::routes();
