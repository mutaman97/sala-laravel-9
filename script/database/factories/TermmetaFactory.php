<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use Illuminate\Support\Facades\File;


use App\Models\Term;


class TermmetaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
                        // Term::factory(),
            'term_id' => Term::where('type', 'product')->inRandomOrder()->first()->id,
            'key' => $this->faker->randomElement(['excerpt', 'preview', 'description','meta','gallery','seo']),
            'value' => function (array $attributes) {
                // Add the conditions based on the 'key' attribute to generate appropriate 'value'
                switch ($attributes['key']) {
                    case 'excerpt':
                        return $this->faker->sentence();
                    case 'preview':
                        $directory = uploads_path('/dummy/22/01');

                        $files = File::allFiles($directory);
                        $randomFile = $this->faker->randomElement($files)->getRelativePathname();

                        logger($randomFile);
                        return $randomFile;
                    case 'description':
                        return $this->faker->paragraph();
                    case 'seo':
                        return '{"preview":"/uploads/dummy/21/12/61af7a4466fcf0712211638890052.jpg","title":"Lorem ipsum indoor plants","tags":"food, fair","description":"testing"}';

                    default:
                        return null;
                }
            },
        ];
    }
}
