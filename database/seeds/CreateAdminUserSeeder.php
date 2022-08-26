<?php

use App\jabatan;
use App\prodi;
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

      $karyawan=User::create([
          'name'=>'Erica',
          'username'=>'karyawan',
          'nip'=>'12345674',
          'email'=>'erica@gmail.com',
          'password'=>bcrypt('12345678'),
      ]);
      $role=Role::create(['name'=>'karyawan']);
      $permissions=Permission::pluck('id','id',)->all();
      $role->syncPermissions($permissions);
      $karyawan->assignRole([$role->id]);

      $kajur=User::create([
          'name'=>'Kajur',
          'username'=>'kajur',
          'nip'=>'12345675',
          'email'=>'kajur@gmail.com',
          'password'=>bcrypt('12345678'),
      ]);
      $role=Role::create(['name'=>'kajur']);
      $permissions=Permission::pluck('id','id',)->all();
      $role->syncPermissions($permissions);
      $kajur->assignRole([$role->id]);
        
        $data_jabatan = [
          [
            'id' => 1,
            'nama_jabatan' => 'Dosen'
          ],
          [
            'id' => 2,
            'nama_jabatan' => 'Ketua Jurusan'
          ],
          [
            'id' => 3,
            'nama_jabatan' => 'Direktur'
          ],
        ];
        foreach ($data_jabatan as $jabatan) {
          jabatan::firstOrCreate($jabatan);
        }

        $data_prodi = [
          [
            'id' => 1,
            'nama_prodi' => 'Teknik Informatika'
          ],
          [
            'id' => 2,
            'nama_prodi' => 'Teknik Pengolahan Hasil Ternak'
          ],
          [
            'id' => 3,
            'nama_prodi' => 'Teknik Sipil'
          ],
          [
            'id' => 4,
            'nama_prodi' => 'Kesekretariatan'
          ],
        ];
        foreach ($data_prodi as $prodi) {
          prodi::firstOrCreate($prodi);
        }
    }

}
