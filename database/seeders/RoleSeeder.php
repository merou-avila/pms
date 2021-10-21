<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run()
    {
        foreach ($this->roles() as $role) {
            Role::firstOrCreate([
                'slug' => Str::slug($role)
            ], [
                'name' => $role,
            ]);
        }
    }

    public function roles()
    {
        return [
            1 => 'Admin',
        ];
    }
}
