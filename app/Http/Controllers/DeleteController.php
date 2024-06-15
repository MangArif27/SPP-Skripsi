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
        $Seacrh = DB::table('jenis_tagihan')->where('id', $Id)->get();
        foreach ($Seacrh as $Seacrh) {
            DB::table('pembayaran_spp')->where('tahun_ajaran', $Seacrh->tahun_ajaran)->where('semester', $Seacrh->semester)->where('tingkat', $Seacrh->tingkat)->delete();
        }
        DB::table('jenis_tagihan')->where('id', $Id)->delete();
        Session::flash('sukses', 'Selamat anda berhasil menghapus data');
    }
}
