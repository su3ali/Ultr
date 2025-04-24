<?php
namespace Database\Factories\Models\BusinessProject;

use App\Models\BusinessProject\ClientProject;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientProjectBranchFactory extends Factory
{
    public function definition()
    {
        return [
            'client_project_id' => ClientProject::factory(), // factory relation
            'name_ar'           => 'فرع ' . $this->faker->city(),
            'name_en'           => 'Branch ' . $this->faker->city(),
            'code'              => $this->faker->unique()->bothify('BR-###'),
            'location'          => $this->faker->address(),
            'latitude'          => $this->faker->latitude(),
            'longitude'         => $this->faker->longitude(),
            'phone'             => $this->faker->phoneNumber(),
            'email'             => $this->faker->safeEmail(),
            'notes'             => $this->faker->text(100),
            'active'            => true,
        ];
    }
}
