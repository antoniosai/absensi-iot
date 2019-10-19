<?php

use Illuminate\Database\Seeder;

use App\Models\Role;
use App\User;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Role;
        $role->nama = 'admin';
        $role->save();

        unset($role);

        $role = new Role;
        $role->nama = 'siswa';
        $role->save();

        // Role Admin
        $admin_role = Role::where('nama', 'admin')->first();

        $user = new User;
        $user->role_id = $admin_role->id;
        $user->name = 'Demo';
        $user->email = 'demo@mail.com';
        $user->password = bcrypt('demo123');
        $user->save();

        unset($user);
    }
}
