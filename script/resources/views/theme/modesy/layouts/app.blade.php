<!DOCTYPE html>
  <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

  <head>

      <meta charset="utf-8">
      {{-- generate meta tags --}}
      {!! SEOMeta::generate() !!}
      {!! OpenGraph::generate() !!}
      {!! Twitter::generate() !!}
      {!! JsonLd::generate() !!}
      {!! JsonLdMulti::generate() !!}
      {!! SEO::generate(true) !!}
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link rel="shortcut icon" type="image/png" href="{{ asset('uploads/'.tenant('uid').'/favicon.ico') }}"/>
      <link rel="canonical" href="{{ url('/') }}"/>




      <link rel="stylesheet" href="{{ asset('theme/modesy/vendor/font-icons/css/mds-icons.min.css') }}">
      <!-- < ?= !empty($this->fonts->site_font_url) ? $this->fonts->site_font_url : ''; ?> -->
      <link rel="stylesheet" href="{{ asset('theme/modesy/vendor/bootstrap/css/bootstrap.min.css') }}">
      <link rel="stylesheet" href="{{ asset('theme/modesy/css/style-2.1.min.css') }}">
      <link rel="stylesheet" href="{{ asset('theme/modesy/css/plugins-2.1.css') }}">
      <!-- < ?php $ this->load->view("partials/_css_js_header"); ? > -->
      @if (Session::get('locale') == 'ar')
      <link href="{{ asset('theme/modesy/css/rtl-2.1.min.css') }}" rel="stylesheet" type="text/css" id="theme-opt" />
      @endif



      {{-- Web Font --}}

      {{-- <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="{{ asset('theme/resto/css/bootstrap.min.css') }}">
      <link rel="stylesheet" href="{{ asset('theme/resto/css/icofont.css') }}"> --}}
      <link rel="stylesheet" href="{{ asset('theme/resto/css/nice-select.css') }}">
      <link rel="stylesheet" href="{{ asset('theme/resto/css/animate.css') }}">
      <link rel="stylesheet" href="{{ asset('theme/resto/css/tiny-slider.css') }}">
      {{-- <link rel="stylesheet" href="{{ asset('theme/resto/css/glightbox.min.css') }}">
      <link rel="stylesheet" href="{{ asset('theme/resto/css/perfect-scrollbar.css') }}"> --}}

      {{-- Theme Styles --}}

      {{-- <link rel="stylesheet" href="{{ asset('theme/resto/css/reset.css') }}">
      <link rel="stylesheet" href="{{ asset('theme/resto/style.css') }}">
      <link rel="stylesheet" href="{{ asset('theme/resto/css/responsive.css') }}">
      <link rel="stylesheet" href="{{ asset('theme/helper.css') }}"> --}}



      @stack('css')
      {{ load_header() }}
      <!-- < ?= $this->general_settings->google_adsense_code; ?> -->
      <style>body {font-family: "Open Sans", Helvetica, sans-serif}
