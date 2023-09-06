<?php

namespace Database\Seeders\Tenant;

use Illuminate\Database\Seeder;
use App\Models\Review;
use App\Models\Order;
use App\Models\User;
use App\Models\Term;


class TenantReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $now = now();

        $reviews = [];

        // Get all random 'parent_attribute' category IDs
        // $userIds = User::pluck('id')->toArray();
        $userIds = User::where('role_id', '4')->pluck('id')->toArray();
        $userIdsCount = count($userIds);
        // Get all random 'order_id' order IDs
        $orderIds = Order::where('status_id', '1')->pluck('id')->toArray();
        $orderIdsCount = count($orderIds);
        // Get all random 'term_id' term IDs aka product Ids
        $termIds = Term::where('type', 'product')->pluck('id')->toArray();
        $termIdsCount = count($termIds);

        $comments = [
            'Good product',
            'Not good',
            'Thanks',
            'Good',
            'Could be better',
            'Excellent quality',
            'Disappointed',
            'Average',
            'Highly recommended',
            'Not worth the price',
            'Great value',
            'Fast shipping',
            'Impressive',
            'Quality could improve',
            'Satisfied',
            'Needs improvement',
            'Love it!',
            'Below expectations',
            'Perfect',
            'Meh',
        ];

        foreach ($comments as $index => $comment){
        // for ($i = 1; $i <= 15; $i++) {

            $userId = $userIds[$index % $userIdsCount];
            $orderId = $orderIds[$index % $orderIdsCount];
            $termId = $termIds[$index % $termIdsCount];

            $comment = $comments[$index % count($comments)];

            $reviews[] = [
                'order_id' => $orderId,
                'user_id' => $userId,
                'term_id' => $termId,
                'rating' => rand(1, 5),
                'comment' => $comment,
                'created_at' => $now,
                'updated_at' => $now,

            ];
        }

        Review::insert($reviews);


    //     $reviews=array(
    //     array(
    //         "id" => 3,
    //         "order_id" => 1,
    //         "user_id" => 1,
    //         "term_id" => 1,
    //         "rating" => 5,
    //         "comment" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s",
    //         "created_at" => "2021-12-01 08:03:30",
    //         "updated_at" => "2022-01-04 16:46:18"
    //     ),
    //     array(
    //         "id" => 4,
    //         "order_id" => 1,
    //         "user_id" => 1,
    //         "term_id" => 1,
    //         "rating" => 5,
    //         "comment" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s",
    //         "created_at" => "2021-12-01 08:03:30",
    //         "updated_at" => "2022-01-04 16:46:18"
    //     ),
    //     array(
    //         "id" => 5,
    //         "order_id" => 1,
    //         "user_id" => 1,
    //         "term_id" => 1,
    //         "rating" => 1,
    //         "comment" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s",
    //         "created_at" => "2021-12-01 08:03:30",
    //         "updated_at" => "2022-01-04 16:46:18"
    //     ),
    //     array(
    //         "id" => 6,
    //         "order_id" => 1,
    //         "user_id" => 1,
    //         "term_id" => 1,
    //         "rating" => 5,
    //         "comment" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s",
    //         "created_at" => "2021-12-01 08:03:30",
    //         "updated_at" => "2022-01-04 16:46:18"
    //     ),
    //     array(
    //         "id" => 8,
    //         "order_id" => 2,
    //         "user_id" => 1,
    //         "term_id" => 10,
    //         "rating" => 5,
    //         "comment" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s",
    //         "created_at" => "2022-01-04 16:42:18",
    //         "updated_at" => "2022-01-04 16:46:18"
    //     ),
    //     array(
    //         "id" => 9,
    //         "order_id" => 2,
    //         "user_id" => 1,
    //         "term_id" => 12,
    //         "rating" => 3,
    //         "comment" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s",
    //         "created_at" => "2022-01-04 17:27:54",
    //         "updated_at" => "2022-01-04 17:27:54"
    //     ),
    //     array(
    //         "id" => 10,
    //         "order_id" => 3,
    //         "user_id" => 1,
    //         "term_id" => 1,
    //         "rating" => 4,
    //         "comment" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s",
    //         "created_at" => "2022-01-04 17:29:11",
    //         "updated_at" => "2022-01-04 17:29:11"
    //     ),
    //     array(
    //         "id" => 11,
    //         "order_id" => 4,
    //         "user_id" => 1,
    //         "term_id" => 11,
    //         "rating" => 5,
    //         "comment" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s",
    //         "created_at" => "2022-01-04 17:29:25",
    //         "updated_at" => "2022-01-04 17:29:25"
    //     )
    // );

    //     Review::insert($reviews);
    }
}
