<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'nip', 'jabatan_id', 'prodi_id', 'email','password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function perorangann()
    {
        return $this->hasMany(perorangann::class);
    }

    public function kelompokk()
    {
        return $this->hasMany(kelompokk::class);
    }

    public function jabatan()
    {
        return $this->belongsTo(jabatan::class);
    }

    public function prodi()
    {
        return $this->belongsTo(prodi::class);
    }


    // public function getFullNameAttribute()
    // {
    //     if (is_null($this->last_name)) {
    //         return "{$this->name}";
    //     }

    //     return "{$this->name} {$this->username}";
    // }

    // public function setPasswordAttribute($value)
    // {
    //     $this->attributes['password'] = bcrypt($value);
    // }
}
