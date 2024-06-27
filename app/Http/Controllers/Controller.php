<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
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
            $DataSemester[] = Pembayaran::where('spp_a', 'LIKE', "%" . $BulanJanuari . "%")->orWhere('spp_b', 'LIKE', "%" . $BulanJanuari . "%")->orWhere('spp_c', 'LIKE', "%" . $BulanJanuari . "%")->orWhere('spp_d', 'LIKE', "%" . $BulanJanuari . "%")->orWhere('spp_e', 'LIKE', "%" . $BulanJanuari . "%")->orWhere('spp_f', 'LIKE', "%" . $BulanJanuari . "%")->count();
            $DataSemester[] = Pembayaran::where('spp_a', 'LIKE', "%" . $BulanFebruari . "%")->orWhere('spp_b', 'LIKE', "%" . $BulanFebruari . "%")->orWhere('spp_c', 'LIKE', "%" . $BulanFebruari . "%")->orWhere('spp_d', 'LIKE', "%" . $BulanFebruari . "%")->orWhere('spp_e', 'LIKE', "%" . $BulanFebruari . "%")->orWhere('spp_f', 'LIKE', "%" . $BulanFebruari . "%")->count();
            $DataSemester[] = Pembayaran::where('spp_a', 'LIKE', "%" . $BulanMaret . "%")->orWhere('spp_b', 'LIKE', "%" . $BulanMaret . "%")->orWhere('spp_c', 'LIKE', "%" . $BulanMaret . "%")->orWhere('spp_d', 'LIKE', "%" . $BulanMaret . "%")->orWhere('spp_e', 'LIKE', "%" . $BulanMaret . "%")->orWhere('spp_f', 'LIKE', "%" . $BulanMaret . "%")->count();
            $DataSemester[] = Pembayaran::where('spp_a', 'LIKE', "%" . $BulanApril . "%")->orWhere('spp_b', 'LIKE', "%" . $BulanApril . "%")->orWhere('spp_c', 'LIKE', "%" . $BulanApril . "%")->orWhere('spp_d', 'LIKE', "%" . $BulanApril . "%")->orWhere('spp_e', 'LIKE', "%" . $BulanApril . "%")->orWhere('spp_f', 'LIKE', "%" . $BulanApril . "%")->count();
            $DataSemester[] = Pembayaran::where('spp_a', 'LIKE', "%" . $BulanMei . "%")->orWhere('spp_b', 'LIKE', "%" . $BulanMei . "%")->orWhere('spp_c', 'LIKE', "%" . $BulanMei . "%")->orWhere('spp_d', 'LIKE', "%" . $BulanMei . "%")->orWhere('spp_e', 'LIKE', "%" . $BulanMei . "%")->orWhere('spp_f', 'LIKE', "%" . $BulanMei . "%")->count();
            $DataSemester[] = Pembayaran::where('spp_a', 'LIKE', "%" . $BulanJuni . "%")->orWhere('spp_b', 'LIKE', "%" . $BulanJuni . "%")->orWhere('spp_c', 'LIKE', "%" . $BulanJuni . "%")->orWhere('spp_d', 'LIKE', "%" . $BulanJuni . "%")->orWhere('spp_e', 'LIKE', "%" . $BulanJuni . "%")->orWhere('spp_f', 'LIKE', "%" . $BulanJuni . "%")->count();
            $DataSemester[] = Pembayaran::where('spp_a', 'LIKE', "%" . $BulanJuli . "%")->orWhere('spp_b', 'LIKE', "%" . $BulanJuli . "%")->orWhere('spp_c', 'LIKE', "%" . $BulanJuli . "%")->orWhere('spp_d', 'LIKE', "%" . $BulanJuli . "%")->orWhere('spp_e', 'LIKE', "%" . $BulanJuli . "%")->orWhere('spp_f', 'LIKE', "%" . $BulanJuli . "%")->count();
            $DataSemester[] = Pembayaran::where('spp_a', 'LIKE', "%" . $BulanAgustus . "%")->orWhere('spp_b', 'LIKE', "%" . $BulanAgustus . "%")->orWhere('spp_c', 'LIKE', "%" . $BulanAgustus . "%")->orWhere('spp_d', 'LIKE', "%" . $BulanAgustus . "%")->orWhere('spp_e', 'LIKE', "%" . $BulanAgustus . "%")->orWhere('spp_f', 'LIKE', "%" . $BulanAgustus . "%")->count();
            $DataSemester[] = Pembayaran::where('spp_a', 'LIKE', "%" . $BulanSeptember . "%")->orWhere('spp_b', 'LIKE', "%" . $BulanSeptember . "%")->orWhere('spp_c', 'LIKE', "%" . $BulanSeptember . "%")->orWhere('spp_d', 'LIKE', "%" . $BulanSeptember . "%")->orWhere('spp_e', 'LIKE', "%" . $BulanSeptember . "%")->orWhere('spp_f', 'LIKE', "%" . $BulanSeptember . "%")->count();
            $DataSemester[] = Pembayaran::where('spp_a', 'LIKE', "%" . $BulanOktober . "%")->orWhere('spp_b', 'LIKE', "%" . $BulanOktober . "%")->orWhere('spp_c', 'LIKE', "%" . $BulanOktober . "%")->orWhere('spp_d', 'LIKE', "%" . $BulanOktober . "%")->orWhere('spp_e', 'LIKE', "%" . $BulanOktober . "%")->orWhere('spp_f', 'LIKE', "%" . $BulanOktober . "%")->count();
            $DataSemester[] = Pembayaran::where('spp_a', 'LIKE', "%" . $BulanNovember . "%")->orWhere('spp_b', 'LIKE', "%" . $BulanNovember . "%")->orWhere('spp_c', 'LIKE', "%" . $BulanNovember . "%")->orWhere('spp_d', 'LIKE', "%" . $BulanNovember . "%")->orWhere('spp_e', 'LIKE', "%" . $BulanNovember . "%")->orWhere('spp_f', 'LIKE', "%" . $BulanNovember . "%")->count();
            $DataSemester[] = Pembayaran::where('spp_a', 'LIKE', "%" . $BulanDesember . "%")->orWhere('spp_b', 'LIKE', "%" . $BulanDesember . "%")->orWhere('spp_c', 'LIKE', "%" . $BulanDesember . "%")->orWhere('spp_d', 'LIKE', "%" . $BulanDesember . "%")->orWhere('spp_e', 'LIKE', "%" . $BulanDesember . "%")->orWhere('spp_f', 'LIKE', "%" . $BulanDesember . "%")->count();
            $DataLunas = [];
            $DataLunas[] = Pembayaran::where('keterangan', 'Sudah Lunas')->where('updated_at', 'LIKE', "%" . $BulanJanuari . "%")->count();
            $DataLunas[] = Pembayaran::where('keterangan', 'Sudah Lunas')->where('updated_at', 'LIKE', "%" . $BulanFebruari . "%")->count();
            $DataLunas[] = Pembayaran::where('keterangan', 'Sudah Lunas')->where('updated_at', 'LIKE', "%" . $BulanMaret . "%")->count();
            $DataLunas[] = Pembayaran::where('keterangan', 'Sudah Lunas')->where('updated_at', 'LIKE', "%" . $BulanApril . "%")->count();
            $DataLunas[] = Pembayaran::where('keterangan', 'Sudah Lunas')->where('updated_at', 'LIKE', "%" . $BulanMei . "%")->count();
            $DataLunas[] = Pembayaran::where('keterangan', 'Sudah Lunas')->where('updated_at', 'LIKE', "%" . $BulanJuni . "%")->count();
            $DataLunas[] = Pembayaran::where('keterangan', 'Sudah Lunas')->where('updated_at', 'LIKE', "%" . $BulanJuli . "%")->count();
            $DataLunas[] = Pembayaran::where('keterangan', 'Sudah Lunas')->where('updated_at', 'LIKE', "%" . $BulanAgustus . "%")->count();
            $DataLunas[] = Pembayaran::where('keterangan', 'Sudah Lunas')->where('updated_at', 'LIKE', "%" . $BulanSeptember . "%")->count();
            $DataLunas[] = Pembayaran::where('keterangan', 'Sudah Lunas')->where('updated_at', 'LIKE', "%" . $BulanOktober . "%")->count();
            $DataLunas[] = Pembayaran::where('keterangan', 'Sudah Lunas')->where('updated_at', 'LIKE', "%" . $BulanNovember . "%")->count();
            $DataLunas[] = Pembayaran::where('keterangan', 'Sudah Lunas')->where('updated_at', 'LIKE', "%" . $BulanDesember . "%")->count();

            //dd($DataSemesterGanjil);
            return view('Page._HomePage', ['DataSemester' => $DataSemester, 'BulanSemester' => $BulanSemester, 'DataLunas' => $DataLunas]);
        }
    }
}
