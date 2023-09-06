<!DOCTYPE html>
  <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      {{-- generate meta tags --}}
      {!! SEOMeta::generate() !!}
      {!! OpenGraph::generate() !!}
      {!! Twitter::generate() !!}
      {!! JsonLd::generate() !!}
      {!! JsonLdMulti::generate() !!}
      {!! SEO::generate(true) !!}

      <meta name="csrf-token" content="{{ csrf_token() }}">
      <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
      <link rel="shortcut icon" type="image/x-icon" href="{{ asset('uploads/'.tenant('uid').'/favicon.ico') }}">
      
      



      <link rel="stylesheet" href="{{ asset('theme/resto/css/icofont.css') }}">
      <!-- Vendor CSS -->
      <link href="{{ asset('theme/rafal/css/vendor/bootstrap.min.css') }}" rel="stylesheet">
      <link href="{{ asset('theme/rafal/css/vendor/vendor.min.css') }}" rel="stylesheet">
      <!-- Custom styles for this template -->
      <link href="{{ asset('theme/rafal/css/style.css') }}" rel="stylesheet">
      <!-- Custom font -->
      <link href="{{ asset('theme/rafal/fonts/icomoon/icons.css') }}" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Open%20Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">




      @stack('css')
      {{ load_header() }}
   </head>
   <body class="has-smround-btns has-loader-bg equal-height">
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
      <!-- loader -->
      <div class="loader-horizontal js-loader-horizontal">
         <div class="progress">
            <div class="progress-bar progress-bar-striped progress-bar-animated" style="width: 100%"></div>
         </div>
      </div>
      @endif

      @endif

     @include('theme.rafal.layouts.header',['autoload_data'=>$autoload_data,'cart_count'=>$cart_count,'wishlist_count'=>$wishlist_count,'average_times'=>$average_times,'site_settings'=>$site_settings ?? ''])
     @yield('content')
     @include('theme.rafal.layouts.footer',['site_settings'=>$site_settings ?? ''])

      @if(isset($autoload_data['whatsapp_settings']))
     @php
     $whatsapp= json_decode($autoload_data['whatsapp_settings'])
     @endphp
     @if($whatsapp->whatsapp_status == 'on')
       @include('components.whatsapp',['whatsapp'=>$whatsapp])
     @endif
     @endif
<!-- back to top -->
<!-- <a class="back-to-top js-back-to-top compensate-for-scrollbar" href="#" title="Scroll To Top">
   <i class="icon icon-angle-up"></i>
</a> -->
<!-- /back to top -->
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
<!--  JS Files  -->


<script src="{{ asset('theme/rafal/js/vendor-special/lazysizes.min.js') }}"></script>
<script src="{{ asset('theme/rafal/js/vendor-special/ls.bgset.min.js') }}"></script>
<script src="{{ asset('theme/rafal/js/vendor-special/ls.aspectratio.min.js') }}"></script>
<script src="{{ asset('theme/rafal/js/vendor-special/jquery.min.js') }}"></script>
<script src="{{ asset('theme/rafal/js/vendor-special/jquery.ez-plus.js') }}"></script>
<script src="{{ asset('theme/rafal/js/vendor-special/instafeed.min.js') }}"></script>
<script src="{{ asset('theme/rafal/js/vendor/vendor.min.js') }}"></script>
<script src="{{ asset('theme/rafal/js/app-html.js') }}"></script>






@stack('js')
{{ load_footer() }}
  </body>
</html>