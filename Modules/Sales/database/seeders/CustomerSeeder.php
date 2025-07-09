<?php

namespace Modules\Sales\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Sales\Models\Customer;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $customers = [
            [
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'phone' => '1234567890',
                'address' => '123 Main St, Anytown, USA',
            ],
            [
                'name' => 'Jane Smith',
                'email' => 'jane@example.com',
                'phone' => '9876543210',
                'address' => '456 Oak Ave, Somewhere, USA',
            ],
            [
                'name' => 'Acme Corporation',
                'email' => 'contact@acme.com',
                'phone' => '5551234567',
                'address' => '789 Business Park, Metropolis, USA',
            ],
            [
                'name' => 'Bob Johnson',
                'email' => 'bob@example.com',
                'phone' => '4445556666',
                'address' => '321 Pine Rd, Nowhere, USA',
            ],
            [
                'name' => 'Alice Williams',
                'email' => 'alice@example.com',
                'phone' => '7778889999',
                'address' => '654 Elm Blvd, Anywhere, USA',
            ],
        ];

        foreach ($customers as $customer) {
            Customer::create($customer);
        }
    }
}
