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
            $table->date('tanggal_surat');
            $table->string('penanda_tangan');
            // $table->string('nama');
            // $table->string('nip_nipppk');
            // $table->string('jabatan');
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
