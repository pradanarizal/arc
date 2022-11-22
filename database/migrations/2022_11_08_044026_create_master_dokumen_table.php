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
        Schema::create('master_dokumen', function (Blueprint $table) {
            $table->id('id_surat');
            $table->timestamps();
        });
        Schema::table('master_dokumen', function (Blueprint $table) {
            $table->unsignedBigInteger('no_dokumen');
            $table->foreign('no_dokumen')->references('no_dokumen')->on('dokumen');
        });
        Schema::table('master_dokumen', function (Blueprint $table) {
            $table->unsignedBigInteger('id_kel_dokumen');
            $table->foreign('id_kel_dokumen')->references('id_kel_dokumen')->on('kelengkapan_dokumen');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('master_dokumen');
    }
};
