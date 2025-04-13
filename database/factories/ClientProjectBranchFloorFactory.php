<?php
namespace Database\Factories\Models\BusinessProject;

use App\Models\BusinessProject\ClientProjectBranch;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientProjectBranchFloorFactory extends Factory
{
    public function definition()
    {
        return [
            'branch_id'    => ClientProjectBranch::factory(), // علاقة مع الفرع
            'name_ar'      => 'الطابق ' . $this->faker->numberBetween(1, 10),
            'name_en'      => 'Floor ' . $this->faker->numberBetween(1, 10),
            'floor_number' => $this->faker->numberBetween(1, 20),
            'type'         => $this->faker->randomElement(['سكني', 'تجاري', 'مكاتب']),
            'notes'        => $this->faker->sentence(),
            'active'       => true,
        ];
    }
}
