<?php

namespace Database\Seeders\Tenant;

use Illuminate\Database\Seeder;
use App\Models\Location;

class TenantLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $location_cities = [
            'مدني',
            'القضارف',
            'الدمازين',
            'كسلا',
            'الخرطوم',
            'أم درمان',
            'الأبيض',
            'الفاشر',
            'دنقلا',
            'كريمة',
            'مروي',
            'بورت سودان',
            'عطبرة',
            'شندي',
            'كنانة',
            'سنار',
            'نيالا',
            'كادقلي',
            'كوستي',
        ];

        $locations = [];
        $now = now()->toDateTimeString();

        foreach($location_cities as $city)
        {
            $locations[] = [
                // "id" => $i,
                "name" => $city,
                "slug" => str($city)->slug(), // Use the same $name variable here for generating the slug
                "avatar" => null,
                "lat" => null,
                "long" => null,
                "range" => rand(5, 20),
                "featured" => 1,
                "status" => 1,
                "created_at" => $now,
                "updated_at" => $now,
            ];
        }

        Location::insert($locations);
    }
}
