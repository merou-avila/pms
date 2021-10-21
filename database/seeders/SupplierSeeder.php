<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Supplier;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create();

        foreach (range(1, 50) as $count) {
            $name = $faker->company();
            $email = $faker->email;
            $contact_number = $faker->phoneNumber;
            $address = $faker->streetAddress;

            $supplier = Supplier::create([
                'name' => $name,
                'email' => $email,
                'contact_number' => $contact_number,
                'address' => $address,
            ]);
        }
    }
}
