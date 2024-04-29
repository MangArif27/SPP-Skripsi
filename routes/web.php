<?php

use App\Http\Controllers\PageController;
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

Route::get('/', 'PageController@Index');
Route::get('/Data-Pengguna', 'PageController@Pengguna');
Route::get('/Data-Siswa', 'PageController@Siswa');
Route::get('/Data-Pembayaran', 'PageController@Pembayaran');
Route::get('/Data-Tagihan', 'PageController@Tagihan');
Route::get('/Pengaturan', 'PageController@Pengaturan');
Route::get('/Kwitansi', 'PageController@Kwitansi');

Route::post('/Import-Data-Siswa', 'InsertController@ImportSiswa')->name('Insert.Data.Siswa');
Route::post('/Insert-Data-Sekolah', 'InsertController@InsertSekolah')->name('Insert.Data.Sekolah');
Route::post('/Insert-Data-Tagihan', 'InsertController@InsertTagihan')->name('Insert.Data.Tagihan');

Route::post('/Update-Data-Pembayaran', 'UpdateController@UpdatePembayaran')->name('Update.Data.Pembayaran');
Route::post('/Update-Data-Tagihan', 'UpdateController@UpdateTagihan')->name('Update.Data.Tagihan');

Route::post('/Cetak-Kwitansi', 'PageController@CetakKwitansi')->name('Cetak.Kwitansi');
