<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use Illuminate\Support\Str;


class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $type = $this->faker->randomElement(['status', 'parent_attribute', 'child_attribute', 'category', 'tag', 'brand', 'shipping', 'product_feature', 'slider', 'short_banner', 'large_banner', 'special_menu']);

            switch ($type)
            {
                case 'status':

                    $name = $this->faker->randomElement(['Complete', 'Cancel', 'Pending']);
                    if ($name == 'Pending')
                    {
                        $slug = '#ffc107';
                    }
                    elseif($name == 'Cancel')
                    {
                        $slug = '#dc3545';
                    }
                    elseif($name == 'Complete')
                    {
                        $slug = '#028a74';
                    }

                    return [
                        'name' => $name,
                        'slug' => $slug,
                        'type' => 'status',
                        'category_id' => null,
                        'featured' => $this->faker->randomElement([1, 0]),
                        'menu_status' => 0,
                        'status' => 0,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                case 'parent_attribute':
                    return [
                        'name' => 'Size',
                        'slug' => 'radio',
                        'type' => $type,

                        // TODO Foregin key
                        'category_id' => null,
                        'featured' => 1,
                        'menu_status' => 0,
                        'status' => 1,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                case 'child_attribute':
                    $name = $this->faker->safeColorName();
                    $slug = Str::slug($name, '-');

                    return [
                        'name' => $name,
                        'slug' => $slug,
                        'type' => $type,

                        // TODO Foregin key
                        'category_id' => null,
                        'featured' => 0,
                        'menu_status' => 0,
                        'status' => 1,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                case 'category':
                    $name = $this->faker->word();
                    $slug = Str::slug($name, '-');

                    return [
                        'name' => $name,
                        'slug' => $slug,
                        'type' => $type,
                        'category_id' => null,
                        'featured' => 1,
                        'menu_status' => 1,
                        'status' => 1,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                case 'tag':
                    $name = $this->faker->word();
                    $slug = Str::slug($name, '-');

                    return [
                        'name' => $name,
                        'slug' => $slug,
                        'type' => $type,
                        'category_id' => null,
                        'featured' => 1,
                        'menu_status' => 0,
                        'status' => 1,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                case 'brand':

                    $name = $this->faker->word();
                    $slug = Str::slug($name, '-');
                    return [
                        'name' => $name,
                        'slug' => $slug,
                        'type' => $type,
                        'category_id' => null,
                        'featured' => 1,
                        'menu_status' => 0,
                        'status' => 1,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                case 'shipping':

                    $name = $this->faker->words(2, true);
                    $slug = Str::slug($name, '-');

                    return [
                        'name' => $name,
                        'slug' => $slug,
                        'type' => $type,
                        'category_id' => null,
                        'featured' => 0,
                        'menu_status' => 0,
                        'status' => 1,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                case 'product_feature':
                    $name = $this->faker->word();
                    $slug = Str::slug($name, '-');

                    return [
                        'name' => $name,
                        'slug' => $slug,
                        'type' => $type,
                        'category_id' => null,
                        'featured' => 0,
                        'menu_status' => 1,
                        'status' => 1,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                case 'slider':

                    return [
                        'name' => $this->faker->sentence(),
                        'slug' => '{"link":"/products","button_text":"View All Foods"}',
                        'type' => $type,
                        'category_id' => null,
                        'featured' => 0,
                        'menu_status' => 0,
                        'status' => 1,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                case 'short_banner':
                    return [
                        'name' => $this->faker->sentence(),
                        'slug' => '{"link":"#","button_text":"Order Now"}',
                        'type' => $type,
                        'category_id' => null,
                        'featured' => 0,
                        'menu_status' => 0,
                        'status' => 1,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                case 'large_banner':
                    return [
                        'name' => 'Make Your First Order And Get <span>50% Off</span>',
                        'slug' => '{"link":"https://shop1.shopifire.test/","button_text":"Order Now"}',
                        'type' => $type,
                        'category_id' => null,
                        'featured' => 0,
                        'menu_status' => 0,
                        'status' => 1,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                case 'special_menu':
                    return [
                        'name' => $this->faker->sentence(),
                        'slug' => '{"days":"Monday - Saturdays","time":"09:00AM - 18:00PM","link":"https://shop1.shopifire.test/"}',
                        'type' => $type,
                        'category_id' => null,
                        'featured' => 1,
                        'menu_status' => 0,
                        'status' => 1,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                default:
                    // Handle any other type if necessary
                    return [
                        'name' => $faker->word,
                        'slug' => $faker->hexColor,
                        'type' => $type,
                        'category_id' => null,
                        'featured' => $faker->numberBetween(0, 1),
                        'menu_status' => $faker->numberBetween(0, 1),
                        'status' => $faker->numberBetween(0, 1),
                        'created_at' => $faker->dateTimeBetween('-1 year', 'now'),
                        'updated_at' => $faker->dateTimeBetween('-1 year', 'now'),
                    ];
            }

    }
}
