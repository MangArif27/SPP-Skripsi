<?php

namespace App\Http\Controllers;

use App\Models\LaporanPembayaran;
use App\Exports\Laporan;
use Maatwebsite\Excel\Facades\Excel;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PageController extends Controller
{
    public function Index()
    {
        if (!Session::get('login')) {
            return redirect('Login');
        } else {
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
            $BulanSemester = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
            $DataSemester = [];
            $DataSemester[] = DB::table('pembayaran_spp')->where('spp_a', 'LIKE', "%" . $BulanJanuari . "%")->orWhere('spp_b', 'LIKE', "%" . $BulanJanuari . "%")->orWhere('spp_c', 'LIKE', "%" . $BulanJanuari . "%")->orWhere('spp_d', 'LIKE', "%" . $BulanJanuari . "%")->orWhere('spp_e', 'LIKE', "%" . $BulanJanuari . "%")->orWhere('spp_f', 'LIKE', "%" . $BulanJanuari . "%")->count();
            $DataSemester[] = DB::table('pembayaran_spp')->where('spp_a', 'LIKE', "%" . $BulanFebruari . "%")->orWhere('spp_b', 'LIKE', "%" . $BulanFebruari . "%")->orWhere('spp_c', 'LIKE', "%" . $BulanFebruari . "%")->orWhere('spp_d', 'LIKE', "%" . $BulanFebruari . "%")->orWhere('spp_e', 'LIKE', "%" . $BulanFebruari . "%")->orWhere('spp_f', 'LIKE', "%" . $BulanFebruari . "%")->count();
            $DataSemester[] = DB::table('pembayaran_spp')->where('spp_a', 'LIKE', "%" . $BulanMaret . "%")->orWhere('spp_b', 'LIKE', "%" . $BulanMaret . "%")->orWhere('spp_c', 'LIKE', "%" . $BulanMaret . "%")->orWhere('spp_d', 'LIKE', "%" . $BulanMaret . "%")->orWhere('spp_e', 'LIKE', "%" . $BulanMaret . "%")->orWhere('spp_f', 'LIKE', "%" . $BulanMaret . "%")->count();
            $DataSemester[] = DB::table('pembayaran_spp')->where('spp_a', 'LIKE', "%" . $BulanApril . "%")->orWhere('spp_b', 'LIKE', "%" . $BulanApril . "%")->orWhere('spp_c', 'LIKE', "%" . $BulanApril . "%")->orWhere('spp_d', 'LIKE', "%" . $BulanApril . "%")->orWhere('spp_e', 'LIKE', "%" . $BulanApril . "%")->orWhere('spp_f', 'LIKE', "%" . $BulanApril . "%")->count();
            $DataSemester[] = DB::table('pembayaran_spp')->where('spp_a', 'LIKE', "%" . $BulanMei . "%")->orWhere('spp_b', 'LIKE', "%" . $BulanMei . "%")->orWhere('spp_c', 'LIKE', "%" . $BulanMei . "%")->orWhere('spp_d', 'LIKE', "%" . $BulanMei . "%")->orWhere('spp_e', 'LIKE', "%" . $BulanMei . "%")->orWhere('spp_f', 'LIKE', "%" . $BulanMei . "%")->count();
            $DataSemester[] = DB::table('pembayaran_spp')->where('spp_a', 'LIKE', "%" . $BulanJuni . "%")->orWhere('spp_b', 'LIKE', "%" . $BulanJuni . "%")->orWhere('spp_c', 'LIKE', "%" . $BulanJuni . "%")->orWhere('spp_d', 'LIKE', "%" . $BulanJuni . "%")->orWhere('spp_e', 'LIKE', "%" . $BulanJuni . "%")->orWhere('spp_f', 'LIKE', "%" . $BulanJuni . "%")->count();
            $DataSemester[] = DB::table('pembayaran_spp')->where('spp_a', 'LIKE', "%" . $BulanJuli . "%")->orWhere('spp_b', 'LIKE', "%" . $BulanJuli . "%")->orWhere('spp_c', 'LIKE', "%" . $BulanJuli . "%")->orWhere('spp_d', 'LIKE', "%" . $BulanJuli . "%")->orWhere('spp_e', 'LIKE', "%" . $BulanJuli . "%")->orWhere('spp_f', 'LIKE', "%" . $BulanJuli . "%")->count();
            $DataSemester[] = DB::table('pembayaran_spp')->where('spp_a', 'LIKE', "%" . $BulanAgustus . "%")->orWhere('spp_b', 'LIKE', "%" . $BulanAgustus . "%")->orWhere('spp_c', 'LIKE', "%" . $BulanAgustus . "%")->orWhere('spp_d', 'LIKE', "%" . $BulanAgustus . "%")->orWhere('spp_e', 'LIKE', "%" . $BulanAgustus . "%")->orWhere('spp_f', 'LIKE', "%" . $BulanAgustus . "%")->count();
            $DataSemester[] = DB::table('pembayaran_spp')->where('spp_a', 'LIKE', "%" . $BulanSeptember . "%")->orWhere('spp_b', 'LIKE', "%" . $BulanSeptember . "%")->orWhere('spp_c', 'LIKE', "%" . $BulanSeptember . "%")->orWhere('spp_d', 'LIKE', "%" . $BulanSeptember . "%")->orWhere('spp_e', 'LIKE', "%" . $BulanSeptember . "%")->orWhere('spp_f', 'LIKE', "%" . $BulanSeptember . "%")->count();
            $DataSemester[] = DB::table('pembayaran_spp')->where('spp_a', 'LIKE', "%" . $BulanOktober . "%")->orWhere('spp_b', 'LIKE', "%" . $BulanOktober . "%")->orWhere('spp_c', 'LIKE', "%" . $BulanOktober . "%")->orWhere('spp_d', 'LIKE', "%" . $BulanOktober . "%")->orWhere('spp_e', 'LIKE', "%" . $BulanOktober . "%")->orWhere('spp_f', 'LIKE', "%" . $BulanOktober . "%")->count();
            $DataSemester[] = DB::table('pembayaran_spp')->where('spp_a', 'LIKE', "%" . $BulanNovember . "%")->orWhere('spp_b', 'LIKE', "%" . $BulanNovember . "%")->orWhere('spp_c', 'LIKE', "%" . $BulanNovember . "%")->orWhere('spp_d', 'LIKE', "%" . $BulanNovember . "%")->orWhere('spp_e', 'LIKE', "%" . $BulanNovember . "%")->orWhere('spp_f', 'LIKE', "%" . $BulanNovember . "%")->count();
            $DataSemester[] = DB::table('pembayaran_spp')->where('spp_a', 'LIKE', "%" . $BulanDesember . "%")->orWhere('spp_b', 'LIKE', "%" . $BulanDesember . "%")->orWhere('spp_c', 'LIKE', "%" . $BulanDesember . "%")->orWhere('spp_d', 'LIKE', "%" . $BulanDesember . "%")->orWhere('spp_e', 'LIKE', "%" . $BulanDesember . "%")->orWhere('spp_f', 'LIKE', "%" . $BulanDesember . "%")->count();
            $DataLunas = [];
            $DataLunas[] = DB::table('pembayaran_spp')->where('keterangan', 'Sudah Lunas')->where('updated_at', 'LIKE', "%" . $BulanJanuari . "%")->count();
            $DataLunas[] = DB::table('pembayaran_spp')->where('keterangan', 'Sudah Lunas')->where('updated_at', 'LIKE', "%" . $BulanFebruari . "%")->count();
            $DataLunas[] = DB::table('pembayaran_spp')->where('keterangan', 'Sudah Lunas')->where('updated_at', 'LIKE', "%" . $BulanMaret . "%")->count();
            $DataLunas[] = DB::table('pembayaran_spp')->where('keterangan', 'Sudah Lunas')->where('updated_at', 'LIKE', "%" . $BulanApril . "%")->count();
            $DataLunas[] = DB::table('pembayaran_spp')->where('keterangan', 'Sudah Lunas')->where('updated_at', 'LIKE', "%" . $BulanMei . "%")->count();
            $DataLunas[] = DB::table('pembayaran_spp')->where('keterangan', 'Sudah Lunas')->where('updated_at', 'LIKE', "%" . $BulanJuni . "%")->count();
            $DataLunas[] = DB::table('pembayaran_spp')->where('keterangan', 'Sudah Lunas')->where('updated_at', 'LIKE', "%" . $BulanJuli . "%")->count();
            $DataLunas[] = DB::table('pembayaran_spp')->where('keterangan', 'Sudah Lunas')->where('updated_at', 'LIKE', "%" . $BulanAgustus . "%")->count();
            $DataLunas[] = DB::table('pembayaran_spp')->where('keterangan', 'Sudah Lunas')->where('updated_at', 'LIKE', "%" . $BulanSeptember . "%")->count();
            $DataLunas[] = DB::table('pembayaran_spp')->where('keterangan', 'Sudah Lunas')->where('updated_at', 'LIKE', "%" . $BulanOktober . "%")->count();
            $DataLunas[] = DB::table('pembayaran_spp')->where('keterangan', 'Sudah Lunas')->where('updated_at', 'LIKE', "%" . $BulanNovember . "%")->count();
            $DataLunas[] = DB::table('pembayaran_spp')->where('keterangan', 'Sudah Lunas')->where('updated_at', 'LIKE', "%" . $BulanDesember . "%")->count();

            //dd($DataSemesterGanjil);
            return view('Page._HomePage', ['DataSemester' => $DataSemester, 'BulanSemester' => $BulanSemester, 'DataLunas' => $DataLunas]);
        }
    }
    public function Pengguna()
    {
        if (!Session::get('login')) {
            return redirect('Login');
        } else {
            if (Session::get('level_user') == "Admin") {
                $Pengguna = DB::table('users')->get();
                return view('Page._DataPengguna', ['Pengguna' => $Pengguna, 'GetPengguna' => $Pengguna]);
            } else {
                Session::flash('gagal', 'Maaf Anda Tidak Berhak Mengakses Halaman Data Pengguna');
                return redirect('/');
            }
        }
    }
    public function Siswa()
    {
        if (!Session::get('login')) {
            return redirect('Login');
        } else {
            $Search = DB::table('pengaturan')->get();
            foreach ($Search as $SC) {
                $Siswa = DB::table('siswa')->where('tahun_ajaran', $SC->tahun_ajaran)->get();
            }
            return view('Page._DataSiswa', ['Siswa' => $Siswa, 'LihatSiswa' => $Siswa]);
        }
    }
    public function Pembayaran()
    {
        if (!Session::get('login')) {
            return redirect('Login');
        } else {
            $Search = DB::table('pengaturan')->get();
            foreach ($Search as $SC) {
                $PembayaranSPP = DB::table('pembayaran_spp')->where('tahun_ajaran', $SC->tahun_ajaran)->where('semester', $SC->semester)->get();
            }
            //dd($PembayaranSPP);
            return view('Page._DataPembayaran', ['PembayaranSPP' => $PembayaranSPP, 'GetPembayaran' => $PembayaranSPP]);
        }
    }
    public function Tagihan()
    {
        if (!Session::get('login')) {
            return redirect('Login');
        } else {
            $JenisTagihan = DB::table('jenis_tagihan')->get();
            return view('Page._DataTagihan', ['JenisTagihan' => $JenisTagihan]);
        }
    }
    public function Kwitansi()
    {
        if (!Session::get('login')) {
            return redirect('Login');
        } else {
            $Search = DB::table('pengaturan')->get();
            foreach ($Search as $SC) {
                $Tunggakan = DB::table('pembayaran_spp')->get()->groupBy('nis');
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
            $Pembayaran = DB::table('pembayaran_spp')->where('id_pembayaran', $id)->get();
            //dd($PembayaranSPP);
            return view('Page._Kwitansi', ['Pembayaran' => $Pembayaran]);
        }
    }
    public function Tunggakan()
    {
        if (!Session::get('login')) {
            return redirect('Login');
        } else {
            $Search = DB::table('pengaturan')->get();
            foreach ($Search as $SC) {
                $Tunggakan = DB::table('pembayaran_spp')->where('keterangan', 'Belum Lunas')->Where('tahun_ajaran', '!=', $SC->tahun_ajaran)->orWhere('semester', '!=', $SC->semester)->get()->groupBy('nis');
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
                $data = DB::table('pembayaran_spp')->join('siswa', 'pembayaran_spp.nis', '=', 'siswa.nis')->get();
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
                $data = DB::table('siswa')->where('tahun_ajaran', $request->TahunAjaran)->where('tingkat', $request->Tingkat)->where('kelas', $request->Kelas)->get();
                return view('Page._Export_Excel', ['DataTahunAjaran' => $request->TahunAjaran, 'DataTingkat' => $request->Tingkat, 'DataKelas' => $request->Kelas]);
            } else {
                $data = DB::table('siswa')->where('tahun_ajaran', $request->TahunAjaran)->where('tingkat', $request->Tingkat)->where('kelas', $request->Kelas)->get();
                $pdf = PDF::loadview('Page._Export_Pdf', ['DataTahunAjaran' => $request->TahunAjaran, 'DataTingkat' => $request->Tingkat, 'DataKelas' => $request->Kelas])->setPaper('legal', 'landscape');
                return $pdf->download('ExportLaporanPembayaran - ' . $Date . '.pdf');
            }
        } else {
            if ($request->JenisFile == "Excel") {
                $data = DB::table('siswa')->where('tahun_ajaran', $request->TahunAjaran)->where('tingkat', "XII")->where('kelas', $request->Kelas)->get();
                return view('Page._Export_Excel', ['DataTahunAjaran' => $request->TahunAjaran, 'DataTingkat' => "XII", 'DataKelas' => $request->Kelas]);
            } else {
                $data = DB::table('siswa')->where('tahun_ajaran', $request->TahunAjaran)->where('tingkat', "XII")->where('kelas', $request->Kelas)->get();
                $pdf = PDF::loadview('Page._Export_Pdf', ['DataTahunAjaran' => $request->TahunAjaran, 'DataTingkat' => "XII", 'DataKelas' => $request->Kelas])->setPaper('legal', 'landscape');
                return $pdf->download('ExportLaporanPembayaran - ' . $Date . '.pdf');
            }
        }
    }
    public function Pengaturan()
    {
        if (!Session::get('login')) {
            return redirect('Login');
        } else {
            if (Session::get('level_user') == "Admin") {
                $Sekolah = DB::table('pengaturan')->get();
                $Tahun = DB::table('tahun_ajaran')->get();
                return view('Page._Pengaturan', ['Sekolah' => $Sekolah, 'Tahun' => $Tahun]);
            } else {
                Session::flash('gagal', 'Maaf Anda Tidak Berhak Mengakses Halaman Data Pembayaran');
                return redirect('/');
            }
        }
    }
    public function Test()
    {
        return DataTables::of(DB::table('pembayaran_spp')->join('siswa', 'pembayaran_spp.id', '=', 'siswa.id')->get()->groupBy('nis'))->toJson();
    }
    /* ------------ Controller Login dan Logout -------------------- */
    public function Login()
    {
        return view('Partials._Login');
    }
    public function LoginPost(Request $request)
    {
        $nip = $request->nip;
        $password = $request->password;
        $Updated_At = date('Y-m-d H:m:s');
        $data = DB::table('users')->where('nip', $nip)->first();
        if ($data) {
            if (Hash::check($password, $data->password)) {
                Session::put('nama', $data->name);
                Session::put('nip', $data->nip);
                Session::put('jabatan', $data->jabatan);
                Session::put('pangkat', $data->pangkat);
                Session::put('level_user', $data->level_user);
                Session::put('login', TRUE);
                DB::table('users')->where('nip', $request->nip)->update([
                    'updated_at' => $Updated_At
                ]);
                return redirect('/');
            }
            Session::flash('gagal', 'Password atau No Induk Pegawai anda salah !');
            return redirect('/Login');
        } else {
            Session::flash('gagal', 'Password atau No Induk Pegawai anda salah !');
            return redirect('/Login');
        }
    }
    public function Logout()
    {
        Session::flush();
        Session::flash('sukses', 'Anda Telah Berhasil Logout, Terima Kasih !');
        return redirect('Login')->with('alert', 'Kamu sudah logout');
    }
}
