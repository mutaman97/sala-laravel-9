<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Mail;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\JsonLdMulti;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Support\Facades\Session;

class ContactController extends Controller
{
    public function index()
    {
        $seo=get_option('seo_contract');
 
        JsonLdMulti::setTitle($seo->{'site_name_'.Session::get('locale')} ?? env('APP_NAME'));
        JsonLdMulti::setDescription($seo->{'matadescription_'.Session::get('locale')} ?? null);
        JsonLdMulti::addImage(asset('uploads/logo.png'));

        SEOMeta::setTitle($seo->{'site_name_'.Session::get('locale')} ?? env('APP_NAME'));
        SEOMeta::setDescription($seo->{'matadescription_'.Session::get('locale')} ?? null);
        SEOMeta::addKeyword($seo->{'matatag_'.Session::get('locale')} ?? null);

        SEOTools::setTitle($seo->{'site_name_'.Session::get('locale')} ?? env('APP_NAME'));
        SEOTools::setDescription($seo->{'matadescription_'.Session::get('locale')} ?? null);
        SEOTools::setCanonical(url('/'));
        SEOTools::opengraph()->addProperty('keywords', $seo->{'matatag_'.Session::get('locale')} ?? null);
        SEOTools::opengraph()->addProperty('image', asset('uploads/logo.png'));
        SEOTools::twitter()->setTitle($seo->{'twitter_site_title_'.Session::get('locale')} ?? env('APP_NAME'));
        SEOTools::twitter()->setSite('@salaplatform' ?? null);
        SEOTools::jsonLd()->addImage(asset('uploads/logo.png'));

        return view('contact');
    }

    public function send(Request $request)
    {

        $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|email|max:100',
            'subject' => 'required|max:100',
            'message' => 'required|max:300'
        ]);

        $data = [
            'name' => $request->name,
            'message' => $request->message,
            'email' => $request->email,
            'subject' => $request->subject
        ];

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
                    // return redirect()->back()->withErrors($validator)->withInput();
                    $msg['errors']['domain']=$validator->errors()->all()[0];
                    return response()->json($msg,422);
                }
        }
        //  End added

        Mail::to(env('MAIL_TO'))->send(new ContactMail($data));

        return response()->json('Message Send Successfully');

    }
}
