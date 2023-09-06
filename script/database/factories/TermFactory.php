<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use Illuminate\Support\Str;


class TermFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $type = $this->faker->randomElement(['product', 'blog', 'page']);
        $title = $this->faker->sentence(3);
        $slug = Str::slug($title, '-');

        return [
            'full_id' => $this->faker->numerify('0000##'),
            'title' => $title,
            'slug' => $slug,
            'type' => $type,
            'is_variation' => $this->faker->boolean(),
            'status' => 1,
            'featured' => null,
            'created_at' => $this->faker->dateTimeThisMonth()->format('Y-m-d H:i:s'),
            'updated_at' => $this->faker->dateTimeThisMonth()->format('Y-m-d H:i:s'),
            'rating' => $type === 'product' ? $this->faker->numberBetween(1, 5) : null,
        ];
    }
}
