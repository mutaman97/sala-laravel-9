@php
    $languages=json_decode($autoload_data['languages']);
    $default_language=$autoload_data['default_language'] ?? '';
    $current_url=url()->current();
    $wishlist_count=Cart::instance('wishlist')->count();
    $cart_sidebar=$site_settings->cart_sidebar ?? 'yes';
    $sidebar=$site_settings->sidebar ?? 'yes';
    $bottom_bar=$site_settings->bottom_bar ?? 'yes';
    $topbar=$site_settings->topbar ?? '';
@endphp

{{-- @if(url('/checkout') !=  $current_url &&  Request::is('customer/*') !=  $current_url)
    @if($bottom_bar == 'yes')
        <!-- Mobile Cart Show -->
            <div class="mobile-cart-show">
            <ul>
                <li><div class="single-cart-show"><a href="{{ url('/') }}"><i class="icofont-home"></i><span>{{ __('Home') }}</span></a></div></li>

                <li><div class="single-cart-show"><a href="{{ url('/cart') }}"><i class="icofont-cart"></i><span>{{ __('Cart') }}</span><span class="total-count cart_count">{{ $cart_count }}</span></a></div></li>

                <li><div class="single-cart-show"><a href="{{ url('/checkout') }}"><i class="icofont-credit-card"></i><span>{{ __('Checkout') }}</span></a></div></li>

                <li><div class="single-cart-show"><a href="{{ url('/wishlist') }}"><i class="icofont-heart"></i><span>{{ __('Wishlist') }}</span><span class="total-count wishlist_count">{{ $wishlist_count }}</span></a></div></li>

                <li><div class="single-cart-show"><a href="{{ url('/customer/dashboard') }}"><i class="icofont-ui-user"></i><span>{{ __('Account') }}</span></a></div></li>
            </ul>
            </div>
        <!-- End Mobile Cart Show -->
    @endif
@endif --}}

@if($cart_sidebar == 'yes')
<!-- Shopping Item -->
<div class="shopping-item">
    <div class="dropdown-cart-header d-flex justify-content-between">
        <div class="li-main-nav-right">
            <a class="" href="{{ url('/cart') }}">
                <i class="icon-cart"></i>
                <span class="label-nav-icon">{{ __('Go To Cart') }}</span>
            </a>
        </div>
        <button type="button" class="close close-button"><i class="icon-close"></i></button>
    </div>
    <div class="shopping-cart">
        <div class="row">
            <div id="shopping" class="shopping-list">
            </div>
        </div>
        <div class="bottom text-center">
            <a href="{{ url('/checkout') }}" class="btn btn-lg btn-custom m-t-10 m-b-10">{{ __('Proceed To checkout') }} | <span class="cart_subtotal render_currency">{{ Cart::instance('default')->subtotal() }}</span></a>
        </div>
    </div>
</div>
<!--/ End Shopping Item -->
@endif




{{-- Elham Header --}}

