<?php

namespace Database\Seeders\Tenant;

use Illuminate\Database\Seeder;
use App\Models\Getway;
class TenantGetwaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $getways=array(
           
            array(
                'id' => 1,
                'name' => 'Mbok',
                'logo' => 'uploads/gateway/mbok.png',
                'rate' => '1',
                'charge' => '2',
                'namespace' => 'App\Lib\CustomGetway',
                'currency_name' => 'SDG',
                'is_auto' => '0',
                'image_accept' => '0',
                'test_mode' => '0',
                'status' => '1',
                'phone_required' => '0',
                'instruction' => 'After successful payment send the screenshot of notification to this whatsapp number:
+249999019012',
                "data" => '{"name":"Mutaman Elhadi Ibrahim","account_number":"2622773","branch":"Almanshia"}',
                "created_at" => '2021-04-15 02:44:46',
                "updated_at" => '2021-04-15 02:44:46'
                ),
            array(
                'id' => 2,
                'name' => 'Fawry',
                'logo' => 'uploads/gateway/fawry.png',
                'rate' => '1',
                'charge' => '2',
                'namespace' => 'App\Lib\CustomGetway',
                'currency_name' => 'SDG',
                'is_auto' => '0',
                'image_accept' => '0',
                'test_mode' => '0',
                'status' => '1',
                'phone_required' => '0',
                'instruction' => 'After successful payment send the screenshot of notification to this whatsapp number:
+249999019012',
                "data" => '{"name":"Mutaman Elhadi Ibrahim","account_number":"2622773","branch":"Almanshia"}',
                "created_at" => '2021-04-15 02:44:46',
                "updated_at" => '2021-04-15 02:44:46'
                ),
            array(
                'id' => 3,
                'name' => 'Ocash',
                'logo' => 'uploads/gateway/ocash.png',
                'rate' => '1',
                'charge' => '2',
                'namespace' => 'App\Lib\CustomGetway',
                'currency_name' => 'SDG',
                'is_auto' => '0',
                'image_accept' => '0',
                'test_mode' => '0',
                'status' => '1',
                'phone_required' => '0',
                'instruction' => 'After successful payment send the screenshot of notification to this whatsapp number:
+249999019012',
                "data" => '{"name":"Mutaman Elhadi Ibrahim","account_number":"2622773","branch":"Almanshia"}',                "created_at" => '2021-04-15 02:44:46',
                "updated_at" => '2021-04-15 02:44:46'
            )
    );

    Getway::insert($getways);
        
    }
}
