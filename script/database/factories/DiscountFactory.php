<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Term;

class DiscountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'term_id' => Term::factory(),
            'special_price' => $this->faker->randomFloat(2, 2, 3),
            'price_type' => $this->faker->randomElement([0, 1]),
            'ending_date' => $this->faker->dateTimeThisDecade()->format('Y-m-d'),
        ];
    }
}
