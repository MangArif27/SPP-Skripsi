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
        Schema::create('jenis_tagihan', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('tahun_ajaran');
            $table->string('semester');
            $table->string('tingkat');
            $table->string('spp');
            $table->string('ekstrakurikuler');
            $table->string('sarpras');
            $table->string('buku_lks');
            $table->string('pas');
            $table->string('study_tour');
            $table->string('pentas_seni');
            $table->string('map_rapor');
            $table->string('prakerin');
            $table->string('ldk');
            $table->string('kartu_pelajar');
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
        Schema::dropIfExists('jenis_tagihan');
    }
};
