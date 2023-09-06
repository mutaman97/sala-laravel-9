<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\User;

class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'order_id' => $this->faker->numberBetween(1, 4), // Replace with appropriate range based on your order data
            'user_id' => User::factory(), // Replace with the user_id you want to assign to the reviews
            'term_id' => $this->faker->numberBetween(1, 12), // this is the product id by the way
            'rating' => $this->faker->numberBetween(1, 5), // Replace with appropriate range based on your rating criteria
            'comment' => $this->faker->paragraph(),
            'created_at' => $this->faker->dateTimeThisMonth(),
            'updated_at' => $this->faker->dateTimeThisMonth(),

        ];
    }
}
