<?php

namespace Database\Seeders\Tenant;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Categorymeta;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class TenantCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = now();

        // STATUS SECTION
        $statuses = ['Complete', 'Cancel', 'Pending','Processing','Shipped','Delivered','Refunded','Failed'];

        $parent_attributes = ['Color','Size','Fabric','Material'];

        $child_attribute_data = [
            'Fabric' => ['silk', 'leather', 'Cotton', 'Nylon', 'Bamboo', 'Synthetic', 'Fabric Lining'],
            'Color' => ['Blue', 'Black', 'yellow', 'Purple', 'white', 'Brown'],
            'Size' => ['S', 'M', 'L', 'XL', 'XXL'],
            'Material' => ['Wood', 'Metal', 'Plastic', 'Glass', 'Ceramic', 'Fabric', 'Leather', 'Stone', 'Paper', 'Bamboo']
        ];

        $tags = [
            'Electronics',
            'Fashion',
            'Beauty',
            'Home & Kitchen',
            'Health & Wellness',
            'Sports & Outdoors',
            'Toys & Games',
            'Books & Media',
            'Jewelry & Watches',
            'Handmade & Artisanal',
            'Automotive',
            'Pet Supplies',
            'Baby & Maternity',
            'Office & School Supplies',
            'Groceries & Gourmet Foods',
            'Home Improvement',
            'Furniture & Decor',
            'Fitness & Exercise',
            'Travel & Luggage',
            'Gifts & Occasions',
        ];

        $brands = [
            'Nike',
            'Apple',
            'Samsung',
            'Adidas',
            'Amazon',
            'Microsoft',
            'Sony',
            'Louis Vuitton',
            'Gucci',
            'BMW',
            'Coca-Cola',
            'Toyota',
            'Puma',
            'HP',
            'Canon',
            'Zara',
            'H&M',
            'Uniqlo',
            'Nestle',
            'LOreal',
        ];

        $productFeatures = [
            'New',
            'Best Selling',
            'Limited Edition',
            'Top Rated',
            'On Sale',
            'Featured',
            'Trending',
            'Handmade',
            // Add more product features here
        ];

        $shippingOptions = [
            'Aramex Express',
            'DHL Express',
            'UPS Express',
            'FedEx',
            'الناقل',
            'Trakhees',
            'زول سبيد',
            'Zool Express',
        ];


        $allData = [
            'statuses' => [
                'values' => $statuses,

                'slug' => ['#ffc107','#dc3545','#028a74','#17a2b8','#007bff','#28a745','#6c757d','#dc3545'],
                'type' => 'status',
                'category_id' => null,
                'featured' => 1,
                'menu_status' => 1,
                'status' => 1,
            ],
            'parent_attributes' => [
                'values' => $parent_attributes,

                'slug' => null,
                'type' => 'parent_attribute',
                'category_id' => null,
                'featured' => 1,
                'menu_status' => 0,
                'status' => 1,
            ],

            'tags' => [
                'values' => $tags,

                'slug' => null,
                'type' => 'tag',
                'category_id' => null,
                'featured' => 1,
                'menu_status' => 0,
                'status' => 1,
            ],
            'brands' => [
                'values' => $brands,

                'slug' => null,
                'type' => 'brand',
                'category_id' => null,
                'featured' => 1,
                'menu_status' => 1,
                'status' => 1,
            ],
            'productFeatures' => [
                'values' => $productFeatures,

                'slug' => null,
                'type' => 'product_feature',
                'category_id' => null,
                'featured' => 1,
                'menu_status' => 1,
                'status' => 1,
            ],
            'shippingOptions' => [
                'values' => $shippingOptions,

                'slug' => null,
                'type' => 'shipping',
                'category_id' => null,
                'featured' => 1,
                'menu_status' => 1,
                'status' => 1,
            ]
        ];



        $insertData = [];
        foreach ($allData as $sectionKey => $sectionData) {
            $type = $sectionData['type'];
            $menu_status = $sectionData['menu_status'];
            $featured = $sectionData['featured'];
            $status = $sectionData['status'];
            $slugData = $sectionData['slug'];
            $values = $sectionData['values'];

            foreach ($values as $index => $value) {
                if (is_array($slugData)) {
                    $slug = isset($slugData[$index]) ? $slugData[$index] : null;
                } else {
                    $slug = $slugData;
                }

                if ($type == 'parent_attribute') {

                    $attributeTypes = ['radio', 'checkbox'];
                    $slug = $attributeTypes[rand(0, count($attributeTypes) - 1)];

                } elseif (!is_string($slug)) {
                    $slug = Str::slug($value, '-');
                }

                $insertData[] = [
                    'name' => $value,
                    'slug' => $slug,
                    'type' => $type,
                    'category_id' => null,
                    'featured' => $featured,
                    'menu_status' => $menu_status,
                    'status' => $status,
                    'created_at' => $now,
                    'updated_at' => $now,
                ];
            }
        }

        // Perform bulk insert
        Category::insert($insertData);

        // CHILD ATTRIBUTES SECTION
        $parentAttributes = Category::where('type', 'parent_attribute')
        ->whereIn('name', array_keys($child_attribute_data))
        ->get()
        ->keyBy('name');

        $childInsertData = [];
        foreach ($child_attribute_data as $attribute => $items) {
            $parent_attribute = $parentAttributes->get($attribute);

            if ($parent_attribute) {
                foreach ($items as $name) {
                    $slug = Str::slug($name, '-');

                    $childInsertData[] = [
                        'name' => $name,
                        'slug' => $slug,
                        'type' => 'child_attribute',
                        'category_id' => $parent_attribute->id,
                        'featured' => 0,
                        'menu_status' => 0,
                        'status' => 1,
                        'created_at' => $now,
                        'updated_at' => $now,
                    ];
                }
            }
        }

        // Perform bulk insert for child attributes
        Category::insert($childInsertData);

        // CATEGORIES SECTION
        $categories = [
            'Electronics',
            'Fashion',
            'Beauty',
            'Home & Kitchen',
            'Health & Wellness',
            'Sports & Outdoors',
            'Toys & Games',
            'Books & Media',
            'Jewelry & Watches',
            'Handmade & Artisanal',
            'Automotive',
            'Pet Supplies',
            'Baby & Maternity',
            'Office & School Supplies',
            'Groceries & Gourmet Foods',
            'Home Improvement',
            'Furniture & Decor',
            'Fitness & Exercise',
            'Travel & Luggage',
            'Gifts & Occasions',
        ];

        $category = [];
        $category_preview = [];
        $category_icon = [];

        foreach($categories as $index => $name){
            $slug = Str::slug($name, '-');

            $category = [
                // 'id' => $i,
                'name' => $name,
                'slug' => $slug,
                'type' => 'category',
                'category_id' => NULL,
                'featured' => 1,
                'menu_status' => ($index < 6) ? 1 : 0,
                'status' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ];

            $categoryId = Category::insertGetId($category);

            $directory = uploads_path('/dummy/category/');
            $randomFile = $this->getRandomFilePath($directory, $index);

            $category_preview = [
                "category_id" => $categoryId,
                "type" => "preview",
                "content" => env('APP_URL')."/uploads/dummy/category/$randomFile"
            ];

            $directory = uploads_path('/dummy/category_icons/');
            $randomFile = $this->getRandomFilePath($directory, $index);

            $category_icon = [
                "category_id" => $categoryId,
                "type" => "icon",
                "content" => env('APP_URL')."/uploads/dummy/category_icons/$randomFile"
            ];

            Categorymeta::insert($category_preview);
            Categorymeta::insert($category_icon);

        }

        // OPTIMIZED BY CHAT GPT TO ADD THE 2 LOOPS IN ONE LOOP
        $sliderData = range(1, 4);

        $sliderAndPreviewData = array_map(function ($i) {
            $slider_name = ['Buy Nice and Unique Clothes','Find Backpacks That Best Suit You'];
            $slider_description = ['Discover quality premium basics and trendy essentials at surprisingly affordable prices','Timeless, modern, and feminine pieces made with quality materials and craftsmanship'];

            $name = $slider_name[rand(0, 1)];
            $description = $slider_description[rand(0, 1)];
            $now = now()->toDateTimeString();

            $directory = 'slider';
            $randomFile = $this->getRandomFilePath(uploads_path("/dummy/$directory/"), $i);

            $slider = [
                "name" => $name,
                "slug" => '{"link":"/products","button_text":"View All"}',
                "type" => 'slider',
                "category_id" => NULL,
                "featured" => 1,
                'menu_status' => 0,
                "status" => 1,
                "created_at" => $now,
                "updated_at" => $now,
            ];

            $slider_preview = $this->generateSliderMeta($directory, $randomFile);
            $slider_description = $this->generateSliderDescription($description);

            return compact('slider', 'slider_preview','slider_description');
        }, $sliderData);

        foreach ($sliderAndPreviewData as $data){
            // Insert slider and get the inserted ID
            $sliderId = Category::insertGetId($data['slider']);

            // Update the category_id for the corresponding slider_preview item with the slider ID
            $data['slider_preview']['category_id'] = $sliderId;

            // Update the category_id for the corresponding slider_preview item with the slider ID
            $data['slider_description']['category_id'] = $sliderId;

            // Merge the slider_preview and slider_description arrays
            $combinedData = array_merge([$data['slider_preview']], [$data['slider_description']]);

            // Insert both slider_preview and slider_description
            Categorymeta::insert($combinedData);
        }

        // SPECIAL MENUS SECTION --- Disabled by mutaman
        // $SpecialMenus = [
        //     'Special discounts',
        //     'Ribs and Beer',
        //     'Limited Quantity',
        //     'Trending',
        //     // Add more product features here
        // ];


        // foreach($SpecialMenus as $name){

        //     $days = $faker->dayOfWeek() . ' - ' . $faker->dayOfWeek();
        //     $time = $faker->time('H:iA') . ' - ' . $faker->time('H:iA');
        //     $link = '#';

        //     $special_menu = [
        //         'name' => $name,
        //         'slug' => json_encode(['days' => $days, 'time' => $time, 'link' => $link]),
        //         'type' => 'special_menu',
        //         'category_id' => NULL,
        //         'featured' => 1,
        //         'menu_status' => 1,
        //         'status' => 1,
        //         'created_at' => $now,
        //         'updated_at' => $now,
        //     ];


        //     $specialMenuId = Category::insertGetId($special_menu);

        //     $special_menu_preview = [
        //         // "id" => 25,
        //         "category_id" => $specialMenuId,
        //         "type" => "preview",
        //         "content" => env('APP_URL')."/uploads/dummy/21/12/61af7a4466fcf0712211638890052.jpg"
        //     ];
        //     Categorymeta::insert($special_menu_preview);
        // }

        function generateBanners($count, $bannerType, $bannerWidth, $bannerLocation) {
            $banners = [];

            for ($i = 1; $i <= $count; $i++) {
                // $name = $faker->unique()->sentence();
                $banners[] = [
                    "name" => 'Banner',
                    'slug' => '{"link":"#","button_text":"Order Now","banner_width":"' . $bannerWidth . '","banner_location":"' . $bannerLocation . '"}',
                    "type" => $bannerType,
                    "category_id" => NULL,
                    "featured" => 0,
                    'menu_status' => 0,
                    "status" => 1,
                    "created_at" => now()->toDateTimeString(),
                    "updated_at" => now()->toDateTimeString(),
                ];
            }
            return $banners;
        }
        $short_banner = generateBanners(3, 'short_banner', '33.33', 'latest_products');
        $large_banner = generateBanners(2, 'large_banner', '50', 'top_rated_products');


        $short_banner_with_meta = array_map(function ($data) {
            $directory = 'short_banner';
            $randomFile = $this->getRandomFilePath(uploads_path("/dummy/$directory/"));

            $slider_preview = $this->generateSliderMeta($directory, $randomFile);

            $slider_description = $this->generateSliderDescription('Description');


            return compact('data', 'slider_preview', 'slider_description');
        }, $short_banner);

        foreach ($short_banner_with_meta as $item) {
            $shortBannerId = Category::insertGetId($item['data']);

            $item['slider_preview']['category_id'] = $shortBannerId;
            $item['slider_description']['category_id'] = $shortBannerId;

            $combinedData = array_merge([$item['slider_preview']], [$item['slider_description']]);
            Categorymeta::insert($combinedData);
        }

        // Similar optimization for large_banner
        $large_banner_with_meta = array_map(function ($data) {
            $directory = 'large_banner';
            $randomFile = $this->getRandomFilePath(uploads_path("/dummy/$directory/"));

            $slider_preview = $this->generateSliderMeta($directory, $randomFile);

            $slider_description = $this->generateSliderDescription('Description');

            return compact('data', 'slider_preview', 'slider_description');
        }, $large_banner);

        foreach ($large_banner_with_meta as $item) {
            $largeBannerId = Category::insertGetId($item['data']);

            $item['slider_preview']['category_id'] = $largeBannerId;
            $item['slider_description']['category_id'] = $largeBannerId;

            $combinedData = array_merge([$item['slider_preview']], [$item['slider_description']]);
            Categorymeta::insert($combinedData);
        }

    }
    // Common function to generate slider meta data
    function generateSliderMeta($directory, $randomFile) {
        return [
            'category_id' => NULL,
            'type' => 'preview',
            'content' => env('APP_URL') . "/uploads/dummy/$directory/$randomFile",
        ];
    }
    // Common function to generate slider meta data
    function generateSliderDescription($content) {
        return [
            'category_id' => NULL,
            'type' => 'description',
            'content' => $content,
        ];
    }
    // Common function to generate random file
    function getRandomFilePath($directory, $index = 0) {
        $files = File::allFiles($directory);

        if ($index === 0) {
            return $files[rand(0, count($files) - 1)]->getRelativePathname();
        } else {
            $currentFileIndex = ($index - 0) % count($files);
            return $files[$currentFileIndex]->getRelativePathname();
        }
    }
}
