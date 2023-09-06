<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\User;


class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'invoice_no' => 'INV-' . $this->faker->unique()->numberBetween(1, 1000),
            'transaction_id' => 'TXN-' . $this->faker->unique()->numberBetween(1, 1000),
            'getway_id' => $this->faker->numberBetween(1, 3), // Replace with appropriate range based on your gateway data
            'user_id' => User::factory(), // Replace with the user_id you want to assign to the orders
            'payment_status' => $this->faker->randomElement(['paid', 'pending', 'failed']),
            'status_id' => $this->faker->numberBetween(1, 2), // Replace with appropriate range based on your status data
            'tax' => $this->faker->randomFloat(2, 0, 10),
            'discount' => $this->faker->randomFloat(2, 0, 20),
            'total' => $this->faker->numberBetween(100, 1000),
            'order_method' => $this->faker->randomElement(['online', 'offline']),
            'order_from' => $this->faker->randomElement(['web', 'mobile']),
            'notify_driver' => $this->faker->randomElement([0, 1]),
            'created_at' => $this->faker->dateTimeThisMonth(),
            'updated_at' => $this->faker->dateTimeThisMonth(),

        ];
    }
}
