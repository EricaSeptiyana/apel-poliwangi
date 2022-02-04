<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class undangan extends Model
{
    //
    protected $fillable=[
        'tertuju',
        'instansi',
        'agenda',
        'hari_tanggal',
        'tanggal_surat',
        'pukul',
        'tempat',
        'nomor',
        'kode_surat',
        'jenis_surat',
        'tahun_surat',
        'penanda_tangan',
    ];
}
