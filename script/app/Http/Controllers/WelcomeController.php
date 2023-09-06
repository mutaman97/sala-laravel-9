<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\Term;
use Illuminate\Http\Request;
use Newsletter;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\JsonLdMulti;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;


class WelcomeController extends Controller
{
    public function index()
    {

        $info = get_option('theme',true);
        $services = Term::with('serviceMeta')->where([
            ['type','service'],
            ['status', 1]
        ])->take(6)->get();
        $plans = Plan::where('status',1)->take(3)->get();
        $plans365=Plan::where(['status'=>1,['duration','=',365]])->take(3)->get();
        $blogs = Term::with('preview','excerpt')->where([
            ['type','blog'],
            ['status',1]
        ])->latest()->take(3)->get();

        $demos = Term::with('meta')->where([
            ['type','theme_demo'],
            ['status',1]
        ])->latest()->take(3)->get();

        $testimonials = Term::with('meta')->where([
            ['type','testimonial'],
            ['status',1]
        ])->latest()->take(5)->get();

        $seo=get_option('seo_home',true);

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

        return view('welcome',compact('info','services','plans','plans365','blogs','demos','testimonials'));
    }

    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);
        \Config::set('newsletter.apiKey', env('MAILCHIMP_APIKEY'));
        \Config::set('newsletter.lists.subscribers.id', env('MAILCHIMP_LIST_ID'));

        Newsletter::subscribe($request->email);


        return response()->json( __('Subscribed Successfully'));

    }

    public function demos()
    {
        $demos = Term::where([
            ['type','theme_demo'],
            ['status',1]
        ])->with('meta')->latest()->paginate(6);

        $seo=get_option('seo_gallery',true);

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

        return view('demos',compact('demos'));

    }

    public function lang_switch(Request $request)
    {
        App::setLocale($request->lang);
        session()->put('locale', $request->lang);

        return response()->json('Successfully Changed');
    }

}
