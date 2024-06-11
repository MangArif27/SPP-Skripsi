<?php

namespace App\Exports;

use App\Models\LaporanPembayaran;
use Maatwebsite\Excel\Concerns\FromCollection;

class Laporan implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return LaporanPembayaran::all();
    }
}
