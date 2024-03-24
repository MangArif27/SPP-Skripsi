<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function Index()
    {
        return view('Page._HomePage');
    }
    public function Pengguna()
    {
        return view('Page._DataPengguna');
    }
    public function Siswa()
    {
        return view('Page._Datasiswa');
    }
    public function Pembayaran()
    {
        return view('Page._DataPembayaran');
    }
    public function Tagihan()
    {
        return view('Page._DataTagihan');
    }
    public function Pengaturan()
    {
        $Sekolah = DB::table('pengaturan')->get();
        $Tahun = DB::table('tahun_ajaran')->get();
        return view('Page._Pengaturan', ['Sekolah' => $Sekolah, 'Tahun' => $Tahun]);
    }
}
