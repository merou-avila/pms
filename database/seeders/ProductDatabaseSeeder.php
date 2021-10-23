<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Modules\Product\Entities\Product;

class ProductDatabaseSeeder extends Seeder
{
    public function run()
    {
        foreach ($this->medicines() as $medicine) {
            Product::create([
                'category_id' => $medicine['category_id'],
                'product_name' => $medicine['product_name'],
                'product_code' => $medicine['product_code'],
                'product_barcode_symbology' => 'C128',
                'product_quantity' => '100',
                'product_cost' => $medicine['product_cost'],
                'product_price' => $medicine['product_price'],
                'product_unit' => $medicine['product_unit'],
                'product_stock_alert' => '10',
                'is_prescribed' => rand(1, 2),
                'expired_at' => Carbon::now()->addYears(1),
            ]);
        }
    }

    protected function medicines()
    {
        return [
            [
                'category_id' => '1',
                'product_name' => 'Berroca',
                'product_code' => 'Be01',
                'product_cost' => '200',
                'product_price' => '300',
                'product_unit' => 'box (25 tablets)',
            ],
        ];
    }
}
