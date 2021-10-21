<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        foreach ($this->categories() as $category) {
            Category::create([
                'name' => trim($category['name']),
            ]);
        }
    }

    protected function categories()
    {
        return [
            [
                'name' => 'Vitamins',
            ],
            [
                'name' => 'Antibiotics',
            ],
            [
                'name' => 'Antiseptics',
            ],
            [
                'name' => 'Analgesics',
            ],
            [
                'name' => 'Mode Stabilizers',
            ],
            [
                'name' => 'Ointment',
            ],
        ];
    }
}
