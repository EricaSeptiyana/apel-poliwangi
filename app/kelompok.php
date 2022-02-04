<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kelompok extends Model
{
    //
    protected $fillable=[
        'jenis_kegiatan',
        'waktu_mulai',
        'waktu_selesai',
        'tempat',
        'file_undangan',
        'file_disposisi',
        'penanda_tangan',
    ];
}
