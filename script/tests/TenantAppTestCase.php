<?php

namespace Tests;

use App\Models\Domain;
use App\Models\Getway;
use App\Models\Option;
use App\Models\Order;
use App\Models\Plan;
use App\Models\Tenant;
use App\Models\User;
use Drfraker\SnipeMigrations\SnipeMigrations;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Carbon\Carbon;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TenantAppTestCase extends BaseTestCase
{
    use CreatesApplication;

    protected User $merchant;

    public function setUp(): void
    {
        parent::setUp();

        $this->initializeTenancy();

        $this->merchant = User::find(1);
    }

    public function initializeTenancy()
    {
        $name = mt_rand(1, 1000);
        //TODO
        //$tax = Option::where('key','tax')->first()->value;
        $tax = 10;
        //if transaction successfull
        $plan_id = 3;
        $plan = Plan::findOrFail($plan_id);
        $getway_id = 14;
        $gateway = Getway::findOrFail($getway_id);
        $trx = mt_rand(1, 1000);
        $payment_status = 1;
        $status = 1;
        $tax_amount= ($plan->price / 100) * $tax;
        // Insert transaction data into order table
        $order = new Order;
        $order->plan_id = $plan_id;
        $order->user_id = 2;
        $order->getway_id = $gateway->id;
        $order->trx = $trx;
        $order->tax = $tax_amount;
        $order->price = $plan->price;
        $order->status = $status;
        $order->payment_status = $payment_status;
        $order->will_expire = Carbon::now()->addDays($plan->duration);
        $exp_days =  $plan->duration;
        $expiry_date = \Carbon\Carbon::now()->addDays($exp_days)->format('Y-m-d');
        $order->save();

        $plan_info=json_decode($plan->data ?? '');
        if(env('AUTO_DB_CREATE') == true) {
            if ($order->status == 1) {
                $tenant = new  Tenant;
                foreach ($plan_info ?? [] as $key => $value) {
                    $tenant->$key=$value;
                }
                $tenant->status=$status;
            }
            else{
                $tenant=new \App\Tenant;
                $tenant->status = 2;
            }
        }
        else{
            $tenant=new \App\Tenant;
            $tenant->status = 2;
        }
        $tenant->id=str($name)->slug();
        $tenant->uid=\App\Tenant::count()+1;
        $tenant->order_id=$order->id;
        $tenant->user_id=2;
        $tenant->will_expire=$expiry_date;
        $tenant->save();


        $domain=strtolower($name).'.'.env('APP_PROTOCOLESS_URL');
        $input = trim($domain, '/');
        if (!preg_match('#^http(s)?://#', $input)) {
            $input = 'http://' . $input;
        }
        $urlParts = parse_url($input);
        $domain = preg_replace('/^www\./', '', $urlParts['host'] ?? $urlParts['path']);


        $check= Domain::where('domain',$domain)->first();
        if (!empty($check)) {
            $error['errors']['domain']=__('Oops domain name already taken....!!');
            return response()->json($error,422);
        }

        $subdomain= new Domain;
        $subdomain->domain= $domain;
        $subdomain->tenant_id= $tenant->id;
        if (env('AUTO_SUBDOMAIN_APPROVE') == true) {
            $subdomain->status=1;
        }
        else{
            $subdomain->status=2;
        }
        $subdomain->type=2;
        $subdomain->save();

        tenancy()->initialize($tenant);
        URL::forceRootUrl('http://' . $domain);
    }

    public function tearDown(): void
    {
        foreach (Tenant::all() as $e)
        {
            $e->delete();
        }
        parent::tearDown();
    }
}
