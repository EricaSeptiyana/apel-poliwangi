<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class perorangan extends Model
{
    //
    protected $fillable=[
        'pembuka',
        'nama',
        'nip_nipppk',
        'jabatan',
        'jenis_kegiatan',
        'waktu_mulai',
        'waktu_selesai',
        'tempat',
        'file_undangan',
        'file_disposisi',
        'tanggal_surat',
        'nomor',
        'kode_surat',
        'jenis_surat',
        'tahun_surat',
        'penanda_tangan',
        // 'nip_penandatangan',
        'file_undangan',
        'lokasi_fileundangan',
        'file_disposisi',
        'lokasi_filedisposisi',
    ];
}
