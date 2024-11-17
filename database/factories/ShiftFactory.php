<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ShiftFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'shift_no' => Str::random(4), // Random string for shift_no
            'service_id' => json_encode([$this->faker->numberBetween(21, 22), $this->faker->numberBetween(21, 22)]), // Example: multiple service IDs
            'group_id' => json_encode([$this->faker->numberBetween(1, 5), $this->faker->numberBetween(6, 10)]), // Example: multiple group IDs
            'day_id' => json_encode([$this->faker->numberBetween(1, 7)]), // Example: single day ID, 1 to 7 for days of the week
            'start_time' => $this->faker->time('H:i'), // Random start time
            'end_time' => $this->faker->time('H:i'), // Random end time
            'is_active' => $this->faker->boolean(true), // Random boolean for is_active
        ];
    }
}
