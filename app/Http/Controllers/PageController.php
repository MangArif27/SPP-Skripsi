<?php

namespace App\Http\Controllers;

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
}
