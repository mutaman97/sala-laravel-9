<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Category;
use Illuminate\Support\Facades\File;


class CategorymetaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        // Available types for the 'type' column
        $availableTypes = ['category', 'product_feature', 'slider', 'short_banner', 'long_banner', 'special_menu'];

        // Retrieve the 'id' of a random 'shipping' category or other types
        // $categoryId = Category::whereIn('type', $availableTypes)->inRandomOrder()->value('id');

        $selectedCategory = Category::whereIn('type', $availableTypes)->inRandomOrder()->first();

        if ($selectedCategory) {
            $categoryId = $selectedCategory->id;
            $categoryType = $selectedCategory->type;
        } else {
            // Handle the case when no category is found
            // For example, you can set default values or show an error message.
            $categoryId = null;
            $categoryType = null;
        }



        if($categoryType == 'slider')
        {
            $directory = uploads_path('/dummy/21/12');
        }
        elseif($categoryType == 'short_banner')
        {
            $directory = uploads_path('/dummy/21/12');
        }
        elseif($categoryType == 'long_banner')
        {
            $directory = uploads_path('/dummy/21/12');
        }
        elseif($categoryType == 'special_menu')
        {
            $directory = uploads_path('/dummy/21/12');
        }
        else{
            $directory = uploads_path('/dummy/21/12');
        }

        $files = File::allFiles($directory);
        $randomFile = $this->faker->randomElement($files)->getRelativePathname();

        return
            [
                'category_id' => $categoryId,
                'type' => $this->faker->randomElement(['icon', 'description', 'preview']),
                'content' => function (array $meta) use ($randomFile) {
                    if ($meta['type'] === 'icon') {
                        return null;
                    }
                    elseif ($meta['type'] === 'preview') {
                        return $randomFile;
                    }
                    elseif ($meta['type'] === 'description') {
                        return $this->faker->paragraph();
                    }
                    return null;
                },
            ];
    }
}
