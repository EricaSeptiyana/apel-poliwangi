<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisposisisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disposisis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kelompokk_id')->nullable();
            $table->unsignedBigInteger('surattugas_id')->nullable();
            $table->integer('nomor_agenda')->unique()->nullable();
            $table->date('tanggal_terima')->nullable();
            $table->string('file_disposisi')->nullable();
            // $table->string('jabatan_penandatangan');
            // $table->string('nomor_permohonan');
            // $table->string('lampiran');
            // $table->string('hal');
            $table->timestamps();
            $table->foreign('kelompokk_id')->references('id')->on('kelompokks')->onDelete('cascade');
            $table->foreign('surattugas_id')->references('id')->on('surattugas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('disposisis');
    }
}
