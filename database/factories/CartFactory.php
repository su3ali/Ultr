<?php
namespace Database\Factories;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CartFactory extends Factory
{
    protected $model = Cart::class;

    public function definition()
    {
        return [
            'service_id' => $this->faker->randomElement(Service::pluck('id')->toArray()), // Assuming you have a `Service` model and table
            'category_id' => $this->faker->randomElement(Category::pluck('id')->toArray()), // Assuming you have a `Category` model and table
            'user_id' => $this->faker->randomElement(User::pluck('id')->toArray()), // Assuming you have a `User` model and table
            'quantity' => $this->faker->numberBetween(1, 10), // Random quantity between 1 and 10
            'price' => $this->faker->randomFloat(2, 5, 1000), // Random price with 2 decimal points, between 5 and 1000
            'time' => $this->faker->time(), // Random time
            'date' => $this->faker->date(), // Random date
        ];
    }
}
