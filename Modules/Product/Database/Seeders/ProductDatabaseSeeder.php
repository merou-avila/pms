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
                'product_code' => 'Be01',
                'product_cost' => '275',
                'product_price' => '287',
                'product_unit' => 'box (25 tablets)',
            ],

            [
                'category_id' => '1',
                'product_name' => 'ENERVON',
                'product_code' => 'Be02',
                'product_cost' => '199',
                'product_price' => '205',
                'product_unit' => 'box (30 tablets)',
            ],

            [
                'category_id' => '1',
                'product_name' => 'Vitamin B Complex 1',
                'product_code' => 'Be03',
                'product_cost' => '99',
                'product_price' => '105',
                'product_unit' => 'box (30 tablets)',
            ],

            [
                'category_id' => '1',
                'product_name' => 'UNITED TIKI TIKI B Complex',
                'product_code' => 'Be04',
                'product_cost' => '53',
                'product_price' => '55',
                'product_unit' => 'Bottle',
            ],

            [
                'category_id' => '1',
                'product_name' => 'SANGOBION Ferrous gluconate',
                'product_code' => 'Be05',
                'product_cost' => '196',
                'product_price' => '200',
                'product_unit' => 'box (8 Capsules)',
            ],

            [
                'category_id' => '2',
                'product_name' => 'Amoxicillin ',
                'product_code' => 'Ae01',
                'product_cost' => '6.92',
                'product_price' => '8.92',
                'product_unit' => '1 Capsule',
            ],

            [
                'category_id' => '2',
                'product_name' => 'Terbinafine ',
                'product_code' => 'Ae02',
                'product_cost' => '293',
                'product_price' => '297',
                'product_unit' => '1 Tablet',
            ],

            [
                'category_id' => '2',
                'product_name' => 'Bioflu ',
                'product_code' => 'Ae03',
                'product_cost' => '8.50',
                'product_price' => '10.50',
                'product_unit' => '1 Tablet',
            ],

            [
                'category_id' => '2',
                'product_name' => 'Alaxan ',
                'product_code' => 'Ae04',
                'product_cost' => '8.25',
                'product_price' => '10.25',
                'product_unit' => '1 Capsule',
            ],

            [
                'category_id' => '2',
                'product_name' => 'Biogesic Paracetamol ',
                'product_code' => 'Ae05',
                'product_cost' => '40.50',
                'product_price' => '50.50',
                'product_unit' => '10 Tablet',
            ],

            [
                'category_id' => '2',
                'product_name' => 'Solmux ',
                'product_code' => 'Ae06',
                'product_cost' => '10.75',
                'product_price' => '15.75',
                'product_unit' => '1 Capsule',
            ],

            [
                'category_id' => '2',
                'product_name' => 'Medicol Ibuprofen Advance ',
                'product_code' => 'Ae07',
                'product_cost' => '6.25',
                'product_price' => '10.25',
                'product_unit' => '1 Capsule',
            ],

            [
                'category_id' => '2',
                'product_name' => 'Tuseran ',
                'product_code' => 'Ae08',
                'product_cost' => '41',
                'product_price' => '45',
                'product_unit' => 'box (4 Capsules)',
            ],

            [
                'category_id' => '2',
                'product_name' => 'Robitussin ',
                'product_code' => 'Robi10',
                'product_cost' => '189',
                'product_price' => '190',
                'product_unit' => 'Bottle',
            ],

            [
                'category_id' => '2',
                'product_name' => 'Forte Lagundi for Adult ',
                'product_code' => 'Ae09',
                'product_cost' => '253',
                'product_price' => '255',
                'product_unit' => 'Bottle',
            ],

            [
                'category_id' => '2',
                'product_name' => 'Forte Lagundi for Adult ',
                'product_code' => 'Fort11',
                'product_cost' => '253',
                'product_price' => '255',
                'product_unit' => 'Bottle',
            ],

            [
                'category_id' => '2',
                'product_name' => 'PLEMEX ',
                'product_code' => 'Ae10',
                'product_cost' => '7',
                'product_price' => '10',
                'product_unit' => '1 Capsule',
            ],

            [
                'category_id' => '2',
                'product_name' => 'Neozep ',
                'product_code' => 'Ae11',
                'product_cost' => '5.75',
                'product_price' => '7.75',
                'product_unit' => '1 tablet',
            ],

            [
                'category_id' => '2',
                'product_name' => 'Decolgen ',
                'product_code' => 'Ae12',
                'product_cost' => '6.50',
                'product_price' => '8.50',
                'product_unit' => '1 tablet',
            ],

            [
                'category_id' => '2',
                'product_name' => 'Cetirizine ',
                'product_code' => 'Ae13',
                'product_cost' => '30',
                'product_price' => '30',
                'product_unit' => 'box (12 tablet)',
            ],

            [
                'category_id' => '2',
                'product_name' => 'Loperamide Diatabs',
                'product_code' => 'Ae14',
                'product_cost' => '32',
                'product_price' => '33',
                'product_unit' => 'pack (12 Capsule)',
            ],

            [
                'category_id' => '2',
                'product_name' => 'Cherifer',
                'product_code' => 'Ae15',
                'product_cost' => '20.25',
                'product_price' => '21.25',
                'product_unit' => '1 Capsule',
            ],

             [
                'category_id' => '2',
                'product_name' => 'Allerta Loratadine',
                'product_code' => 'Be16',
                'product_cost' => '20.50',
                'product_price' => '21.50',
                'product_unit' => '1 tablet',
            ],

            [
                'category_id' => '2',
                'product_name' => 'Mx3',
                'product_code' => 'Be17',
                'product_cost' => '18.25',
                'product_price' => '19.25',
                'product_unit' => '1 Capsule',
            ],

            [
                'category_id' => '2',
                'product_name' => 'Losartan',
                'product_code' => 'Be18',
                'product_cost' => '15.75',
                'product_price' => '16.75',
                'product_unit' => '1 tablet',
            ],

            [
                'category_id' => '2',
                'product_name' => 'Strepsils',
                'product_code' => 'Stre25',
                'product_cost' => '69.25',
                'product_price' => '70.25',
                'product_unit' => '1 pack',
            ],

            [
                'category_id' => '2',
                'product_name' => 'Aspirin',
                'product_code' => 'Be19',
                'product_cost' => '3.35',
                'product_price' => '5.00',
                'product_unit' => '1 tablet',
            ],

            [
                'category_id' => '2',
                'product_name' => 'Gaviscon',
                'product_code' => 'Be20',
                'product_cost' => '28.75',
                'product_price' => '30',
                'product_unit' => '1 sachet',
            ],

            [
                'category_id' => '2',
                'product_name' => 'Centrum Advance',
                'product_code' => 'Ae21',
                'product_cost' => '292',
                'product_price' => '295',
                'product_unit' => 'bottle (30 tablet)',
            ],

            [
                'category_id' => '2',
                'product_name' => 'Nafatin',
                'product_code' => 'Be22',
                'product_cost' => '7.35',
                'product_price' => '10.00',
                'product_unit' => '1 tablet',
            ],

        ];
    }
}
