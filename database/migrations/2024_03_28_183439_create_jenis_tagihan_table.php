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
            $table->string('tahun_ajaran', 9)->index();
            $table->string('semester', 15);
            $table->string('tingkat', 3);
            $table->string('spp', 7);
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
