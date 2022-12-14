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
        Schema::create('retensi', function (Blueprint $table) {
            $table->id('id_retensi');
            $table->dateTime('tgl_retensi')->nullable();
            $table->enum('status_retensi', ['Pending', 'Ya', 'Tidak']);
            $table->timestamps();
        });
        Schema::table('retensi', function (Blueprint $table) {
            $table->unsignedBigInteger('id_dokumen');
            $table->foreign('id_dokumen')->references('id_dokumen')->on('dokumen');
        });
        Schema::table('retensi', function (Blueprint $table) {
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
        Schema::dropIfExists('retensi');
    }
};
