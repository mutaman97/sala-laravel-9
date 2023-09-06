<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Term;
use App\Models\Category;


class TermcategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return
        [
            'term_id' => Term::factory(),
            'category_id' => Category::factory(),

        ];
    }
}
