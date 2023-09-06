@php
$invoice_data = json_decode($autoload_data['invoice_data'] ?? '');
$languages = json_decode($autoload_data['languages']);
$default_language = $autoload_data['default_language'] ?? '';
$current_url = url()->current();
@endphp

<!-- Cart Sidebar -->

{{-- @if (url('/checkout') != $current_url && Request::is('customer/*') != $current_url) --}}
{{-- @php
        $cart_sidebar = $site_settings->cart_sidebar ?? 'yes';
        $bottom_bar = $site_settings->bottom_bar ?? 'yes';
    @endphp
    @if ($cart_sidebar == 'yes')
        <div class="cart-sidebar">
            <div class="item-line">
                <div class="cart-line"><i class="icofont-cart-alt"></i></div>
                <div class="cart-line item-name"><span class="cart_count">{{ $cart_count }}</span><span>{{ __('Items') }}</span></div>
</div>
<div class="prrice-tag"><span class="cart_subtotal render_currency">{{ Cart::instance('default')->subtotal() }}</span></div>
</div>
@endif --}}

<!-- End Cart Sidebar -->


<!-- Mobile Cart Show -->

{{-- @if ($bottom_bar == 'yes')
    <div class="mobile-cart-show">
        <ul>
        <li>
            <div class="single-cart-show"><a href="{{ url('/') }}"><i class="icofont-home"></i><span>{{ __('Home') }}</span></a></div>
</li>
<li>
    <div class="single-cart-show"><a href="{{ url('/wishlist') }}"><i class="icofont-heart"></i><span>{{ __('Wishlist') }}</span></a></div>
</li>
<li>
    <div class="single-cart-show"><a href="{{ url('/cart') }}"><i class="icofont-cart"></i><span>{{ __('Cart') }}</span></a></div>
</li>
<li>
    <div class="single-cart-show"><a href="{{ url('/customer/dashboard') }}"><i class="icofont-ui-user"></i><span>{{ __('Account') }}</span></a></div>
</li>
</ul>
</div>
@endif --}}

<!-- End Mobile Cart Show -->


<!-- Shopping Item -->

{{-- <div class="shopping-item">
         <div class="dropdown-cart-header">
            <div class="close-button"><a href="#"><i class="icofont-close"></i></a></div>
            <span><span class="cart_count">{{ $cart_count }}</span> {{ __('Items') }}</span>
</div>
<div class="shopping-item-inner">
    <div class="cart-single-inner">
        <ul id="shopping" class="shopping-list">


        </ul>
    </div>
    <div class="cart-single-inner bottom">
        <div class="total">
            <span>{{ __('Total') }}</span>
            <span class="total-amount cart_subtotal">{{ Cart::instance('default')->subtotal() }}</span>
        </div>
        <a href="{{ url('/cart') }}" class="btn animate">{{ __('View Cart') }}</a>
        <a href="{{ url('/checkout') }}" class="btn primary animate">{{ __('Checkout') }}</a>
    </div>
</div>
</div> --}}

<!--/ End Shopping Item -->
{{-- @endif --}}


