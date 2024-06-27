<?php

namespace App\Http\Controllers;

use App\Imports\ImportSiswa;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\ModelSiswa;
use App\Models\Pengaturan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SiswaController extends Controller
{
    public function Siswa()
    {
        if (!Session::get('login')) {
            return redirect('Login');
        } else {
            $Siswa = ModelSiswa::where('status', "Aktif")->get();
            return view('Page._DataSiswa', ['Siswa' => $Siswa, 'LihatSiswa' => $Siswa]);
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
        //$path = 'Backup_Restore';
        //$file->move($path, $nama_file);
        // import data
        $array = Excel::toArray(new ImportSiswa(), $file);
        $no = 0;
        $TahunAjaran = Pengaturan::where('id_sekolah', '20258060')->get();
        foreach ($TahunAjaran as $Pengaturan) {
            foreach ($array as $key => &$value) {
                foreach ($value as $v) {
                    $date = date('Y-m-d H:i:s');
                    $cek = ModelSiswa::where('nis', $v[1])->first();
                    if ($cek) {
                        ModelSiswa::where('nis', $v[1])->update([
                            'nama' => $v[2],
                            'jenis_kelamin' => $v[3],
                            'alamat' => $v[4],
                            'agama' => $v[5],
                            'tingkat' => $v[6],
                            'kelas' => $v[7],
                            'updated_at' => $date,
                        ]);
                    } else {
                        ModelSiswa::insert([
                            'nis' => $v[1],
                            'nama' => $v[2],
                            'jenis_kelamin' => $v[3],
                            'alamat' => $v[4],
                            'agama' => $v[5],
                            'tingkat' => $v[6],
                            'kelas' => $v[7],
                            'tahun_ajaran' => $Pengaturan->tahun_ajaran,
                            'status' => "Aktif",
                            'created_at' => $date,
                        ]);
                    }
                }
            }
        }
        //File::delete(public_path('Backup_Restore/' . $nama_file));
        // notifikasi dengan session
        Session::flash('sukses', 'Data Siswa Berhasil Diimport!');
        // alihkan halaman kembali
        return redirect('/Data-Siswa');
    }
    /* -------- Proses Update Siswa -------*/
    public function UpdateSiswa(Request $request)
    {
        $Updated_At = date('Y-m-d H:m:s');
        ModelSiswa::where('nis', $request->NIS)->update([
            'nama' => $request->Nama,
            'jenis_kelamin' => $request->Jenis_Kelamin,
            'status' => $request->Status,
            'alamat' => $request->Alamat,
            'tingkat' => $request->Tingkat,
            'kelas' => $request->Kelas,
            'tahun_ajaran' => $request->Tahun_Ajaran,
            'updated_at' => $Updated_At
        ]);
        Session::flash('sukses', 'Anda Berhasil Update Data!');
        return redirect('/Data-Siswa');
    }
}
