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
            $table->dateTime('tgl_pengarsipan')->nullable();
            $table->enum('status_pengarsipan', ['Pending', 'Ya','Tidak']);
            $table->timestamps();
        });
        Schema::table('pengarsipan', function (Blueprint $table) {
            $table->unsignedBigInteger('id_dokumen');
            $table->foreign('id_dokumen')->references('id_dokumen')->on('dokumen')
            ->onUpdate('cascade')
            ->onDelete('cascade');
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
