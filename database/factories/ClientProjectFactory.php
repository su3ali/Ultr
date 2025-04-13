<?php
namespace Database\Factories\Models\BusinessProject;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClientProjectFactory extends Factory
{
    public function definition()
    {
        return [
            'name_ar'     => 'مشروع ' . $this->faker->company(),
            'name_en'     => 'Project ' . $this->faker->company(),
            'code'        => $this->faker->unique()->bothify('PRJ-###'),
            'description' => $this->faker->sentence(),
            'active'      => true,
            'created_by'  => 1, // أو null لو مافي مستخدم معين
            'updated_by'  => 1,
        ];
    }
}
