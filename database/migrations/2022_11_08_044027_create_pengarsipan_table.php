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
        Schema::create('pengarsipan', function (Blueprint $table) {
            $table->id('id_pengarsipan');
            $table->date('tgl_pengarsipan')->nullable();
            $table->enum('status_pengarsipan', ['Pending', 'Ya','Tidak']);
            $table->timestamps();
        });
        Schema::table('pengarsipan', function (Blueprint $table) {
            $table->unsignedBigInteger('no_dokumen');
            $table->foreign('no_dokumen')->references('no_dokumen')->on('dokumen');
        });
        Schema::table('pengarsipan', function (Blueprint $table) {
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
        Schema::dropIfExists('pengarsipan');
    }
};
