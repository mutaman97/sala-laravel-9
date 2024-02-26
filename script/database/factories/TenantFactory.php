<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class TenantFactory extends Factory
{
    protected $model = Tenant::class;

    public function definition(): array
    {
        return [
            'uid'              => $this->faker->randomNumber(),
            'auto_renew'       => true,
            'will_expire'      => Carbon::now(),
            'status'           => $this->faker->randomNumber(),
            'data'             => $this->faker->words(),
            'lat'              => $this->faker->latitude(),
            'long'             => $this->faker->longitude(),
            'created_at'       => Carbon::now(),
            'updated_at'       => Carbon::now(),
//            'maintenance_mode' => $this->faker->words(),

            'user_id'  => User::factory(),
            'order_id' => Order::factory(),
        ];
    }
}
