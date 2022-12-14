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
            $table->date('tgl_pengembalian');
            $table->enum('status_pengembalian', ['Pending', 'Ya','Tidak']);
            $table->timestamps();
        });
        Schema::table('pengembalian', function (Blueprint $table) {
            $table->unsignedBigInteger('id_dokumen');
            $table->foreign('id_dokumen')->references('id_dokumen')->on('dokumen');
        });
        Schema::table('pengembalian', function (Blueprint $table) {
            $table->unsignedBigInteger('id_peminjaman');
            $table->foreign('id_peminjaman')->references('id_peminjaman')->on('peminjaman');
        });
        Schema::table('pengembalian', function (Blueprint $table) {
            $table->unsignedBigInteger('id');
            $table->foreign('id')->references('id')->on('users');
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
