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
        Schema::create('box', function (Blueprint $table) {
            $table->id('id_box');
            $table->string('nama_box');

            //Relasi table box
            $table->unsignedBigInteger('id_rak');
            $table->foreign('id_rak')
                ->references('id_rak')
                ->on('rak')
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
        Schema::dropIfExists('box');
    }
};
