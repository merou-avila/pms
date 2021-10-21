<?php

namespace Database\Seeders;

use App\Models\MedicineType;
use Illuminate\Database\Seeder;

class MedicineTypeSeeder extends Seeder
{
    public function run()
    {
        foreach ($this->types() as $type) {
            MedicineType::create([
                'name' => $type['name'],
            ]);
        }
    }

    protected function types()
    {
        return [
            [
                'name' => 'Liquid/Syrup',
            ],
            [
                'name' => 'Capsule',
            ],
            [
                'name' => 'Inhalers',
            ],
            [
                'name' => 'Drop',
            ],
            [
                'name' => 'Tablet',
            ],
            [
                'name' => 'Powder',
            ],
            [
                'name' => 'Spray',
            ],
        ];
    }
}