<header id="header">
    {{-- Top Bar Start --}}
    @if($sidebar == 'yes')
        <div class="top-bar">
            <div class="container">
                <div class="row">
                    <div class="col-6 col-left">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    <i class="icofont-motor-bike icofont-lg"></i>
                                    {{ __('Delivery Time') }}&nbsp;:&nbsp;{{ $average_times->delivery_time ?? '' }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="icofont-food-cart icofont-lg"></i>
                                    {{ __('Takeout') }}&nbsp;:&nbsp;{{ $average_times->pickup_time ?? '' }}
                                </a>
                            </li>
                            {{-- <li class="nav-item">
                                <a href="#" class="nav-link">
                                    {{ __('Contact Us') }}
                                </a>
                            </li> --}}

                            {{-- <h4>{{ $site_settings->header_contact_title ?? '' }}</h4>
                            <p>{{ $site_settings->header_contact_number ?? '' }}</p> --}}
                        </ul>
                    </div>
                    <div class="col-6 col-right">
                        <ul class="navbar-nav">
                            {{-- <li class="nav-item">
                                <a href="javascript:void(0)" data-toggle="modal" data-target="#locationModal" class="nav-link btn-modal-location">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 16 16" fill="#888888" class="mds-svg-icon">
                                        <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z" />
                                    </svg>
                                    {{ __('Location') }}
                                </a>
                            </li> --}}
                            {{-- Language Start --}}
                            <li class="nav-item dropdown top-menu-dropdown">
                                @php
                                    $active_languages = json_decode(json_encode(get_option('active_languages', true)), true);
                                    $locale = Session::get('locale');
                                @endphp
                                @if(count($active_languages) > 1)
                                    <a href="javascript:void(0)" class="nav-link dropdown-toggle" data-toggle="dropdown">
                                        <img src="{{ asset('theme/modesy/img/flags/' . $locale . '.svg') }}" class="flag">{{ $locale == 'en' ? __('English') : ($locale == 'ar' ? __('Arabic') : ($locale == 'fr' ? __('French') : __('Language'))) }}&nbsp;<i class="icon-arrow-down"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-lang">
                                        @foreach($languages ?? [] as $key => $row)
                                        <li>
                                            <a href="{{ url('/locale/lang?locale=' . $row->code) }}" class="dropdown-item">
                                                <img src="{{ asset('theme/modesy/img/flags/' . $row->code . '.svg') }}" class="flag">
                                                {{ __($row->name) }}
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                            {{-- Language End --}}
                            @if(tenant('customer_modules') == 'on')
                                @auth
                                    <li class="nav-item dropdown profile-dropdown p-r-0">
                                        <a class="nav-link dropdown-toggle a-profile" data-toggle="dropdown" href="javascript:void(0)" aria-expanded="false">
                                            <img src="{{ gravatar(Auth::user()->email) }}" alt="">
                                            {{ Auth::user()->name }}
                                            <i class="icon-arrow-down"></i>
                                            <span class="message-notification">54</span>
                                        </a>
                                        <ul class="dropdown-menu">



                                            @if (Auth::user()->role_id == 3)
                                            <li>
                                                <a href="{{ url('/seller/dashboard') }}">
                                                    <i class="icon-admin"></i>
                                                    {{ __('Admin Panel') }}
                                                </a>
                                            </li>

                                            @elseif(Auth::user()->role_id == 5)
                                            <li>
                                                <a href="{{ url('/rider/dashboard') }}">
                                                    <i class="icon-admin"></i>
                                                    {{ __('Rider Panel') }}
                                                </a>
                                            </li>
                                            @endif



                                            {{-- <li>
                                                <a href="{{ url('/customer/dashboard') }}">
                                                    <i class="icon-dashboard"></i>
                                                    {{ __('Dashboard') }}
                                                </a>
                                            </li> --}}
                                            <li>
                                                <a href="{{ url('/customer/dashboard') }}">
                                                    <i class="icon-user"></i>
                                                    {{ __('Profile') }}
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ url('/customer/orders') }}">
                                                    <i class="icon-shopping-basket"></i>
                                                    {{ __('Orders') }}
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ url('/customer/reviews') }}">
                                                    <i class="icon-star-o"></i>
                                                    {{ __('Reviews') }}
                                                </a>
                                            </li>
                                            {{-- <li>
                                                <a href="echo generate_url quote_requests">
                                                    <i class="icon-price-tag-o"></i>
                                                    {{ __('Quote Requests') }}
                                                </a>
                                            </li> --}}
                                            {{-- <li>
                                                <a href="">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" class="mds-svg-icon">
                                                        <path d="M0 3a2 2 0 0 1 2-2h13.5a.5.5 0 0 1 0 1H15v2a1 1 0 0 1 1 1v8.5a1.5 1.5 0 0 1-1.5 1.5h-12A2.5 2.5 0 0 1 0 12.5V3zm1 1.732V12.5A1.5 1.5 0 0 0 2.5 14h12a.5.5 0 0 0 .5-.5V5H2a1.99 1.99 0 0 1-1-.268zM1 3a1 1 0 0 0 1 1h12V2H2a1 1 0 0 0-1 1z" />
                                                    </svg>
                                                    {{ __('Refund Requests') }}
                                                </a>
                                            </li> --}}
                                            {{-- <li>
                                                <a href="">
                                                    <i class="icon-mail"></i>
                                                    {{ __('Messages') }}&nbsp;
                                                    <span class="span-message-count">(5)</span>
                                                </a>
                                            </li> --}}
                                            <li>
                                                <a href="{{ url('/customer/settings') }}">
                                                    <i class="icon-settings"></i>
                                                    {{ __('Settings') }}
                                                </a>
                                            </li>
                                            <li>
                                                <a class="logout" href="javascript:void(0)" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                                    <i class="icon-logout"></i>
                                                    {{ __('Logout') }}</a>
                                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" class="d-none">
                                                    @csrf
                                                </form>
                                            </li>
                                        </ul>
                                    </li>
                                @endauth
                            @endif
                            @guest
                            <li class="nav-item">
                                <a href="javascript:void(0)" data-toggle="modal" data-target="#loginModal" class="nav-link">{{ __('Login') }}</a>
                                <span class="auth-sep">/</span>
                                <a href="{{ url('/customer/register') }}" class="nav-link">{{ __('Register') }}</a>
                            </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @endif
    {{-- Top Bar End --}}


    {{-- header start --}}

    <div class="main-menu">
        <div class="container-fluid">
            <div class="row">
                <div class="nav-top">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-md-8 nav-top-left">
                                <div class="row-align-items-center">
                                    <div class="logo">
                                        @php
                                            $logoPath = asset('uploads/'.tenant('uid').'/logo.png?v='.tenant('cache_version'));
                                            $defaultLogoPath = asset('theme/elham/img/logo.png');
                                        @endphp
                                        <a href="{{ url('/') }}">
                                            <img src="{{ isset($logoPath) && file_exists(public_path($logoPath)) ? $logoPath : $defaultLogoPath }}" height="60" alt="logo">
                                        </a>
                                    </div>

                                    <div class="top-search-bar top-search-bar-single-vendor">
                                        <div class="left">
                                            <div class="dropdown search-select">
                                                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">{{ __('All Categories') }}</button>
                                                <i class="icon-arrow-down search-select-caret"></i>
                                                <input type="hidden" name="search_category_input" id="input_search_category" value="">
                                                <div class="dropdown-menu search-categories">
                                                    <a class="dropdown-item" data-value="all" href="javascript:void(0)">{{ __('All Categories') }}</a>
                                                    {{-- <a class="dropdown-item" data-value="" href="javascript:void(0)">{{ __('cat name') }}</a> --}}
                                                </div>
                                            </div>
                                        </div>
                                        {{--<div class="right">
                                            <input type="text" name="search" maxlength="300" pattern=".*\S+.*" id="input_search" class="form-control input-search" value="" placeholder="{{ __('place holder') }}" required autocomplete="off">
                                            <button class="btn btn-default btn-search"><i class="icon-search"></i></button>
                                            <div id="response_search_results" class="search-results-ajax"></div>
                                        </div> --}}
                                        <div class="right">
                                            <form action="{{ url('/products') }}">
                                                <input  id="product_src" type="text" id="input_search" name="src" maxlength="300" pattern=".*\S+.*" class="form-control input-search" value="" placeholder="{{ __('Search Products Here...') }}" required autocomplete="off">
                                                <button type="submit" class="btn btn-default btn-search"><i class="icon-search"></i></button>
                                                <div id="response_search_results_mobile" class="search-results-ajax"></div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 nav-top-right">
                                <ul class="nav align-items-center">
                                    @if($cart_sidebar == 'yes')
                                        <li class="nav-item nav-item-cart li-main-nav-right cart-boxed">
                                            <a href="javascript:void(0)">
                                                <i class="icon-cart"></i>
                                                <span class="label-nav-icon">{{ __('Cart') }}</span>
                                                <span class="notification cart_count">{{ $cart_count }}</span>
                                            </a>
                                        </li>
                                    @else
                                        <li class="nav-item nav-item-cart li-main-nav-right cart-boxed">
                                            <a href="{{ url('/cart') }}">
                                                <i class="icon-cart"></i>
                                                <span class="label-nav-icon">{{ __('Cart') }}</span>
                                                <span class="notification cart_count">{{ $cart_count }}</span>
                                            </a>
                                        </li>
                                    @endif
                                    <li class="nav-item nav-item-cart li-main-nav-right">
                                        <a href="{{ url('/wishlist') }}">
                                            <i class="icon-heart-o"></i>
                                            <span class="label-nav-icon">{{ __('Wishlist') }}</span>
                                            <span class="notification wishlist_count">{{ $wishlist_count }}</span>
                                        </a>
                                    </li>
                                    {{-- <li class="nav-item m-r-0"><a href="add_product" class="btn btn-md btn-custom btn-sell-now m-r-0">{{ __('Sell Now') }}</a></li> --}}
                                    {{-- <li class="nav-item m-r-0"><a href="javascript:void(0)" class="btn btn-md btn-custom btn-sell-now m-r-0" data-toggle="modal" data-target="#loginModal">{{ __('Sell Now') }}</a></li> --}}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- PC Nav Start --}}

                <div class="nav-main">
                    <div class="container">
                        <div class="navbar navbar-light navbar-expand">
                            <ul class="nav navbar-nav mega-menu">
                                {{ ThemeMenu('header', 'theme.elham.components.headermenu') }}
                                {{-- <li class="nav-item dropdown" data-category-id="category-id">
                                                <a id="nav_main_category_$category->id" href="generate_category_url" class="nav-link dropdown-toggle nav-main-category" data-id="category->id" data-parent-id="category->parent_id" data-has-sb="1">{{ __('Category Name') }}</a>
                                <div id="mega_menu_content_$category->id" class="dropdown-menu mega-menu-content">
                                    <div class="row">
                                        <div class="col-8 menu-subcategories col-category-links">
                                            <div class="card-columns">
                                                <div class="card">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <a id="nav_main_category_$subcategory->id" href="generate_category_url" class="second-category nav-main-category" data-id="$subcategory->id" data-parent-id="$subcategory->parent_id" data-has-sb="1">{{ __('Sub Category Name') }}</a>
                                                            <ul>
                                                                {{ ThemeMenu('header', 'theme.modesy.components.menu') }}
                                                                <li><a id="nav_main_category_$third_category->id" href="generate_category_url" class="nav-main-category hidden" data-id="$third_category->id" data-parent-id="$third_category->parent_id" data-has-sb="0">{{ __('Third Category Name') }}</a>
                                                                </li>
                                                                <li><a href="generate_category_url" class="link-view-all">{{ __('Show all') }}</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4 col-category-images">
                                            <div class="nav-category-image">
                                                <a href="generate_category_url">
                                                    <img src="IMG_BG_PRODUCT_SMALL" data-src="get_category_image_url" alt="category_name($image_category)" class="lazyload img-fluid">
                                                    <span>{{ __('Category Name') }}</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </li> --}}
                            </ul>
                        </div>
                    </div>
                </div>
                {{-- Pc Nav End --}}
            </div>
        </div>
    </div>

    {{-- Mobile Nav Start --}}

    <div class="mobile-nav-container">
        <div class="nav-mobile-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="nav-mobile-header-container">
                        <div class="d-flex justify-content-between">
                            <div class="flex-item item-menu-icon justify-content-start">
                                <a href="javascript:void(0)" class="btn-open-mobile-nav"><i class="icon-menu"></i></a>
                            </div>
                            @php
                                $logoPath = asset('uploads/'.tenant('uid').'/logo.png?v='.tenant('cache_version'));
                                $defaultLogoPath = asset('theme/elham/img/logo.png');
                            @endphp
                            <div class="flex-item justify-content-center">
                                <div class="mobile-logo">
                                    <a href="{{ url('/') }}">
                                        <img src="{{ isset($logoPath) && file_exists(public_path($logoPath)) ? $logoPath : $defaultLogoPath }}" height="55" alt="logo">
                                    </a>
                                </div>
                            </div>
                            <div class="flex-item justify-content-end">
                                <a class="a-search-icon"><i class="icon-search"></i></a>
                                {{-- <a href="{{ url('/cart') }}" class="a-mobile-cart"><i class="icon-cart"></i>
                                    <span class="notification cart_count">{{ $cart_count }}</span>
                                </a> --}}
                                @if($cart_sidebar == 'yes')
                                <a href="javascript:void(0)" class="a-mobile-cart cart-boxed"><i class="icon-cart"></i>
                                    <span class="notification cart_count">{{ $cart_count }}</span>
                                </a>
                                @else
                                <a href="{{ url('/cart') }}" class="a-mobile-cart"><i class="icon-cart"></i>
                                    <span class="notification cart_count">{{ $cart_count }}</span>
                                </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="top-search-bar mobile-search-form top-search-bar-single-vendor">
                        <form action="{{ url('/products') }}">
                            <div class="left">
                                <div class="dropdown search-select">
                                    <button type="button" class="btn dropdown-toggle"
                                        data-toggle="dropdown">{{__('All Categories')}}</button>
                                    <i class="icon-arrow-down search-select-caret"></i>
                                    <input type="hidden" name="search_category_input"
                                        id="input_search_category_mobile" value="all">
                                    <div class="dropdown-menu search-categories">
                                        <a class="dropdown-item" data-value="all"
                                            href="javascript:void(0)">{{__('All Categories')}}</a>
                                        {{-- <a class="dropdown-item" data-value="searchCatid"
                                            href="javascript:void(0)">searchCat->name</a> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="right">
                                <input type="text"  id="product_src" name="src" maxlength="300"
                                    pattern=".*\S+.*" class="form-control input-search"
                                    placeholder="{{ __('Search Products Here...') }}" required autocomplete="off">
                                <button type="submit" class="btn btn-default btn-search"><i class="icon-search"></i></button>
                                <div id="response_search_results_mobile" class="search-results-ajax"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Mobile Nav End --}}
