@extends('layouts.frontend.app')

@section('title','Register')

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
                        <h4 class="card-title text-center">{{ __('Sign up') }}</h4>
                        <form action="{{ route('user.store') }}" method="POST" class="login-form mt-4">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">{{ __('First Name') }}<span class="text-danger">*</span></label>
                                        <div class="form-icon position-relative">
                                            <i data-feather="user" class="fea icon-sm icons"></i>
                                            <input type="text" class="form-control ps-5 @error('first_name') is-invalid @enderror" placeholder="{{ __('First Name') }}" value="{{ old('first_name') }}" name="first_name">
                                            @error('first_name')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div><!--end col-->

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">{{ __('Last Name') }}<span class="text-danger">*</span></label>
                                        <div class="form-icon position-relative">
                                            <i data-feather="user-check" class="fea icon-sm icons"></i>
                                            <input type="text" class="form-control ps-5 @error('last_name') is-invalid @enderror" placeholder="{{ __('Last Name') }}" value="{{ old('last_name') }}" name="last_name">
                                            @error('last_name')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div><!--end col-->

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">{{ __('Email') }}<span class="text-danger">*</span></label>
                                        <div class="form-icon position-relative">
                                            <i data-feather="mail" class="fea icon-sm icons"></i>
                                            <input type="email" class="form-control ps-5 @error('email') is-invalid @enderror" placeholder="{{ __('Email') }}" value="{{ $email }}" name="email">
                                            @error('email')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div><!--end col-->

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">{{ __('Phone Number') }}<span class="text-danger">*</span></label>
                                        <div class="form-icon position-relative">
                                            <i data-feather="phone" class="fea icon-sm icons"></i>
                                            <input type="tel" class="form-control ps-5 @error('phone_number') is-invalid @enderror" placeholder="{{ __('0123456789') }}" value="{{ old('phone_number') }}" name="phone_number" pattern="[0-9]{10}" title="Please enter a valid 10-digit phone number">
                                            @error('phone_number')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div><!--end col-->

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">{{ __('Password') }}<span class="text-danger">*</span></label>
                                        <div class="form-icon position-relative">
                                            <i data-feather="key" class="fea icon-sm icons"></i>
                                            <input type="password" class="form-control ps-5 @error('password') is-invalid @enderror" placeholder="{{ __('Password') }}" name="password">
                                            @error('password')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div><!--end col-->

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">{{ __('Confirm Password') }}<span class="text-danger">*</span></label>
                                        <div class="form-icon position-relative">
                                            <i data-feather="key" class="fea icon-sm icons"></i>
                                            <input type="password" class="form-control ps-5 @error('password_confirmation') is-invalid @enderror" placeholder="{{ __('Password') }}" name="password_confirmation">
                                            @error('password_confirmantion')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div><!--end col-->

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" required="">
                                            <label class="form-check-label" for="flexCheckDefault">I Accept <a href="#" class="text-primary">{{ __('Terms And Condition') }}</a></label>
                                        </div>
                                    </div>
                                </div><!--end col-->
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="subscribed_to_newsletter" id="newsletter">
                                            <label class="form-control-label" for="newsletter">{{ __('Subscribe to newsletter') }}</label>
                                        </div>
                                    </div>
                                </div><!--end col-->

                                @if(env('NOCAPTCHA_SITEKEY') != null)
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <div class="form-icon position-relative">
                                                @if(Session::get('locale') == 'ar')
                                                    {!! NoCaptcha::renderJs('ar') !!}
                                                    {!! NoCaptcha::display() !!}
                                                @else
                                                    {!! NoCaptcha::renderJs('en') !!}
                                                    {!! NoCaptcha::display() !!}
                                                @endif
                                                @if($errors->has('g-recaptcha-response'))
                                                    <div class="text-danger">{{ $errors->first('g-recaptcha-response') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @endif

                                <div class="col-md-12">
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary">{{ __('Sign Up') }}</button>
                                    </div>
                                </div><!--end col-->

                                <!-- <div class="col-lg-12 mt-4 text-center">
                                    <h6>Or Signup With</h6>
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
                                    <p class="mb-0 mt-3"><small class="text-dark me-2">{{ __('Already a member?') }}</small> <a href="{{ route('user.login') }}" class="text-dark fw-bold">{{ __('Sign In') }}</a></p>
                                </div><!--end row-->
                            </div><!--end row-->
                        </form>
                    </div>
                </div>
            </div> <!--end col-->
        </div><!--end row-->
    </div> <!--end container-->
</section><!--end section-->
<!-- Register Era End -->


@endsection

