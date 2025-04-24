<?php
namespace Database\Seeders;

use App\Models\PaymentMethod;
use Illuminate\Database\Seeder;

class PaymentMethodSeeder extends Seeder
{
    public function run()
    {
        PaymentMethod::insert([
            ['name_ar' => 'نقدي', 'name_en' => 'Cash', 'active' => true],
            ['name_ar' => 'شبكة', 'name_en' => 'Mada', 'active' => true],

        ]);
    }
}
