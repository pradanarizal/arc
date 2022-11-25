<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Validation\Rules\Unique;

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
            // $table->id('id_dokumen');
            $table->id('no_dokumen');
            $table->enum('status_dokumen', ['Dipinjam', 'Tersedia', 'Pengarsipan', 'Retensi', 'Rejected']);
            $table->string('divisi');
            $table->string('nama_dokumen');
            $table->string('tahun_dokumen');
            $table->text('deskripsi');
            $table->dateTime('tgl_upload');
            $table->string('nama_kel_dokumen');
            $table->string('file_dokumen');
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
        // Schema::table('dokumen', function (Blueprint $table) {
        //     $table->string('id_kel_dokumen')->nullable();
        //     $table->foreign('id_kel_dokumen')->references('id_kel_dokumen')->on('kelengkapan_dokumen');
        // });
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
