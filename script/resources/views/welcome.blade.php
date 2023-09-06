@extends('layouts.frontend.app')

@section('title','HomePage')

@section('content')
<!-- header area start -->
@include('layouts.frontend.partials.header')
<!-- header area end -->

<!-- Hero Start -->
<section class="bg-half-170 d-table w-100">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title-heading mt-4">
                    <h1 class="display-4 fw-bold mb-3" data-aos="fade-up" data-aos-duration="1000">{{ __('hero_title') }}</h1>
                    <p class="para-desc text-muted" data-aos="fade-up" data-aos-duration="1400">{{ __("hero_des") }}</p>
                </div>

                <div class="subcribe-form mt-4 pt-2" data-aos="fade-up" data-aos-duration="1800">
                    <form action="{{ route('register') }}" method="GET">
                        <input type="email" id="email" name="email" class="border bg-white rounded-pill" required placeholder="{{ __('Enter your email...') }}">
                        <button type="submit" class="btn btn-pills btn-primary">{{ __('Start Free Trial') }}</button>
                    </form><!--end form-->
                </div>


                <div class="form-check mt-3"data-aos="fade-up" data-aos-duration="1800">
                    <p class="para-desc mx-auto text-muted">{{ __('hero_small_message') }}</p>
                    <!--<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">-->
                    <!--<label class="form-check-label" for="flexCheckDefault">I Accept <a href="#" class="text-primary">Terms And Condition</a></label>-->
                </div>
            </div><!--end col-->

            <div class="col-md-6" data-aos="fade-up" data-aos-duration="1600">
                @php
                    $hero_img=$info->hero_img ?? '';
                @endphp
                <img src="{{ asset('uploads/'.$hero_img) }}" alt="Sala Hero Image">

            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</section><!--end section-->
<div class="position-relative">
    <div class="shape overflow-hidden text-light">
        <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
        </svg>
    </div>
</div>
<!-- Hero End -->

