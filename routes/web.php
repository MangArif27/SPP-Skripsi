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
