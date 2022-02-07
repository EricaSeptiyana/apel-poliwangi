<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kelompok extends Model
{
    //
    protected $fillable=[
        'jenis_kegiatan',
        'pembuka',
        'waktu_mulai',
        'waktu_selesai',
        'tanggal_surat',
        'nomor',
        'kode_surat',
        'jenis_surat',
        'tahun_surat',
        'nama',
        'jabatan',
        'tempat',
        'file_undangan',
        'lokasi_fileundangan',
        'file_disposisi',
        'lokasi_filedisposisi',
        'penanda_tangan',
    ];
}