<!-- New Section -->
<section class="section bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <div class="section-title mb-4 pb-2">
                    <h6 class="text-primary" data-aos="fade-up" data-aos-duration="1000">{{ __('Our Key Features') }}</h6>
                    <h4 class="title mb-4" data-aos="fade-up" data-aos-duration="1400">{{ __('service_title') }}</h4>
                    <!--<p class="text-muted para-desc mb-0 mx-auto">Start working with <span class="text-primary fw-bold">Landrick</span> that can provide everything you need to generate awareness, drive traffic, connect.</p>-->
                    <p class="text-muted para-desc mb-0 mx-auto" data-aos="fade-up" data-aos-duration="1800">{{ __("service_des") }}</p>
                </div>
            </div><!--end col-->
        </div><!--end row-->

        @php
            $animationDuration = 1000;
        @endphp

        <div class="row">
            @foreach ($services as $service)
                @php
                    $serviceinfo = json_decode($service->serviceMeta->value ?? '');
                @endphp
                <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2" data-aos="fade-up" data-aos-duration="{{ $animationDuration }}">
                    <div class="card features feature-clean explore-feature p-4 px-md-3 border-0 rounded-md shadow text-center">
                        <div class="icons text-primary text-center mx-auto">
                            {{-- <i class="uil uil-airplay d-block rounded h3 mb-0"></i> --}}
                            <img src="{{ asset($serviceinfo->image ?? '') }}" width="60" height="70" alt="">
                        </div>

                        <div class="card-body p-0 content">
                            <h5 class="mt-4"><a href="javascript:void(0)" class="title text-dark">{{ $service->title }}</a></h5>
                            <p class="text-muted">{{ $serviceinfo->short_content ?? '' }}</p>
                            <a href="javascript:void(0)" class="text-primary">{{ __('Read More') }} <i class="uil uil-angle-right-b align-middle"></i></a>
                        </div>
                    </div>
                </div><!--end col-->
                @php
                    $animationDuration += 400; // Increment the duration by 400 for each iteration
                @endphp
            @endforeach



        </div><!--end row-->
    </div><!--end container-->

    {{-- <div class="container mt-100 mt-60">
        <div class="row align-items-center">
            <div class="col-lg-5 col-md-6">
                <img src="{{ asset('uploads/'.$info->market_img ?? '') }}" class="img-fluid rounded-md shadow-lg" data-aos="fade-up" data-aos-duration="1800" alt="">
            </div><!--end col-->

            <div class="col-lg-7 col-md-6 mt-4 pt-2 mt-sm-0 pt-sm-0">
                <div class="section-title text-md-start text-center ms-lg-4">
                    <!--<h4 class="title mb-4">Collaborate with your <br> team anytime and anywhare.</h4>-->
                    <h4 class="title mb-4" data-aos="fade-up" data-aos-duration="1000">{{ __('Market your business') }}</h4>

                    <!--<p class="text-muted mb-0 para-desc">Start working with <span class="text-primary fw-bold">Landrick</span> that can provide everything you need to generate awareness, drive traffic, connect.</p>-->
                    <p class="text-muted mb-0 para-desc" data-aos="fade-up" data-aos-duration="1400">{{ __('market_des') }}</p>


                    <div class="d-flex align-items-center text-start mt-4 pt-2" data-aos="fade-up" data-aos-duration="1600">
                        <div class="text-primary h4 mb-0 me-3 p-3 rounded-md shadow bg-white">
                            <i class="uil uil-capture"></i>
                        </div>
                        <div class="flex-1">
                            <a href="javascript:void(0)" class="text-dark h6">Find Better Leads</a>
                        </div>
                    </div>

                    <div class="d-flex align-items-center text-start mt-4" data-aos="fade-up" data-aos-duration="1800">
                        <div class="text-primary h4 mb-0 me-3 p-3 rounded-md shadow bg-white">
                            <i class="uil uil-file"></i>
                        </div>
                        <div class="flex-1">
                            <a href="javascript:void(0)" class="text-dark h6">Set Instant Metting</a>
                        </div>
                    </div>

                    <div class="d-flex align-items-center text-start mt-4" data-aos="fade-up" data-aos-duration="2000">
                        <div class="text-primary h4 mb-0 me-3 p-3 rounded-md shadow bg-white">
                            <i class="uil uil-credit-card-search"></i>
                        </div>
                        <div class="flex-1">
                            <a href="javascript:void(0)" class="text-dark h6">Get Paid Seemlessly</a>
                        </div>
                    </div>
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container--> --}}

    <div class="container mt-100 mt-60">
        <div class="row align-items-center">
            <div class="col-lg-5 col-md-6" data-aos="zoom-in" data-aos-duration="1000">
                <img src="{{ asset('uploads/'.$info->market_img ?? '') }}" alt="">
            </div><!--end col-->

            <div class="col-lg-7 col-md-6 mt-4 mt-sm-0 pt-2 pt-sm-0">
                <div class="section-title ms-lg-5">
                    <h4 class="title mb-4" data-aos="fade-up" data-aos-duration="1000">{{ __('Your store, to your taste') }}</h4>
                    <p class="text-muted" data-aos="fade-up" data-aos-duration="1400">{{ __('Your business success requires an elegant appearance, choose a look that suits your brand') }}</p>
                    <ul class="list-unstyled text-muted" data-aos="fade-up" data-aos-duration="1800">
                        <li class="mb-1"><span class="text-primary h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>{{ __('Customize design details using JS and CSS') }}</li>
                        <li class="mb-1"><span class="text-primary h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>{{ __('A diverse library of ready-to-use themes that can be customized according to your preference') }}</li>
                        <li class="mb-1"><span class="text-primary h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>{{ __('Select the suitable theme color for your brand identity') }}</li>
                        <li class="mb-1"><span class="text-primary h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>{{ __('Create your own skin to match your brand') }}</li>
                    </ul>
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</section><!--end section-->
<!-- End New Section -->