<header id="header">

    {{-- Top Bar Start --}}

    <div class="top-bar">
        <div class="container">
            <div class="row">
                <div class="col-6 col-left">
                    <ul class="navbar-nav">
                        <li class="nav-item"><i class="icofont-delivery-time"></i><span class="info"><a href="" class="nav-link"><b>{{ __('Delivery') }}:</b>{{ $average_times->delivery_time ?? '' }}</a></span>
                        </li>
                        <li class="nav-item"><i class="icofont-food-cart"></i><span class="info"><b>{{ __('Takeout') }}:</b>{{ $average_times->pickup_time ?? '' }}</span>
                        </li>
                    </ul>
                </div>
                <div class="col-6 col-right">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="javascript:void(0)" data-toggle="modal" data-target="#locationModal" class="nav-link btn-modal-location">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 16 16" fill="#888888" class="mds-svg-icon">
                                    <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z" />
                                </svg>
                                {{ __('Location') }}
                            </a>
                        </li>
                        <li class="nav-item dropdown top-menu-dropdown">
                            <a href="javascript:void(0)" class="nav-link dropdown-toggle" data-toggle="dropdown">
                                <img src="" class="flag">{{ __('Language') }}&nbsp;<i class="icon-arrow-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-lang">
                                <li>
                                    <a href="" class="dropdown-item">
                                        <img src="" class="flag">{{ __('Arabic') }}
                                    </a>
                                </li>
                                <li>
                                    <a href="" class="dropdown-item">
                                        <img src="" class="flag">{{ __('English') }}
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown profile-dropdown p-r-0">
                            <a class="nav-link dropdown-toggle a-profile" data-toggle="dropdown" href="javascript:void(0)" aria-expanded="false">
                                <img src="" alt="">
                                {{ __('Shop Name') }}
                                <i class="icon-arrow-down"></i>
                                <span class="message-notification">54</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="echo admin_url">
                                        <i class="icon-admin"></i>
                                        {{ __('Admin Panel') }}
                                    </a>
                                </li>
                                <li>
                                    <a href="dashboard_url">
                                        <i class="icon-dashboard"></i>
                                        {{ __('Dashboard') }}
                                    </a>
                                </li>
                                <li>
                                    <a href="echo generate_profile_url">
                                        <i class="icon-user"></i>
                                        {{ __('Profile') }}
                                    </a>
                                </li>
                                <li>
                                    <a href="echo generate_url orders">
                                        <i class="icon-shopping-basket"></i>
                                        {{ __('Orders') }}
                                    </a>
                                </li>
                                <li>
                                    <a href="echo generate_url quote_requests">
                                        <i class="icon-price-tag-o"></i>
                                        {{ __('Quote Requests') }}
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" class="mds-svg-icon">
                                            <path d="M0 3a2 2 0 0 1 2-2h13.5a.5.5 0 0 1 0 1H15v2a1 1 0 0 1 1 1v8.5a1.5 1.5 0 0 1-1.5 1.5h-12A2.5 2.5 0 0 1 0 12.5V3zm1 1.732V12.5A1.5 1.5 0 0 0 2.5 14h12a.5.5 0 0 0 .5-.5V5H2a1.99 1.99 0 0 1-1-.268zM1 3a1 1 0 0 0 1 1h12V2H2a1 1 0 0 0-1 1z" />
                                        </svg>
                                        {{ __('Refund Requests') }}
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <i class="icon-mail"></i>
                                        {{ __('Messages') }}&nbsp;
                                        <span class="span-message-count">(5)</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <i class="icon-settings"></i>
                                        {{ __('Settings') }}
                                    </a>
                                </li>
                                <li>
                                    <a href="" class="logout">
                                        <i class="icon-logout"></i>
                                        {{ __('Logout') }}
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:void(0)" data-toggle="modal" data-target="#loginModal" class="nav-link">{{ __('Login') }}</a>
                            <span class="auth-sep">/</span>
                            <a href="" class="nav-link">{{ __('Register') }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

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
                                        <a href="{{ url('/') }}">
                                            @if (Session::get('locale') == 'ar')
                                                <img src="{{ asset('uploads/rtl.logo.svg') }}" height="50" alt="logo">
                                            @else
                                                <img src="{{ asset('uploads/ltr.logo.svg') }}" height="50" alt="logo">
                                            @endif
                                        </a>
                                        {{-- <a href="{{ url('/') }}"><img src="{{ asset('uploads/' . tenant('uid') . '/logo.png?v=' . tenant('cache_version')) }}" alt="logo"></a> --}}
                                    </div>
                                    <div class="top-search-bar top-search-bar-single-vendor">
                                        {{-- <div class="left">
                                            <div class="dropdown search-select">
                                                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">{{ __('all categories') }}</button>
                                                <i class="icon-arrow-down search-select-caret"></i>
                                                <input type="hidden" name="search_category_input" id="input_search_category" value="">
                                                <div class="dropdown-menu search-categories">
                                                    <a class="dropdown-item" data-value="all" href="javascript:void(0)">{{ __('all categories') }}</a>
                                                    <a class="dropdown-item" data-value="" href="javascript:void(0)">{{ __('cat name') }}</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="right">
                                            <input type="text" name="search" maxlength="300" pattern=".*\S+.*" id="input_search" class="form-control input-search" value="" placeholder="{{ __('place holder') }}" required autocomplete="off">
                                            <button class="btn btn-default btn-search"><i class="icon-search"></i></button>
                                            <div id="response_search_results" class="search-results-ajax"></div>
                                        </div> --}}
                                        <div class="right">
                                            <form action="{{ url('/products') }}">
                                                <input type="text" id="input_search_mobile" name="search" maxlength="300" pattern=".*\S+.*" class="form-control input-search" value="" placeholder="{{ __('search') }}" required autocomplete="off">
                                                <button type="submit" class="btn btn-default btn-search"><i class="icon-search"></i></button>
                                                <div id="response_search_results_mobile" class="search-results-ajax"></div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 nav-top-right">
                                <ul class="nav align-items-center">
                                    <li class="nav-item nav-item-cart li-main-nav-right">
                                        <a href="url_cart">
                                            <i class="icon-cart"></i>
                                            <span class="label-nav-icon">{{ __('cart') }}</span>
                                            <span class="notification span_cart_product_count">{{ $cart_count }}</span>
                                        </a>
                                    </li>
                                    <li class="nav-item nav-item-cart li-main-nav-right">
                                        <a href="">
                                            <i class="icon-heart-o"></i>
                                            <span class="label-nav-icon">{{ __('Wishlist') }}</span>
                                            <span class="notification span_cart_product_count">{{ $wishlist_count }}</span>
                                        </a>
                                    </li>
                                    <li class="nav-item m-r-0"><a href="add_product" class="btn btn-md btn-custom btn-sell-now m-r-0">{{ __('Sell Now') }}</a></li>
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
                                {{ ThemeMenu('header', 'theme.modesy.components.menu') }}
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
                        <div class="menu-icon">
                            <a href="javascript:void(0)" class="btn-open-mobile-nav"><i class="icon-menu"></i></a>
                        </div>
                        <div class="mobile-logo">
                            <a href="{{ url('/') }}">
                                @if (Session::get('locale') == 'ar')
                                <img src="{{ asset('uploads/rtl.logo.svg') }}" height="40" alt="logo">
                                @else
                                <img src="{{ asset('uploads/ltr.logo.svg') }}" height="40" alt="logo">
                                @endif
                            </a>
                            {{-- <a href="/"><img src="get_logo" alt="logo" class="logo"></a> --}}
                        </div>
                        <div class="mobile-search">
                            <a class="search-icon"><i class="icon-search"></i></a>
                        </div>
                        <div class="mobile-cart">
                            <a href="generate_url"><i class="icon-cart"></i>
                                <span class="notification span_cart_product_count">{{ $cart_count }}</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="top-search-bar mobile-search-form top-search-bar-single-vendor">
                        {{-- <div class="left">
                            <div class="search-select">
                                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">{{ __('All Categories') }}</button>
                                <i class="icon-arrow-down search-select-caret"></i>
                                <input type="hidden" name="search_category_input" id="input_search_category_mobile" value="all">
                                <div class="dropdown-menu search-categories">
                                    <a class="dropdown-item" data-value="all" href="javascript:void(0)">{{ __('All Categories') }}</a>
                                    <a class="dropdown-item" data-value="searchcat" href="javascript:void(0)">{{ __('search_cat') }}</a>
                                </div>
                            </div>
                        </div> --}}
                        <div class="right">
                            <form action="{{ url('/products') }}">
                                <input type="text" id="input_search_mobile" name="search" maxlength="300" pattern=".*\S+.*" class="form-control input-search" value="$filter_search" placeholder="{{ __('search') }}" required autocomplete="off">
                                <button type="submit" class="btn btn-default btn-search"><i class="icon-search"></i></button>
                                <div id="response_search_results_mobile" class="search-results-ajax"></div>
                            </form>
                        </div>
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
                            <a href="generate_url-wishlist" class="nav-link">
                                {{ __('wishlist') }}
                            </a>
                        </li>
                        <li class="nav-item"><a href="item_link" class="nav-link">{{ __('link title') }}</a></li>
                        <li class="nav-item"><a href="item_link" class="nav-link">{{ __('link title') }}</a></li>
                        <li class="dropdown profile-dropdown nav-item">
                            <a href="#" class="dropdown-toggle image-profile-drop nav-link" data-toggle="dropdown" aria-expanded="false">
                                <span class="message-notification message-notification-mobile">3</span>
                                <img src="get_user_avatar" alt="{{ __('username') }}">
                                {{ __('username') }}"> <span class="icon-arrow-down"></span>
                            </a>
                            <ul class="dropdown-menu">
                                {{-- < ?php if (is_admin()): ?> --}}
                                <li>
                                    <a href="admin_url">
                                        <i class="icon-admin"></i>
                                        {{ __('admin Panel') }}
                                    </a>
                                </li>
                                <li>
                                    <a href="dashboard_url">
                                        <i class="icon-dashboard"></i>
                                        {{ __('Dashboard') }}
                                    </a>
                                </li>
                                <li>
                                    <a href="generate_profile_url">
                                        <i class="icon-user"></i>
                                        {{ __('profile') }}
                                    </a>
                                </li>
                                <li>
                                    <a href="/">
                                        <i class="icon-shopping-basket"></i>
                                        {{ __('orders') }}
                                    </a>
                                </li>
                                {{-- < ?php if (is_bidding_system_active()): ?> --}}
                                <li>
                                    <a href="quote_requests">
                                        <i class="icon-price-tag-o"></i>
                                        {{ __('Quote Requests') }}
                                    </a>
                                </li>
                                <li>
                                    <a href="generate_urldownloads">
                                        <i class="icon-download"></i>
                                        {{ __('downloads') }}
                                    </a>
                                </li>
                                <li>
                                    <a href="generate_url">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" class="mds-svg-icon">
                                            <path d="M0 3a2 2 0 0 1 2-2h13.5a.5.5 0 0 1 0 1H15v2a1 1 0 0 1 1 1v8.5a1.5 1.5 0 0 1-1.5 1.5h-12A2.5 2.5 0 0 1 0 12.5V3zm1 1.732V12.5A1.5 1.5 0 0 0 2.5 14h12a.5.5 0 0 0 .5-.5V5H2a1.99 1.99 0 0 1-1-.268zM1 3a1 1 0 0 0 1 1h12V2H2a1 1 0 0 0-1 1z" />
                                        </svg>
                                        {{ __('Refund') }}
                                    </a>
                                </li>
                                <li>
                                    <a href="generate_urmessages">
                                        <i class="icon-mail"></i>
                                        {{ __('messages') }}&nbsp;
                                        <span class="span-message-count">(5)</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="/generate_url">
                                        <i class="icon-settings"></i>
                                        {{ __('Settings') }}
                                    </a>
                                </li>
                                <li>
                                    <a href="logout" class="logout">
                                        <i class="icon-logout"></i>
                                        {{ __('logout') }}
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item"><a href="javascript:void(0)" data-toggle="modal" data-target="#loginModal" class="nav-link close-menu-click">{{ __('login') }}</a></li>
                        <li class="nav-item"><a href="generate_url_register" class="nav-link">{{ __('register') }}</a></li>
                        <li class="nav-item nav-item-messages">
                            <a href="javascript:void(0)" data-toggle="modal" data-target="#locationModal" class="nav-link btn-modal-location close-menu-click">
                                <i class="icon-map-marker float-left"></i>&nbsp;{{ __('location') }}
                            </a>
                        </li>
                        <li class="nav-item dropdown language-dropdown currency-dropdown currency-dropdown-mobile">
                            <a href="javascript:void(0)" class="nav-link dropdown-toggle" data-toggle="dropdown">
                                SDG&nbsp;(SDG)<i class="icon-arrow-down"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <button type="submit" name="currency" value="currency->code">SDG&nbsp;(SDG)</button>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                {{ __('language') }}
                            </a>
                            <ul class="mobile-language-options">
                                <li>
                                    <a href="convert_url_by_language" class="dropdown-item selected">
                                        {{ __('language Name') }}
                                    </a>
                                </li>
                            </ul>
                        </li>
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

            <li><a href="/" class="pinterest"><i class="icon-pinterest"></i></a></li>

            <li><a href="/" class="linkedin"><i class="icon-linkedin"></i></a></li>

            <li><a href="/" class="vk"><i class="icon-vk"></i></a></li>

            <li><a href="/" class="whatsapp"><i class="icon-whatsapp"></i></a></li>

            <li><a href="/" class="telegram"><i class="icon-telegram"></i></a></li>

            <li><a href="" class="youtube"><i class="icon-youtube"></i></a></li>

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

<div id="modal_newsletter" class="modal fade modal-center modal-newsletter" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal"><i class="icon-close" aria-hidden="true"></i></button>
                <h4 class="modal-title">{{ __('join newsletter') }}</h4>
                <p class="modal-desc"><?= trans('newsletter_desc') ?></p>
                <form id="form_newsletter_modal" class="form-newsletter" data-form-type="modal">
                    <div class="form-group">
                        <div class="modal-newsletter-inputs">
                            <input type="email" name="email" class="form-control form-input newsletter-input" placeholder="{{ __('enter email') }}">
                            <button type="submit" id="btn_modal_newsletter" class="btn">{{ __('subscribe') }}</button>
                        </div>
                    </div>
                    <input type="text" name="url">
                    <div id="modal_newsletter_response" class="text-center modal-newsletter-response">
                        <div class="form-group text-center m-b-0 text-close">
                            <button type="button" class="text-close" data-dismiss="modal">{{ __('no thanks') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="menu-overlay"></div>

<!-- Topbar Area -->
{{-- <div class="topbar-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-7 col-12">
                <!-- Topbar Left -->
                <div class="topbar-left">
                    <ul class="topbar-left-inner">
                        <li><i class="icofont-delivery-time"></i><span class="info"><a href="javascript:void(0)"><b>{{ __('Delivery') }}:</b>{{ $average_times->delivery_time ?? '' }}</a></span></li>
<li><i class="icofont-food-cart"></i><span class="info"><b>{{ __('Takeout') }}:</b>{{ $average_times->pickup_time ?? '' }}</span></li>
</ul>
</div>
</div>
<div class="col-lg-6 col-md-5 col-12">
    <!-- Topbar Right -->
    <div class="topbar-right">
        <div class="topbar-language-section">
            <li class="topbar-language">
                <form class="change_lang_form" action="{{ url('/locale/lang') }}">
                    <select name="locale" class="trans_lang">
                        @php
                        $local = Session::get('locale');
                        @endphp
                        @foreach ($languages ?? [] as $key => $row)
                        <option value="{{ $row->code }}" @if ($local==$row->code) selected @endif>{{ $row->name }}</option>
                        @endforeach
                    </select>
                </form>
            </li>
        </div>
        <ul class="topbar-right-inner">
            <!-- Topbar Language -->
            @if (tenant('customer_modules') == 'on')
            <li class="accounts-top-btn"><a href="{{ !Auth::check() ? '#' : url('/customer/dashboard') }}"><i class="icofont-user-male"></i><span>{{ !Auth::check() ? __('My Account') : Auth::user()->name }}</span></a>
                @if (!Auth::check())
                <!-- Topbar Accounts Form -->
                <div class="accounts-signin-top-form">
                    <form action="{{ route('login') }}" method="post" class="accounts-signin-inner">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">

                                    <label><i class="icofont-ui-user"></i> {{ __('Email') }}</label>
                                    <input type="email" name="email" required="required" placeholder="Enter Email">

                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label><i class="icofont-ssl-security"></i> {{ __('Password') }}</label>
                                    <input type="password" name="password" required="">
                                    <a href="{{ url('/password/reset') }}">{{ __('Forgot password?') }}</a>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="accounts-signin-btn">
                                    <button type="submit" class="theme-btn">{{ __('Sign in') }}</button>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="accounts-signin-bottom">
                                    <p>{{ __('Dont have any account?') }}</p>
                                    <a href="{{ url('customer/register') }}" class="theme-btn">Sign up</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- End Topbar Accounts Form -->

                @endif
            </li>
            @endif
        </ul>

    </div>
</div>
</div>
</div>
</div> --}}

<!-- End Topbar Area -->

{{-- Header Area Start --}}

{{-- <header class="header navbar-area">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <div class="nav-inner">
                                <!-- navbar -->
                                <nav class="navbar navbar-expand-lg">
                                    <a class="navbar-brand" href="{{ url('/') }}">
<img src="{{ asset('uploads/' . tenant('uid') . '/logo.png?v=' . tenant('cache_version')) }}" alt="">
</a>
<!-- Responsive Nav Button -->
<button class="navbar-toggler mobile-menu-btn" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="toggler-icon"></span>
    <span class="toggler-icon"></span>
    <span class="toggler-icon"></span>
</button>
<div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
    <ul id="nav" class="navbar-nav ms-auto">
        {{ ThemeMenu('header', 'theme.modesy.components.menu') }}
    </ul>
</div>
</nav>
<!-- End navbar -->
<div class="right-bar">
    <ul class="cart-list-top">
        <li class="single-bar"><a href="{{ url('/cart') }}" class="icon"><i class="icofont-cart-alt"></i><span class="count cart_count">{{ $cart_count }}</span></a></li>

        <li class="single-bar"><a href="{{ url('/wishlist') }}" class="icon"><i class="icofont-heart-alt"></i><span class="count wishlist_count">{{ $wishlist_count }}</span></a>
        </li>

    </ul>
    <!-- End Shopping Cart -->
</div>
</div>
</div>
</div>
</div>
</header> --}}

{{-- Header Area End --}}
