<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->name,
            'last_name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->unique()->regexify('(\+966|05)\d{8}'),
            'email_verified_at' => $this->faker->optional()->dateTimeThisYear(),
            'password' => bcrypt('password'), // you can modify the password as needed
            'active' => '1', // Default value for active
            // 'point' => $this->faker->point,
            'fcm_token' => 'dWvH7_h3TvmghZvRQSw0Jd:APA91bHi2FloOBDquwB7VOmLEE_CC9p6nIPMOK7BGmxMEHU5-D1lCCu3Y9o7oGppJaTgSX7ZnCPRq4rCyUsgxsmlF2cIEOR6TuOSwxqcl3oDdyq31Cpge0XHh_hqgeE3rbH5q3TNwkL-',
            'city_id' => 1,

            'created_by' => $this->faker->optional()->randomDigitNotNull(),
            'updated_by' => $this->faker->optional()->randomDigitNotNull(),
            'remember_token' => \Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
