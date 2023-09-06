@extends('layouts.frontend.app')

@section('title','Login')

@section('content')
<div class="back-to-home rounded d-none d-sm-block">
    <a href="{{ url('/') }}" class="btn btn-icon btn-soft-primary"><i data-feather="home" class="icons"></i></a>
</div>
<!-- Register Area Start -->
<section class="bg-auth-home d-table w-100">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7 col-md-6">
                <div class="me-lg-5">
                    <img src="{{ asset('uploads/register.svg') }}" class="img-fluid d-block mx-auto" alt="">
                </div>
            </div>
            <div class="col-lg-5 col-md-6">
                <div class="card shadow rounded border-0">
                    <div class="card-body">
                        @if (Session::has('error'))
                            <div class="alert alert-danger d-flex align-items-center" role="alert">
                                {{ Session::get('error') }}
                            </div>
                        @endif
                        <h4 class="card-title text-center">{{ __('Log In') }}</h4>
                        <form action="{{ route('login') }}" method="POST" class="login-form mt-4">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label">{{ __('Email') }}<span class="text-danger">*</span></label>
                                        <div class="form-icon position-relative">
                                            <i data-feather="user" class="fea icon-sm icons"></i>
                                            <input type="email" class="form-control ps-5 @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="{{ __('Email') }}" name="email">
                                            @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div><!--end col-->

                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label">{{ __('Password') }}<span class="text-danger">*</span></label>
                                        <div class="form-icon position-relative">
                                            <i data-feather="key" class="fea icon-sm icons"></i>
                                            <input name="password" type="password" class="form-control ps-5 @error('password') is-invalid @enderror" placeholder="{{ __('Password') }}">
                                            @error('password')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div><!--end col-->

                                <div class="col-lg-12">
                                    <div class="d-flex justify-content-between">
                                        <div class="mb-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="remember_me">
                                                <label class="form-check-label" for="remember_me">{{ __('Remember Me') }}</label>
                                            </div>
                                        </div>
                                        <p class="forgot-pass mb-0"><a href="{{ route('password.request') }}" class="text-dark fw-bold">{{ __('Forgot password?') }}</a></p>
                                    </div>
                                </div><!--end col-->

                                <div class="col-md-12">
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary">{{ __('Log In') }}</button>
                                    </div>
                                </div><!--end col-->

                                <!-- <div class="col-lg-12 mt-4 text-center">
                                    <h6>Or Login With</h6>
                                    <div class="row">
                                        <div class="col-6 mt-3">
                                            <div class="d-grid">
                                                <a href="javascript:void(0)" class="btn btn-light"><i class="mdi mdi-facebook text-primary"></i> Facebook</a>
                                            </div>
                                        </div>

                                        <div class="col-6 mt-3">
                                            <div class="d-grid">
                                                <a href="javascript:void(0)" class="btn btn-light"><i class="mdi mdi-google text-danger"></i> Google</a>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->

                                <div class="mx-auto">
                                    <p class="mb-0 mt-3"><small class="text-dark me-2">{{ __("Doesn't have an Account?") }}</small> <a href="{{ route('user.register') }}" class="text-dark fw-bold">{{ __('Sign Up') }}</a></p>
                                </div><!--end col-->
                            </div><!--end row-->
                        </form>
                    </div>
                </div><!---->
            </div> <!--end col-->
        </div><!--end row-->
    </div> <!--end container-->
</section><!--end section-->
<!-- Register Area End -->


@endsection

