<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Cart;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectTo()
    {
        if (Auth::user()->role_id==1) {
          return $this->redirectTo=route('admin.dashboard');
        }
        elseif (Auth::user()->role_id==2) {

           return $this->redirectTo=route('merchant.dashboard');
       }
       elseif (Auth::user()->role_id==3) {

           return $this->redirectTo=url('/seller/dashboard');
       }elseif(Auth::user()->role_id==4)
       {
            return $this->redirectTo=url('/customer/dashboard');
       }elseif(Auth::user()->role_id==4)
       {
            return $this->redirectTo=url('/rider/dashboard');
       }

       $this->middleware('guest')->except('logout');
    }

    // Override the authenticated method to define what happens after a successful login
    protected function authenticated(Request $request, $user)
    {
         if ($user->role_id == 4) {
            Cart::instance('wishlist')->restore($user->email);
            logger($user);
        }
    }

    // Override the authenticated method to apply the restore.cart middleware
    // protected function authenticated($request, $user)
    // {
    //     // return $this->middleware('restore.cart')->only('authenticated');

    //     $this->middleware('restore.cart')->only('authenticated');

    // }

    // protected function authenticated($request, $user)
    // {
    //     // Apply the 'restore.cart' middleware after successful authentication
    //     // logger($user);
    //             $this->middleware('restore.cart')->only('authenticated');

    //     // return redirect()->intended($this->redirectTo())->withMiddleware('restore.cart');
    // }

        // Override the maxAttempts method to set the maximum number of login attempts
    protected function maxAttempts()
    {
        return 3; // Set the maximum number of login attempts to 2
    }

    // Override the decayMinutes method to set the lockout time (in minutes)
    protected function decayMinutes()
    {
        return 10; // Set the lockout time to 5 minutes
    }

    // public function login(Request $request)
    // {
    //     $this->validateLogin($request);

    //     // If the class is using the ThrottlesLogins trait, we can automatically throttle
    //     // the login attempts for this application. We'll key this by the username and
    //     // the IP address of the client making these requests into this application.
    //     if ($this->hasTooManyLoginAttempts($request)) {
    //         $this->fireLockoutEvent($request);

    //         return $this->sendLockoutResponse($request);
    //     }

    //     if ($this->attemptLogin($request)) {
    //         return $this->sendLoginResponse($request);
    //     }

    //     // If the login attempt was unsuccessful we will increment the number of attempts
    //     // to login and redirect the user back to the login form. Of course, when this
    //     // user surpasses their maximum number of attempts they will get locked out.
    //     $this->incrementLoginAttempts($request);

    //     return $this->sendFailedLoginResponse($request);
    // }
}