<!-- demo area start -->
<section class="section">
    <div class="container">
        <div class="row">
            <div class="row justify-content-center">
                <div class="col-12 text-center">
                    <div class="section-title mb-4 pb-2">
                        <h4 class="title mb-4" data-aos="fade-up" data-aos-duration="1000">{{ __('themes_lists') }}</h4>
                        <!--<p class="text-muted para-desc mb-0 mx-auto">Start working with <span class="text-primary fw-bold">Landrick</span> that can provide everything you need to generate awareness, drive traffic, connect.</p>-->
                        <p class="text-muted para-desc mb-0 mx-auto" data-aos="fade-up" data-aos-duration="1400">{{ __('theme_des') }}</p>
                    </div>
                </div><!--end col-->
            </div><!--end row-->

            @php
                $animationDuration = 1400;
            @endphp

            @foreach ($demos as $demo)
                <div class="col-lg-4 col-md-6 mt-4 pt-2" data-aos="fade-up" data-aos-duration="{{ $animationDuration }}">
                    <div class="card work-container work-modern overflow-hidden rounded border-0 shadow-lg">

                        <div class="card-body p-0">
                            @php
                                $data = json_decode($demo->meta->value ?? '');
                            @endphp
                            <img src="{{ asset('uploads/demo/'.$data->theme_image ?? '') }}" class="img-fluid" alt="theme-image">

                            <div class="overlay-work bg-dark"></div>
                            <div class="content">
                                <a href="{{ $data->theme_url ?? '' }}" class="title text-white d-block fw-bold">{{ $demo->title }}</a>
                                <small class="text-light">{{ __('Theme') }}</small>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->
                @php
                    $animationDuration += 400; // Increment the duration by 400 for each iteration
                @endphp
            @endforeach
        </div>
        <div class="row justify-content-center" data-aos="fade-up" data-aos-duration="2200">
            <div class="col-12 text-center mt-4 pt-2">
                <a href="{{ url('demos') }}" class="btn btn-primary">{{ __('Explore More Themes') }}<i class="uil uil-angle-right-b"></i></a>
            </div><!--end col-->
        </div><!--end row-->
    </div>
</section>
<!-- demo area end -->


