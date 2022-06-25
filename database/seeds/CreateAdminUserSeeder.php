<?php

use Illuminate\Database\Seeder;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user=User::create([
            'name'=>'Super Admin',
            'username'=>'superadmin',
            'nip'=>'12345670',
            'email'=>'superadmin@gmail.com',
            'password'=>bcrypt('12345678'),
        ]);
        $role=Role::create(['name'=>'superadmin']);
        $permissions=Permission::pluck('id','id',)->all();
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);

        $sekdir=User::create([
            'name'=>'Sekretaris Direktur',
            'username'=>'sekdir',
            'nip'=>'12345671',
            'email'=>'sekdir@gmail.com',
            'password'=>bcrypt('12345678'),
        ]);
        $role=Role::create(['name'=>'sekdir']);
        $permissions=Permission::pluck('id','id',)->all();
        $role->syncPermissions($permissions);
        $sekdir->assignRole([$role->id]);

        $kepegawain=User::create([
            'name'=>'Bagian Kepegawaian',
            'username'=>'kepegawaian',
            'nip'=>'12345672',
            'email'=>'kepegawaian@gmail.com',
            'password'=>bcrypt('12345678'),
        ]);
        $role=Role::create(['name'=>'kepegawaian']);
        $permissions=Permission::pluck('id','id',)->all();
        $role->syncPermissions($permissions);
        $kepegawain->assignRole([$role->id]);

        $keuangan=User::create([
            'name'=>'Bagian Keuangan',
            'username'=>'keuangan',
            'nip'=>'12345673',
            'email'=>'keuangan@gmail.com',
            'password'=>bcrypt('12345678'),
        ]);
        $role=Role::create(['name'=>'keuangan']);
        $permissions=Permission::pluck('id','id',)->all();
        $role->syncPermissions($permissions);
        $keuangan->assignRole([$role->id]);
        
    }
}
