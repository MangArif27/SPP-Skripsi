<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelSiswa extends Model
{
    protected $table = 'siswa';
    protected $fillable = ['nis', 'nama', 'jenis_kelamin', 'alamat', 'agama', 'tingkat', 'kelas', 'tahun_ajaran', 'semester'];
}