<!-- Pricing Start -->
<div class="container mt-100 mt-60">
    <div class="row justify-content-center">
        <div class="col-12 text-center">
            <div class="section-title mb-4 pb-2">
                <h4 class="title mb-4" data-aos="fade-up" data-aos-duration="1000">{{ __('Pricing & Plans') }}</h4>
                <p class="text-muted para-desc mb-0 mx-auto" data-aos="fade-up" data-aos-duration="1400">{{ __('pricing_des') }}</p>
            </div>
        </div><!--end col-->
    </div><!--end row-->

    <div class="row align-items-center">
        <div class="col-12 mt-4 pt-2">
            <div class="text-center" data-aos="fade-up" data-aos-duration="1800">
                <ul class="nav nav-pills rounded-pill justify-content-center d-inline-block border py-1 px-2" id="pills-tab" role="tablist">
                    <li class="nav-item d-inline-block">
                        <a class="nav-link px-3 rounded-pill active monthly" id="Monthly" data-bs-toggle="pill" href="#Month" role="tab" aria-controls="Month" aria-selected="true">{{ __('Monthly') }}</a>
                    </li>
                    <li class="nav-item d-inline-block">
                        <a class="nav-link px-3 rounded-pill yearly" id="Yearly" data-bs-toggle="pill" href="#Year" role="tab" aria-controls="Year" aria-selected="false">{{ __('Yearly') }} <span class="badge rounded-pill bg-success">{{ __('15% Off') }} </span></a>
                    </li>
                </ul>
            </div>

            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade active show" id="Month" role="tabpanel" aria-labelledby="Monthly">
                    <div class="row justify-content-center">
                        @php
                            $animationDuration = 2200; // Increment the duration by 400 for each iteration
                        @endphp
                        @foreach ($plans as $plan)
                            <div class="col-lg-3 col-md-6 col-12 mt-4 pt-2" data-aos="fade-up" data-aos-duration="{{ $animationDuration }}">
                                <div class="card pricing-rates business-rate shadow bg-light border-0 rounded">
                                    @if($plan->is_featured == 1)
                                        <div class="ribbon ribbon-right ribbon-warning overflow-hidden"><span class="text-center d-block shadow small h6">{{ __('Featured') }}</span></div>
                                    @endif
                                    <div class="card-body">
                                        <h6 class="title fw-bold text-uppercase text-primary mb-4">{{ __($plan->name) }}</h6>
                                            <div class="d-flex mb-4">
                                                {{-- <span class="h4 mb-0 mt-2">{{ __(get_option('currency_symbol')) }}</span> --}}
                                                <span class="h4 mb-0 mt-2">{{ __('SDG') }}</span>

                                                <span class="price h1 mb-0">{{ $plan->price }}</span>
                                                <span class="h6 align-self-end mb-1">/{{ $plan->duration }} {{ __('Days') }}</span>
                                            </div>
                                            @php
                                                $plandata = json_decode($plan->data);
                                            @endphp
                                            @foreach($plandata as $key => $row)

                                                @if($row == 'on')
                                                    <ul class="list-unstyled mb-0 ps-0">
                                                        <li class="h6 text-muted mb-0"><span class="text-success h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>{{ __(ucwords(str_replace('_',' ',$key))) }}</li>
                                                    </ul>
                                                @endif
                                                @if($row =='off')
                                                    <ul class="list-unstyled mb-0 ps-0">
                                                        <li class="h6 text-muted mb-0"><span class="text-danger h5 me-2"><i class="uil uil-times-circle align-middle"></i></span>{{ __(ucwords(str_replace('_',' ',$key))) }}</li>
                                                    </ul>
                                                @endif
                                                @if($key =='storage_limit')
                                                    <ul class="list-unstyled mb-0 ps-0">
                                                        <li class="h6 text-muted mb-0"><span class="text-success h5 me-2"><i class="uil uil-server align-middle"></i></span>{{ __(ucwords(str_replace('_',' ',$key))) }}{{ $row != 'off' && $row != 'on' ? ': '.$row : '' }}{{ $row == '-1' ? __(': Unlimited') : ''}}{{ $key == 'storage_limit' ? __('MB') : '' }}</li>
                                                    </ul>
                                                @endif
                                                @if($key =='post_limit')
                                                    <ul class="list-unstyled mb-0 ps-0">
                                                        <li class="h6 text-muted mb-0"><span class="text-success h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>{{ __(ucwords(str_replace('_',' ',$key))) }}{{ $row != 'off' && $row != 'on' ? ': '.$row : '' }}{{ $row == '-1' ? __(': Unlimited') : ''}}</li>
                                                    </ul>
                                                @endif
                                                @if($key =='staff_limit')
                                                    <ul class="list-unstyled mb-0 ps-0">
                                                        <li class="h6 text-muted mb-0"><span class="text-success h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>{{ __(ucwords(str_replace('_',' ',$key))) }}{{ $row != 'off' && $row != 'on' ? ': '.$row : '' }}{{ $row == '-1' ? __(': Unlimited') : ''}}</li>
                                                    </ul>
                                                @endif
                                            @endforeach
                                            <a href="{{ route('user.register') }}" class="btn btn-primary mt-4">{{ __('Register') }}</a>
                                            <p>{{ $plan->is_trial == 1 ? __('No Credit Card Required') : '' }}</p>
                                    </div>
                                </div>
                            </div><!--end col-->
                            @php
                                $animationDuration += 400; // Increment the duration by 400 for each iteration
                            @endphp
                        @endforeach
                    </div><!--end row-->
                </div>

                <div class="tab-pane fade" id="Year" role="tabpanel" aria-labelledby="Yearly">
                    <div class="row justify-content-center">
                        @foreach ($plans365 as $plan)
                            <div class="col-lg-3 col-md-6 col-12 mt-4 pt-2">
                                <div class="card pricing-rates business-rate shadow bg-light border-0 rounded">
                                    @if($plan->is_featured == 1)
                                        <div class="ribbon ribbon-right ribbon-warning overflow-hidden"><span class="text-center d-block shadow small h6">{{ __('Featured') }}</span></div>
                                    @endif
                                    <div class="card-body">
                                        <h6 class="title fw-bold text-uppercase text-primary mb-4">{{ __($plan->name) }}</h6>
                                        <div class="d-flex mb-4">
                                            {{-- <span class="h4 mb-0 mt-2">{{ __(get_option('currency_symbol')) }}</span> --}}
                                            <span class="h4 mb-0 mt-2">{{ __('SDG') }}</span>
                                            <span class="price h1 mb-0">{{ $plan->price }}</span>
                                            <span class="h6 align-self-end mb-1">/{{ $plan->duration }} {{ __('Days') }}</span>
                                        </div>
                                        @php
                                            $plandata = json_decode($plan->data);
                                        @endphp
                                        @foreach($plandata as $key => $row)
                                        @if($row == 'on')
                                                <ul class="list-unstyled mb-0 ps-0">
                                                    <li class="h6 text-muted mb-0"><span class="text-success h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>{{ __(ucwords(str_replace('_',' ',$key))) }}</li>
                                                </ul>
                                            @endif
                                            @if($row =='off')
                                                <ul class="list-unstyled mb-0 ps-0">
                                                    <li class="h6 text-muted mb-0"><span class="text-danger h5 me-2"><i class="uil uil-times-circle align-middle"></i></span>{{ __(ucwords(str_replace('_',' ',$key))) }}</li>
                                                </ul>
                                            @endif
                                            @if($key =='storage_limit')
                                                <ul class="list-unstyled mb-0 ps-0">
                                                    <li class="h6 text-muted mb-0"><span class="text-success h5 me-2"><i class="uil uil-server align-middle"></i></span>{{ __(ucwords(str_replace('_',' ',$key))) }}{{ $row != 'off' && $row != 'on' && $row != '-1' ? ': '.$row : '' }}{{ $row == '-1' ? __(': Unlimited') : ''}}{{ $key == 'storage_limit' && $row != '-1' ? __('MB') : '' }}</li>
                                                </ul>
                                            @endif
                                            @if($key =='post_limit')
                                                <ul class="list-unstyled mb-0 ps-0">
                                                    <li class="h6 text-muted mb-0"><span class="text-success h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>{{ __(ucwords(str_replace('_',' ',$key))) }}{{ $row != 'off' && $row != 'on' && $row != '-1' ? ': '.$row : '' }}{{ $row == '-1' ? __(': Unlimited') : ''}}</li>
                                                </ul>
                                            @endif
                                            @if($key =='staff_limit')
                                                <ul class="list-unstyled mb-0 ps-0">
                                                    <li class="h6 text-muted mb-0"><span class="text-success h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>{{ __(ucwords(str_replace('_',' ',$key))) }}{{ $row != 'off' && $row != 'on' && $row != '-1' ? ': '.$row : '' }}{{ $row == '-1' ? __(': Unlimited') : ''}}</li>
                                                </ul>
                                            @endif
                                        @endforeach
                                        <a href="{{ route('user.register') }}" class="btn btn-primary mt-4">{{ __('Register') }}</a>
                                        <p>{{ $plan->is_trial == 1 ? __(' No Credit Card Required') : '' }}</p>
                                    </div>
                                </div>
                            </div><!--end col-->
                        @endforeach
                    </div><!--end row-->
                </div>
            </div>
        </div><!--end col-->
    </div><!--end row-->
