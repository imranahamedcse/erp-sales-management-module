<?php

namespace Modules\Sales\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Sales\Models\Sale;
use Modules\Sales\Models\SaleItem;

class SaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Sample sale 1
        $sale1 = Sale::create([
            'customer_id' => 1,
            'sale_date' => now()->subDays(2),
            'invoice_number' => 'INV-' . now()->format('Ymd') . '-001',
            'total_amount' => 1250.00,
            'discount_amount' => 50.00,
            'paid_amount' => 1200.00,
            'due_amount' => 0.00,
            'payment_status' => 'paid',
            'status' => 'completed'
        ]);

        SaleItem::create([
            'sale_id' => $sale1->id,
            'product_id' => 1,
            'quantity' => 1,
            'unit_price' => 1200.00,
            'discount_percent' => 0,
            'total_price' => 1200.00
        ]);

        SaleItem::create([
            'sale_id' => $sale1->id,
            'product_id' => 2,
            'quantity' => 2,
            'unit_price' => 35.00,
            'discount_percent' => 10,
            'total_price' => 63.00
        ]);

        // Sample sale 2
        $sale2 = Sale::create([
            'customer_id' => 3,
            'sale_date' => now()->subDay(),
            'invoice_number' => 'INV-' . now()->format('Ymd') . '-002',
            'total_amount' => 3450.00,
            'discount_amount' => 0.00,
            'paid_amount' => 2000.00,
            'due_amount' => 1450.00,
            'payment_status' => 'partial',
            'status' => 'completed'
        ]);

        SaleItem::create([
            'sale_id' => $sale2->id,
            'product_id' => 3,
            'quantity' => 2,
            'unit_price' => 250.00,
            'discount_percent' => 0,
            'total_price' => 500.00
        ]);

        SaleItem::create([
            'sale_id' => $sale2->id,
            'product_id' => 6,
            'quantity' => 1,
            'unit_price' => 450.00,
            'discount_percent' => 0,
            'total_price' => 450.00
        ]);

        SaleItem::create([
            'sale_id' => $sale2->id,
            'product_id' => 10,
            'quantity' => 2,
            'unit_price' => 125.00,
            'discount_percent' => 0,
            'total_price' => 250.00
        ]);

        // Sample sale 3 (deleted)
        $sale3 = Sale::create([
            'customer_id' => 2,
            'sale_date' => now()->subDays(5),
            'invoice_number' => 'INV-' . now()->subDays(5)->format('Ymd') . '-001',
            'total_amount' => 850.00,
            'discount_amount' => 25.00,
            'paid_amount' => 825.00,
            'due_amount' => 0.00,
            'payment_status' => 'paid',
            'status' => 'completed',
            'deleted_at' => now()->subDays(3)
        ]);

        SaleItem::create([
            'sale_id' => $sale3->id,
            'product_id' => 4,
            'quantity' => 1,
            'unit_price' => 199.99,
            'discount_percent' => 0,
            'total_price' => 199.99
        ]);

        SaleItem::create([
            'sale_id' => $sale3->id,
            'product_id' => 5,
            'quantity' => 5,
            'unit_price' => 5.99,
            'discount_percent' => 10,
            'total_price' => 26.96
        ]);

        SaleItem::create([
            'sale_id' => $sale3->id,
            'product_id' => 8,
            'quantity' => 3,
            'unit_price' => 12.50,
            'discount_percent' => 15,
            'total_price' => 31.88
        ]);
    }
}
