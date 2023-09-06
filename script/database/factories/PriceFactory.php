<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Term;

class PriceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'term_id' => Term::where('type', 'product')->inRandomOrder()->first()->id, // You can customize this if needed
            'productoption_id' => $this->faker->randomElement([null, 1, 2]),
            'category_id' => null,
            'price' => $this->faker->numberBetween(50, 100),
            'old_price' => $this->faker->numberBetween(100, 200),
            'qty' => $this->faker->numberBetween(1, 100),
            'sku' => $this->faker->unique()->bothify('#???##'),
            'weight' => $this->faker->randomFloat(2, 0, 1000),
            'stock_manage' => $this->faker->boolean(),
            'stock_status' => $this->faker->boolean(),
        ];
    }
}
