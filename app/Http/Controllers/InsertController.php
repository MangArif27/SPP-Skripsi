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

class InsertController extends Controller
{
    /* -------- Proses Insert User -------*/
    public function InsertPengguna(Request $request)
    {
        $Search = DB::table('users')->where('nip', $request->NIP)->first();
        if ($Search) {
            Session::flash('gagal', 'No Induk Pegawai Sudah Ada!');
            return redirect('/Data-Pengguna');
        } else {
            $Created_At = date('Y-m-d H:m:s');
            $Updated_At = date('Y-m-d H:m:s');
            $Password = Hash::make($request->Password);
            DB::table('users')->insert([
                'name' => $request->Nama,
                'nip' => $request->NIP,
                'jabatan' => $request->Jabatan,
                'pangkat' => $request->Pangkat,
                'level_user' => $request->LevelUser,
                'password' => $Password,
                'created_at' => $Created_At,
                'updated_at' => $Updated_At
            ]);
            Session::flash('sukses', 'Anda Berhasil Input Data!');
            return redirect('/Data-Pengguna');
        }
    }
    /* -------- Proses Import Siswa -------*/
    public function ImportSiswa(Request $request)
    {
        // validasi
        $this->validate($request, [
            'File' => 'required|mimes:csv,xls,xlsx'
        ]);
        // menangkap file excel
        $file = $request->file('File');
        // membuat nama file unik
        $nama_file = rand() . $file->getClientOriginalName();
        // upload ke folder file_siswa di dalam folder public
        $path = 'Backup_Restore';
        $file->move($path, $nama_file);
        // import data
        Excel::import(new ImportSiswa(), public_path('Backup_Restore/' . $nama_file));
        // notifikasi dengan session
        //Session::flash('sukses', 'Data Siswa Berhasil Diimport!');
        // alihkan halaman kembali
        return redirect('/Data-Siswa');
    }
    /* -------- Proses Insert Data Sekolah -------*/
    public function InsertSekolah(Request $request)
    {
        if ($request->Tahun_Ajaran == "InputBaru") {
            $TahunAjaran = $request->TahunAjaranBaru;
            DB::table('tahun_ajaran')->insert([
                'tahun_ajaran' => $TahunAjaran,
            ]);
        } else {
            $TahunAjaran = $request->Tahun_Ajaran;
        }
        //dd($request->NPSN);
        DB::table('pengaturan')->where('id', $request->NPSN)->update([
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
        return redirect('/Pengaturan');
    }
    /* -------- Proses Insert Data Tagihan -------*/
    public function InsertTagihan(Request $request)
    {
        /*Input Data Jenis Tagihan */
        $Search = DB::table('jenis_tagihan')->where('tahun_ajaran', $request->Tahun_Ajaran)->where('semester', $request->Semester)->where('tingkat', $request->Tingkat,)->first();
        if ($Search) {
            Session::flash('gagal', 'Data Tagihan Sudah Ada!');
            return redirect('/Data-Tagihan');
        } else {
            $CekSiswa = DB::table('siswa')->where('tahun_ajaran', $request->Tahun_Ajaran)->where('tingkat', $request->Tingkat)->where('semester', $request->Semester)->first();
            if ($CekSiswa > 0) {
                DB::table('jenis_tagihan')->insert([
                    'tahun_ajaran' => $request->Tahun_Ajaran,
                    'semester' => $request->Semester,
                    'tingkat' => $request->Tingkat,
                    'spp' => $request->SPP,
                    /*'ekstrakurikuler' => $request->Ekstrakurikuler,
                'sarpras' => $request->Sarpras,
                'buku_lks' => $request->Buku_LKS,
                'pas' => $request->PAS,
                'study_tour' => $request->Kunjungan,
                'pentas_seni' => $request->Pentas_Seni,
                'map_rapor' => $request->MAP_Rapor,
                'prakerin' => $request->Prakerin,
                'ldk' => $request->LDK,
                'kartu_pelajar' => $request->Kartu_Pelajar,*/
                ]);
                /*Input Data Pembayaran SPP */
                $Siswa = DB::table('siswa')->where('tahun_ajaran', $request->Tahun_Ajaran)->where('tingkat', $request->Tingkat)->where('semester', $request->Semester)->get();
                foreach ($Siswa as $Sw) {
                    $CreateDate = date('Y-m-d H:i:s');
                    DB::table('pembayaran_spp')->insert([
                        'id' => $Sw->id,
                        'nis' => $Sw->nis,
                        'tahun_ajaran' => $request->Tahun_Ajaran,
                        'semester' => $request->Semester,
                        'tingkat' => $request->Tingkat,
                        'keterangan' => "Belum Lunas",
                        'created_at' => $CreateDate,
                    ]);
                }
                Session::flash('sukses', 'Anda Berhasil Input Data!');
                return redirect('/Data-Tagihan');
            } else {
                Session::flash('gagal', 'Data Siswa Belum Ada !');
                return redirect('/Data-Tagihan');
            }
        }
    }
}
