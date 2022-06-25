<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kelompokk extends Model
{
    //
    protected $fillable=[
        'user_id',
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

    public function penugasankaryawan()
    {
        return $this->belongsTo(penugasankaryawan::class);
    }
     
    public function disposisi()
    {
        return $this->hasOne(disposisi::class);
    }
}