</header>

<div id="overlay_bg" class="overlay-bg"></div>

{{-- mobile menu start --}}

<div id="navMobile" class="nav-mobile">
    <div class="nav-mobile-sc">
        <div class="nav-mobile-inner">
            <div class="row">
                <div class="col-sm-12 mobile-nav-buttons">
                    {{-- <a href="generate_dash_url" class="btn btn-md btn-custom btn-block">{{ __('Sell Now') }}</a> --}}
                    <a href="javascript:void(0)" class="btn btn-md btn-custom btn-block close-menu-click" data-toggle="modal" data-target="#loginModal">{{ __('sell now') }}</a>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 nav-mobile-links">
                    <div id="navbar_mobile_back_button"></div>
                    <ul id="navbar_mobile_categories" class="navbar-nav">
                        <li class="nav-item">
                            <a href="javascript:void(0)" class="nav-link" data-id="category->id" data-parent-id="category->parent_id">{{ __('category name') }}<i class="icon-arrow-right"></i></a>
                        </li>
                        <li class="nav-item">
                            <a href="generate_category_url" class="nav-link">{{ __('category name') }}</a>
                        </li>
                    </ul>
                    <ul id="navbar_mobile_links" class="navbar-nav">

                        <li class="nav-item">
                            <a href="{{ url('/wishlist') }}" class="nav-link">
                                {{ __('wishlist') }}
                            </a>
                        </li>
                        <li class="nav-item"><a href="item_link" class="nav-link">{{ __('link title') }}</a></li>
                        <li class="nav-item"><a href="item_link" class="nav-link">{{ __('link title') }}</a></li>

                        @if(tenant('customer_modules') == 'on')
                            @auth
                                <li class="dropdown profile-dropdown nav-item">
                                    <a href="#" class="dropdown-toggle image-profile-drop nav-link" data-toggle="dropdown" aria-expanded="false">
                                        <span class="message-notification message-notification-mobile">3</span>
                                        <img src="{{ gravatar(Auth::user()->email) }}" alt="{{ Auth::user()->name }}">
                                        {{ Auth::user()->name }} <span class="icon-arrow-down"></span>
                                    </a>
                                    <ul class="dropdown-menu">

                                            @if (Auth::user()->role_id == 3)
                                            <li>
                                                <a href="{{ url('/seller/dashboard') }}">
                                                    <i class="icon-admin"></i>
                                                    {{ __('Admin Panel') }}
                                                </a>
                                            </li>

                                            @elseif(Auth::user()->role_id == 5)
                                            <li>
                                                <a href="{{ url('/rider/dashboard') }}">
                                                    <i class="icon-admin"></i>
                                                    {{ __('Rider Panel') }}
                                                </a>
                                            </li>
                                            @endif
                                            {{-- <li>
                                                <a href="{{ url('/customer/dashboard') }}">
                                                    <i class="icon-dashboard"></i>
                                                    {{ __('Dashboard') }}
                                                </a>
                                            </li> --}}
                                            <li>
                                                <a href="{{ url('/customer/dashboard') }}">
                                                    <i class="icon-user"></i>
                                                    {{ __('Profile') }}
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ url('/customer/orders') }}">
                                                    <i class="icon-shopping-basket"></i>
                                                    {{ __('Orders') }}
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ url('/customer/reviews') }}">
                                                    <i class="icon-star-o"></i>
                                                    {{ __('Reviews') }}
                                                </a>
                                            </li>
                                        {{-- <li>
                                            <a href="quote_requests">
                                                <i class="icon-price-tag-o"></i>
                                                {{ __('Quote Requests') }}
                                            </a>
                                        </li> --}}
                                        {{-- <li>
                                            <a href="generate_urldownloads">
                                                <i class="icon-download"></i>
                                                {{ __('downloads') }}
                                            </a>
                                        </li> --}}
                                        {{-- <li>
                                            <a href="generate_url">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" class="mds-svg-icon">
                                                    <path d="M0 3a2 2 0 0 1 2-2h13.5a.5.5 0 0 1 0 1H15v2a1 1 0 0 1 1 1v8.5a1.5 1.5 0 0 1-1.5 1.5h-12A2.5 2.5 0 0 1 0 12.5V3zm1 1.732V12.5A1.5 1.5 0 0 0 2.5 14h12a.5.5 0 0 0 .5-.5V5H2a1.99 1.99 0 0 1-1-.268zM1 3a1 1 0 0 0 1 1h12V2H2a1 1 0 0 0-1 1z" />
                                                </svg>
                                                {{ __('Refund') }}
                                            </a>
                                        </li> --}}
                                        {{-- <li>
                                            <a href="generate_urmessages">
                                                <i class="icon-mail"></i>
                                                {{ __('messages') }}&nbsp;
                                                <span class="span-message-count">(5)</span>
                                            </a>
                                        </li> --}}
                                        <li>
                                            <a href="{{ url('/customer/settings') }}">
                                                <i class="icon-settings"></i>
                                                {{ __('Settings') }}
                                            </a>
                                        </li>
                                        <li>
                                            <a class="logout" href="javascript:void(0)" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                                <i class="icon-logout"></i>
                                                {{ __('Logout') }}</a>
                                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            @endauth
                            @guest
                                <li class="nav-item"><a href="javascript:void(0)" data-toggle="modal" data-target="#loginModal" class="nav-link close-menu-click">{{ __('login') }}</a></li>
                                <li class="nav-item"><a href="generate_url_register" class="nav-link">{{ __('register') }}</a></li>
                            @endguest
                        @endif

                        {{-- <li class="nav-item nav-item-messages">
                            <a href="javascript:void(0)" data-toggle="modal" data-target="#locationModal" class="nav-link btn-modal-location close-menu-click">
                                <i class="icon-map-marker float-left"></i>&nbsp;{{ __('location') }}
                            </a>
                        </li> --}}
                        {{-- <li class="nav-item dropdown language-dropdown currency-dropdown currency-dropdown-mobile">
                            <a href="javascript:void(0)" class="nav-link dropdown-toggle" data-toggle="dropdown">
                                SDG&nbsp;(SDG)<i class="icon-arrow-down"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <button type="submit" name="currency" value="currency->code">SDG&nbsp;(SDG)</button>
                                </li>
                            </ul>
                        </li> --}}
                        {{-- Language Start --}}
                        <li class="nav-item">
                            @php
                                $active_languages = json_decode(json_encode(get_option('active_languages', true)), true);
                                $locale = Session::get('locale');
                            @endphp
                            @if(count($active_languages) > 1)
                                <a href="javascript:void(0)" class="nav-link">
                                    {{ __('Language') }}
                                </a>
                                <ul class="mobile-language-options">
                                    @foreach($languages ?? [] as $key => $row)
                                    <li>
                                        <a href="{{ url('/locale/lang?locale=' . $row->code) }}" class="dropdown-item selected">
                                            {{ __($row->name) }}
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                        {{-- Language End --}}
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="nav-mobile-footer">
        <ul>
            <li><a href="/" class="facebook"><i class="icon-facebook"></i></a></li>

            <li><a href="/" class="twitter"><i class="icon-twitter"></i></a></li>

            <li><a href="/" class="instagram"><i class="icon-instagram"></i></a></li>

            {{-- <li><a href="/" class="pinterest"><i class="icon-pinterest"></i></a></li> --}}

            <li><a href="/" class="linkedin"><i class="icon-linkedin"></i></a></li>

            {{-- <li><a href="/" class="vk"><i class="icon-vk"></i></a></li> --}}

            <li><a href="/" class="whatsapp"><i class="icon-whatsapp"></i></a></li>

            {{-- <li><a href="/" class="telegram"><i class="icon-telegram"></i></a></li> --}}

            {{-- <li><a href="" class="youtube"><i class="icon-youtube"></i></a></li> --}}

            <li><a href="/" class="rss"><i class="icon-rss"></i></a></li>
        </ul>
    </div>
