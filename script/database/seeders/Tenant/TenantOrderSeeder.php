<?php

namespace Database\Seeders\Tenant;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\User;

class TenantOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userIds = User::where('role_id', '4')->pluck('id')->toArray();
        $userIdsCount = count($userIds);

        $orders = [];
        $currentDate = now();
        $firstDayOfMonth = $currentDate->format('Y-m-01');
        $lastDayOfMonth = $currentDate->format('Y-m-t');

        for ($i = 1; $i <= 10; $i++) {
            $userId = $userIds[$i % $userIdsCount];

            $randomTimestamp = mt_rand(strtotime($firstDayOfMonth), strtotime($lastDayOfMonth));

            $randomDateTime = now()->setTimestamp($randomTimestamp);
            $randomDateTimeString = $randomDateTime->format('Y-m-d H:i:s');

            $orders[] = [
                'invoice_no' => 'INV-' . rand(1, 1000),
                'transaction_id' => 'TXN-' . rand(1, 1000),
                'getway_id' => rand(1, 3), // Replace with appropriate range based on your gateway data
                'user_id' => $userId, // Replace with the user_id you want to assign to the orders
                'payment_status' => ['paid', 'pending', 'failed'][rand(0, 2)],
                'status_id' => rand(1, 2), // Replace with appropriate range based on your status data
                'tax' => number_format(mt_rand() / mt_getrandmax() * 10, 2),
                'discount' => number_format(mt_rand() / mt_getrandmax() * 20, 2),
                'total' => rand(100, 1000),
                'order_method' => ['online', 'offline'][rand(0, 1)],
                'order_from' => ['web', 'mobile'][rand(0, 1)],
                'notify_driver' => rand(0, 1),
                'created_at' => $randomDateTimeString,
                'updated_at' => $randomDateTimeString,
            ];
        }
        Order::insert($orders);
    }
}
