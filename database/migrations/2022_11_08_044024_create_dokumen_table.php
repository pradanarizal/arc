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
        Schema::create('dokumen', function (Blueprint $table) {
            $table->id('no_dokumen');
            $table->enum('status_dokumen', ['Dipinjam', 'Tersedia','Pengarsipan','Retensi','Rejected']);
            $table->string('divisi');
            $table->string('nama_dokumen');
            $table->string('tahun_dokumen');
            $table->text('deskripsi');
            $table->dateTime('tgl_upload');
            $table->timestamps();
        });
        Schema::table('dokumen', function (Blueprint $table) {
            $table->unsignedBigInteger('id_ruang')->nullable();
            $table->foreign('id_ruang')->references('id_ruang')->on('ruang');
        });
        Schema::table('dokumen', function (Blueprint $table) {
            $table->unsignedBigInteger('id_rak')->nullable();
            $table->foreign('id_rak')->references('id_rak')->on('rak');
        });
        Schema::table('dokumen', function (Blueprint $table) {
            $table->unsignedBigInteger('id_box')->nullable();
            $table->foreign('id_box')->references('id_box')->on('box');
        });
        Schema::table('dokumen', function (Blueprint $table) {
            $table->unsignedBigInteger('id_map')->nullable();
            $table->foreign('id_map')->references('id_map')->on('map');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dokumen');
    }
};
