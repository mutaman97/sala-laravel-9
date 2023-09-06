<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __('Create Store') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    {{-- css here --}}
    <link rel="stylesheet" href="{{ asset('admin/assets/css/bootstrap.min.css') }}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
{{-- <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700;800&display=swap" rel="stylesheet"> --}}
    <link href="{{ asset('admin/assets/fonts/tajawal/tajawal-font.css') }}" rel="stylesheet"/>
    <link rel="stylesheet" href="{{ asset('admin/assets/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/storecreate.css') }}">

</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="loader-area text-center">
                    <div class="store-loader">
                        <div class="loader"></div>
                        <div class="store-loading">
                            <h6>{{ __('Wait a moment, Your store is almost finished!') }}</h6>
                            <p id="command_line">{{ __('Please Wait...') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" id="store_create_url" value="{{ route('merchant.enroll.domain') }}">



<script>
    var loginConfirmation = "{{ __('Are you sure want to login with this store?') }}";
    var yesIwant = "{{ __('Yes, i want to login!') }}";
    var cancelText = "{{ __('Cancel') }}";
    var pleaseWait = "{{ __('Please Wait...') }}";
    var urlUnavailable = "{{ __('Sorry This Store URL is Unavailable') }}";
    var StorePending = "{{ __('Congratulations! Your store is pending mode, and waiting for admin approval') }}";
    var storeReadyToGo = "{{ __('Congratulations! Your store is ready to go') }}";
    var storeInitializing = "{{ __('Store Initializing') }}";

</script>

    <!-- General JS Scripts -->
    <script src="{{ asset('admin/assets/js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/js/merchant.js') }}"></script>
    <script src="{{ asset('admin/js/storecreate.js') }}"></script>

</body>
</html>
