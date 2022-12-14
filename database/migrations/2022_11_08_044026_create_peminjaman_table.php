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
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->id('id_peminjaman');
            $table->enum('status_peminjaman', ['Pending', 'Ya','Tidak']);
            $table->date('tgl_ambil');
            $table->date('tgl_kembali');
            $table->string('catatan')->nullable();
            $table->timestamps();
        });
        Schema::table('peminjaman', function (Blueprint $table) {
            $table->unsignedBigInteger('id_dokumen');
            $table->foreign('id_dokumen')->references('id_dokumen')->on('dokumen')
            ->onUpdate('cascade')
            ->onDelete('cascade');
        });
        Schema::table('peminjaman', function (Blueprint $table) {
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
        Schema::dropIfExists('peminjaman');
    }
};
