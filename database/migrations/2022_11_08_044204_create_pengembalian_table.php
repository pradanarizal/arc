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
        Schema::create('pengembalian', function (Blueprint $table) {
            $table->id('id_pengembalian');
            $table->string('no_dokumen');
            $table->string('nama_dokumen');
            $table->date('tgl_ambil');
            $table->date('tgl_kembali');
            $table->date('tgl_pengembalian');
            $table->string('peminjam');
            $table->enum('status_pengembalian', ['Pending', 'Ya','Tidak']);
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
        Schema::dropIfExists('pengembalian');
    }
};