</div>

{{-- mobile menu end --}}

{{-- <input type="hidden" class="search_type_input" name="search_type" value="product"> --}}

{{-- Login Modal Start --}}

@if (tenant('customer_modules') == 'on')
    @if (!Auth::check())
        <div class="modal fade" id="loginModal" role="dialog">
            {{-- <div class="modal fade"> --}}
            <div class="modal-dialog modal-dialog-centered login-modal" role="document">
                <div class="modal-content">
                    <div class="auth-box">
                        <button type="button" class="close" data-dismiss="modal"><i class="icon-close"></i></button>
                        <h4 class="title">{{ __('login') }}</h4>
                        <!-- form start -->
                        {{-- <form action="{{ route('login') }}" method="post" id="form_login" novalidate="novalidate" class="accounts-signin-inner"> --}}
                        <form action="{{ route('login') }}" method="post" class="accounts-signin-inner">
                            @csrf
                            <!-- include message block -->
                            {{-- <div id="result-login" class="font-size-13"></div> --}}
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" placeholder="email_address" maxlength="255" required>
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control" placeholder="password" minlength="4" maxlength="255" required>
                            </div>
                            <div class="form-group text-right">
                                <a href="{{ url('/password/reset') }}" class="link-forgot-password">{{ __('forgot password') }}</a>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-md btn-custom btn-block">{{ __('login') }}</button>
                            </div>
                            <p class="p-social-media m-0 m-t-5">{{ __('Dont have any account?') }}&nbsp;<a href="{{ url('customer/register') }}" class="link">{{ __('register') }}</a></p>
                        </form>
                        <!-- form end -->
                    </div>
                </div>
            </div>
        </div>
    @endif
