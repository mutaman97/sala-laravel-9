@extends('layouts.frontend.app')

@section('content')
<!-- header area start -->
@include('layouts.frontend.partials.header')
<!-- header area end -->

<section class="section">
<!-- Hero Start -->
<section class="bg-half-170 bg-light d-table w-100">
    <div class="container">
        <div class="row mt-5 justify-content-center">
            <div class="col-lg-12 text-center">
                <div class="pages-heading">
                    <h4 class="title mb-0">{{ __('Pricing & Plans') }}</h4>
                    <p class="text-muted para-desc pt-3 mb-0 mx-auto">{{ __('With lots of unique blocks, you can easily build a page without coding. Build your next landing page.') }}</p>
                </div>
            </div>  <!--end col-->
        </div><!--end row-->

        <div class="position-breadcrumb">
            <nav aria-label="breadcrumb" class="d-inline-block">
                <ul class="breadcrumb bg-white rounded shadow mb-0 px-4 py-2">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('Home') }}</a></li>
                    <li class="breadcrumb-item"><a href="">{{ __('Pricing') }}</a></li>
                </ul>
            </nav>
        </div>
    </div> <!--end container-->
</section><!--end section-->
<!-- Hero End -->

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
</section>




<!-- footer area start -->
@include('layouts.frontend.partials.footer')
<!-- footer area end -->
@endsection
