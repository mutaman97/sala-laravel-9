<?php

namespace Database\Seeders\Tenant;

use Illuminate\Database\Seeder;
use App\Models\Price;
use App\Models\Term;

class TenantPriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $prices = [];

        // Get all random 'term_id' term IDs aka product Ids
        $termIds = Term::where('type', 'product')->pluck('id')->toArray();

        foreach ($termIds as $termId) {

            $price = mt_rand(90, 500);
            $oldPrice = $price + ($price * 0.15);
            // $productOptionId = mt_rand(1, 20);

            $prices[] = [
                "term_id" => $termId,
                "productoption_id" => null,
                "category_id" => null,
                "price" => $price,
                "old_price" => [$oldPrice, null][rand(0, 1)],
                "qty" => rand(10, 30),
                "sku" => "PRO-". mt_rand(10000, 99999),
                "weight" => rand(5, 30),
                "stock_manage" => 1,
                "stock_status" => rand(0,1)

            ];
        }
        Price::insert($prices);
    }
}