@endif
{{-- Login Modal End --}}

{{-- Location Modal Start --}}
<div class="modal fade" id="locationModal" role="dialog">
    <div class="modal-dialog modal-dialog-centered login-modal location-modal" role="document">
        <div class="modal-content">
            <div class="auth-box">
                <button type="button" class="close" data-dismiss="modal"><i class="icon-close"></i></button>
                <h4 class="title">{{ __('select location') }}</h4>
                <p class="location-modal-description">{{ __('Modesy allows you to shop from anywhere in the world') }}
                </p>
                <div class="form-group m-b-20">
                    <div class="input-group input-group-location">
                        <i class="icon-map-marker"></i>
                        <input type="text" id="input_location" class="form-control form-input" value="default_location_input" placeholder="{{ __('enter location') }}" autocomplete="off">
                        <a href="javascript:void(0)" class="btn-reset-location-input hidden"><i class="icon-close"></i></a>
                    </div>
                    <div class="search-results-ajax">
                        <div class="search-results-location">
                            <div id="response_search_location"></div>
                        </div>
                    </div>
                    <div id="location_id_inputs">
                        <input type="hidden" name="country" value="default_location->country_id" class="input-location-filter">
                        <input type="hidden" name="state" value="default_location->state_id" class="input-location-filter">
                        <input type="hidden" name="city" value="default_location->city_id" class="input-location-filter">
                    </div>
                </div>
                <div class="form-group">
                    <button type="button" id="btn_submit_location" class="btn btn-md btn-custom btn-block">{{ __('update location') }}</button>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- Location Modal End --}}

