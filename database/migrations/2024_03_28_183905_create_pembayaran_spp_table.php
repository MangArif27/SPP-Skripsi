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
            $table->bigInteger('id_siswa', 20)->index();
            $table->bigInteger('id_tagihan', 20)->index();
            $table->string('nis', 11);
            $table->string('tahun_ajaran', 9);
            $table->string('semester', 15);
            $table->string('tingkat', 3);
            $table->date('spp_a')->NULL;
            $table->date('spp_b')->NULL;
            $table->date('spp_c')->NULL;
            $table->date('spp_d')->NULL;
            $table->date('spp_e')->NULL;
            $table->date('spp_f')->NULL;
            $table->string('keterangan', 11);
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
