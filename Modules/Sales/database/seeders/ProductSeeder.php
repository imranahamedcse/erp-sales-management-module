<?php

namespace Modules\Sales\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Sales\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Laptop',
                'description' => '15-inch business laptop',
                'price' => 1200.00,
                'cost_price' => 900.00,
                'stock_quantity' => 15,
                'sku' => 'PROD001'
            ],
            [
                'name' => 'Wireless Mouse',
                'description' => 'Ergonomic wireless mouse',
                'price' => 35.00,
                'cost_price' => 20.00,
                'stock_quantity' => 42,
                'sku' => 'PROD002'
            ],
            [
                'name' => 'Monitor',
                'description' => '24-inch LED monitor',
                'price' => 250.00,
                'cost_price' => 180.00,
                'stock_quantity' => 8,
                'sku' => 'PROD003'
            ],
            [
                'name' => 'Office Chair',
                'description' => 'Ergonomic office chair',
                'price' => 199.99,
                'cost_price' => 120.00,
                'stock_quantity' => 12,
                'sku' => 'PROD004'
            ],
            [
                'name' => 'Notebook',
                'description' => 'A4 size 100-page notebook',
                'price' => 5.99,
                'cost_price' => 2.50,
                'stock_quantity' => 150,
                'sku' => 'PROD005'
            ],
            [
                'name' => 'Desk',
                'description' => 'Executive office desk',
                'price' => 450.00,
                'cost_price' => 300.00,
                'stock_quantity' => 5,
                'sku' => 'PROD006'
            ],
            [
                'name' => 'Antivirus Software',
                'description' => '1-year subscription',
                'price' => 49.99,
                'cost_price' => 20.00,
                'stock_quantity' => 100,
                'sku' => 'PROD007'
            ],
            [
                'name' => 'Pen Set',
                'description' => 'Set of 5 premium pens',
                'price' => 12.50,
                'cost_price' => 6.00,
                'stock_quantity' => 75,
                'sku' => 'PROD008'
            ],
            [
                'name' => 'Keyboard',
                'description' => 'Wireless keyboard',
                'price' => 45.00,
                'cost_price' => 25.00,
                'stock_quantity' => 20,
                'sku' => 'PROD009'
            ],
            [
                'name' => 'File Cabinet',
                'description' => '2-drawer file cabinet',
                'price' => 125.00,
                'cost_price' => 80.00,
                'stock_quantity' => 7,
                'sku' => 'PROD010'
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