{{-- Newsletter Modal Start --}}
<div id="modal_newsletter" class="modal fade modal-center modal-newsletter" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-6 col-left">
                        <img src="{{ asset('theme/modesy/img/newsletter_bg.jpg') }}" class="newsletter-img">
                    </div>
                    <div class="col-6 col-right">
                        <div class="newsletter-form">
                            <button type="button" class="close" data-dismiss="modal"><i class="icon-close"
                                    aria-hidden="true"></i></button>
                            <h4 class="modal-title">{{ __('Join Newsletter') }}</h4>
                            <p class="modal-desc">{{ __('newsletter description') }}</p>
                            <form id="form_newsletter_modal" class="form-newsletter" data-form-type="modal">
                                <div class="form-group">
                                    <div class="modal-newsletter-inputs">
                                        <input type="email" name="email"
                                            class="form-control form-input newsletter-input"
                                            placeholder="{{ __('enter your email') }}">
                                        <button type="submit" id="btn_modal_newsletter"
                                            class="btn">{{ __('subscribe') }}</button>
                                    </div>
                                </div>
                                <input type="text" name="url">
                                <div id="modal_newsletter_response" class="text-center modal-newsletter-response">
                                    <div class="form-group text-center m-b-0 text-close">
                                        <button type="button" class="text-close"
                                            data-dismiss="modal">{{ __('no thanks') }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- Newsletter Modal End --}}