.index_bn_1 {-ms-flex: 0 0 50%;flex: 0 0 50%;max-width: 50%;}  .index_bn_2 {-ms-flex: 0 0 50%;flex: 0 0 50%;max-width: 50%;}  .index_bn_3 {-ms-flex: 0 0 33.33%;flex: 0 0 33.33%;max-width: 33.33%;}  .index_bn_5 {-ms-flex: 0 0 33.33%;flex: 0 0 33.33%;max-width: 33.33%;}  .index_bn_4 {-ms-flex: 0 0 33.33%;flex: 0 0 33.33%;max-width: 33.33%;}      a:active,a:focus,a:hover{color:#222222}.btn-custom, .modal-newsletter .btn,.newsletter-button{background-color:#222222;border-color:#222222}.btn-block{background-color:#222222}.btn-outline{border:1px solid #222222;color:#222222}.btn-outline:hover{background-color:#222222!important}.btn-filter-products-mobile{border:1px solid #222222;background-color:#222222}.form-control:focus{border-color:#222222}.link{color:#222222!important}.link-color{color:#222222}.top-search-bar .btn-search{background-color:#222222}.nav-top .nav-top-right .nav li a:active,.nav-top .nav-top-right .nav li a:focus,.nav-top .nav-top-right .nav li a:hover{color:#222222}.nav-top .nav-top-right .nav li .btn-sell-now{background-color:#222222!important}.nav-main .navbar>.navbar-nav>.nav-item:hover .nav-link:before{background-color:#222222}.li-favorites a i{color:#222222}.product-share ul li a:hover{color:#222222}.pricing-card:after{background-color:#222222}.selected-card{-webkit-box-shadow:0 3px 0 0 #222222;box-shadow:0 3px 0 0 #222222}.selected-card .btn-pricing-button{background-color:#222222}.profile-buttons .social ul li a:hover{background-color:#222222;border-color:#222222}.btn-product-promote{background-color:#222222}.contact-social ul li a:hover{background-color:#222222;border-color:#222222}.price-slider .ui-slider-horizontal .ui-slider-handle{background:#222222}.price-slider .ui-slider-range{background:#222222}.p-social-media a:hover{color:#222222}.blog-content .blog-categories .active a{background-color:#222222}.nav-payout-accounts .active,.nav-payout-accounts .show>.nav-link{background-color:#222222!important}.pagination .active a{border:1px solid #222222!important;background-color:#222222!important}.pagination li a:active,.pagination li a:focus,.pagination li a:hover{background-color:#222222;border:1px solid #222222}.spinner>div{background-color:#222222}::selection{background:#222222!important}::-moz-selection{background:#222222!important}.cookies-warning a{color:#222222}.custom-checkbox .custom-control-input:checked~.custom-control-label::before{background-color:#222222}.custom-control-input:checked~.custom-control-label::before{border-color:#222222;background-color:#222222}.custom-control-variation .custom-control-input:checked~.custom-control-label{border-color:#222222!important}.btn-wishlist .icon-heart{color:#222222}.product-item-options .item-option .icon-heart{color:#222222}.mobile-language-options li .selected,.mobile-language-options li a:hover{color:#222222;border:1px solid #222222}.mega-menu .link-view-all, .link-add-new-shipping-option{color:#222222!important;}.mega-menu .menu-subcategories ul li .link-view-all:hover{border-color:#222222!important}.custom-select:focus{border-color:#222222}.all-help-topics a{color:#222222}</style>
<script>var mds_config = {base_url: "{{ url('/') }}", lang_base_url: "{{ url('/') }}", sys_lang_id: "1", thousands_separator: ".", csfr_token_name: "csrf_mds_token", csfr_cookie_name: "csrf_mds_token", txt_all: "All", txt_no_results_found: "No Results Found!", sweetalert_ok: "OK", sweetalert_cancel: "Cancel", msg_accept_terms: "You have to accept the terms!", cart_route: "cart", slider_fade_effect: "1", is_recaptcha_enabled: "true", rtl: false, txt_add_to_cart: "Add to Cart", txt_added_to_cart: "Added to Cart", txt_add_to_wishlist: "Add to wishlist", txt_remove_from_wishlist: "Remove from wishlist"};if(mds_config.rtl==1){mds_config.rtl=true;}</script>

   </head>

   <body>
         @php
         $autoload_data=getautoloadquery();
         $average_times=optionfromcache('average_times');

         $cart_count=Cart::instance('default')->count();
         $wishlist_count=Cart::instance('wishlist')->count();
         @endphp
               <!--[if lte IE 9]>
      <p class="browserupgrade">
         You are using an <strong>outdated</strong> browser. Please
         <a href="https://browsehappy.com/">upgrade your browser</a> to improve
         your experience and security.
      </p>
     <![endif]-->

            @if(isset($autoload_data['site_settings']))
            @php
            $site_settings=json_decode($autoload_data['site_settings']);
            $site_settings=$site_settings->meta ?? '';
            $preloader=$site_settings->preloader ?? 'yes';
            @endphp

            @if($preloader == 'yes')
            <div class="preloader">
               <div class="preloader-inner">
                  <div class="preloader-icon"><span></span><span></span></div>
               </div>
            </div>
            @endif

            @endif

            @include('theme.modesy.layouts.header',['autoload_data'=>$autoload_data,'cart_count'=>$cart_count,'wishlist_count'=>$wishlist_count,'average_times'=>$average_times,'site_settings'=>$site_settings ?? ''])

         @yield('content')
         @include('theme.modesy.layouts.footer',['site_settings'=>$site_settings ?? ''])

            @if(isset($autoload_data['whatsapp_settings']))
         @php
         $whatsapp= json_decode($autoload_data['whatsapp_settings'])
         @endphp
         @if($whatsapp->whatsapp_status == 'on')
            @include('components.whatsapp',['whatsapp'=>$whatsapp])
         @endif
         @endif

         <!--  scroll-top -->
         <a href="javascript:void(0)" class="scrollup"><i class="icon-arrow-up"></i></a>


         <script src="{{ asset('theme/modesy/js/jquery-3.5.1.min.js') }}"></script>
         <script src="{{ asset('theme/modesy/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
         <script src="{{ asset('theme/modesy/js/plugins-2.1.js') }}"></script>
         <script src="{{ asset('theme/modesy/js/script-2.1.min.js') }}"></script>

         {{-- < ?php if (check_newsletter_modal($this)): ?>
            <script>$(window).on('load', function () {
                     $('#modal_newsletter').modal('show');
               });</script>
         < ?php endif; ?> --}}

         {{-- < ?= $this->general_settings->google_analytics;?>
         < ?= $this->general_settings->custom_javascript_codes;?> --}}

      <input type="hidden" id="callback_url" value="{{ url('/databack') }}">
      <input type="hidden" id="cart_link" value="{{ route('add.tocart') }}" />
      <input type="hidden" id="base_url" value="{{ url('/') }}" />
      <input type="hidden" id="click_sound" value="{{ asset('uploads/click.wav') }}">
      <input type="hidden" id="cart_sound" value="{{ asset('uploads/cart.wav') }}">
      <input type="hidden" id="cart_increment" value="{{ url('/cart-qty') }}">
      <input type="hidden" id="pos_product_varidation" value="{{ url('/product-varidation') }}">
      <input type="hidden" id="cart_content" value="{{ Cart::content() }}">
      <input type="hidden" class="total_amount" value="{{ str_replace(',','',Cart::total()) }}">
      <input type="hidden" id="preloader" value="{{ asset('uploads/preload.webp') }}">
      <input type="hidden" id="currency_settings" value="{{ $autoload_data['currency_data'] ?? '' }}">

      {{-- JS Files --}}

      {{-- <script src="{{ asset('theme/resto/js/jquery.min.js') }}"></script>
      <script src="{{ asset('theme/resto/js/jquery-ui.min.js') }}"></script>
      <script src="{{ asset('theme/resto/js/bootstrap.min.js') }}"></script> --}}

      <script src="{{ asset('theme/resto/js/nice-select.js') }}"></script>
      <script src="{{ asset('theme/resto/js/wow.min.js') }}"></script>
      <script src="{{ asset('theme/resto/js/tiny-slider.js') }}"></script>
      <script src="{{ asset('theme/resto/js/glightbox.min.js') }}"></script>
      <script src="{{ asset('theme/resto/js/perfect-scrollbar.min.js') }}"></script>
      <script src="{{ asset('theme/resto/js/main.js') }}"></script>
      <script src="{{ asset('theme/helper.js') }}"></script>
      <script src="{{ asset('theme/resto/js/theme-helper.js') }}"></script>

      @stack('js')
      {{ load_footer() }}

  </body>
</html>
