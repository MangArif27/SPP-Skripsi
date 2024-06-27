<?php

namespace App\Http\Controllers;

use App\Models\ModelSiswa;
use App\Models\Pembayaran;
use App\Models\Pengaturan;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PembayaranController extends Controller
{
    public function Pembayaran()
    {
        if (!Session::get('login')) {
            return redirect('Login');
        } else {
            $Search = Pengaturan::get();
            foreach ($Search as $SC) {
                $PembayaranSPP = Pembayaran::where('tahun_ajaran', $SC->tahun_ajaran)->where('semester', $SC->semester)->get();
            }
            //dd($PembayaranSPP);
            return view('Page._DataPembayaran', ['PembayaranSPP' => $PembayaranSPP, 'GetPembayaran' => $PembayaranSPP]);
        }
    }
    public function Kwitansi()
    {
        if (!Session::get('login')) {
            return redirect('Login');
        } else {
            $Search = Pengaturan::get();
            foreach ($Search as $SC) {
                $Tunggakan = Pembayaran::get()->groupBy('nis');
            }
            //dd($Tunggakan);
            return view('Page._DataKwitansi', ['Tunggakan' => $Tunggakan]);
        }
    }
    public function CetakKwitansi($id)
    {
        if (!Session::get('login')) {
            return redirect('Login');
        } else {
            $Pembayaran = Pembayaran::where('id_pembayaran', $id)->get();
            //dd($PembayaranSPP);
            return view('Page._Kwitansi', ['Pembayaran' => $Pembayaran]);
        }
    }
    public function Tunggakan()
    {
        if (!Session::get('login')) {
            return redirect('Login');
        } else {
            $Search = Pengaturan::get();
            foreach ($Search as $SC) {
                $Tunggakan = Pembayaran::where('keterangan', 'Belum Lunas')->Where('tahun_ajaran', '!=', $SC->tahun_ajaran)->orWhere('semester', '!=', $SC->semester)->get()->groupBy('nis');
            }
            //dd($Tunggakan);
            return view('Page._DataTunggakan', ['Tunggakan' => $Tunggakan]);
        }
    }
    public function Laporan()
    {
        if (!Session::get('login')) {
            return redirect('Login');
        } else {
            if (request()->ajax()) {
                $data = Pembayaran::join('siswa', 'pembayaran_spp.nis', '=', 'siswa.nis')->get();
                return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($data) {
                        $button =   '<button type="button" class="btn btn-warning btn-mini waves-effect waves-light" data-toggle="modal" data-target="#CetakBuktiId' . $data->id_pembayaran . '"><i class="icofont icofont-eye"></i> Lihat Data </button>';
                        return $button;
                    })
                    ->toJson();
            }
            return view('Page._DataLaporan');
        }
    }
    public function ExportLaporanPembayaran(Request $request)
    {
        $Date = date('Y-m-d H:i:s');
        if ($request->StatusSiswa == "Aktif") {
            if ($request->JenisFile == "Excel") {
                $data = ModelSiswa::where('tahun_ajaran', $request->TahunAjaran)->where('tingkat', $request->Tingkat)->where('kelas', $request->Kelas)->get();
                return view('Page._Export_Excel', ['DataTahunAjaran' => $request->TahunAjaran, 'DataTingkat' => $request->Tingkat, 'DataKelas' => $request->Kelas]);
            } else {
                $data = ModelSiswa::where('tahun_ajaran', $request->TahunAjaran)->where('tingkat', $request->Tingkat)->where('kelas', $request->Kelas)->get();
                $pdf = PDF::loadview('Page._Export_Pdf', ['DataTahunAjaran' => $request->TahunAjaran, 'DataTingkat' => $request->Tingkat, 'DataKelas' => $request->Kelas])->setPaper('legal', 'landscape');
                return $pdf->download('ExportLaporanPembayaran - ' . $Date . '.pdf');
            }
        } elseif ($request->StatusSiswa == "Lulus") {
            if ($request->JenisFile == "Excel") {
                $data = ModelSiswa::where('tahun_ajaran', $request->TahunAjaran)->where('tingkat', "XII")->where('kelas', $request->Kelas)->get();
                return view('Page._Export_Excel', ['DataTahunAjaran' => $request->TahunAjaran, 'DataTingkat' => "XII", 'DataKelas' => $request->Kelas]);
            } else {
                $data = ModelSiswa::where('tahun_ajaran', $request->TahunAjaran)->where('tingkat', "XII")->where('kelas', $request->Kelas)->get();
                $pdf = PDF::loadview('Page._Export_Pdf', ['DataTahunAjaran' => $request->TahunAjaran, 'DataTingkat' => "XII", 'DataKelas' => $request->Kelas])->setPaper('legal', 'landscape');
                return $pdf->download('ExportLaporanPembayaran - ' . $Date . '.pdf');
            }
        } else {
            if ($request->JenisFile == "Excel") {
                if ($request->Kelas == "Semua") {
                    $data = ModelSiswa::where('tahun_ajaran', $request->TahunAjaran)->where('tingkat', $request->Tingkat)->where('status', "Keluar")->get();
                    return view('Page._Export_Excel_Keluar', ['DataTahunAjaran' => $request->TahunAjaran, 'DataTingkat' => $request->Tingkat, 'Data' => $data]);
                } else {
                    $data = ModelSiswa::where('tahun_ajaran', $request->TahunAjaran)->where('tingkat', $request->Tingkat)->where('status', "Keluar")->where('kelas', $request->Kelas)->get();
                    return view('Page._Export_Excel', ['DataTahunAjaran' => $request->TahunAjaran, 'DataTingkat' => $request->Tingkat, 'DataKelas' => $request->Kelas, 'Data' => $data]);
                }
            } else {
                if ($request->Kelas == "Semua") {
                    $data = ModelSiswa::where('tahun_ajaran', $request->TahunAjaran)->where('tingkat', $request->Tingkat)->where('status', "Keluar")->get();
                    $pdf = PDF::loadview('Page._Export_Pdf_Keluar', ['DataTahunAjaran' => $request->TahunAjaran, 'DataTingkat' => $request->Tingkat, 'DataKelas' => $request->Kelas, 'Data' => $data])->setPaper('legal', 'landscape');
                    return $pdf->download('ExportLaporanPembayaran - ' . $Date . '.pdf');
                } else {
                    $data = ModelSiswa::where('tahun_ajaran', $request->TahunAjaran)->where('tingkat', $request->Tingkat)->where('status', "Keluar")->where('kelas', $request->Kelas)->get();
                    $pdf = PDF::loadview('Page._Export_Pdf', ['DataTahunAjaran' => $request->TahunAjaran, 'DataTingkat' => $request->Tingkat, 'DataKelas' => $request->Kelas, 'Data' => $data])->setPaper('legal', 'landscape');
                    return $pdf->download('ExportLaporanPembayaran - ' . $Date . '.pdf');
                }
            }
        }
    }
    /* -------- Proses Update Pembayaran -------*/
    public function UpdatePembayaran(Request $request)
    {
        $CreateDate = date('Y-m-d');
        $Search = Pembayaran::where('tahun_ajaran', $request->TahunAjaran)->where('semester', $request->Semester)->where('nis', $request->Nis)->get();
        foreach ($Search as $SC) {
            if (empty($request->SPPBayar1)) {
                $SPPBayar1 = NULL;
            } else {
                if ($SC->spp_a == NULL) {
                    $SPPBayar1 = $CreateDate;
                } else {
                    $SPPBayar1 = $SC->spp_a;
                }
            }
            if (empty($request->SPPBayar2)) {
                $SPPBayar2 = NULL;
            } else {
                if ($SC->spp_b == NULL) {
                    $SPPBayar2 = $CreateDate;
                } else {
                    $SPPBayar2 = $SC->spp_b;
                }
            }
            if (empty($request->SPPBayar3)) {
                $SPPBayar3 = NULL;
            } else {
                if ($SC->spp_c == NULL) {
                    $SPPBayar3 = $CreateDate;
                } else {
                    $SPPBayar3 = $SC->spp_c;
                }
            }
            if (empty($request->SPPBayar4)) {
                $SPPBayar4 = NULL;
            } else {
                if ($SC->spp_d == NULL) {
                    $SPPBayar4 = $CreateDate;
                } else {
                    $SPPBayar4 = $SC->spp_d;
                }
            }
            if (empty($request->SPPBayar5)) {
                $SPPBayar5 = NULL;
            } else {
                if ($SC->spp_e == NULL) {
                    $SPPBayar5 = $CreateDate;
                } else {
                    $SPPBayar5 = $SC->spp_e;
                }
            }
            if (empty($request->SPPBayar6)) {
                $SPPBayar6 = NULL;
            } else {
                if ($SC->spp_f == NULL) {
                    $SPPBayar6 = $CreateDate;
                } else {
                    $SPPBayar6 = $SC->spp_f;
                }
            }
            Pembayaran::where('tahun_ajaran', $request->TahunAjaran)->where('semester', $request->Semester)->where('nis', $request->Nis)->update([
                'spp_a' => $SPPBayar1,
                'spp_b' => $SPPBayar2,
                'spp_c' => $SPPBayar3,
                'spp_d' => $SPPBayar4,
                'spp_e' => $SPPBayar5,
                'spp_f' => $SPPBayar6,
            ]);
            $Keterangan = Pembayaran::where('tahun_ajaran', $request->TahunAjaran)->where('semester', $request->Semester)->where('nis', $request->Nis)->get();
            foreach ($Keterangan as $Ket) {
                if ($Ket->spp_a == NULL || $Ket->spp_b == NULL || $Ket->spp_c == NULL || $Ket->spp_d == NULL || $Ket->spp_e == NULL || $Ket->spp_f == NULL) {
                    Session::flash('sukses', 'Selamat Anda Berhasil Melakukan Pembayaran !');
                    return redirect('/Data-Pembayaran');
                } else {
                    $UpdatedDate = date('Y-m-d H:i:s');
                    Pembayaran::where('tahun_ajaran', $request->TahunAjaran)->where('semester', $request->Semester)->where('nis', $request->Nis)->update([
                        'keterangan' => "Sudah Lunas",
                        'updated_at' => $UpdatedDate,
                    ]);
                    Session::flash('sukses', 'Selamat Anda Berhasil Melakukan Pembayaran !');
                    return redirect('/Data-Pembayaran');
                }
            }
        }
    }
    /* -------- Proses Update Tunggakan -------*/
    public function UpdateTunggakan(Request $request)
    {
        /*Input Pembayaran*/
        $CreateDate = date('Y-m-d');
        $Search = Pembayaran::where('tahun_ajaran', $request->TahunAjaran)->where('semester', $request->Semester)->where('nis', $request->Nis)->get();
        foreach ($Search as $SC) {
            if (empty($request->SPPBayar1)) {
                $SPPBayar1 = NULL;
            } else {
                if ($SC->spp_a == NULL) {
                    $SPPBayar1 = $CreateDate;
                } else {
                    $SPPBayar1 = $SC->spp_a;
                }
            }
            if (empty($request->SPPBayar2)) {
                $SPPBayar2 = NULL;
            } else {
                if ($SC->spp_b == NULL) {
                    $SPPBayar2 = $CreateDate;
                } else {
                    $SPPBayar2 = $SC->spp_b;
                }
            }
            if (empty($request->SPPBayar3)) {
                $SPPBayar3 = NULL;
            } else {
                if ($SC->spp_c == NULL) {
                    $SPPBayar3 = $CreateDate;
                } else {
                    $SPPBayar3 = $SC->spp_c;
                }
            }
            if (empty($request->SPPBayar4)) {
                $SPPBayar4 = NULL;
            } else {
                if ($SC->spp_d == NULL) {
                    $SPPBayar4 = $CreateDate;
                } else {
                    $SPPBayar4 = $SC->spp_d;
                }
            }
            if (empty($request->SPPBayar5)) {
                $SPPBayar5 = NULL;
            } else {
                if ($SC->spp_e == NULL) {
                    $SPPBayar5 = $CreateDate;
                } else {
                    $SPPBayar5 = $SC->spp_e;
                }
            }
            if (empty($request->SPPBayar6)) {
                $SPPBayar6 = NULL;
            } else {
                if ($SC->spp_f == NULL) {
                    $SPPBayar6 = $CreateDate;
                } else {
                    $SPPBayar6 = $SC->spp_f;
                }
            }
            Pembayaran::where('tahun_ajaran', $request->TahunAjaran)->where('semester', $request->Semester)->where('nis', $request->Nis)->update([
                'spp_a' => $SPPBayar1,
                'spp_b' => $SPPBayar2,
                'spp_c' => $SPPBayar3,
                'spp_d' => $SPPBayar4,
                'spp_e' => $SPPBayar5,
                'spp_f' => $SPPBayar6,
            ]);
            $Keterangan = Pembayaran::where('tahun_ajaran', $request->TahunAjaran)->where('semester', $request->Semester)->where('nis', $request->Nis)->get();
            foreach ($Keterangan as $Ket) {
                if ($Ket->spp_a == NULL || $Ket->spp_b == NULL || $Ket->spp_c == NULL || $Ket->spp_d == NULL || $Ket->spp_e == NULL || $Ket->spp_f == NULL) {
                    Session::flash('sukses', 'Selamat Anda Berhasil Melakukan Pembayaran !');
                    return redirect('/Data-Tunggakan');
                } else {
                    $UpdatedDate = date('Y-m-d H:i:s');
                    Pembayaran::where('tahun_ajaran', $request->TahunAjaran)->where('semester', $request->Semester)->where('nis', $request->Nis)->update([
                        'keterangan' => "Sudah Lunas",
                        'updated_at' => $UpdatedDate,
                    ]);
                    Session::flash('sukses', 'Selamat Anda Berhasil Melakukan Pembayaran !');
                    return redirect('/Data-Tunggakan');
                }
            }
        }
    }
}
