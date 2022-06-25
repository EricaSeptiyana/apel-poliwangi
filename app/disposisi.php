<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class disposisi extends Model
{
    //
    protected $fillable=[
        'surattugas_id',
        'kelompokk_id',
        'nomor_agenda',
        'tanggal_terima',
        'file_disposisi',
        'jabatan_penandatangan',
        'nomor_permohonan',
        'tanggal_permohonan',
        'lampiran',
        'hal',
    ];
    public function kelompokk(){
        return $this->belongsTo(kelompokks::class);
    }

    public function surattugas(){
        return $this->belongsTo(surattugas::class);
    }
}
