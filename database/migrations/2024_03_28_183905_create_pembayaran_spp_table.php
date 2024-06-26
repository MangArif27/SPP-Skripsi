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
            $table->integer('id_tagihan', 20)->index();
            $table->string('nis', 11)->index();
            $table->string('tahun_ajaran', 9);
            $table->string('semester', 15);
            $table->string('tingkat', 3);
            $table->date('spp_a');
            $table->date('spp_b');
            $table->date('spp_c');
            $table->date('spp_d');
            $table->date('spp_e');
            $table->date('spp_f');
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
