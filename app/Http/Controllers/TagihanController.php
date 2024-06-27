<?php

namespace App\Http\Controllers;

use App\Models\Tagihan;
use App\Models\LaporanPembayaran;
use App\Exports\Laporan;
use App\Models\ModelSiswa;
use App\Models\Pembayaran;
use Maatwebsite\Excel\Facades\Excel;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TagihanController extends Controller
{
    public function Tagihan()
    {
        if (!Session::get('login')) {
            return redirect('Login');
        } else {
            $JenisTagihan = Tagihan::get();
            return view('Page._DataTagihan', ['JenisTagihan' => $JenisTagihan]);
        }
    }
    /* -------- Proses Insert Data Tagihan -------*/
    public function InsertTagihan(Request $request)
    {
        /*Input Data Jenis Tagihan */
        $Search = Tagihan::where('tahun_ajaran', $request->Tahun_Ajaran)->where('semester', $request->Semester)->where('tingkat', $request->Tingkat,)->first();
        if ($Search) {
            Session::flash('gagal', 'Data Tagihan Sudah Ada!');
            return redirect('/Data-Tagihan');
        } else {
            $CekSiswa = ModelSiswa::where('tahun_ajaran', $request->Tahun_Ajaran)->where('tingkat', $request->Tingkat)->first();
            if ($CekSiswa) {
                Tagihan::insert([
                    'tahun_ajaran' => $request->Tahun_Ajaran,
                    'semester' => $request->Semester,
                    'tingkat' => $request->Tingkat,
                    'spp' => $request->SPP,
                ]);
                /*Input Data Pembayaran SPP */
                $Tagihan = Tagihan::where('tahun_ajaran', $request->Tahun_Ajaran)->where('tingkat', $request->Tingkat)->where('semester', $request->Semester)->get();
                foreach ($Tagihan as $JT) {
                    $Siswa = ModelSiswa::where('tahun_ajaran', $request->Tahun_Ajaran)->where('tingkat', $request->Tingkat)->get();
                    foreach ($Siswa as $Sw) {
                        $CreateDate = date('Y-m-d H:i:s');
                        Pembayaran::insert([
                            'id_tagihan' => $JT->id_tagihan,
                            'nis' => $Sw->nis,
                            'tahun_ajaran' => $request->Tahun_Ajaran,
                            'semester' => $request->Semester,
                            'tingkat' => $request->Tingkat,
                            'keterangan' => "Belum Lunas",
                            'created_at' => $CreateDate,
                        ]);
                    }
                }
                Session::flash('sukses', 'Anda Berhasil Input Data!');
                return redirect('/Data-Tagihan');
            } else {
                Session::flash('gagal', 'Data Siswa Belum Ada !');
                return redirect('/Data-Tagihan');
            }
        }
    }
    /* -------- Proses Update Tagihan -------*/
    public function UpdateTagihan(Request $request)
    {
        Tagihan::where('tahun_ajaran', $request->Tahun_Ajaran)->where('semester', $request->Semester)->where('tingkat', $request->Tingkat)->update([
            'spp' => $request->SPP,
        ]);
        $Tagihan = Tagihan::where('tahun_ajaran', $request->Tahun_Ajaran)->where('tingkat', $request->Tingkat)->where('semester', $request->Semester)->get();
        foreach ($Tagihan as $JT) {
            $Siswa = ModelSiswa::where('tahun_ajaran', $request->Tahun_Ajaran)->where('tingkat', $request->Tingkat)->get();
            foreach ($Siswa as $Sw) {
                $Pembayaran = Pembayaran::where('nis', $Sw->nis)->where('tahun_ajaran', $request->Tahun_Ajaran)->where('semester', $request->Semester)->first();
                if ($Pembayaran) {
                } else {
                    $CreateDate = date('Y-m-d H:i:s');
                    Pembayaran::insert([
                        'id_tagihan' => $JT->id_tagihan,
                        'nis' => $Sw->nis,
                        'tahun_ajaran' => $request->Tahun_Ajaran,
                        'semester' => $request->Semester,
                        'tingkat' => $request->Tingkat,
                        'keterangan' => "Belum Lunas",
                        'created_at' => $CreateDate,
                    ]);
                }
            }
        }
        Session::flash('sukses', 'Anda Berhasil Update Data!');
        return redirect('/Data-Tagihan');
    }
}
