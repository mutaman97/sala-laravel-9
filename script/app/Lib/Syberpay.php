<?php
namespace App\Lib;
use Session;
use Illuminate\Session\Store;
use Illuminate\Http\Request;
use Http;
use Str;
use App\Models\Plan;
use App\Models\Option;
use App\Models\Getway;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\RedirectResponse;


use Carbon\Carbon;


class Syberpay {

    public static function redirect_if_payment_success()
    {
        if(Session::has('fund_callback'))
            {
                return url(Session::get('fund_callback')['success_url']);
            }else{
                return url('partner/payment/success');
            }
    }

    public static function redirect_if_payment_faild()
    {
        if(Session::has('fund_callback'))
            {
                return url(Session::get('fund_callback')['cancel_url']);
            }else{
                return url('partner/payment/failed');
            }
    }

    public static function fallback()
    {
        if (tenant() != null) {
           return url('/order/payment/flutterwave');
        }
        return url('payment/flutterwave');
    }

    public static function make_payment($array)
    {
        $currency = $array['currency'];
        $email = $array['email'];
        $phone=$array['phone'];
        $amount = $array['pay_amount'];
        $name = $array['name'];
        $billName = $array['billName'];
        $payment_type = $array['payment_type'];

        $data['syberpayURL'] = $array['syberpayURL'];
        $data['applicationId'] = $array['applicationId'];
        $data['serviceId'] = $array['serviceId'];
        $data['salt'] = $array['salt'];
        $data['key'] = $array['key'];
        $data['payeeId'] = $array['payeeId'];

        $data['paymentMode'] = 'syberpay';
        $test_mode = $array['test_mode'];
        $data['testMode'] = $test_mode;

        $data['amount'] = $amount;
        $data['charge'] = $array['charge'];
        $data['phone'] = $array['phone'];
        $data['getwayId'] = $array['getway_id'];
        $data['mainAmount'] = $array['amount'];

        $data['billName'] = $billName;
        $data['name'] = $name;
        $data['email'] = $email;
        $data['currency'] = $currency;

        $data['paymentType']=$array['payment_type'];




        $headers = array( 'Content-Type: application/json');
        // $order_model=config('Syber_pay.order_model');
        // $order_price_column=config('Syber_pay.order_price_column');
        // $customer_name_column=config('Syber_pay.customer_name_column');
        // $order_payment_status_column=config('Syber_pay.order_payment_status_column');

        $syberpayURL = $array['syberpayURL'] . 'getUrl';
        $applicationId = $array['applicationId'];
        $serviceId = $array['serviceId'];
        $key = $array['key'];
        $payeeId = $array['payeeId'];
        $salt= $array['salt'];



        $user_id=auth()->user()->id;
        $charge = $array['charge'];
        $plan_id = session()->get('plan');
        $getway_id = $array['getway_id'];
        $session_id = session()->getId();



        $customerName=$array['name'];
        //return $syberpayURL;
        $currencyDesc = 'SDG';
        $orderId = mt_rand(1,10000);
        $data['orderId'] = $orderId;

        // $orderId = $array['billName'];
        // $userid = auth()->user()->id;
        //return $orderId;
        //return   DB::table('tickets')->get();
        $totalAmount = $array['amount'];
        $HashedData =  hash('sha256', $key . '|' .$applicationId .'|' .$serviceId .'|' .$totalAmount .'|' .$currencyDesc .'|' .$orderId .'|' . $salt);

        //  Payment info here
        $paymentInfo = array('sessionId' => $session_id , 'orderNo' => $orderId , 'customerName' => $customerName, 'paymentType' => $payment_type, 'charge' => $charge, 'planId' => $plan_id, 'getwayId' => $getway_id, 'userId' => $user_id );
        // PHP Array contain all request body parameters
        $jsonDataArray = array(
            'applicationId' =>  $applicationId ,
            'serviceId' => $serviceId ,
            'payeeId'=>$payeeId ,
            'customerRef' => $orderId ,
            'amount' => $totalAmount ,
            'currency' => $currencyDesc ,
            'responseData' => $paymentInfo,
            'hash' => $HashedData
        );

        if($test_mode == 0){
            $data['env']=false;
            $test_mode=false;
        }
        else{
            $data['env']=true;
            $test_mode=true;
        }


//  added by mutaman

        // Convert PHP array into JSON object
        $jsonData = json_encode( $jsonDataArray );

        // Using CURL to send post request
        $ch = curl_init();

        // Set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $syberpayURL);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true );

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);

        // Execute post
        $result = curl_exec($ch);
        curl_close($ch);


        $result_array = json_decode($result, true);

        // Log::info($result_array);

        // dd($result_array);


        if ( !isset($result_array['paymentUrl']) ) {
            abort(404);
        }
        ///save transaction to the payment table

       // return
       $paymentUrl = $result_array['paymentUrl'];
        // return $result_array;

        Session::put('syberpay_credentials', $data);


       return redirect($paymentUrl);

