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
            $table->string('id', 8)->primary();
            $table->string('sekolah', 20);
            $table->text('alamat');
            $table->string('telpon', 13);
            $table->string('faximile', 13);
            $table->string('email', 55);
            $table->string('website', 55);
            $table->string('nama_kepsek', 55);
            $table->string('nama_bendahara', 55);
            $table->string('jumlah_kejuruan', 2);
            $table->string('jumlah_gtk', 3);
            $table->string('jumlah_kelas', 3);
            $table->string('tahun_ajaran', 9)->index();
            $table->string('semester', 15);
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
