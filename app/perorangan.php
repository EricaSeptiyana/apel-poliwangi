<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class perorangan extends Model
{
    //
    protected $fillable=[
        'jenis_kegiatan',
        'waktu_mulai',
        'waktu_selesai',
        'tempat',
        'file_undangan',
        'file_disposisi',
        'nomor',
        'kode_surat',
        'jenis_surat',
        'tahun_surat',
        'penanda_tangan',
    ];
}
