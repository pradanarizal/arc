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
        Schema::create('kelengkapan', function (Blueprint $table) {
            $table->id('id_kel');
            $table->unsignedBigInteger('id_kel_dokumen')->nullable();
            $table->foreign('id_kel_dokumen')->references('id_kel_dokumen')->on('kelengkapan_dokumen') ->onUpdate('cascade')
            ->nullOnDelete();
            $table->unsignedBigInteger('id_dokumen')->nullable();
            $table->foreign('id_dokumen')->references('id_dokumen')->on('dokumen') ->onUpdate('cascade')
            ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Kelengkapan_dokumen');
    }
};
