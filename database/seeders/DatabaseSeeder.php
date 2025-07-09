<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\Sales\Database\Seeders\CustomerSeeder;
use Modules\Sales\Database\Seeders\ProductSeeder;
use Modules\Sales\Database\Seeders\SaleSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CustomerSeeder::class,
            ProductSeeder::class,
            SaleSeeder::class,
        ]);
    }
}
