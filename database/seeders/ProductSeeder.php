<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::truncate();

        $productData = [
            [
                'product_name' => 'Laptop ASUS',
                'unit' => 'kg',
                'type' => 'Electronics',
                'information' => '14-inch display, 8GB RAM, 512GB SSD',
                'qty' => 50,
                'producer' => 'BrandX',
            ],
            [
                'product_name' => 'Laptop Lenovo',
                'unit' => 'kg',
                'type' => 'Electronics',
                'information' => '14-inch display, 8GB RAM, 512GB SSD',
                'qty' => 50,
                'producer' => 'BrandX',
            ],
            [
                'product_name' => 'Laptop HP',
                'unit' => 'kg',
                'type' => 'Electronics',
                'information' => '14-inch display, 8GB RAM, 512GB SSD',
                'qty' => 50,
                'producer' => 'BrandX',
            ],
            [
                'product_name' => 'Smartphone',
                'unit' => 'kg',
                'type' => 'Electronics',
                'information' => '6.5-inch screen, 128GB storage',
                'qty' => 100,
                'producer' => 'BrandY',
            ],
            [
                'product_name' => 'Rice',
                'unit' => 'kg',
                'type' => 'Food',
                'information' => 'Premium quality, white rice',
                'qty' => 200,
                'producer' => 'BrandA',
            ],
            [
                'product_name' => 'Washing Machine',
                'unit' => 'kg',
                'type' => 'Appliances',
                'information' => 'Top load, 7kg capacity, energy efficient',
                'qty' => 30,
                'producer' => 'BrandB',
            ],
            [
                'product_name' => 'Electric Kettle',
                'unit' => 'kg',
                'type' => 'Appliances',
                'information' => '1.5L capacity, automatic shut-off',
                'qty' => 75,
                'producer' => 'BrandC',
            ]
        ];

        foreach ($productData as $product) {
            Product::create($product);
        }
    }
}
