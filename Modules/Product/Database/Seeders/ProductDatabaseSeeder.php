<?php

namespace Modules\Product\Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Modules\Product\Entities\Product;

class ProductDatabaseSeeder extends Seeder
{
    public function run()
    {
        foreach ($this->medicines() as $medicine) {
            Product::create([
                'category_id' => $medicine['category_id'],
                'product_name' => $medicine['details'],
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
                'product_cost' => '300',
                'product_price' => '200',
                'product_unit' => '10 tablets',
            ],
        ];
    }
}
