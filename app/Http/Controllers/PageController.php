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
        $Search = DB::table('pengaturan')->get();
        foreach ($Search as $SC) {
            $Siswa = DB::table('siswa')->where('semester', $SC->semester)->where('tahun_ajaran', $SC->tahun_ajaran)->get();
        }
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
    public function Kwitansi()
    {
        return view('Page._Kwitansi');
    }
    public function CetakKwitansi(Request $request)
    {
        $Pembayaran = DB::table('pembayaran_spp')->where('tahun_ajaran', $request->TahunAjaran)->where('semester', $request->Semester)->where('nis', $request->Nis)->get();
        //dd($PembayaranSPP);
        return view('Page._Kwitansi', ['Pembayaran' => $Pembayaran]);
    }
    public function Tunggakan()
    {
        $Search = DB::table('pengaturan')->get();
        foreach ($Search as $SC) {
            $Tunggakan = DB::table('pembayaran_spp')->where('keterangan', 'Belum Lunas')->where('tahun_ajaran', '!=', $SC->tahun_ajaran)->orWhere('semester', '!=', $SC->semester)->get()->groupBy('nis');
        }
        return view('Page._DataTunggakan', ['Tunggakan' => $Tunggakan]);
    }
    public function test()
    {
        $Siswa = DB::table('siswa')->where('nis', '19100198')->select('nama')->groupBy('nama')->get();
        dd($Siswa);
    }
}
