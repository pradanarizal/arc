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
        Schema::create('kelengkapan_dokumen', function (Blueprint $table) {
            $table->id('id_kel_dokumen');
            $table->timestamps();
        });
        Schema::table('kelengkapan_dokumen', function (Blueprint $table) {
            $table->unsignedBigInteger('no_dokumen');
            $table->foreign('no_dokumen')->references('no_dokumen')->on('dokumen');
        });
        Schema::table('kelengkapan_dokumen', function (Blueprint $table) {
            $table->unsignedBigInteger('id_surat');
            $table->foreign('id_surat')->references('id_surat')->on('master_surat');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kelengkapan_dokumen');
    }
};
