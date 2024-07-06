<?php

namespace App\Http\Controllers;

use App\Models\ModelSiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Pengaturan;
use App\Models\Tahun_Ajaran;

class PengaturanController extends Controller
{
    public function Pengaturan()
    {
        if (!Session::get('login')) {
            return redirect('Login');
        } else {
            if (Session::get('level_user') == "Admin") {
                $Sekolah = Pengaturan::get();
                $Tahun = Tahun_Ajaran::get();
                return view('Page._Pengaturan', ['Sekolah' => $Sekolah, 'Tahun' => $Tahun]);
            } else {
                Session::flash('gagal', 'Maaf Anda Tidak Berhak Mengakses Halaman Data Pembayaran');
                return redirect('/');
            }
        }
    }
    /* -------- Proses Insert Data Sekolah -------*/
    public function InsertSekolah(Request $request)
    {
        if ($request->Tahun_Ajaran == "InputBaru") {
            if (empty($request->TahunAjaranBaru)) {
                Session::flash('gagal', 'Data Gagal Di Update, Tahun Ajaran Wajib Diisi!');
                return redirect('/Pengaturan');
            } else {
                $TahunAjaran = $request->TahunAjaranBaru;
                Tahun_Ajaran::insert([
                    'tahun_ajaran' => $TahunAjaran,
                ]);
            }

            /* -------- Proses Generate Naik Kelas -------*/
            $Search = Pengaturan::where('id_pengaturan', $request->NPSN)->get();
            foreach ($Search as $SC) {
                if ($SC->tahun_ajaran < $TahunAjaran) {
                    $SearchSiswa = ModelSiswa::get();
                    foreach ($SearchSiswa as $Siswa) {
                        if ($Siswa->status == "Keluar") {
                            ModelSiswa::where('nis', $Siswa->nis)->where('tingkat', "XII")->update([
                                'status' => "Lulus",
                            ]);
                        } else {
                            if ($Siswa->tingkat == "XII") {
                                ModelSiswa::where('nis', $Siswa->nis)->update([
                                    'status' => "Lulus",
                                ]);
                            } elseif ($Siswa->tingkat == "XI") {
                                ModelSiswa::where('nis', $Siswa->nis)->where('tingkat', "XI")->update([
                                    'tingkat' => "XII",
                                    'tahun_ajaran' => $TahunAjaran,
                                ]);
                            } else {
                                ModelSiswa::where('nis', $Siswa->nis)->where('tingkat', "X")->update([
                                    'tingkat' => "XI",
                                    'tahun_ajaran' => $TahunAjaran,
                                ]);
                            }
                        }
                    }
                }
            }
        } else {
            $TahunAjaran = $request->Tahun_Ajaran;
        }
        //dd($request->NPSN);
        Pengaturan::where('id_pengaturan', $request->NPSN)->update([
            'sekolah' => $request->Nama_Sekolah,
            'alamat' => $request->Alamat,
            'telpon' => $request->Telp,
            'faximile' => $request->Fax,
            'email' => $request->Email,
            'website' => $request->Website,
            'nama_kepsek' => $request->Nama_Kepsek,
            'nama_bendahara' => $request->Nama_Bendahara,
            'jumlah_kejuruan' => $request->Jumlah_Kejuruan,
            'jumlah_gtk' => $request->Jumlah_GTK,
            'jumlah_kelas' => $request->Jumlah_Kelas,
            'tahun_ajaran' => $TahunAjaran,
            'semester' => $request->Semester,
        ]);
        Session::flash('suskes', 'Selamat Data Profile Sekolah Telah Berhasil di Update');
        return redirect('/Pengaturan');
    }
}
