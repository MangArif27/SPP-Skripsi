<?php

namespace App\Http\Controllers;

use App\Models\ModelSiswa;
use App\Imports\ImportSiswa;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use PHPUnit\Framework\Constraint\IsNull;

use function PHPUnit\Framework\isNull;

class UpdateController extends Controller
{
    /* -------- Proses Update User -------*/
    public function UpdatePengguna(Request $request)
    {
        $Updated_At = date('Y-m-d H:m:s');
        $Password = Hash::make($request->Password);
        DB::table('users')->where('nip', $request->NIP)->update([
            'name' => $request->Nama,
            'jabatan' => $request->Jabatan,
            'pangkat' => $request->Pangkat,
            'level_user' => $request->LevelUser,
            'password' => $Password,
            'updated_at' => $Updated_At
        ]);
        Session::flash('sukses', 'Anda Berhasil Update Data!');
        return redirect('/Data-Pengguna');
    }
    /* -------- Proses Update Siswa -------*/
    public function UpdateSiswa(Request $request)
    {
        $Updated_At = date('Y-m-d H:m:s');
        DB::table('siswa')->where('id', $request->Id)->update([
            'nama' => $request->Nama,
            'jenis_kelamin' => $request->Jenis_Kelamin,
            'status' => $request->Status,
            'alamat' => $request->Alamat,
            'tingkat' => $request->Tingkat,
            'kelas' => $request->Kelas,
            'tahun_ajaran' => $request->Tahun_Ajaran,
            'semester' => $request->Semester,
            'updated_at' => $Updated_At
        ]);
        Session::flash('sukses', 'Anda Berhasil Update Data!');
        return redirect('/Data-Siswa');
    }
    /* -------- Proses Update Pembayaran -------*/
    public function UpdatePembayaran(Request $request)
    {
        $CreateDate = date('Y-m-d');
        $Search = DB::table('pembayaran_spp')->where('tahun_ajaran', $request->TahunAjaran)->where('semester', $request->Semester)->where('nis', $request->Nis)->get();
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
            DB::table('pembayaran_spp')->where('tahun_ajaran', $request->TahunAjaran)->where('semester', $request->Semester)->where('nis', $request->Nis)->update([
                'spp_a' => $SPPBayar1,
                'spp_b' => $SPPBayar2,
                'spp_c' => $SPPBayar3,
                'spp_d' => $SPPBayar4,
                'spp_e' => $SPPBayar5,
                'spp_f' => $SPPBayar6,
            ]);
            $Keterangan = DB::table('pembayaran_spp')->where('tahun_ajaran', $request->TahunAjaran)->where('semester', $request->Semester)->where('nis', $request->Nis)->get();
            foreach ($Keterangan as $Ket) {
                if ($Ket->spp_a == NULL || $Ket->spp_b == NULL || $Ket->spp_c == NULL || $Ket->spp_d == NULL || $Ket->spp_e == NULL || $Ket->spp_f == NULL) {
                    Session::flash('sukses', 'Selamat Anda Berhasil Melakukan Pembayaran !');
                    return redirect('/Data-Pembayaran');
                } else {
                    $UpdatedDate = date('Y-m-d H:i:s');
                    DB::table('pembayaran_spp')->where('tahun_ajaran', $request->TahunAjaran)->where('semester', $request->Semester)->where('nis', $request->Nis)->update([
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
        $Search = DB::table('pembayaran_spp')->where('tahun_ajaran', $request->TahunAjaran)->where('semester', $request->Semester)->where('nis', $request->Nis)->get();
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
            DB::table('pembayaran_spp')->where('tahun_ajaran', $request->TahunAjaran)->where('semester', $request->Semester)->where('nis', $request->Nis)->update([
                'spp_a' => $SPPBayar1,
                'spp_b' => $SPPBayar2,
                'spp_c' => $SPPBayar3,
                'spp_d' => $SPPBayar4,
                'spp_e' => $SPPBayar5,
                'spp_f' => $SPPBayar6,
            ]);
            $Keterangan = DB::table('pembayaran_spp')->where('tahun_ajaran', $request->TahunAjaran)->where('semester', $request->Semester)->where('nis', $request->Nis)->get();
            foreach ($Keterangan as $Ket) {
                if ($Ket->spp_a == NULL || $Ket->spp_b == NULL || $Ket->spp_c == NULL || $Ket->spp_d == NULL || $Ket->spp_e == NULL || $Ket->spp_f == NULL) {
                    Session::flash('sukses', 'Selamat Anda Berhasil Melakukan Pembayaran !');
                    return redirect('/Data-Tunggakan');
                } else {
                    $UpdatedDate = date('Y-m-d H:i:s');
                    DB::table('pembayaran_spp')->where('tahun_ajaran', $request->TahunAjaran)->where('semester', $request->Semester)->where('nis', $request->Nis)->update([
                        'keterangan' => "Sudah Lunas",
                        'updated_at' => $UpdatedDate,
                    ]);
                    Session::flash('sukses', 'Selamat Anda Berhasil Melakukan Pembayaran !');
                    return redirect('/Data-Pembayaran');
                }
            }
        }
    }
    /* -------- Proses Update Tagihan -------*/
    public function UpdateTagihan(Request $request)
    {
        DB::table('jenis_tagihan')->where('tahun_ajaran', $request->Tahun_Ajaran)->where('semester', $request->Semester)->where('tingkat', $request->Tingkat)->update([
            'spp' => $request->SPP,
        ]);
        $Tagihan = DB::table('jenis_tagihan')->where('tahun_ajaran', $request->Tahun_Ajaran)->where('tingkat', $request->Tingkat)->where('semester', $request->Semester)->get();
        foreach ($Tagihan as $JT) {
            $Siswa = DB::table('siswa')->where('tahun_ajaran', $request->Tahun_Ajaran)->where('tingkat', $request->Tingkat)->where('semester', $request->Semester)->get();
            foreach ($Siswa as $Sw) {
                $Pembayaran = DB::table('pembayaran_spp')->where('id_siswa', $Sw->id)->first();
                if ($Pembayaran) {
                } else {

                    $CreateDate = date('Y-m-d H:i:s');
                    DB::table('pembayaran_spp')->insert([
                        'id_siswa' => $Sw->id,
                        'id_tagihan' => $JT->id,
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
