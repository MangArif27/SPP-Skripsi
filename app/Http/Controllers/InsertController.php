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
    public function InsertSekolah(Request $request)
    {
        if ($request->Tahun_Ajaran == "InputBaru") {
            $TahunAjaran = $request->TahunAjaranBaru;
            DB::table('tahun_ajaran')->insert([
                'tahun_ajaran' => $TahunAjaran,
            ]);
        } else {
            $TahunAjaran = $request->TahunAjaran;
        }
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
}
