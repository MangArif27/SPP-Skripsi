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
        Schema::create('pengaturan', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('sekolah');
            $table->text('alamat');
            $table->string('telpon');
            $table->string('faximile');
            $table->string('email');
            $table->string('website');
            $table->string('nama_kepsek');
            $table->string('nama_bendahara');
            $table->string('jumlah_kejuruan');
            $table->string('jumlah_gtk');
            $table->string('jumlah_kelas');
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
        Schema::dropIfExists('pengaturan');
    }
};
