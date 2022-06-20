<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pelaporann extends Model
{
    //
    // $con = new mysqli{'apel-poliwangi', 'root','', 'pelaporan'};
    // $path = 'lokasi_file/',
    // $a = $_FILES{'foto_kegiatan'}{'foto_kegiatan'};
    // $jml = count($a);
    // for($i=0; $i < $jml : $i++){
    //     $b = $a[$i];
    //     $c = $_FILES['foto_kegiatan']['tmp_foto_kegiatan'][$i];
    //     move_upload_file{$c. $path.$b};
    // }
    protected $fillable=[
        'judul_laporan',
        'dasar_pelaksanaan',
        'maksud_perjalanandinas',
        'instansi',
        'waktu_mulai',
        'waktu_selesai',
        'hasil',
        'penutup',
        'tempat',
        'foto_kegiatan',
        // 'lokasi_fotokegiatan',
        'foto_kegiatan2',
        // 'lokasi_fotokegiatan2',
        'foto_kegiatan3',
        // 'lokasi_fotokegiatan3',
        // 'file_undangan',
        // 'file_disposisi',
        'tanggal_surat',
        'penanda_tangan',
    ];
}
