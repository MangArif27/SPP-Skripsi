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
        $Siswa = DB::table('siswa')->get();
        return view('Page._Datasiswa', ['Siswa' => $Siswa]);
    }
    public function Pembayaran()
    {
        $Search = DB::table('pengaturan')->get();
        foreach ($Search as $SC) {
            $PembayaranSPP = DB::table('pembayaran_spp')->where('tahun_ajaran', $SC->tahun_ajaran)->where('semester', $SC->semester)->get();
        }
        //dd($PembayaranSPP);
        return view('Page._DataPembayaran', ['PembayaranSPP' => $PembayaranSPP]);
    }
    public function Tagihan()
    {
        $JenisTagihan = DB::table('jenis_tagihan')->get();
        return view('Page._DataTagihan', ['JenisTagihan' => $JenisTagihan]);
    }
    public function Pengaturan()
    {
        $Sekolah = DB::table('pengaturan')->get();
        $Tahun = DB::table('tahun_ajaran')->get();
        return view('Page._Pengaturan', ['Sekolah' => $Sekolah, 'Tahun' => $Tahun]);
    }
}
