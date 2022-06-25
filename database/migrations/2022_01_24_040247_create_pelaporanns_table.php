<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePelaporannsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelaporanns', function (Blueprint $table) {
            $table->id();
            $table->string('judul_laporan');
            $table->string('dasar_pelaksanaan');
            $table->string('maksud_perjalanandinas');                
            $table->string('instansi');
            $table->date('waktu_mulai');
            $table->date('waktu_selesai');
            $table->string('hasil');
            $table->string('penutup');
            $table->date('tanggal_surat');
            $table->string('penanda_tangan');
            $table->string('foto_kegiatan')->nullable();
            $table->string('foto_kegiatan2')->nullable();
            $table->string('foto_kegiatan3')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('pelaporanns');
    }
}
