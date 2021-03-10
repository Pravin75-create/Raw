<?php

namespace Database\Seeders;

use App\Models\User;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'email_verified_at' => now(),
            'isban' => 0,
            'usertype' => 'admin',
        ]);
        $role = Role::create(['name' => 'admin']);

        $permission = Permission::create(['name' => 'adminPer']);

        $role->givePermissionTo($permission);

        $user->assignRole($role);
    }
}
