<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class penugasankaryawan extends Model
{
    //
    protected $fillable=[
        'name',
        'nip',
        'jabatan',
    ];
    // protected $table=['jabatan'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }  

}
