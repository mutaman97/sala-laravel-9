<?php

namespace Database\Seeders\Tenant;

use Illuminate\Database\Seeder;
use App\Models\Shippingcategory;

use App\Models\Location;
use App\Models\Category;

class TenantShippingcategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $shippingCategoriesData = [];

        for ($i = 1; $i <= 10; $i++) {
            // Retrieve the 'id' of a random 'shipping' category
            $categoryId = Category::where('type', 'shipping')->inRandomOrder()->value('id');
            $locationId = Location::inRandomOrder()->value('id');

            $shippingCategoriesData[] = [
                'category_id' => $categoryId,
                'location_id' => $locationId,
            ];
        }

        Shippingcategory::insert($shippingCategoriesData);
    }





        // $data=array(
        //     array(
        //         "category_id" => 30,
        //         "location_id" => 5
        //     ),
        //     array(
        //         "category_id" => 30,
        //         "location_id" => 4
        //     ),
        //     array(
        //         "category_id" => 30,
        //         "location_id" => 3
        //     ),
        //     array(
        //         "category_id" => 51,
        //         "location_id" => 6
        //     ),
        //     array(
        //         "category_id" => 51,
        //         "location_id" => 5
        //     )
        // );
        // Shippingcategory::insert($data);

}