</div><!--end container-->
<!-- Pricing End -->

<!-- Process Start -->
<div class="container mt-100 mt-60">
    <div class="row justify-content-center">
        <div class="col-12 text-center">
            <div class="section-title">
                <h4 class="title mb-4" data-aos="fade-up" data-aos-duration="1000">{{ __('Payment Solutions') }}</h4>
                <p class="text-muted para-desc mb-0 mx-auto" data-aos="fade-up" data-aos-duration="1400"><span class="text-primary fw-bold">{{ __('Sala') }}</span> {{ __('provides innovative payment solutions that enable retailers to manage orders and electronic payments in one place') }}</p>
            </div>
            <div class="mt-4" data-aos="fade-up" data-aos-duration="1800">
                <a href="javascript:void(0)"><img src="{{ asset('/assets/img/payment/arabic-mbok.svg')}}" class="img-fluid avatar avatar-small mx-2 mt-4 rounded-circle shadow" data-bs-toggle="tooltip" data-bs-placement="top" title="Mbok" alt=""></a>
                <a href="javascript:void(0)"><img src="{{ asset('frontend/images/payments/payment/paypal.jpg') }}" class="img-fluid avatar avatar-small mx-2 mt-4 rounded-circle shadow" data-bs-toggle="tooltip" data-bs-placement="top" title="Paypal" alt=""></a>
                <a href="javascript:void(0)"><img src="{{ asset('frontend/images/payments/payment/master-card.jpg') }}" class="img-fluid avatar avatar-small mx-2 mt-4 rounded-circle shadow" data-bs-toggle="tooltip" data-bs-placement="top" title="Master Card" alt=""></a>
                <a href="javascript:void(0)"><img src="{{ asset('frontend/images/payments/payment/visa.jpg') }}" class="img-fluid avatar avatar-small mx-2 mt-4 rounded-circle shadow" data-bs-toggle="tooltip" data-bs-placement="top" title="Visa" alt=""></a>
                <a href="javascript:void(0)"><img src="{{ asset('/assets/img/payment/cashondeliveryNew.svg')}}" class="img-fluid avatar avatar-small mx-2 mt-4 rounded-circle shadow" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __('Cash On Delivery') }}" alt=""></a>
                <a href="javascript:void(0)"><img src="{{ asset('/assets/img/payment/syberlogo.svg')}}" class="img-fluid avatar avatar-small mx-2 mt-4 rounded-circle shadow" data-bs-toggle="tooltip" data-bs-placement="top" title="Syberpay" alt=""></a>
            </div>
        </div><!--end col-->
    </div><!--end row-->
    <div class="row justify-content-center" data-aos="fade-up" data-aos-duration="2200">
        <div class="col-12 text-center mt-4 pt-2">
            <a href="javascript:void(0)" class="btn btn-primary">{{ __('Learn More') }}<i class="uil uil-angle-right-b"></i></a>
        </div><!--end col-->
    </div><!--end row-->
