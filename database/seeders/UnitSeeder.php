<?php

namespace Database\Seeders;

use App\Models\Unit;
use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    public function run()
    {
        foreach ($this->units() as $unit) {
            Unit::create([
                'name' => $unit['name'],
                'description' => $unit['description'],
            ]);
        }
    }

    protected function units()
    {
        return [
            [
                'name' => 'ml',
                'description' => 'Millimeter'
            ],
            [
                'name' => 'mg',
                'description' => 'Milligrams'
            ],
            [
                'name' => 'g',
                'description' => 'Grams'
            ],
            [
                'name' => 'box',
                'description' => 'Boxs'
            ],
        ];
    }
}
