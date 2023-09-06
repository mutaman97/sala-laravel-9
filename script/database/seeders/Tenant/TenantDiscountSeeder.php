<?php

namespace Database\Seeders\Tenant;

use Illuminate\Database\Seeder;
use App\Models\Discount;
use App\Models\Term;


class TenantDiscountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $discounts = [];

        // Get all random 'term_id' term IDs aka product Ids
        $termIds = Term::where('type', 'product')->pluck('id')->toArray();
        $endDate = now()->addMonths(6);

        for ($i = 1; $i <= 5; $i++) {

            $termIdKey = array_rand($termIds);
            $termId = $termIds[$termIdKey];

            $discounts[] = [
                'term_id' => $termId,
                'special_price' => rand(2, 3),
                'price_type' => rand(0, 1),
                'ending_date' => $endDate,
            ];
        }

        Discount::insert($discounts);
    }
}
