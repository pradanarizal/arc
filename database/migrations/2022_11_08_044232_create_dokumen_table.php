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
            $table->enum('status_dokumen', ['Dipinjam', 'Tersedia','Pengajuan Retensi','Retensi'])->nullable();
            $table->string('divisi')->nullable();
            $table->string('nama_dokumen')->nullable();
            $table->string('tahun_dokumen')->nullable();
            $table->text('deskripsi')->nullable();
            $table->dateTime('tgl_upload')->nullable();
            $table->string('id_ruang')->nullable();
            $table->string('id_rak')->nullable();
            $table->string('id_box')->nullable();
            $table->string('id_map')->nullable();
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
        Schema::dropIfExists('dokumen');
    }
};
