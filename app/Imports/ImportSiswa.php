<?php

namespace App\Imports;

use App\Models\ModelSiswa;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportSiswa implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new ModelSiswa([
            'nis' => $row[1],
            'nama' => $row[2],
            'jenis_kelamin' => $row[3],
            'alamat' => $row[4],
            'agama' => $row[5],
            'tingkat' => $row[6],
            'kelas' => $row[7],
        ]);
    }
}