  // end added

    }


    public function notify(Request $request)
    {

        // Session::put('syberpay_credentials', $data);
        // if (!Session::has('syberpay_credentials')) {
        //     return abort(404);
        // }
        // $info = Session::get('syberpay_credentials');
        // $test_mode = Session::get('syberpay_credentials')['test_mode'];
        // $secret_key = Session::get('syberpay_credentials')['secret_key'];

        $headers = array( 'Content-Type: application/json');
        // $order_model=config('Syber_pay.order_model');
        // $order_price_column=config('Syber_pay.order_price_column');
        // $customer_name_column=config('Syber_pay.customer_name_column');
        // $order_payment_status_column=config('Syber_pay.order_payment_status_column');
        $gateway = Getway::where('namespace', 'App\Lib\Syberpay')->firstOrFail();
        $credentials = json_decode($gateway->data);
        $gateway_id = $gateway->id;
        // dd($gateway_id);

        if (!empty($credentials)) {
            foreach ($credentials as $key => $info) {
                $cred[$key] = $info;
            };
        }
        // return response()->json($cred);


        // Log::info($cred);
        // dd($cred);
        $syberpayURL = $cred['syberpayURL'] . 'payment_status';
        $applicationId = $cred['applicationId'];
        $serviceId = $cred['serviceId'];
        $key = $cred['key'];
        $payeeId = $cred['payeeId'];
        $salt= $cred['salt'];

        // Log::info($request);
        // dd($request);

        if ($request->transactionId && $request->token)
        {

            $transactionId = $request->transactionId;
            $token = $request->token;
            $syberHash = $request->hash;

            $salaHash = hash('sha256', $key . '|' . $transactionId . '|' . $token . '|' . $salt);
            if ($syberHash != $salaHash)
            {
                abort(404);
            }



            $headers = array('Content-Type: application/json');
            $hashData = hash('sha256', $key . '|' . $applicationId . '|' . $transactionId . '|' . $salt);
            $jsonData = '{"applicationId":"' . $applicationId . '","transactionId":"' . $transactionId . '","hash":"' . $hashData . '"}';
            $ch = curl_init();


            // Set the url, number of POST vars, POST data
            curl_setopt($ch, CURLOPT_URL, $syberpayURL);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);

            // Execute post
            $result = curl_exec($ch);

            curl_close($ch);

            $result_array = json_decode($result, true);
            // $data['result_array'] = $result_array;


            if ($result_array['payment']['status'] == "Successful") {

                $session_id = '9IGDh7NYyIepIgu4vvINZ182yqeEAN864PQRIv1V';
                // $session_id = $result_array['payment']['responseData']['sessionId'];
                $handler = session()->getHandler();
                // $data = $handler->read($session_id);
                $session_data = unserialize($handler->read($session_id));

                // $session_data['session'] = $session_data;


                // $data = session()->get($sessionId);
                // return response()->json($session_data['syberpay_credentials']['orderId']);
                // return response()->json($session_data);





                $data['payment_id'] =$session_data['syberpay_credentials']['orderId'];
                $data['payment_method'] = "syberpay";
                $data['payment_type'] = $session_data['syberpay_credentials']['paymentType'];

                // $data['payment_type']=$array['payment_type'];

                $data['getway_id'] = $session_data['syberpay_credentials']['orderId'];

                $data['amount'] = $session_data['syberpay_credentials']['amount'];
                $data['charge'] = $session_data['syberpay_credentials']['charge'];
                $data['status'] = 1;
                $data['payment_status'] = 1;

                // return response()->json($data);




                Session::forget('syberpay_credentials');
                Session::put('payment_info',$data);

                return redirect(Syberpay::redirect_if_payment_success());
                // return redirect()->action([Syberpay::class, 'redirect_if_payment_success'])->withInput();
                // return redirect()->to(Syberpay::redirect_if_payment_success())->withInput();

                if (!session()->has('payment_info') && session()->get('payment_info')['payment_status'] != 1 && !session()->has('payment_type')) {
                    abort(404);
                }

                // check this again

                // abort_if(session()->get('payment_info')['payment_type'] != 'new_plan_enroll',404);

                $tax = Option::where('key','tax')->first();

                $plan_id = $result_array['payment']['responseData']['planId'];
                $plan = Plan::findOrFail($plan_id);
                // $getway_id = $request->session()->get('payment_info')['getway_id'];
                $getway_id = $result_array['payment']['responseData']['getwayId'];
                $gateway = Getway::findOrFail($getway_id);

                $trx = $request->session()->get('payment_info')['payment_id'];
                $payment_status = $request->session()->get('payment_info')['payment_status'] ?? 0;
                $status = $request->session()->get('payment_info')['status'] ?? 1;

                $tax_amount= ($plan->price / 100) * $tax->value;
                // Insert transaction data into order table

                DB::beginTransaction();
                try {




                $order = new Order;
                $order->plan_id = $plan_id;
                $order->user_id = $result_array['payment']['responseData']['userId'];;

                $order->getway_id = $gateway->id;

                $order->trx = $trx;
                $order->tax = $tax_amount;
                $order->price = $plan->price;
                $order->status = $status;
                $order->payment_status = $payment_status;
                $order->will_expire = Carbon::now()->addDays($plan->duration);

                $order->save();

                Session::put('order_id', $order->id);


                //ordermeta
                if($gateway->is_auto == 0){
                    $data = Session::get('payment_info')['meta'] ?? '';

                    $order->ordermeta()->create([
                        'key'=>'orderinfo',
                        'value'=>json_encode($data)
                    ]);

                }

                 DB::commit();

                } catch (\Throwable $th) {
                  DB::rollback();
                   Session::forget('payment_info');
                   Session::flash('message', 'Something wrong please contact with support..!');
                   Session::flash('type', 'error');
                  return to_route('merchant.plan.index');
                }


                $status = Session::get('payment_info')['payment_status'];

                Session::put('order_status', $status);
                Session::flash('message', __('Transaction Successfully Complete!'));
                Session::flash('type', 'success');
                Session::forget('payment_info');


                if ($status != 0) {
                    return to_route('merchant.plan.enroll');
                }else{
                    return to_route('merchant.plan.index');
                }

           }
           else{
               $data['payment_status'] = 0;
               Session::put('payment_info',$data);
               Session::forget('syberpay_credentials');
               return redirect(Syberpay::redirect_if_payment_faild());
           }
        }
    }
}


?>
