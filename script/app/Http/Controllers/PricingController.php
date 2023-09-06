<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plan;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\JsonLdMulti;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Support\Facades\Session;

class PricingController extends Controller
{
    public function index()
    {
        $seo=get_option('seo_pricing',true);

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

        $plans = Plan::where('status',1)->take(3)->get();
        $plans365=Plan::where(['status'=>1,['duration','=',365]])->take(3)->get();
        return view('pricing',compact('plans','plans365'));
    }
}
