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
        Schema::create('rak', function (Blueprint $table) {
            $table->id('id_rak');
            $table->string('nama_rak');
            $table->timestamps();
            $table->unsignedBigInteger('id_ruang');
            $table->foreign('id_ruang')->references('id_ruang')->on('ruang');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rak');
    }
};
