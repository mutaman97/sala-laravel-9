<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Auth;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
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
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }

    public function redirectTo()
    {
        session()->flash('status', __('Your email verified successfuly'));

        if (Auth::user()->role_id==2) {
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
    }

    protected function getDashboardRoute()
    {
        // Determine the appropriate dashboard route based on the user's role
        switch (Auth::user()->role_id) {
            case 2:
                return route('merchant.dashboard');
            case 3:
                return url('/seller/dashboard');
            case 4:
                return url('/customer/dashboard');
            case 5:
                return url('/rider/dashboard');
            // Add more cases for other roles as needed

            default:
                return route('home'); // Default route if the user's role is not matched
        }
    }

    public function resend(Request $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            session()->flash('status', __('Your email is already verified'));
            return redirect()->to($this->getDashboardRoute()); // Use 'to' method to redirect to the route
        }

        $request->user()->sendEmailVerificationNotification();

        return back()->with('status', __('A verification link has been sent to your email address. Please check your email to verify your account.'));

    }
}