</div><!--end container-->
<!-- Process End -->

{{-- <!-- About Start -->

<div class="container mt-100 mt-60">
    <div class="row align-items-center">
        <div class="col-lg-6 col-md-6">
            <div class="row align-items-center">
                <div class="col-lg-6 col-6 mt-4 mt-lg-0 pt-2 pt-lg-0" data-aos="zoom-in" data-aos-duration="1000">
                    <div class="card work-container work-modern overflow-hidden rounded border-0 shadow-md">
                        <div class="card-body p-0">
                            <img src="{{ asset('uploads/ab01.jpg') }}" class="img-fluid" alt="work-image">
                            <div class="overlay-work bg-dark"></div>
                            <div class="content">
                                <a href="javascript:void(0)" class="title text-white d-block fw-bold">Web Development</a>
                                <small class="text-light">IT & Software</small>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-lg-6 col-6">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 mt-4 mt-lg-0 pt-2 pt-lg-0" data-aos="zoom-in" data-aos-duration="1000">
                            <div class="card work-container work-modern overflow-hidden rounded border-0 shadow-md">
                                <div class="card-body p-0">
                                    <img src="{{ asset('uploads/ab02.jpg') }}" class="img-fluid" alt="work-image">
                                    <div class="overlay-work bg-dark"></div>
                                    <div class="content">
                                        <a href="javascript:void(0)" class="title text-white d-block fw-bold">Michanical Engineer</a>
                                        <small class="text-light">Engineering</small>
                                    </div>
                                </div>
                            </div>
                        </div><!--end col-->

                        <div class="col-lg-12 col-md-12 mt-4 pt-2" data-aos="zoom-in" data-aos-duration="1000">
                            <div class="card work-container work-modern overflow-hidden rounded border-0 shadow-md">
                                <div class="card-body p-0">
                                    <img src="{{ asset('uploads/ab03.jpg') }}" class="img-fluid" alt="work-image">
                                    <div class="overlay-work bg-dark"></div>
                                    <div class="content">
                                        <a href="javascript:void(0)" class="title text-white d-block fw-bold">Chartered Accountant</a>
                                        <small class="text-light">C.A.</small>
                                    </div>
                                </div>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->
                </div><!--end col-->

            </div><!--end row-->
        </div><!--end col-->

        <div class="col-lg-6 col-md-6 mt-4 mt-lg-0 pt- pt-lg-0">
            <div class="ms-lg-4">
                <div class="section-title mb-4 pb-2">
                    <h4 class="title mb-4" data-aos="fade-up" data-aos-duration="1000">{{ __('Sell everywhere') }}</h4>
                    <!--<p class="text-muted para-desc">Start working with <span class="text-primary fw-bold">Landrick</span> that can provide everything you need to generate awareness, drive traffic, connect.</p>-->
                    <!--<p class="text-muted para-desc mb-0">The most well-known dummy text is the 'Lorem Ipsum', which is said to have originated in the 16th century. Lorem Ipsum is composed in a pseudo-Latin language which more or less corresponds to 'proper' Latin. It contains a series of real Latin words.</p>-->

                    <p class="text-muted para-desc" data-aos="fade-up" data-aos-duration="1400">{{ __('sell_des') }}</p>



                </div>

                <ul class="list-unstyled text-muted" data-aos="fade-up" data-aos-duration="1800">
                    <li class="mb-0"><span class="text-primary h4 me-2"><i class="uil uil-check-circle align-middle"></i></span>Fully Responsive</li>
                    <li class="mb-0"><span class="text-primary h4 me-2"><i class="uil uil-check-circle align-middle"></i></span>Multiple Layouts</li>
                    <li class="mb-0"><span class="text-primary h4 me-2"><i class="uil uil-check-circle align-middle"></i></span>Suits Your Style</li>
                </ul>

                <div class="mt-4 pt-2">
                    <a href="{{ $info->sell_url ?? '' }}" target="_blank" class="btn btn-primary m-1" data-aos="fade-up" data-aos-duration="2200">{{ __('Explore ways to sell') }}<i class="uil uil-angle-right-b align-middle"></i></a>
                    <!--<a href="#!" data-type="youtube" data-id="yba7hPeTSjk" class="btn btn-icon btn-pills btn-primary m-1 lightbox"><i data-feather="video" class="icons"></i></a><span class="fw-bold text-uppercase small align-middle ms-1">Watch Now</span>-->
                </div>
            </div>
        </div>
    </div><!--end row-->
</div><!--end container-->

<!-- About End --> --}}

