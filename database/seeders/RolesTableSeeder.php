<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        \App\Models\Role::create([
            'name' => 'Admin',
            'slug' => 'admin',
            'description' => 'Role for admin',
            'guard_name' => 'web',
            'permissions' =>json_encode([]),

        ]);
        \App\Models\Role::create([
            'name' => 'Alhamd',
            'slug' => 'alhamd',
            'description' => 'Role for Admin',
            'guard_name' => 'web',
            'permissions' =>json_encode([]),

        ]);

        $user = \App\Models\User::find('1');
        $user->roles()->attach(1);
        $user = \App\Models\User::find('2');
        $user->roles()->attach(1);


    }
}
