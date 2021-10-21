<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        $roles = Role::all();
        $password = Hash::make('password');

        User::create([
            'first_name' => 'Admin',
            'last_name' => 'User',
            'email' => 'admin@mail.com',
            'password' => $password,
            'email_verified_at' => now(),
            'role_id' => Role::ADMIN,
        ]);

        User::create([
            'first_name' => 'Joy',
            'last_name' => 'Belarmino',
            'email' => 'joy@mail.com',
            'password' => $password,
            'email_verified_at' => now(),
            'role_id' => Role::ADMIN,
        ]);
    }
}
