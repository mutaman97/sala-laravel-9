<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Hash;
use Auth;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\JsonLdMulti;
use Artesaos\SEOTools\Facades\SEOTools;

use Illuminate\Auth\Events\Registered; // Import the Registered event

class RegisterController extends Controller
{
    public function index(Request $request)
    {
        if($request->email)
        {
            $email = $request->email;
        }else {
            $email = '';
        }

        $seo=get_option('seo_home',true);

        JsonLdMulti::setTitle('Register');
        JsonLdMulti::setDescription($seo->matadescription ?? null);
        JsonLdMulti::addImage(asset('uploads/logo.png'));

        SEOMeta::setTitle('Register');
        SEOMeta::setDescription($seo->matadescription ?? null);
        SEOMeta::addKeyword($seo->tags ?? null);

        SEOTools::setTitle('Register');
        SEOTools::setDescription($seo->matadescription ?? null);
        SEOTools::setCanonical(url('/'));
        SEOTools::opengraph()->addProperty('keywords', $seo->matatag ?? null);
        SEOTools::opengraph()->addProperty('image', asset('uploads/logo.png'));
        SEOTools::twitter()->setTitle('Register');
        SEOTools::twitter()->setSite($seo->twitter_site_title ?? null);
        SEOTools::jsonLd()->addImage(asset('uploads/logo.png'));

        return view('register',compact('email'));
    }

    public function login()
    {
         $seo=get_option('seo_home',true);

        JsonLdMulti::setTitle('Login');
        JsonLdMulti::setDescription($seo->matadescription ?? null);
        JsonLdMulti::addImage(asset('uploads/logo.png'));

        SEOMeta::setTitle('Login');
        SEOMeta::setDescription($seo->matadescription ?? null);
        SEOMeta::addKeyword($seo->tags ?? null);

        SEOTools::setTitle('Login');
        SEOTools::setDescription($seo->matadescription ?? null);
        SEOTools::setCanonical(url('/'));
        SEOTools::opengraph()->addProperty('keywords', $seo->matatag ?? null);
        SEOTools::opengraph()->addProperty('image', asset('uploads/logo.png'));
        SEOTools::twitter()->setTitle('Login');
        SEOTools::twitter()->setSite($seo->twitter_site_title ?? null);
        SEOTools::jsonLd()->addImage(asset('uploads/logo.png'));
        return view('login');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone_number' => 'required|string|min:10|max:10|unique:users,phone',
            // 'phone' => 'required|phone:SD',
            'password' => 'required|confirmed'
        ]);

        // Added By Mutaman for contact page google recaptcha
        if(env('NOCAPTCHA_SITEKEY') != null)
        {
            $messages = [
                    'g-recaptcha-response.required' => __('You must check the reCAPTCHA'),
                    'g-recaptcha-response.captcha' => __('Captcha error! try again later or contact site admin'),
                ];

                $validator = \Validator::make($request->all(), [
                    'g-recaptcha-response' => 'required|captcha'
                ], $messages);

                if ($validator->fails())
                {
                    return redirect()->back()->withErrors($validator)->withInput();
                }
        }
        //  End added

        $user = new User();
        $user->role_id = 2;
        $user->name = $request->first_name . ' ' . $request->last_name;
        $user->email = $request->email;
        $user->phone = $request->phone_number;
        $user->subscribed_to_newsletter=$request->has('subscribed_to_newsletter');
        $user->password = Hash::make($request->password);
        $user->save();

        Auth::login($user,true);

       event(new Registered($user)); // Trigger the Registered event

        // TODO ---- this bug dont show the flash message at the dashboard
        return to_route('login')->with('status', __('A verification link has been sent to your email address. Please check your email to verify your account'));
        // logger($user);
        // return to_route('login');
    }
}
