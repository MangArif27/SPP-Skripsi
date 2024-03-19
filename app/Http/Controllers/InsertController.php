<?php

namespace App\Http\Controllers;

use App\Models\ModelSiswa;
use App\Imports\ImportSiswa;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

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
}
