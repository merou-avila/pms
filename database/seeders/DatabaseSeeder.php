<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(MedicineTypeSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(SupplierSeeder::class);
        $this->call(UnitSeeder::class);
        $this->call(MedicineSeeder::class);
    }
}
