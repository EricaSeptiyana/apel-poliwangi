<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pelaporann extends Model
{
    //
    protected $fillable=[
        'judul_laporan',
        'dasar_pelaksanaan',
        'instansi',
        'waktu_mulai',
        'waktu_selesai',
        'tempat',
        'file_undangan',
        'file_disposisi',
        'penanda_tangan',
    ];
}
