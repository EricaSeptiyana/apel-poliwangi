<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerorangannsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peroranganns', function (Blueprint $table) {
            $table->id();
            // $table->integer('nomor_agenda')->unique()->nullable();
            $table->integer('user_id');
            // $table->string('nama');
            // $table->string('nip');
            $table->string('jabatan');
            $table->string('nomor_permohonan')->unique();
            $table->string('lampiran');
            $table->string('hal');
            $table->date('tanggal_permohonan');
            $table->string('jenis_kegiatan');
            $table->string('pembuka');
            $table->date('waktu_pelaksanaan');
            $table->time('pukul_pelaksanaan')->nullable();
            $table->date('waktu_selesai')->nullable();
            // $table->date('waktu_selesai');
            $table->string('tempat');
            $table->string('penutup');
            // $table->string('file_undangan')->nullable();
            // $table->string('lokasi_fileundangan')->nullable();
            $table->string('file_disposisi')->nullable();
            $table->string('lokasi_filedisposisi')->nullable();
            $table->string('file_surattugas')->nullable();
            $table->string('lokasi_filesurattugas')->nullable();
            $table->string('nama_penandatangan');
            // $table->string('nip_penandatangan');
            // $table->string('jabatan_penandatangan');
            $table->string('tipe_surat')->nullable();

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
        Schema::dropIfExists('peroranganns');
    }
}
