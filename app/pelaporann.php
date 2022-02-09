<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pelaporann extends Model
{
    //
    protected $fillable=[
        'judul_laporan',
        'dasar_pelaksanaan',
        'maksud_perjalanandinas',
        'instansi',
        'waktu_mulai',
        'waktu_selesai',
        'hasil',
        'tempat',
        // 'file_undangan',
        // 'file_disposisi',
        'tanggal_surat',
        'penanda_tangan',
    ];
}
