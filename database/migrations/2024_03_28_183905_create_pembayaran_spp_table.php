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
        Schema::create('pembayaran_spp', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('nis');
            $table->string('tahun_ajaran');
            $table->string('semester');
            $table->string('tingkat');
            $table->string('spp_a')->NULL;
            $table->string('spp_b')->NULL;
            $table->string('spp_c')->NULL;
            $table->string('spp_d')->NULL;
            $table->string('spp_e')->NULL;
            $table->string('spp_f')->NULL;
            $table->string('keterangan');
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
        Schema::dropIfExists('pembayaran_spp');
    }
};
