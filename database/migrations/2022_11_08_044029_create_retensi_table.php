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
            $table->string('no_dokumen');
            $table->date('tgl_retensi');
            $table->enum('status_retensi', ['Pending', 'Ya', 'Tidak']);
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
        Schema::dropIfExists('retensi');
    }
};