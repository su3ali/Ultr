<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SupplierFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name_ar' => $this->faker->company,                    // Random company name in Arabic (you can replace this with actual Arabic names if needed)
            'name_en' => $this->faker->company,                    // Random company name in English
            'email'   => $this->faker->unique()->safeEmail,        // Random unique email
            'phone'   => $this->faker->numerify('###########000'), // Phone number with 15 digits
        ];
    }
}
