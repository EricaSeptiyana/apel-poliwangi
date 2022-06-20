<?php

namespace App\Imports;

use App\jabatan;
use App\prodi;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\User;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Spatie\Permission\Models\Role;

class HalamanUserImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        $user = new User([
            'name'=> $row['nama'],
            'username'=>$row['username'],
            'nip'=>$row['nip'],
            'jabatan_id'=>jabatan::find($row['id_jabatan'])->id,
            'prodi_id'=> prodi::find($row['id_prodi'])->id,
            'email'=>$row['e_mail'],
            'password' => Hash::make($row['password']),
            'created_at'=> Carbon::now(),
        ]);

        $role = Role::find($row['id_role']);

        $user->assignRole($role);

        return $user;
    }
}
