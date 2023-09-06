<?php

namespace Database\Seeders\Tenant;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\Orderitem;
use App\Models\Term;

class TenantOrderitemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $terms = Term::where('type', 'product')->get();
        $termMap = $terms->pluck('id')->toArray();

        // Get orders
        $orders = Order::get();

        foreach ($orders as $order) {
            $orderitem = [];
            $orderId = $order->id;

            $loopCount = mt_rand(1, 4);

            for ($i = 1; $i <= $loopCount; $i++) { // Adjust the loop range as needed
                $termIdKey = array_rand($termMap);
                $termId = $termMap[$termIdKey];

                $term = $terms->where('id', $termId)->first();

                $price = $term->price->price ?? null;

                $quantity = mt_rand(1, 3);
                $amount = $quantity * $price;

                $orderitem[] = [
                    'order_id' => $orderId,
                    'term_id' => $termId,
                    // 'info' => json_encode([
                    //     "sku" => "",
                    //     "options" => [
                    //         "Color" => [
                    //             "21" => [
                    //                 "price" => $price,
                    //                 "sku" => $sku,
                    //                 "weight" => $weight,
                    //                 "name" => "Black",
                    //             ],
                    //         ],
                    //     ],
                    // ]),
                    'qty' => $quantity ,
                    'amount' => $amount
                ];
            }

            Orderitem::insert($orderitem);
        }
    }
}


// namespace Database\Seeders\Tenant;

// use Illuminate\Database\Seeder;
// use App\Models\Order;
// use App\Models\Orderitem;
// use App\Models\Term;

// use Faker\Factory as Faker;
// // use Illuminate\Support\Str;

// class TenantOrderitemSeeder extends Seeder
// {
//     /**
//      * Run the database seeds.
//      *
//      * @return void
//      */
//     public function run()
//     {

//         $faker = Faker::create('ar_SA');

//         $orderitem = [];
//         $now = now()->toDateTimeString();


//         // logger($userIds);

//         // Get all random 'order_id' order IDs
//         $orderIds = Order::where('status_id', '1')->pluck('id')->toArray();

//         // Get all random 'term_id' term IDs aka product Ids
//         $termIds = Term::where('type', 'product')->pluck('id')->toArray();


//         for ($i = 1; $i <= 100; $i++) {


//             $orderIdKey = array_rand($orderIds);
//             $orderId = $orderIds[$orderIdKey];

//             $termIdKey = array_rand($termIds);
//             $termId = $termIds[$termIdKey];


//             $orderitem[] = [
//                 'order_id' => $orderId,
//                 'term_id' => $termId,
//                 'info' => json_encode([
//                     "sku" => "",
//                     "options" => [
//                         "Color" => [
//                             "21" => [
//                                 "price" => 200,
//                                 "sku" => "0",
//                                 "weight" => 0,
//                                 "name" => "Black",
//                             ],
//                         ],
//                     ],
//                 ]),
//                 'qty' => $faker->numberBetween(1, 3), // Replace with appropriate range based on your gateway data
//                 'amount' => $faker->numberBetween(50, 500),
//             ];
//         }

//         Orderitem::insert($orderitem);
//     }
// }




