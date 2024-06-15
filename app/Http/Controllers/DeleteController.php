<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class DeleteController extends Controller
{
    public function DeletePengguna($Nip)
    {
        DB::table('users')->where('nip', $Nip)->delete();
        Session::flash('sukses', 'Selamat anda berhasil menghapus data');
    }
    public function DeleteJenisTagihan($Id)
    {
        DB::table('jenis_tagihan')->where('id', $Id)->delete();
        Session::flash('sukses', 'Selamat anda berhasil menghapus data');
    }
}