<!-- Blog & Newspaper Start -->

<section class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <div class="section-title mb-4 pb-2">
                    <h4 class="title mb-4" data-aos="fade-up" data-aos-duration="1000">{{ __('Recent Blogs') }}</h4>
                    <p class="text-muted para-desc mx-auto mb-0" data-aos="fade-up" data-aos-duration="1400">{{ __('news_des') }}</p>
                </div>
            </div><!--end col-->
        </div><!--end row-->

        <div class="row">
            @php
                $animationDuration = 1400;
            @endphp
            @foreach ($blogs as $blog)
                <div class="col-lg-4 col-md-6 mt-4 pt-2" data-aos="fade-up" data-aos-duration="{{ $animationDuration }}">
                    <div class="card blog rounded border-0 shadow">
                        <div class="position-relative">
                            <img src="{{ asset($blog->preview->value) }}" class="card-img-top rounded-top" alt="...">
                            <div class="overlay rounded-top"></div>
                        </div>
                        <div class="card-body content">
                            <h5><a href="{{ route('blog.show',$blog->slug) }}" class="card-title title text-dark">{{ $blog->title }}</a></h5>
                            <div class="post-meta d-flex justify-content-between mt-3">
                                <!--<ul class="list-unstyled mb-0">-->
                                <!--    <li class="list-inline-item me-2 mb-0"><a href="javascript:void(0)" class="text-muted like"><i class="uil uil-heart me-1"></i>33</a></li>-->
                                <!--    <li class="list-inline-item"><a href="javascript:void(0)" class="text-muted comments"><i class="uil uil-comment me-1"></i>08</a></li>-->
                                <!--</ul>-->
                                <a href="{{ route('blog.show',$blog->slug) }}" class="text-muted readmore">{{ __('Read Story') }}<i class="uil uil-angle-right-b align-middle"></i></a>
                            </div>
                        </div>
                        <div class="author">
                            <!--<small class="text-light user d-block"><i class="uil uil-user"></i> Calvin Carlo</small>-->
                            <small class="text-light date"><i class="uil uil-calendar-alt"></i>{{ $blog->created_at->toDateString() }}</small>
                            <small class="text-light"><p>{{ $blog->excerpt->value ?? '' }}</p></small>

                        </div>
                    </div>
                </div><!--end col-->
                @php
                    $animationDuration += 400; // Increment the duration by 400 for each iteration
                @endphp
            @endforeach

        </div><!--end row-->
    </div><!--end container-->

    <!-- Testi Start -->
    <section class="section pb-0">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 text-center">
                    <div class="section-title mb-4 pb-2">
                        <!-- <h6 data-aos="fade-up" data-aos-duration="1000">We believe in building each other and hence</h6> -->
                        <h4 class="title mb-4" data-aos="fade-up" data-aos-duration="1000">{{ __('Our amazing partners') }}</h4>
                        <p class="text-muted para-desc mx-auto mb-0" data-aos="fade-up" data-aos-duration="1400">{{ __('In') }} <span class="text-primary fw-bold">{{ __('Sala Platform') }}</span> {{ __('We strongly believe in mutual support and building each other up') }}</p>
                    </div>
                </div><!--end col-->
            </div><!--end row-->

            <div class="row">
                <div class="col-12 mt-4">
                    <div class="tiny-three-item">
                        @php
                            $animationDuration = 1800;
                        @endphp
                        @foreach ($testimonials as $testimonial)
                            @php
                                $data = json_decode($testimonial->meta->value ?? '');
                            @endphp
                            <div class="tiny-slide text-center" data-aos="fade-up" data-aos-duration="{{ $animationDuration }}">
                                <div class="client-testi rounded shadow m-2 p-4">
                                    <a href="{{ $data->store_url ?? '' }}"><img src="{{ asset('uploads/testimonials/'.$data->store_image ?? '') }}" class="img-fluid avatar avatar-ex-sm mx-auto" alt=""></a>
                                    <p class="text-muted mt-4">{{ __($data->testimonial ?? '') }}</p>
                                    <h6 class="text-primary">{{ __($testimonial->title ?? '') }} - {{ __($data->partner_position ?? '') }}</h6>

                                </div>
                            </div>
                            @php
                                $animationDuration += 400; // Increment the duration by 400 for each iteration
                            @endphp
                        @endforeach
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section><!--end section-->
    <!-- Testi End -->



    <div class="container mt-100 mt-60">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <div class="section-title mb-4 pb-2">
                    <h4 class="title mb-4" data-aos="fade-up" data-aos-duration="1000">{{ __('Newsletter') }}</h4>
                    <p class="text-muted para-desc mx-auto mb-0" data-aos="fade-up" data-aos-duration="1400">{{ __('Sign up and receive the latest tips via email') }}</p>
                </div>
            </div><!--end col-->
        </div><!--end row-->

        <div class="row justify-content-center mt-4 pt-2" data-aos="fade-up" data-aos-duration="1800">
            <div class="col-lg-7 col-md-10">
                <div class="subcribe-form">
                    <form action="{{ route('subscribe') }}" method="POST" class="ajaxform_with_reset">
                        @csrf
                        <input type="email" id="email" name="email" class="rounded-pill border" placeholder="{{ __('Enter Email Address') }}">
                        <button type="submit" class="btn btn-pills btn-primary">{{ __('Subscribe') }}<i class="uil uil-arrow-right"></i></button>
                    </form><!--end form-->
                </div><!--end subscribe form-->
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</section>

<!-- Blog & Newspaper End -->

<!-- footer area start -->
@include('layouts.frontend.partials.footer')
<!-- footer area end -->
@endsection
