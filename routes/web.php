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

Route::get('/', 'Controller@Index');
Route::get('/Data-Pengguna', 'UserController@Pengguna');
Route::get('/Data-Siswa', 'SiswaController@Siswa');
Route::get('/Data-Pembayaran', 'PembayaranController@Pembayaran');
Route::get('/Data-Pembayaran-Server-Side', 'PageController@DataPembayaran');
Route::get('/Data-Tagihan', 'TagihanController@Tagihan');
Route::get('/Pengaturan', 'PengaturanController@Pengaturan');
Route::get('/Kwitansi', 'PembayaranController@Kwitansi');
Route::get('/Data-Tunggakan', 'PembayaranController@Tunggakan');
Route::get('/Laporan', 'PembayaranController@Laporan')->name('DataPembayaran');

/* -------- Route Insert Data -------- */
Route::post('/Insert-Data-Pengguna', 'UserController@InsertPengguna')->name('Insert.Pengguna');
Route::post('/Insert-Data-Sekolah', 'PengaturanController@InsertSekolah')->name('Insert.Data.Sekolah');
Route::post('/Insert-Data-Tagihan', 'TagihanController@InsertTagihan')->name('Insert.Data.Tagihan');
Route::post('/Import-Data-Siswa', 'SiswaController@ImportSiswa')->name('Insert.Data.Siswa');

/* -------- Route Update Data -------- */
Route::post('/Update-Data-Pengguna', 'UserController@UpdatePengguna')->name('Update.Pengguna');
Route::post('/Update-Data-Siswa', 'SiswaController@UpdateSiswa')->name('Update.Siswa');
Route::post('/Update-Data-Pembayaran', 'PembayaranController@UpdatePembayaran')->name('Update.Data.Pembayaran');
Route::post('/Update-Data-Tunggakan', 'PembayaranController@UpdateTunggakan')->name('Update.Data.Tunggakan');
Route::post('/Update-Data-Tagihan', 'TagihanController@UpdateTagihan')->name('Update.Data.Tagihan');

/* -------- Route Delete Data -------- */
Route::get('/Delete-Data-Pengguna/{Nip}', 'UserController@DeletePengguna');

/* -------- Route Cetak Kwitansi -------- */
Route::get('/Cetak-Kwitansi/{id}', 'PembayaranController@CetakKwitansi');

/* -------- Route LogIn & LogOut -------*/
Route::get('/Login', 'UserController@Login');
Route::get('/Logout', 'UserController@Logout');
Route::post('/LoginPost', 'UserController@LoginPost')->name('Login.Post');

/* -------- Route Export Laporan -------*/
Route::post('/Export/Laporan/Pembayaran', 'PembayaranController@ExportLaporanPembayaran')->name('ExportLaporanPembayaran');
