<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('nis');
            $table->string('nama');
            $table->string('jenis_kelamin');
            $table->string('alamat');
            $table->string('agama');
            $table->string('tingkat');
            $table->string('kelas');
            $table->string('tahun_ajaran');
            $table->string('semester');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siswa');
    }
};
