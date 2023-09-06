<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Auth;
class CalenderController extends Controller
{
    public function index()
    {
       abort_if(!getpermission('calender'),401);
       return view('seller.calender.index');
    }

    public function upcoming_orders()
    {
        $orders = Order::with('orderstatus','schedule')->whereHas('schedule')->where('status_id',3)->latest()->get()->map(function ($res) {
            // added by mutaman
            $dateString = $res->schedule->date;
            $timeString = $res->schedule->time;
            // Convert AM/PM time format to 24-hour format
            $dateTimeString = date("Y-m-d H:i", strtotime("$dateString $timeString"));
            $dateTime = \DateTime::createFromFormat('Y-m-d H:i', $dateTimeString)->format('Y-m-d\TH:i:s');
            // end added

            $order['title'] = $res->invoice_no;
            // $order['start'] = $res->schedule->date;
            $order['start'] = $dateTime;

            $order['end'] = $res->schedule->date;
            $order['url'] = route('seller.order.show',$res->id);
            $order['color'] = $res->orderstatus->slug ?? '';
            $order['allDay'] = false;

            return $order;

        });

        return response()->json($orders);
    }
}
