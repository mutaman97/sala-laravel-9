<?php

namespace Database\Seeders\Tenant;

use Illuminate\Database\Seeder;
use App\Models\Term;

class TenantTermSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = now()->format('Y-m-d H:i:s');

        $product_titles =[
            'Gucci nylon fabric smart unisex backpack',
            'Infinite - Blog & Magazine Script',
            'Varient - News & Magazine Script',
            'Black gold fashion backpack',
            'Black bag over the shoulder',
            'Women black leather handbag',
            'Blanket comfort couch pillow',
            'Handmade cute handbag',
            'Summer fashion top lace',
            'Women red casual dress',
            'Light blue women shirt',
            'Black sneakers with white sole',
            'Sun hat for women protection cap',
            'Women vintage collage art design',
            'Fashionable black and white sneakers',
            'Moment of inspiration piano music',
            'Women casual dress',
            'Intro animation with purple background and white triangles',
            'Adorable animals photo pack',
            'Motivation piano with cello and drums',
            'Cobalt men t-shirt all colors',
            'Adidas daily unisex shoes',
            'Vastu plants for your house',
            'Vastu plants for your house',
            'Men\'s sport shoe',
            'Women lace blouse with different colors',
            'Futuristic landscape animation',
            'Sneaker shoes men',
            'Wr Racing Pro License keys',
            'Modern blue handbag',
            'Animation of popular vacation spots',
            'Men\'s lace formal casual fashion shoe',
            'Men outerwear navy color',
            'Ship illustration royalty free image',
            'Seychelles women\'s brown ankle bootie',
            'Floral women sundress',
            'Animal colorful digital prints',
            'Navy blue skate shoes',
            'Women kipling bailey saddle handbag',
            'Black midi skirt with white flowers',
            'Black fashion women backpack',
            'Modern grey couch and pillows',
            'Navy polka dot dress',
            'Women\'s ankle boot with different colors',
            'Adidas daily unisex shoes'
        ];

        $blog_posts =[
        'There are many variations of passages',
        'All the Lorem Ipsum generators on the Internet',
        'Many desktop publishing packages',
        'Certain circumstances and owing to the claims',
        'Decisively advantages nor expression',
        'Contrary to popular belief, Lorem Ipsum is not simply random text',
        'Various versions have evolved over the years',
        'Lose away off why half led have near'
        ];

        $pages_titles =[
            'Terms & Conditions',
            'Privacy Policy'
        ];

        $now = now()->format('Y-m-d H:i:s');
        $full_id = 1111;

        $dataSets = [
            ['data' => $product_titles, 'type' => 'product', 'rating' => true],
            ['data' => $blog_posts, 'type' => 'blog', 'rating' => false],
            ['data' => $pages_titles, 'type' => 'page', 'rating' => false],
        ];

        $terms = [];

        foreach ($dataSets as $dataSet) {
            foreach ($dataSet['data'] as $title) {
                $slug = str($title)->slug();
                $terms[] = [
                    'full_id' => $full_id,
                    'title' => $title,
                    'slug' => $slug,
                    'type' => $dataSet['type'],
                    'is_variation' => 0,
                    'status' => 1,
                    'featured' => null,
                    'created_at' => $now,
                    'updated_at' => $now,
                    'rating' => $dataSet['rating'] ? rand(1, 5) : null,
                ];
                $full_id++;
            }
        }

        Term::insert($terms);
    }
}
