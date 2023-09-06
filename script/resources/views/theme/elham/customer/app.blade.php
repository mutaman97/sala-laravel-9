@extends('theme.elham.layouts.app')

@section('content')
<div id="wrapper">
    <div class="container">
        <div class="row">
            <!-- Start Breadcrumbs Area -->
            <div class="col-12">
                <nav class="nav-breadcrumb" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-products">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="{{ url()->current() }}">{{ __(Request::segment(2)) }}</a></li>
                    </ol>
                </nav>
                <h1 class="page-title">{{ __(ucwords(str_replace('-', ' ', Request::segment(2)))) }}</h1>
            </div>
            <!--/ End Breadcrumbs Area -->
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-3">
                <div class="row-custom">
                    <div class="profile-tabs">
                        <ul class="nav">
                            <li class="nav-item {{ url()->current() == url('/customer/dashboard') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ url('/customer/dashboard') }}">
                                    <span>{{ __('Dashboard') }}</span>
                                </a>
                            </li>
                                <li class="nav-item {{ url()->current() == url('/customer/orders') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ url('/customer/orders') }}">
                                        <span>{{ __('My Orders') }}</span>
                                    </a>
                                </li>
                            <li class="nav-item {{ url()->current() == url('/customer/reviews') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ url('/customer/reviews') }}">
                                    <span>{{ __('Reviews') }}</span>
                                </a>
                            </li>
                            <li class="nav-item {{ url()->current() == url('/customer/settings') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ url('/customer/settings') }}">
                                    <span>{{ __('Edit Profile') }}</span>
                                </a>
                            </li>
                            <li class="nav-item {{ url()->current() == url('/customer/change-password') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ url('/customer/change-password') }}">
                                    <span>{{ __('Change Password') }}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="javascript:void(0)" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                    <span>{{ __('Logout') }}</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-9">
                <div class="row-custom">
                    @yield('customer_content')
                </div>
            </div>
        </div>
    </div>
</div>


























{{-- <!-- Start Dashboard Section -->
<section class="dashboard section mt-3">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-4 col-12">
				<!-- Start Dashboard Sidebar -->
				<div class="dashboard-sidebar">
					<div class="user-image">

						<h3>{{ Auth::user()->name }}</h3>
					</div>
					<div class="dashboard-menu">
						<ul>
							<li><a class="{{ url()->current() == url('/customer/dashboard') ? 'active' : '' }}" href="{{ url('/customer/dashboard') }}"><i class="lni lni-dashboard"></i> {{ __('Dashboard') }}</a></li>
							<li><a href="{{ url('/customer/orders') }}" href="{{ url()->current() == url('/customer/orders') ? 'active' : '' }}"><i class="lni lni-bolt-alt"></i> {{ __('My Orders') }}</a></li>
							<li><a href="{{ url('/customer/reviews') }}"><i class="lni lni-pencil-alt"></i>{{ __('Reviews') }}</a></li>
							<li><a href="{{ url('/customer/settings') }}"><i class="lni lni-pencil-alt"></i> {{ __('Edit Profile') }}</a></li>

						</ul>
						<div class="button">
							<a class="btn alt-btn" href="javascript:void(0)" onclick="event.preventDefault();
							document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
							<form id="logout-form" action="{{ url('/logout') }}" method="POST" class="d-none">
								@csrf
							</form>
						</div>
					</div>
				</div>
				<!-- Start Dashboard Sidebar -->
			</div>
			<div class="col-lg-9 col-md-8 col-12">
				<div class="main-content">
          @if (Auth::user()->role_id == 3)
          <div class="row">
            <div class="col-lg-12">
              <div class="customer-button-area">
                <a href="{{ url('/seller/dashboard') }}">Go To Your Panel</a>
              </div>
            </div>
          </div>

          @elseif(Auth::user()->role_id == 5)
          <div class="row">
            <div class="col-lg-12">
              <div class="customer-button-area">
                <a href="{{ url('/rider/dashboard') }}">Go To Your Panel</a>
              </div>
            </div>
          </div>
          @endif
					@yield('customer_content')

				</div>
			</div>
		</div>
	</div>
</section> --}}
@if(tenant('push_notification') == 'on' && env('FMC_SERVER_API_KEY') != null)
<!-- End Dashboard Section -->
<div class="notification-button-area notification_button">
	<button type="button" class="notification_buttons"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M20 17h2v2H2v-2h2v-7a8 8 0 1 1 16 0v7zM9 21h6v2H9v-2z"/></svg></button>
</div>
@endif
@endsection
@push('js')
<script src="{{ asset('admin/js/sweetalert2.all.min.js') }}"></script>
<script src="{{ asset('admin/js/form.js') }}"></script>
@endpush


{{-- Wallet Modal Start --}}
<div class="modal fade" id="walletModal" role="dialog">
    <div class="modal-dialog modal-dialog-centered login-modal location-modal" role="document">
        <div class="modal-content">
            <div class="auth-box">
                <button type="button" class="close" data-dismiss="modal"><i class="icon-close"></i></button>
                <h4 class="title">{{ __('Add Balance') }}</h4>
                <p class="location-modal-description">{{ __('Your current balance is') }}&nbsp;({{ __(currency_name()) }}&nbsp;{{ number_format(Auth::User()->amount, 2) ?? 0 }})
                </p>
                <div class="form-group m-b-20">
                    <div class="input-group input-group-location">
                        {{-- <i class="icon-map-marker "></i> --}}
                        <input type="number" name="amount" required="" step="any" class="form-control form-input" placeholder="{{ __('Enter amount to add to your wallet') }}">
                        {{-- <a href="javascript:void(0)" class="btn-reset-location-input hidden"><i class="icon-close"></i></a> --}}
                    </div>
                </div>
                <div class="form-group">
                    <button type="button" class="btn btn-md btn-custom btn-block">{{ __('Add Money') }}</button>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- Wallet Modal End --}}
