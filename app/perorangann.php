<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class perorangann extends Model
{
    //
    protected $fillable=[
        // 'nomor_agenda',
        'user_id',
        // 'nama',
        // 'nip',
        'jabatan',
        'nomor_permohonan',
        'lampiran',
        'hal',
        'tanggal_permohonan',
        'jenis_kegiatan',
        'pembuka',
        'waktu_pelaksanaan',
        'pukul_pelaksanaan',
        'waktu_selesai',
        'tempat',
        'penutup',
        'nama_penandatangan',
        // 'nip_penandatangan',
        // 'jabatan_penandatangan',
        'tipe_surat',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
