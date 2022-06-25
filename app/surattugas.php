<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class surattugas extends Model
{
    //
    protected $fillable=[
        'kelompokk_id',
        'nomor_surattugas',
        'pembuka',
        'penutup',
        'tangggal_surattugas',
        'namattd_surattugas',
        // 'nipttd_surattugas',
        // 'jabatanttd_surattugas',
        'file_surattugas',
    ];
    public function disposisi(){
        return $this->hasOne(disposisi::class);
    }
}
