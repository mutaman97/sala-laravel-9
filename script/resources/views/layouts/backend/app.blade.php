<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>{{ config('app.name') }} | {{ Request::segment(2) }}</title>
  <!-- Favicon icon -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="icon" type="image/png" href="{{ asset('uploads/favicon.ico') }}"/>

  <!-- General CSS Files -->
  @if(Session::get('locale') == 'ar')
  <link rel="stylesheet" href="{{ asset('admin/assets/css/rtl/bootstrap.min.css') }}">
  @else
  <link rel="stylesheet" href="{{ asset('admin/assets/css/bootstrap.min.css') }}">
  @endif
  <link rel="stylesheet" href="{{ asset('admin/assets/css/fontawesome.min.css') }}">
  @if(Session::get('locale') == 'ar')
  <link rel="stylesheet" href="{{ asset('admin/assets/css/rtl-fontawesome.css') }}">
  @endif
  <link rel="stylesheet" href="{{ asset('admin/assets/css/selectric.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/css/bootstrap-colorpicker.min.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css">
  @yield('style')
  @stack('css')

  {{-- Font --}}
  {{-- <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700;800&display=swap" rel="stylesheet"> --}}
  <link href="{{ asset('admin/assets/fonts/tajawal/tajawal-font.css') }}" rel="stylesheet"/>

  <!-- Template CSS -->
  @if(Session::get('locale') == 'ar')
  <link rel="stylesheet" href="{{ asset('admin/assets/css/rtl/style.css')}}?">
  <link rel="stylesheet" href="{{ asset('admin/assets/css/rtl/components.css') }}">
  @else
  <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/assets/css/components.css') }}">
  @endif

  <!-- INCLUDE FONTS -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="//fonts.googleapis.com/css?family=Nunito:400,600,700,800" rel="stylesheet">
  {{-- <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700;800&display=swap" rel="stylesheet"> --}}
  <link href="{{ asset('admin/assets/fonts/tajawal/tajawal-font.css') }}" rel="stylesheet"/>

  {{-- css for seller --}}
  <link rel="stylesheet" href="{{ asset('seller/css/common.css') }}">

</head>

<body>
<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <!--- Header Section ---->
        @include('layouts.backend.partials.header')

        <!--- Sidebar Section --->
        @include('layouts.backend.partials.sidebar')

        <!--- Main Content --->
        <div class="main-content  main-wrapper-1">
            <section class="section">
                @yield('head')
            </section>
                @yield('content')
        </div>

        @yield('modal')

        <!--- Footer Section --->
        @include('layouts.backend.partials.footer')

    </div>
</div>

<input type="hidden" id="language_switch" value="{{ url('seller/lang/switch') }}">
<input type="hidden" class="placeholder_image" value="{{ asset('admin/img/img/placeholder.png') }}">

@if(tenant('push_notification') == 'on' && env('FMC_SERVER_API_KEY') != null)
<input type="hidden" id="apiKey" value="{{ env('FMC_CLIENT_API_KEY') }}">
<input type="hidden" id="authDomain" value="{{ env('FMC_AUTH_DOMAIN') }}">
<input type="hidden" id="projectId" value="{{ env('FMC_PROJECT_ID') }}">
<input type="hidden" id="storageBucket" value="{{ env('FMC_STORAGE_BUCKET') }}">
<input type="hidden" id="messagingSenderId" value="{{ env('FMC_MESSAGING_SENDER_ID') }}">
<input type="hidden" id="appId" value="{{ env('FMC_APP_ID') }}">
<input type="hidden" id="measurementId" value="{{ env('FMC_MEASUREMENT_ID') }}">
@endif

<input type="hidden" id="base_url" value="{{ url('/') }}">
<input type="hidden" id="site_url" value="{{ url('/') }}">
{{-- added by mutaman to show the currency icon in POS page --}}
@if (Auth::User()->role_id == 3)
@php
    $autoload_data=getautoloadquery();
@endphp
<input type="hidden" id="currency_settings" value="{{ $autoload_data['currency_data'] ?? '' }}">
@endif
{{-- end --}}

<!-- General JS Scripts -->
<script src="{{ asset('admin/assets/js/jquery-3.5.1.min.js') }}"></script>

<script src="{{ asset('admin/assets/js/popper.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/jquery.nicescroll.min.js') }}"></script>
<script src="{{ asset('admin/js/sweetalert2.all.min.js') }}"></script>
<script src="{{ asset('admin/js/bootstrap-colorpicker.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>


<!-- Template JS File -->
<script src="{{ asset('admin/assets/js/scripts.js') }}"></script>
<script src="{{ asset('admin/assets/js/custom.js') }}"></script>
<script src="{{ asset('admin/js/form.js') }}"></script>
<script src="{{ asset('admin/assets/js/jquery.selectric.min.js') }}"></script>

@if(tenant('push_notification') == 'on' && env('FMC_SERVER_API_KEY') != null)

<script src="https://www.gstatic.com/firebasejs/7.23.0/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.23.0/firebase-messaging.js"></script>
<script src="{{ asset('firebasestatus.js') }}"></script>
@endif
@yield('script')
@stack('script')
<script src="{{ asset('admin/js/main.js') }}"></script>

<!-- RTL & LTR javascrit -->
<script src="{{ asset('frontend/assets/js/hc-offcanvas-nav.js') }}"></script>
<script src="{{ asset('frontend/assets/js/script.js') }}"></script>



{{-- THIS WILL CHANGE THE SCROLL BAR --}}

<script>
    $(function() {
        $("div .pos-product-main-content div").niceScroll({
        scrollspeed: 40,
        cursorcolor: "#8d5da7",
        //A smaller value increases the scroll speed. A larger value makes the scroll speed slower.

        });

    });
</script>


<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>



</body>
</html>
