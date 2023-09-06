<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Location;
use App\Models\Category;

class ShippingcategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // Retrieve the 'id' of a random 'shipping' category
        $shippingCategoryId = Category::where('type', 'shipping')->inRandomOrder()->value('id');

        return [
            'category_id' => $shippingCategoryId,
            'location_id' => Location::factory(),
        ];
    }
}
