@extends('layouts.backend.app')

@section('title',__('Add Store'))

@section('head')
@include('layouts.backend.partials.headersection',['title'=>__('Create Store')])
@endsection

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4>{{ __('Create A New Store') }}</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('merchant.domain.store') }}" method="POST" class="ajaxform">
                @csrf
                {{-- <div class="store-card shadow-sm"> --}}
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="store-section">
                                <h5>{{ __('Login Information') }}</h5>
                                <p>{{ __("Give your store a name and enter the password you want to use to log in to the store directly. You'll use your business email address to log in: ") }}<br> {{ Auth::user()->email }}</p><br>

                                <!-- <p><b>{{ __('Default Credentials') }}</b></p>
                                <p>{{ __('Email: store@email.com') }}</p>
                                <p>{{ __('Password: 12345678') }}</p> -->
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="form-group mb-4">
                                <label>{{ __('Store Name') }}</label>
                                <input type="text" id="store_name" name="store_name" class="form-control" placeholder="{{__('Enter Store Name Without Space')}}">
                            </div>
                            @if (env('SUBDOMAIN_TYPE') == 'real')
                            <div class="form-group mb-4">
                                <label>{{ __('Your Store URL') }}</label>
                                <div class="">
                                    <div dir="ltr" class="store-url-section">
                                        <input readonly="" type="text" id="store_url" class="form-control">
                                        <div class="store-domain-name">
                                            <span>.{{ env('APP_PROTOCOLESS_URL') }}</span>
                                        </div>
                                    </div>
                                    <div class="store-url-danger"></div>
                                    <div class="form-text text-muted">{{ __('You can access your store from the URL above. You can change the URL later, to use custom domain (www.yourname.com)') }}</div>

                                </div>
                            </div>
                            @else
                            <div class="form-group mb-4">
                                <label>{{ __('Store URL') }}</label>
                                <div class="">
                                    <div class="store-url-section">
                                        <input readonly="" type="text" id="store_url" class="form-control url-with-tenant">
                                        <div class="store-domain-left-name">
                                            <span>{{ env('APP_URL_WITH_TENANT') }}</span>
                                        </div>
                                    </div>
                                    <div class="store-url-danger"></div>
                                </div>
                            </div>
                            @endif
                            <div class="form-group  mb-4">
                                <label>{{ __('Email') }}</label>
                                <div class="">
                                    <input type="text" name="email" class="form-control" value="{{ Auth::User()->email }}">
                                </div>
                            </div>
                            <div class="form-group  mb-4">
                                <label>{{ __('Theme') }}</label>
                                <div class="">
                                    <div class="dropdown d-inline mr-2">
                                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{ $selectedTheme ?? $defaultTheme }}
                                        </button>
                                        <div class="dropdown-menu">
                                        @foreach($themes as $theme)
                                            <a class="dropdown-item" value="{{ $theme->name }}" onclick="updateSelectedTheme('{{ $theme->name }}')">{{ $theme->name }}</a>
                                        @endforeach
                                        </div>
                                    </div>
                                    <input type="hidden" name="theme" id="theme" value="{{ $selectedTheme ?? $defaultTheme }}" >
                                </div>
                            </div>
                            <script>
                                let selectedTheme = '';
                                function updateSelectedTheme(name) {
                                    selectedTheme = name;
                                    document.getElementById("dropdownMenuButton").innerHTML = name;
                                    document.getElementById("theme").value = name;
                                }
                            </script>

                            <div class="form-group  mb-4">
                                <label>{{ __('Password') }}</label>
                                <div class="">
                                    <input type="password" name="password" class="form-control">
                                </div>
                            </div>
                            <div class="form-group  mb-4">
                                <label>{{ __('Confirm Password') }}</label>
                                <div class="">
                                    <input name="password_confirmation" type="password" class="form-control">
                                </div>
                            </div>

                        <div class="form-group  mb-0">
                            <div class="">
                                <button class="btn btn-primary btn-lg">{{ __('Save') }}</button>
                            </div>
                        </div>
                    </div>

                    </div>
                {{-- </div> --}}
                {{-- <div class="store-card shadow-sm">
                    <div class="row py-4">
                        <div class="col-lg-6">
                            <div class="cancel-btn">
                                <a href="{{ route('merchant.domain.list') }}" class="btn btn-warning btn-lg">{{ __('Cancel') }}</a>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="button-btn float-left">
                                <button class="btn btn-primary btn-lg">{{ __('Save') }}</button>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </form>
        </div>
      </div>
    </div>
</div>
@endsection


@push('script')
<script>
    var loginConfirmation = "{{ __('Are you sure want to login with this store?') }}";
    var yesIwant = "{{ __('Yes, i want to login!') }}";
    var cancelText = "{{ __('Cancel') }}";
    var pleaseWait = "{{ __('Please Wait...') }}";
    var customDomainError = "{{ __('Custom domain is not supported in this plan, please upgrade the store plan') }}";
    var urlUnavailable = "{{ __('Sorry This Store URL is Unavailable') }}";
</script>
<script src="{{ asset('admin/js/merchant.js') }}"></script>
<script>
    "use strict";
    function success()
    {
        var url=$('#base_url').val();
        window.location.href = url+'/partner/domain/select/plan';
    }
</script>
@endpush
