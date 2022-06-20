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
            'name'=>'superadmin',
            'username'=>'',
            'nip'=>'12345670',
            'email'=>'superadmin@gmail.com',
            'password'=>bcrypt('12345678'),
        ]);
        $role=Role::create(['name'=>'superadmin']);
        $permissions=Permission::pluck('id','id',)->all();
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);
    }
}
