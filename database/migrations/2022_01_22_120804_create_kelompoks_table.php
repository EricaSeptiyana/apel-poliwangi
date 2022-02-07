<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKelompoksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelompoks', function (Blueprint $table) {
            $table->id();
            $table->string('pembuka');
            $table->string('jenis_kegiatan');
            $table->date('waktu_mulai');
            $table->date('waktu_selesai');
            $table->string('tempat');
            $table->string('file_undangan')->nullable();
            $table->string('lokasi_fileundangan')->nullable();
            $table->string('file_disposisi')->nullable();
            $table->string('lokasi_filedisposisi')->nullable();
            $table->date('tanggal_surat');
            $table->integer('nomor');
            $table->string('kode_surat');
            $table->string('jenis_surat');
            $table->year('tahun_surat');
            $table->string('penanda_tangan');
            $table->string('nama');
            // $table->string('nip_nipppk');
            $table->string('jabatan');
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
        Schema::dropIfExists('kelompoks');
    }
}
