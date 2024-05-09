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
        $BulanJanuari = date('Y-01');
        $BulanFebruari = date('Y-02');
        $BulanMaret = date('Y-03');
        $BulanApril = date('Y-04');
        $BulanMei = date('Y-05');
        $BulanJuni = date('Y-06');
        $BulanJuli = date('Y-07');
        $BulanAgustus = date('Y-08');
        $BulanSeptember = date('Y-09');
        $BulanOktober = date('Y-10');
        $BulanNovember = date('Y-11');
        $BulanDesember = date('Y-12');
        $BulanSemesterGanjil = [$BulanJuli, $BulanAgustus, $BulanSeptember, $BulanOktober, $BulanNovember, $BulanDesember];
        $BulanSemesterGenap = [$BulanJanuari, $BulanFebruari, $BulanMaret, $BulanApril, $BulanMei, $BulanJuni];
        $DataSemesterGanjil = [];
        $DataSemesterGanjil[] = DB::table('pembayaran_spp')->where('spp_a', 'LIKE', "%" . $BulanJuli . "%")->orWhere('spp_b', 'LIKE', "%" . $BulanJuli . "%")->orWhere('spp_c', 'LIKE', "%" . $BulanJuli . "%")->orWhere('spp_d', 'LIKE', "%" . $BulanJuli . "%")->orWhere('spp_e', 'LIKE', "%" . $BulanJuli . "%")->orWhere('spp_f', 'LIKE', "%" . $BulanJuli . "%")->count();
        $DataSemesterGanjil[] = DB::table('pembayaran_spp')->where('spp_a', 'LIKE', "%" . $BulanAgustus . "%")->orWhere('spp_b', 'LIKE', "%" . $BulanAgustus . "%")->orWhere('spp_c', 'LIKE', "%" . $BulanAgustus . "%")->orWhere('spp_d', 'LIKE', "%" . $BulanAgustus . "%")->orWhere('spp_e', 'LIKE', "%" . $BulanAgustus . "%")->orWhere('spp_f', 'LIKE', "%" . $BulanAgustus . "%")->count();
        $DataSemesterGanjil[] = DB::table('pembayaran_spp')->where('spp_a', 'LIKE', "%" . $BulanSeptember . "%")->orWhere('spp_b', 'LIKE', "%" . $BulanSeptember . "%")->orWhere('spp_c', 'LIKE', "%" . $BulanSeptember . "%")->orWhere('spp_d', 'LIKE', "%" . $BulanSeptember . "%")->orWhere('spp_e', 'LIKE', "%" . $BulanSeptember . "%")->orWhere('spp_f', 'LIKE', "%" . $BulanSeptember . "%")->count();
        $DataSemesterGanjil[] = DB::table('pembayaran_spp')->where('spp_a', 'LIKE', "%" . $BulanOktober . "%")->orWhere('spp_b', 'LIKE', "%" . $BulanOktober . "%")->orWhere('spp_c', 'LIKE', "%" . $BulanOktober . "%")->orWhere('spp_d', 'LIKE', "%" . $BulanOktober . "%")->orWhere('spp_e', 'LIKE', "%" . $BulanOktober . "%")->orWhere('spp_f', 'LIKE', "%" . $BulanOktober . "%")->count();
        $DataSemesterGanjil[] = DB::table('pembayaran_spp')->where('spp_a', 'LIKE', "%" . $BulanNovember . "%")->orWhere('spp_b', 'LIKE', "%" . $BulanNovember . "%")->orWhere('spp_c', 'LIKE', "%" . $BulanNovember . "%")->orWhere('spp_d', 'LIKE', "%" . $BulanNovember . "%")->orWhere('spp_e', 'LIKE', "%" . $BulanNovember . "%")->orWhere('spp_f', 'LIKE', "%" . $BulanNovember . "%")->count();
        $DataSemesterGanjil[] = DB::table('pembayaran_spp')->where('spp_a', 'LIKE', "%" . $BulanDesember . "%")->orWhere('spp_b', 'LIKE', "%" . $BulanDesember . "%")->orWhere('spp_c', 'LIKE', "%" . $BulanDesember . "%")->orWhere('spp_d', 'LIKE', "%" . $BulanDesember . "%")->orWhere('spp_e', 'LIKE', "%" . $BulanDesember . "%")->orWhere('spp_f', 'LIKE', "%" . $BulanDesember . "%")->count();
        $DataSemesterGenap = [];
        $DataSemesterGenap[] = DB::table('pembayaran_spp')->where('spp_a', 'LIKE', "%" . $BulanJanuari . "%")->orWhere('spp_b', 'LIKE', "%" . $BulanJanuari . "%")->orWhere('spp_c', 'LIKE', "%" . $BulanJanuari . "%")->orWhere('spp_d', 'LIKE', "%" . $BulanJanuari . "%")->orWhere('spp_e', 'LIKE', "%" . $BulanJanuari . "%")->orWhere('spp_f', 'LIKE', "%" . $BulanJanuari . "%")->count();
        $DataSemesterGenap[] = DB::table('pembayaran_spp')->where('spp_a', 'LIKE', "%" . $BulanFebruari . "%")->orWhere('spp_b', 'LIKE', "%" . $BulanFebruari . "%")->orWhere('spp_c', 'LIKE', "%" . $BulanFebruari . "%")->orWhere('spp_d', 'LIKE', "%" . $BulanFebruari . "%")->orWhere('spp_e', 'LIKE', "%" . $BulanFebruari . "%")->orWhere('spp_f', 'LIKE', "%" . $BulanFebruari . "%")->count();
        $DataSemesterGenap[] = DB::table('pembayaran_spp')->where('spp_a', 'LIKE', "%" . $BulanMaret . "%")->orWhere('spp_b', 'LIKE', "%" . $BulanMaret . "%")->orWhere('spp_c', 'LIKE', "%" . $BulanMaret . "%")->orWhere('spp_d', 'LIKE', "%" . $BulanMaret . "%")->orWhere('spp_e', 'LIKE', "%" . $BulanMaret . "%")->orWhere('spp_f', 'LIKE', "%" . $BulanMaret . "%")->count();
        $DataSemesterGenap[] = DB::table('pembayaran_spp')->where('spp_a', 'LIKE', "%" . $BulanApril . "%")->orWhere('spp_b', 'LIKE', "%" . $BulanApril . "%")->orWhere('spp_c', 'LIKE', "%" . $BulanApril . "%")->orWhere('spp_d', 'LIKE', "%" . $BulanApril . "%")->orWhere('spp_e', 'LIKE', "%" . $BulanApril . "%")->orWhere('spp_f', 'LIKE', "%" . $BulanApril . "%")->count();
        $DataSemesterGenap[] = DB::table('pembayaran_spp')->where('spp_a', 'LIKE', "%" . $BulanMei . "%")->orWhere('spp_b', 'LIKE', "%" . $BulanMei . "%")->orWhere('spp_c', 'LIKE', "%" . $BulanMei . "%")->orWhere('spp_d', 'LIKE', "%" . $BulanMei . "%")->orWhere('spp_e', 'LIKE', "%" . $BulanMei . "%")->orWhere('spp_f', 'LIKE', "%" . $BulanMei . "%")->count();
        $DataSemesterGenap[] = DB::table('pembayaran_spp')->where('spp_a', 'LIKE', "%" . $BulanJuni . "%")->orWhere('spp_b', 'LIKE', "%" . $BulanJuni . "%")->orWhere('spp_c', 'LIKE', "%" . $BulanJuni . "%")->orWhere('spp_d', 'LIKE', "%" . $BulanJuni . "%")->orWhere('spp_e', 'LIKE', "%" . $BulanJuni . "%")->orWhere('spp_f', 'LIKE', "%" . $BulanJuni . "%")->count();
        $DataLunasSemesterGenap = [];
        $DataLunasSemesterGenap[] = DB::table('pembayaran_spp')->where('keterangan', 'Sudah Lunas')->where('updated_at', 'LIKE', "%" . $BulanJanuari . "%")->count();
        $DataLunasSemesterGenap[] = DB::table('pembayaran_spp')->where('keterangan', 'Sudah Lunas')->where('updated_at', 'LIKE', "%" . $BulanFebruari . "%")->count();
        $DataLunasSemesterGenap[] = DB::table('pembayaran_spp')->where('keterangan', 'Sudah Lunas')->where('updated_at', 'LIKE', "%" . $BulanMaret . "%")->count();
        $DataLunasSemesterGenap[] = DB::table('pembayaran_spp')->where('keterangan', 'Sudah Lunas')->where('updated_at', 'LIKE', "%" . $BulanApril . "%")->count();
        $DataLunasSemesterGenap[] = DB::table('pembayaran_spp')->where('keterangan', 'Sudah Lunas')->where('updated_at', 'LIKE', "%" . $BulanMei . "%")->count();
        $DataLunasSemesterGenap[] = DB::table('pembayaran_spp')->where('keterangan', 'Sudah Lunas')->where('updated_at', 'LIKE', "%" . $BulanJuni . "%")->count();
        $DataLunasSemesterGanjil = [];
        $DataLunasSemesterGanjil[] = DB::table('pembayaran_spp')->where('keterangan', 'Sudah Lunas')->where('updated_at', 'LIKE', "%" . $BulanJuli . "%")->count();
        $DataLunasSemesterGanjil[] = DB::table('pembayaran_spp')->where('keterangan', 'Sudah Lunas')->where('updated_at', 'LIKE', "%" . $BulanAgustus . "%")->count();
        $DataLunasSemesterGanjil[] = DB::table('pembayaran_spp')->where('keterangan', 'Sudah Lunas')->where('updated_at', 'LIKE', "%" . $BulanSeptember . "%")->count();
        $DataLunasSemesterGanjil[] = DB::table('pembayaran_spp')->where('keterangan', 'Sudah Lunas')->where('updated_at', 'LIKE', "%" . $BulanOktober . "%")->count();
        $DataLunasSemesterGanjil[] = DB::table('pembayaran_spp')->where('keterangan', 'Sudah Lunas')->where('updated_at', 'LIKE', "%" . $BulanNovember . "%")->count();
        $DataLunasSemesterGanjil[] = DB::table('pembayaran_spp')->where('keterangan', 'Sudah Lunas')->where('updated_at', 'LIKE', "%" . $BulanDesember . "%")->count();

        //dd($DataSemesterGenap, $BulanSemesterGenap);
        return view('Page._HomePage', ['DataSemesterGanjil' => $DataSemesterGanjil, 'BulanSemesterGanjil' => $BulanSemesterGanjil, 'DataSemesterGenap' => $DataSemesterGenap, 'BulanSemesterGenap' => $BulanSemesterGenap, 'DataLunasSemesterGanjil' => $DataLunasSemesterGanjil, 'DataLunasSemesterGenap' => $DataLunasSemesterGenap]);
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
        $Search = DB::table('pengaturan')->get();
        foreach ($Search as $SC) {
            $Tunggakan = DB::table('pembayaran_spp')->where('tahun_ajaran', '!=', $SC->tahun_ajaran)->orWhere('semester', '!=', $SC->semester)->get()->groupBy('nis');
        }
        //dd($Tunggakan);
        return view('Page._DataKwitansi', ['Tunggakan' => $Tunggakan]);
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
            $Tunggakan = DB::table('pembayaran_spp')->where('keterangan', 'Belum Lunas')->Where('tahun_ajaran', '!=', $SC->tahun_ajaran)->orWhere('semester', '!=', $SC->semester)->get()->groupBy('nis');
        }
        //dd($Tunggakan);
        return view('Page._DataTunggakan', ['Tunggakan' => $Tunggakan]);
    }
}
