<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $permissions=[
            'role-list',
            'role-edit',
            'role-create',
            'role-delete',

            'user-list',
            'user-edit',
            'user-create',
            'user-delete',

            'undangan-list',
            'undangan-edit',
            'undangan-create',
            'undangan-delete',
            'undangan-download',
            'undangan-update',
            'undangan-view',
            'undangan-cetak',

            'perorangan-list',
            'perorangan-edit',
            'perorangan-create',
            'perorangan-delete',
            'perorangan-download',
            'perorangan-update',
            'perorangan-view',
            'perorangan-cetak',

            'kelompok-list',
            'kelompok-edit',
            'kelompok-create',
            'kelompok-delete',
            'kelompok-download',
            'kelompok-update',
            'kelompok-view',
            'kelompok-cetak',

            'pelaporan-list',
            'pelaporan-edit',
            'pelaporan-create',
            'pelaporan-delete',
            'pelaporan-download',
            'pelaporan-update',
            'pelaporan-view',
            'pelaporan-cetak',
        ];

        foreach($permissions as $permission){
            Permission::create(['name'=>$permission]);
        }
    }
}
