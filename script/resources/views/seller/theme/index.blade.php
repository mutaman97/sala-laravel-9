@extends('layouts.backend.app')
@section('head')
@include('layouts.backend.partials.headersection',['title'=> __('Themes')])
@endsection
@section('content')
<section class="section">
    <div class="section-body">
        {{-- <div class="row">
            @foreach ($themes as $item)
            <div class="col-lg-4  py-3">
                <div class="single-main-theme">
                    <div class="theme-main-img">
                        <img class="img-fluid" src="{{ asset($item->asset_path.'/screenshot.png') }}" alt="Theme">
                    </div>
                    <div class="theme-name">
                        <h3>{{ $item->name }}</h3>
                    </div>
                    @if (tenant('theme') == $item->view_path)
                    <div class="theme-btn">
                        <a href="javascript:void(0)" class="btn btn-success btn-lg w-100">{{ __('Installed') }}</a>
                    </div>
                    @else
                    <div class="theme-btn">
                        <a href="{{ route('seller.theme.install',$item->name) }}" class="btn btn-primary btn-lg w-100">{{ __('Install') }}</a>
                    </div>
                    @endif
                </div>
            </div>
            @endforeach
        </div> --}}
        <h2 class="section-title">{{ __('Select Theme') }}</h2>
        <div class="row">
            @foreach ($themes as $item)
            <div class="col-12 col-md-4 col-lg-4">
                <article class="article article-style-c">
                <div class="article-header">
                    <div class="article-image" data-background="https://demo.getstisla.com/assets/img/news/img15.jpg">
                    </div>
                    <div class="article-badge">
                        <div class="article-badge-item bg-warning"><i class="fas fa-fire"></i> Trending</div>
                    </div>
                </div>
                <div class="article-details">
                    <div class="article-title">
                        <h2><a href="#">{{ $item->name }}</a></h2>
                    </div>
                    <div class="article-category"><a href="#">{{__('Developer')}}</a> <div class="bullet"></div> <a href="#" class="text-primary">{{__('Sala Platform')}}</a></div>
                    {{-- <p>Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. </p> --}}
                    @if (tenant('theme') == $item->view_path)
                        <div class="article-cta">
                            <a href="javascript:void(0)" class="btn btn-primary">{{ __('Installed') }}</a>
                        </div>
                    @else
                        <div class="article-cta">
                            <a href="{{ route('seller.theme.install',$item->name) }}" class="btn btn-outline-primary">{{ __('Install') }}</a>
                        </div>
                    @endif
                </div>
                </article>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
