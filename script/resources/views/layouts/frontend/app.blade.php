<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        {!! SEOMeta::generate() !!}
        {!! OpenGraph::generate() !!}
        {!! Twitter::generate() !!}
        {!! JsonLd::generate() !!}
        {!! JsonLdMulti::generate() !!}
        {!! SEO::generate(true) !!}
        <!-- favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('uploads/favicon.ico') }}">
        <!-- Bootstrap -->
        <link href="{{ asset('frontend/assets/css/bootstrap.min.css') }}" rel="stylesheet"/>
        <!-- Icons -->
        <link href="{{ asset('frontend/assets/css/materialdesignicons.min.css') }}" rel="stylesheet"/>
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v3.0.6/css/line.css">
        <!-- Unicons -->
        @if (Session::get('locale') == 'ar')
        <link href="{{ asset('frontend/assets/css/unicons-rtl.css') }}" rel="stylesheet"/>
        @endif
        {{-- fonts --}}
        {{-- <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700;800&display=swap" rel="stylesheet"> --}}
        <link href="{{ asset('frontend/assets/fonts/tajawal/tajawal-font.css') }}" rel="stylesheet"/>
        <!-- Slider -->
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/tiny-slider.css') }}"/>
        <!-- Animate -->
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/aos.css') }}"/>
        <!-- CSRF  -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Main Css -->
        @if (Session::get('locale') == 'ar')
        <link href="{{ asset('frontend/assets/css/style-rtl.css') }}" rel="stylesheet" type="text/css" id="theme-opt" />
        @else
        <link href="{{ asset('frontend/assets/css/style.css') }}" rel="stylesheet" type="text/css" id="theme-opt" />
        @endif
        <link href="{{ asset('frontend/assets/css/colors/purple.css') }}" rel="stylesheet" id="color-opt">

    </head>

    <body>
        <!-- Messenger -->
        <div id="fb-root"></div>
        <div class="fb-customerchat" attribution="setup_tool" page_id="101516195535411" theme_color="#8d5da7" guest_chat_mode="disabled" greeting_dialog_display="show">
        </div>

        <script>
            window.fbAsyncInit=function(){FB.init({xfbml:!0,version:"v3.2"})},function(e,t,n){var c,o=e.getElementsByTagName(t)[0];e.getElementById(n)||(c=e.createElement(t),c.id=n,c.src="https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js",o.parentNode.insertBefore(c,o))}(document,"script","facebook-jssdk");
        </script>

        @yield('content')
        <input type="hidden" id="language_switch" value="{{ route('lang.switch') }}">
        <!-- javascript -->
        <script src="{{ asset('frontend/assets/js/bootstrap.bundle.min.js') }}"></script>
        <!-- SLIDER -->
        <script src="{{ asset('frontend/assets/js/tiny-slider.js') }}"></script>
        <!-- Animation -->
        <script src="{{ asset('frontend/assets/js/aos.js') }}"></script>
        <!-- Icons -->
        <script src="{{ asset('frontend/assets/js/feather.min.js') }}"></script>
        <!-- Switcher -->
        <script src="{{ asset('frontend/assets/js/switcher.js') }}"></script>
        <!-- Main Js -->
        <script src="{{ asset('frontend/assets/js/plugins.init.js') }}"></script><!--Note: All init js like tiny slider, counter, countdown, maintenance, lightbox, gallery, swiper slider, aos animation etc.-->
        <script src="{{ asset('frontend/assets/js/app.js') }}"></script><!--Note: All important javascript like page loader, menu, sticky menu, menu-toggler, one page menu etc. -->
        <!-- Foodsify old js for sweetalert and language switch -->
        <script src="{{ asset('admin/assets/js/jquery-3.5.1.min.js') }}"></script>
        <script src="{{ asset('admin/js/sweetalert2.all.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/iconify.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/hc-offcanvas-nav.js') }}"></script>
        <script src="{{ asset('admin/js/form.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/script.js') }}"></script>

    </body>
</html>
