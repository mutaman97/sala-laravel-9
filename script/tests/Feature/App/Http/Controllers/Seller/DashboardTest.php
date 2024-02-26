<?php

namespace Tests\Feature\App\Http\Controllers\Seller;

use Tests\TenantAppTestCase as TestCase;
use App\Models\User;

class DashboardTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test__authenticated_merchant_can_access_the_dashboard_page()
    {
        $response = $this->actingAs($this->merchant)->get('/seller/dashboard');

        $response->assertStatus(200);
    }

    public function test__unauthenticated_merchant_cannot_access_the_dashboard_page()
    {
        $response = $this->get('/seller/dashboard');

        $response->assertStatus(302);
        $response->assertRedirect('login');
    }

    public function test__login_redirects_to_the_dashboard_page()
    {

        $response = $this->post('/login', [
            'email' => 'store@sala.sd',
            'password' => '12345678'
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('seller/dashboard');
    }
}
