<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use Illuminate\Support\Str;

class LocationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $cityName = $this->faker->unique()->city();
        $slug = Str::slug($cityName, '-');

        return [
            "name" => $cityName,
            "slug" => $slug,
            "avatar" => null,
            "lat" => $this->faker->unique()->latitude($min = 4.5, $max = 22),
            "long" => $this->faker->unique()->longitude($min = 21, $max = 38),
            "range" => $this->faker->numberBetween(5, 50),
            "featured" => $this->faker->boolean(),
            "status" => 1,
            "created_at" => now(),
            "updated_at" => now(),
        ];
    }
}
