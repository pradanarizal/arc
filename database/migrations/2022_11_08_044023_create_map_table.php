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
        Schema::create('map', function (Blueprint $table) {
            $table->id('id_map');
            $table->string('nama_map');

            //Relasi table box
            $table->unsignedBigInteger('id_box');
            $table->foreign('id_box')->references('id_box')->on('box')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            //Relasi table box
            $table->unsignedBigInteger('id_rak');
            $table->foreign('id_rak')->references('id_rak')->on('rak')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            //Relasi table box
            $table->unsignedBigInteger('id_ruang');
            $table->foreign('id_ruang')->references('id_ruang')->on('ruang')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            //timestamp
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
        Schema::dropIfExists('map');
    }
};
