<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function Pengguna()
    {
        if (!Session::get('login')) {
            return redirect('Login');
        } else {
            if (Session::get('level_user') == "Admin") {
                $Pengguna = User::get();
                return view('Page._DataPengguna', ['Pengguna' => $Pengguna, 'GetPengguna' => $Pengguna]);
            } else {
                Session::flash('gagal', 'Maaf Anda Tidak Berhak Mengakses Halaman Data Pengguna');
                return redirect('/');
            }
        }
    }
    /* -------- Proses Insert User -------*/
    public function InsertPengguna(Request $request)
    {
        $Search = User::where('nip', $request->NIP)->first();
        if ($Search) {
            Session::flash('gagal', 'No Induk Pegawai Sudah Ada!');
            return redirect('/Data-Pengguna');
        } else {
            $Created_At = date('Y-m-d H:m:s');
            $Updated_At = date('Y-m-d H:m:s');
            $Password = Hash::make($request->Password);
            User::insert([
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
    /* -------- Proses Update User -------*/
    public function UpdatePengguna(Request $request)
    {
        $Updated_At = date('Y-m-d H:m:s');
        $Password = Hash::make($request->Password);
        User::where('nip', $request->NIP)->update([
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
    public function DeletePengguna($Nip)
    {
        User::where('nip', $Nip)->delete();
        Session::flash('sukses', 'Selamat anda berhasil menghapus data');
    }
    public function Login()
    {
        return view('Partials._Login');
    }
    public function LoginPost(Request $request)
    {
        $nip = $request->nip;
        $password = $request->password;
        $Updated_At = date('Y-m-d H:m:s');
        $data = User::where('nip', $nip)->first();
        if ($data) {
            if (Hash::check($password, $data->password)) {
                Session::put('nama', $data->name);
                Session::put('nip', $data->nip);
                Session::put('jabatan', $data->jabatan);
                Session::put('pangkat', $data->pangkat);
                Session::put('level_user', $data->level_user);
                Session::put('login', TRUE);
                User::where('nip', $request->nip)->update([
                    'updated_at' => $Updated_At
                ]);
                return redirect('/');
            }
            Session::flash('gagal', 'Password anda salah !');
            return redirect('/Login');
        } else {
            Session::flash('gagal', 'No Induk Pegawai anda salah !');
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
