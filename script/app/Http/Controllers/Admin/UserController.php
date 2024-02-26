<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Tenant;
use App\Models\Order;
use Carbon\Carbon;
use Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $info=User::find(Auth::id());
        $storesCount = Tenant::where('user_id', Auth::id())->with('orderwithplan')->count();
        $fund=number_format(Auth::user()->amount);

        $totalEarnings = null;
        if (Auth::user()->role_id == 3)
        {
            $year=Carbon::parse(date('Y'))->year;
            // $today=Carbon::today();
            $totalEarnings=Order::where('payment_status',1)->where('status_id',1)->whereYear('created_at', '=',$year)->sum('total');
            $totalEarnings=amount_format($totalEarnings);
        }
        return view('admin.settings.my_settings',compact('info','storesCount','fund','totalEarnings'));
    }

    public function genUpdate(Request $request)
    {
        $request->validate([
            // 'file' => 'image',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'phone_number' => 'required|string|min:10|max:10',
            'name' => 'required',
            // 'subscribed_to_newsletter' => 'required',

        ]);

        $info=User::find(Auth::id());


        $user=User::find(Auth::id());

        $user->name=$request->name;
        $user->email=$request->email;
        $user->phone=$request->phone_number;
        $user->subscribed_to_newsletter=$request->has('subscribed_to_newsletter');

        $user->save();



        return response()->json(['Updated Successfuly']);

    }

    public function updatePassword(Request $request)
    {
        $validatedData = $request->validate([
            'current' => ['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],

        ]);
        $user=User::where('id',Auth::id())->first();

        $check=Hash::check($request->current, $user->password);

        if ($check==true) {
            User::where('id',Auth::id())->update(['password'=>Hash::make($request->password)]);

            return response()->json([__('Password Changed Successfully')]);

        }
        else{

          return Response()->json(array(
            'message'   =>  __('Enter a Valid Password')
        ), 401);

      }
  }
}