<div id="menu-overlay"></div>
{{-- End Elham Header --}}

{{--
<!-- Header -->
<header id="header" class="header shop">
   <!-- Topbar -->
   @if(!empty($topbar))
   <div class="topbar bg-second">
      <div class="container">
         <div class="row">
            <div class="col-lg-6 offset-lg-3 col-md-12 col-12">
               <!-- Top Right -->
               <div class="right-content language_section">
                  <div class="list-main">
                   {{ content_format($topbar) }}
                  </div>
                  <div class="topbar-language-area">
                     <form class="change_lang_form" action="{{ url('/locale/lang') }}">
                        <select name="locale" class="trans_lang">
                           @php
                           $local=Session::get('locale');
                           @endphp
                           @foreach($languages ?? [] as $key => $row)
                           <option value="{{ $row->code }}" @if($local == $row->code) selected @endif>{{ $row->name }}</option>
                           @endforeach
                        </select>
                     </form>
                  </div>
               </div>
               <!-- End Top Right -->
            </div>
         </div>
      </div>
   </div>
   @endif
   <!-- End Topbar -->

   <div class="middle-inner">
      <div class="container">
         <div class="row">
            <div class="col-12">
               <div class="middle-bar-item">
                  <!-- Logo -->
                  <div class="header-logo">
                     <a href="{{ url('/') }}"> <img src="{{ asset('uploads/'.tenant('uid').'/logo.png?v='.tenant('cache_version')) }}" alt=""></a>
                  </div>
                  <div class="search-bar-top">
                     <div class="search-bar">
                        <form action="{{ url('/products') }}">
                           <input id="product_src"  placeholder="Search Products Here.." type="search" name="src">
                           <button type="submit" class="btnn"><i class="icofont-search"></i></button>
                        </form>
                     </div>
                  </div>
                  <div class="header-contact">
                     <div class="single-contact">
                        <div class="icon"><i class="icofont-user"></i></div>
                        <div class="title-desc">
                           <h4>{{ $site_settings->header_contact_title ?? '' }}</h4>
                           <p>{{ $site_settings->header_contact_number ?? '' }}</p>
                        </div>
                     </div>
                     <div class="single-contact">
                       <a href="{{ url('/wishlist') }}"><div class="icon"><i class="icofont-heart"></i></div></a>
                        <div class="title-desc">
                          <a href="{{ url('/wishlist') }}"> <h4>{{ __('Wishlist') }} (<span class="wishlist_count">{{ $wishlist_count }}</span>)</h4> </a>
                        </div>
                     </div>
                     @if(tenant('customer_modules') == 'on')
                     <div class="single-contact">
                        <div class="head-button"><a href="{{ !Auth::check() ? url('/customer/login') : url('/customer/dashboard') }}" class="theme-btn">{{ !Auth::check() ? __('My Account') : Auth::user()->name }}</a></div>
                     </div>
                     @endif
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>


   <!-- Header Inner -->
   <div class="header-inner">
      <div class="container">
         <div class="row">
            <div class="col-12">
               <div class="menu-area">
                  <!-- End Mobile Menu -->
                  <div class="mobile-menu-actives">
                     <!-- Tab Menu -->
                     <div class="menu-home-tabs">
                        <ul class="list-group" id="list-tab" role="tablist">
                           <li><a class="list-group-item active" data-bs-toggle="list" href="#f-menu1" role="tab"><i class="icofont-navigation-menu" aria-hidden="true"></i>{{ __('Menu') }}</a></li>
                           <li><a class="list-group-item" data-bs-toggle="list" href="#f-tab2" role="tab"><i class="icofont-papers"></i>{{ __('Categories') }}</a></li>
                        </ul>
                     </div>
                     <!-- End Tab Menu -->
                     <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="f-menu1" role="tabpanel">

                           <div class="close-sm-menu"><i class="icofont-close-circled"></i></div>
                           <div class="menu-category-menu"></div>
                        </div>

                        <div class="tab-pane fade" id="f-tab2" role="tabpanel">
                            <div class="close-sm-menu"><i class="icofont-close-circled"></i></div>
                           <div class="menu-category-one"></div>
                        </div>
                     </div>
                  </div>
                  <!-- End Mobile Menu -->

                  <div class="mobile-cart-nav"><i class="icofont-navigation-menu"></i></div>

                  {{ThemeMenu('mega_menu','theme.elham.components.megamenu')}}
                  <!-- Main Menu -->
                  <nav class="navbar navbar-expand-lg">
                     <div class="navbar-collapse">
                        <div class="nav-inner">
                           <ul class="nav main-menu menu navbar-nav mobile-menu">
                             {{ThemeMenu('header','theme.elham.components.menu')}}
                          </ul>
                       </div>
                    </div>
                 </nav>
                <!-- Search Form -->
                <div class="sinlge-bar shopping">
                    <div class="cart-boxed">
                        <a href="javascript:void(0)" class="single-icon"><i class="icofont-bag"></i><span class="cart_count total-count">{{ $cart_count }}</span></a>
                        <div class="cart-box-side">
                            <h5>{{ __('Cart') }}</h5>
                            <p><span class="cart_subtotal render_currency">{{ Cart::instance('default')->subtotal() }}</span></p>
                        </div>
                    </div>
                </div>
            </div>
         </div>
      </div>
   </div>
</div>
</header>
<!-- End Header -->
--}}

