<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUndangansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('undangans', function (Blueprint $table) {
            $table->id();
            $table->string('tertuju');
            $table->string('instansi');
            $table->string('agenda');
            $table->date('hari_tanggal');
            $table->time('pukul');
            $table->string('tempat');
            $table->date('tanggal_surat');
            $table->integer('nomor');
            $table->string('kode_surat');
            $table->string('jenis_surat');
            $table->year('tahun_surat');
            $table->string('penanda_tangan');
            $table->string('nip_penandatangan');
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
        Schema::dropIfExists('undangans');
    }
}
