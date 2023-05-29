<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        \App\Models\User::create([
            'id' => '1',
            'username' => 'Admin',
            'full_name' => 'Admin',
            'contact' => '03038975708',
            'status' => 'active',
            'email' => 'admin321@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('Admin/321'),
            'remember_token' => Str::random(10),
        ]);
        \App\Models\User::create([
            'id' => '2',
            'username' => 'Alhamd',
            'full_name' => 'Alhamd',
            'contact' => '03091118899',
            'status' => 'active',
            'email' => 'alhamdtraders101.info@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('alhamd/321'),
            'remember_token' => Str::random(10),
        ]);

    }
}
