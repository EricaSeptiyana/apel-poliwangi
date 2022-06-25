<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurattugasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surattugas', function (Blueprint $table) {
            $table->id();
            // $table->integer('kelompokk_id')->nullable();
            $table->integer('nomor_surattugas')->unique()->nullable();
            $table->string('pembuka')->nullable();
            $table->string('penutup')->nullable();
            $table->string('namattd_surattugas')->nullable();
            // $table->string('nipttd_surattugas')->nullable();
            // $table->string('jabatanttd_surattugas')->nullable();
            // $table->date('tanggal_surattugas')->nullable();
            $table->string('file_surattugas')->nullable();
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
        Schema::dropIfExists('surattugas');
    }
}
