<?php
namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    public function run()
    {
        // Create 50 demo suppliers
        Supplier::factory(50)->create();
    }
}
