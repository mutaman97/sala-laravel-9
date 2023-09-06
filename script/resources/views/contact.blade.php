@extends('layouts.frontend.app')

@section('title','Contact Us')

@section('content')
<!-- header area start -->
@include('layouts.frontend.partials.header')
<!-- header area end -->

<!-- Hero Start -->
<section class="bg-half-170 bg-light d-table w-100">
    <div class="container">
        <div class="row mt-5 justify-content-center">
            <div class="col-lg-12 text-center">
                <div class="pages-heading">
                    <h4 class="title mb-0">{{ __('Contact Us') }}</h4>
                </div>
            </div>  <!--end col-->
        </div><!--end row-->

        <div class="position-breadcrumb">
            <nav aria-label="breadcrumb" class="d-inline-block">
                <ul class="breadcrumb bg-white rounded shadow mb-0 px-4 py-2">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('Home') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('Contact Us') }}</li>
                </ul>
            </nav>
        </div>
    </div> <!--end container-->
</section><!--end section-->
<!-- Hero End -->

<!-- Shape Start -->
<div class="position-relative">
    <div class="shape overflow-hidden text-white">
        <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
        </svg>
    </div>
</div>
<!--Shape End-->

@php
    $info = get_option('footer_theme',true);
    $theme = get_option('theme',true);
    $logo_img=$theme->logo_img ?? '';
@endphp
<!-- Start Contact -->
<section class="section pb-0">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card border-0 text-center features feature-clean">
                    <div class="icons text-primary text-center mx-auto">
                        <i class="uil uil-phone d-block rounded h3 mb-0"></i>
                    </div>
                    <div class="content mt-4">
                        <h5 class="fw-bold">Phone</h5>
                        <p class="text-muted">{{ __('Our phone number is always available, feel free to contact us') }}</p>
                        <a href="tel:+152534-468-854" class="text-primary">{{ $info->phone  ?? '' }}</a>
                    </div>
                </div>
            </div><!--end col-->

            <div class="col-md-4 mt-4 mt-sm-0 pt-2 pt-sm-0">
                <div class="card border-0 text-center features feature-clean">
                    <div class="icons text-primary text-center mx-auto">
                        <i class="uil uil-envelope d-block rounded h3 mb-0"></i>
                    </div>
                    <div class="content mt-4">
                        <h5 class="fw-bold">Email</h5>
                        <p class="text-muted">{{ __('Contact us using this email address') }}</p>
                        <a href="mailto:{{ $info->email ?? ''  }}" class="text-primary">{{ $info->email ?? ''  }}</a>
                    </div>
                </div>
            </div><!--end col-->

            <div class="col-md-4 mt-4 mt-sm-0 pt-2 pt-sm-0">
                <div class="card border-0 text-center features feature-clean">
                    <div class="icons text-primary text-center mx-auto">
                        <i class="uil uil-map-marker d-block rounded h3 mb-0"></i>
                    </div>
                    <div class="content mt-4">
                        <h5 class="fw-bold">Location</h5>
                        <p class="text-muted">{{ $info->address ?? '' }}</p>
                        <!-- <a href="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d39206.002432144705!2d-95.4973981212445!3d29.709510002925988!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8640c16de81f3ca5%3A0xf43e0b60ae539ac9!2sGerald+D.+Hines+Waterwall+Park!5e0!3m2!1sen!2sin!4v1566305861440!5m2!1sen!2sin"
                            data-type="iframe" class="video-play-icon text-primary lightbox">{{ __('View on Google map') }}</a> -->
                        <a href="https://maps.google.com/maps?q={{ $info->address ?? null }}&z=13&ie=UTF8&iwloc=&output=embed"
                        data-type="iframe" class="video-play-icon text-primary lightbox">{{ __('View on Google map') }}</a>
                    </div>
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->

    <div class="container mt-100 mt-60">
        <div class="row align-items-center">
            <div class="col-lg-5 col-md-6 pt-2 pt-sm-0 order-2 order-md-1">
                <div class="card shadow rounded border-0">
                    <div class="card-body py-5">
                        <h4 class="card-title">{{ __('Get In Touch !') }}</h4>
                        <div class="custom-form mt-3">
                            <form action="{{ route('contact.send') }}" method="POST" class="ajaxform_with_reset"">
                                @csrf
                                <p id="error-msg" class="mb-0"></p>
                                <div id="simple-msg"></div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">{{ __('Name') }}<span class="text-danger">*</span></label>
                                            <div class="form-icon position-relative">
                                                <i data-feather="user" class="fea icon-sm icons"></i>
                                                <input name="name" type="text" class="form-control ps-5" placeholder="{{ __('Name') }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">{{ __('Email') }}<span class="text-danger">*</span></label>
                                            <div class="form-icon position-relative">
                                                <i data-feather="mail" class="fea icon-sm icons"></i>
                                                <input name="email" type="email" class="form-control ps-5" placeholder="{{ __('Email') }}">
                                            </div>
                                        </div>
                                    </div><!--end col-->

                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label class="form-label">{{ __('Subject') }}</label>
                                            <div class="form-icon position-relative">
                                                <i data-feather="book" class="fea icon-sm icons"></i>
                                                <input type="text" name="subject" class="form-control ps-5" placeholder="{{ __('Subject') }}">
                                            </div>
                                        </div>
                                    </div><!--end col-->

                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label class="form-label">{{ __('Message') }}<span class="text-danger">*</span></label>
                                            <div class="form-icon position-relative">
                                                <i data-feather="message-circle" class="fea icon-sm icons clearfix"></i>
                                                <textarea name="message" rows="4" class="form-control ps-5" placeholder="{{ __('Message') }}"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    @if(env('NOCAPTCHA_SITEKEY') != null)
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <div class="form-icon position-relative">
                                                @if(Session::get('locale') == 'ar')
                                                    {!! NoCaptcha::renderJs('ar') !!}
                                                    {!! NoCaptcha::display() !!}
                                                @else
                                                    {!! NoCaptcha::renderJs('en') !!}
                                                    {!! NoCaptcha::display() !!}
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-primary">{{ __('Send Message') }}</button>
                                        </div>
                                    </div><!--end col-->
                                </div><!--end row-->
                            </form>
                        </div><!--end custom-form-->
                    </div>
                </div>
            </div><!--end col-->

            <div class="col-lg-7 col-md-6 order-1 order-md-2">
                <div class="card border-0">
                    <div class="card-body p-0">
                        <img src="{{ asset('uploads/envelope.svg') }}" class="img-fluid" alt="Contact image">
                    </div>
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->

    <div class="container-fluid mt-100 mt-60">
        <div class="row">
            <div class="col-12 p-0">
                <div class="card map border-0">
                    <div class="card-body p-0">
                    <iframe src="https://maps.google.com/maps?q={{ $info->address ?? null }}&z=13&ie=UTF8&iwloc=&output=embed" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</section><!--end section-->
<!-- End contact -->


<!-- footer area start -->
@include('layouts.frontend.partials.footer')
<!-- footer area end -->
@endsection
