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

/* -------- Route Control Page --------*/

Route::get('/', 'PageController@Index');
Route::get('/Data-Pengguna', 'PageController@Pengguna');
Route::get('/Data-Siswa', 'PageController@Siswa');
Route::get('/Data-Pembayaran', 'PageController@Pembayaran');
Route::get('/Data-Tagihan', 'PageController@Tagihan');
Route::get('/Pengaturan', 'PageController@Pengaturan');
Route::get('/Kwitansi', 'PageController@Kwitansi');
Route::get('/Data-Tunggakan', 'PageController@Tunggakan');

/* -------- Route Insert Data -------- */
Route::post('/Insert-Data-Pengguna', 'InsertController@InsertPengguna')->name('Insert.Pengguna');
Route::post('/Insert-Data-Sekolah', 'InsertController@InsertSekolah')->name('Insert.Data.Sekolah');
Route::post('/Insert-Data-Tagihan', 'InsertController@InsertTagihan')->name('Insert.Data.Tagihan');
Route::post('/Import-Data-Siswa', 'InsertController@ImportSiswa')->name('Insert.Data.Siswa');

/* -------- Route Update Data -------- */
Route::post('/Update-Data-Pengguna', 'UpdateController@UpdatePengguna')->name('Update.Pengguna');
Route::post('/Update-Data-Siswa', 'UpdateController@UpdateSiswa')->name('Update.Siswa');
Route::post('/Update-Data-Pembayaran', 'UpdateController@UpdatePembayaran')->name('Update.Data.Pembayaran');
Route::post('/Update-Data-Tunggakan', 'UpdateController@UpdateTunggakan')->name('Update.Data.Tunggakan');
Route::post('/Update-Data-Tagihan', 'UpdateController@UpdateTagihan')->name('Update.Data.Tagihan');

/* -------- Route Delete Data -------- */
Route::get('/Delete-Data-Pengguna/{Nip}', 'DeleteController@DeletePengguna');

/* -------- Route Cetak Kwitansi -------- */
Route::post('/Cetak-Kwitansi', 'PageController@CetakKwitansi')->name('Cetak.Kwitansi');

/* -------- Route LogIn & LogOut -------*/
Route::get('/Login', 'PageController@Login');
Route::get('/Logout', 'PageController@Logout');
Route::post('/LoginPost', 'PageController@LoginPost')->name('Login.Post');
