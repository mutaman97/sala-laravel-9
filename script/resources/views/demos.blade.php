@extends('layouts.frontend.app')

@section('title','HomePage')

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
                    <h4 class="title mb-0">{{ __('See Our Themes Lists') }}</h4>
                    <p class="text-muted para-desc pt-3 mb-0 mx-auto">{{ __('theme_des') }}</p>
                </div>
            </div>  <!--end col-->
        </div><!--end row-->

        <div class="position-breadcrumb">
            <nav aria-label="breadcrumb" class="d-inline-block">
                <ul class="breadcrumb bg-white rounded shadow mb-0 px-4 py-2">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('Home') }}</a></li>
                    <li class="breadcrumb-item"><a href="">{{ __('Themes') }}</a></li>
                </ul>
            </nav>
        </div>
    </div> <!--end container-->
</section><!--end section-->
<!-- Hero End -->

<!-- demo area start -->
<section class="section">
    <div class="container">
        <div class="row">
            @foreach ($demos as $demo)
                <div class="col-lg-4 col-md-6 mt-4 pt-2">
                    <div class="card work-container work-modern overflow-hidden rounded border-0 shadow-lg">

                        <div class="card-body p-0">
                            @php
                                $data = json_decode($demo->meta->value ?? '');
                            @endphp
                            <img src="{{ asset('uploads/demo/'.$data->theme_image ?? '') }}" class="img-fluid" alt="theme-image">
                            <!--<a href="{{ $data->theme_url ?? '' }}" target="_blank"><img class="img-fluid" src="{{ asset('uploads/demo/'.$data->theme_image ?? '') }}" alt=""></a>-->

                            <div class="overlay-work bg-dark"></div>
                            <div class="content">
                                <a href="{{ $data->theme_url ?? '' }}" class="title text-white d-block fw-bold">{{ $demo->title }}</a>
                                <small class="text-light">{{ __('Theme') }}</small>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->
            @endforeach
        </div>
    </div>
</section>
<!-- demo area end -->

<!-- footer area start -->
@include('layouts.frontend.partials.footer')
<!-- footer area end -->
@endsection
