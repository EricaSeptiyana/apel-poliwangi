<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratpermohonansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suratpermohonans', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('nomor_permohonan')->unique();
            $table->string('lampiran');
            $table->string('hal');
            $table->date('tanggal_permohonan');
            $table->string('jenis_kegiatan');
            $table->string('pembuka');
            $table->date('waktu_pelaksanaan');
            $table->time('pukul_pelaksanaan')->nullable();
            $table->date('waktu_selesai')->nullable();
            $table->string('tempat');
            $table->string('penutup');
            $table->string('nama_penandatangan');
            // $table->string('nip_penandatangan');
            // $table->string('jabatan_penandatangan');
            $table->string('tipe_surat');

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
        Schema::dropIfExists('suratpermohonans');
    }
}
