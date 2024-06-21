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
            $table->string('nis', 11);
            $table->string('nama', 55);
            $table->string('jenis_kelamin', 9);
            $table->text('alamat');
            $table->string('agama', 9);
            $table->string('tingkat', 3);
            $table->string('kelas', 5);
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
        Schema::dropIfExists('siswa');
    }
};
