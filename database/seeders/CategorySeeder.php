<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Product\Entities\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $category = Category::create([
            'category_code' => 'VITA',
            'category_name' => 'Vitamins',
        ]);
        $category = Category::create([
            'category_code' => 'ANTI',
            'category_name' => 'Antibiotics',
        ]);
    }
}
