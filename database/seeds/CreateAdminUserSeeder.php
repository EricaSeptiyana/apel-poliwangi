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
        $data_user = [
          [
            'name'=>'Super Admin',
            'username'=>'superadmin',
            'nip'=>'12345670',
            'email'=>'superadmin@gmail.com',
            'password'=>bcrypt('12345678'),
          ],
          [
            'name'=>'Sekretaris Direktur',
            'username'=>'sekdir',
            'nip'=>'12345671',
            'email'=>'sekdir@gmail.com',
            'password'=>bcrypt('12345678'),
          ],
          [
            'name'=>'Bagian Kepegawaian',
            'username'=>'kepegawaian',
            'nip'=>'12345672',
            'email'=>'kepegawaian@gmail.com',
            'password'=>bcrypt('12345678'),
          ],
          [
            'name'=>'Bagian Keuangan',
            'username'=>'keuangan',
            'nip'=>'12345673',
            'email'=>'keuangan@gmail.com',
            'password'=>bcrypt('12345678'),
          ]
        ];

        $data_role = [
          ['name'=>'superadmin'],
          ['name'=>'sekdir'],
          ['name'=>'kepegawaian'],
          ['name'=>'keuangan']
        ];

        foreach ($data_user as $i => $user) {
          $user=User::firstOrCreate($user);
          $role=Role::firstOrCreate($data_role[$i]);
          $permissions=Permission::pluck('id','id',)->all();
          $role->syncPermissions($permissions);
          $user->assignRole([$role->id]);
        }
        
        $data_jabatan = [
          [
            'id' => 1,
            'nama_jabatan' => 'Dosen'
          ],
          [
            'id' => 2,
            'nama_jabatan' => 'Ketua Jurusan'
          ],
        ];
        foreach ($data_jabatan as $jabatan) {
          jabatan::firstOrCreate($jabatan);
        }

        $data_prodi = [
          [
            'id' => 1,
            'nama_prodi' => 'TI'
          ],
          [
            'id' => 2,
            'nama_prodi' => 'TPHT'
          ],
          [
            'id' => 3,
            'nama_prodi' => 'Teknik'
          ],
        ];
        foreach ($data_prodi as $prodi) {
          prodi::firstOrCreate($prodi);
        }
    }

}
