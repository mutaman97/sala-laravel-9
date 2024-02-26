<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;

// use App\Models\Location;
// use App\Models\Order;
// use App\Models\Review;
// use App\Models\Category;
// use App\Models\Categorymeta;
// use App\Models\Discount;
// use App\Models\Term;
use App\Models\Termmeta;
// use App\Models\Termcategory;
// use App\Models\Shippingcategory;
// use App\Models\Price;
// use App\Models\Productoption;




class TenantDataBaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    private $themes;

    public function __construct()
    {
        // $file=file_get_contents('theme/themes.json');
        // $this->$themes = json_decode($file);

        // disabled by mutaman to allow testing to work
//        $file=File::get('theme/themes.json');
//        $this->themes = json_decode($file);

        $file = 'theme/themes.json';

        if (File::exists($file)) {
            $fileContent = File::get($file);
            $this->themes = json_decode($fileContent);
        } else {
            // Handle the case when the file doesn't exist
            $this->themes = []; // or set it to some default value
        }

    }

    public function run()
    {
     //  $tenantTheme = ucfirst($this->getTenantTheme());
	$tenantTheme = "Elham";
        switch ($tenantTheme) {
            case 'Elham':

                $this->call([
                        \Database\Seeders\Tenant\TenantDBSeeder::class,
                        \Database\Seeders\Tenant\TenantOptionSeeder::class,
                        \Database\Seeders\Tenant\TenantGetwaySeeder::class,
                        \Database\Seeders\Tenant\TenantMenuSeeder::class,
                        \Database\Seeders\Tenant\TenantCategorySeeder::class,
                        \Database\Seeders\Tenant\TenantLocationSeeder::class,
                        \Database\Seeders\Tenant\TenantShippingcategoriesSeeder::class,
                        \Database\Seeders\Tenant\TenantTermSeeder::class,
                        \Database\Seeders\Tenant\TenantTermmetaSeeder::class,
                        \Database\Seeders\Tenant\TenantProductoptionSeeder::class,
                        \Database\Seeders\Tenant\TenantOrderSeeder::class,
                        \Database\Seeders\Tenant\TenantOrderitemSeeder::class,
                        \Database\Seeders\Tenant\TenantReviewSeeder::class,
                        \Database\Seeders\Tenant\TenantPriceSeeder::class,
                        \Database\Seeders\Tenant\TenantTermcategoriesSeeder::class,
                        \Database\Seeders\Tenant\TenantDiscountSeeder::class,
                ]);


                // TODO THIS PART
                // foreach(['status', 'parent_attribute', 'child_attribute', 'category', 'tag', 'brand', 'shipping', 'product_feature', 'slider', 'short_banner', 'large_banner', 'special_menu'] as $type)
                // {
                //     Category::factory()->times(3)->create(['type' => $type]);
                // }
                // Loop through each type and create 3 records for each type
                // foreach (['category', 'product_feature', 'slider', 'short_banner', 'long_banner', 'special_menu'] as $type) {
                //     Categorymeta::factory()->times(3)->create(['type' => $type]);
                // }





                // Done
                // Category::factory()->count(25)->create();
                // Categorymeta::factory()->count(30)->create();
                // Location::factory()->count(10)->create();
                // Shippingcategory::factory()->count(10)->create();


                // Term::factory()->count(70)->create();
                // Termmeta::factory()->count(40)->create();
                // Productoption::factory()->count(10)->create();

                // Order::factory()->count(50)->create();
                // Review::factory()->count(25)->create();
                // Price::factory()->count(50)->create();

                // Termcategory::factory()->count(50)->create();
                // Discount::factory()->count(10)->create();




                break;
            case 'Grshop':
                $this->call([
                    \Database\Seeders\Tenant\TenantDBSeeder::class,
                    \Database\Seeders\Tenant\TenantOptionSeeder::class,
                    \Database\Seeders\Tenant\TenantCategorySeeder::class,
                    \Database\Seeders\Tenant\TenantLocationSeeder::class,
                    \Database\Seeders\Tenant\TenantGetwaySeeder::class,
                    \Database\Seeders\Tenant\TenantMenuSeeder::class,
                    \Database\Seeders\Tenant\TenantShippingcategoriesSeeder::class,
                    \Database\Seeders\Tenant\TenantTermSeeder::class,
                    \Database\Seeders\Tenant\TenantTermmetaSeeder::class,
                    \Database\Seeders\Tenant\TenantProductoptionSeeder::class,
                    \Database\Seeders\Tenant\TenantOrderSeeder::class,
                    \Database\Seeders\Tenant\TenantReviewSeeder::class,
                    \Database\Seeders\Tenant\TenantPriceSeeder::class,
                    \Database\Seeders\Tenant\TenantTermcategoriesSeeder::class,
                    \Database\Seeders\Tenant\TenantDiscountSeeder::class,
            ]);
                break;
            default:
                // handle default theme
                break;
        }

        foreach ($this->themes as $key => $value)
        {
            if($value->name == $tenantTheme)
            {
                $data = $value;
                $tenant = tenant();
                $tenant->theme = $data->view_path;
                $tenant->save();
            }
        }

    }

    public function getTenantTheme(): string
    {
        $storeData = Session::get('store_data');
        $tenantTheme = $storeData['theme'] ?? '';
        if(empty($tenantTheme)) {

            $tenantTheme = 'Elham';
        }
        return $tenantTheme;
    }
}
