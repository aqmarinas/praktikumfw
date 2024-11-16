<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Supplier;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Supplier::truncate();

        $supplierData = [
            [
                'supplier_name' => 'Supplier A',
                'supplier_address' => '123 Main St, City A',
                'phone' => '123-456-7890',
                'comment' => 'Reliable supplier for electronics',
            ],
            [
                'supplier_name' => 'Supplier B',
                'supplier_address' => '456 High St, City B',
                'phone' => '987-654-3210',
                'comment' => 'Specializes in wholesale furniture',
            ],
            [
                'supplier_name' => 'Supplier C',
                'supplier_address' => '789 Market Ave, City C',
                'phone' => '555-123-4567',
                'comment' => 'Preferred vendor for office supplies',
            ],
            [
                'supplier_name' => 'Supplier D',
                'supplier_address' => '321 Oak Lane, City D',
                'phone' => '444-987-6543',
                'comment' => 'Bulk supplier for construction materials',
            ],
            [
                'supplier_name' => 'Supplier E',
                'supplier_address' => '654 Pine Rd, City E',
                'phone' => '222-444-5555',
                'comment' => 'Fast delivery and great customer service',
            ],
        ];

        // Loop through data and create suppliers
        foreach ($supplierData as $supplier) {
            Supplier::create($supplier);
        }
    }
}
