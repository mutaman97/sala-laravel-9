@extends('layouts.frontend.app')

@section('title',$blog->title)

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
                    <h2>{{ $blog->title }}</h2>
                    <ul class="list-unstyled mt-4 mb-0">
                        <li class="list-inline-item h6 user text-muted me-2"><i class="mdi mdi-account"></i>{{ __('Sara') }}</li>
                        <li class="list-inline-item h6 date text-muted"><i class="mdi mdi-calendar-check"></i>{{ $blog->created_at->isoFormat('ll') }}</li>
                    </ul>
                </div>
            </div><!--end col-->
        </div><!--end row-->
        
        <div class="position-breadcrumb">
            <nav aria-label="breadcrumb" class="d-inline-block">
                <ul class="breadcrumb bg-white rounded shadow mb-0 px-4 py-2">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('Home') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ Str::limit($blog->title,30) }}</li>
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

<!-- Blog STart -->
<section class="section">
    <div class="container">
        <div class="row">
            <!-- BLog Start -->
            <div class="col-lg-8 col-md-6">
                <div class="card blog blog-detail border-0 shadow rounded">
                    <img src="{{ asset($blog->preview->value) }}" class="img-fluid rounded-top" alt="">
                    <div class="card-body content">
                        <!-- <h6><i class="mdi mdi-tag text-primary me-1"></i><a href="javscript:void(0)" class="text-primary">Software</a>, <a href="javscript:void(0)" class="text-primary">Application</a></h6> -->
                        {{ content_format($blog->description->value?? '') }}
                        <!-- <blockquote class="blockquote mt-3 p-3">
                            <p class="text-muted mb-0 fst-italic">" There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. "</p>
                        </blockquote>
                        <p class="text-muted">The advantage of its Latin origin and the relative meaninglessness of Lorum Ipsum is that the text does not attract attention to itself or distract the viewer's attention from the layout.</p> -->
                        <div class="post-meta mt-3">
                            <ul class="list-unstyled mb-0">
                                <li class="list-inline-item me-2 mb-0"><a href="javascript:void(0)" class="text-muted like"><i class="uil uil-heart me-1"></i>33</a></li>
                                <li class="list-inline-item"><a href="javascript:void(0)" class="text-muted comments"><i class="uil uil-comment me-1"></i>08</a></li>
                            </ul>
                        </div>
                    </div>
                </div>


                <div class="card shadow rounded border-0 mt-4">
                    <div class="card-body">
                        <h5 class="card-title mb-0">{{ __('Recent Blogs') }}</h5>

                        <div class="row">
                        @foreach ($blogs as $blog)
                            <div class="col-lg-6 mt-4 pt-2">
                                <div class="card blog rounded border-0 shadow">
                                    <div class="position-relative">
                                        <img src="{{ asset($blog->preview->value) }}" class="card-img-top rounded-top" alt="blog_image">
                                    <div class="overlay rounded-top"></div>
                                    </div>
                                    <div class="card-body content">
                                        <h5><a href="{{ route('blog.show',$blog->slug) }}" class="card-title title text-dark">{{ $blog->title }}</a></h5>
                                        <div class="post-meta d-flex justify-content-between mt-3">
                                            <ul class="list-unstyled mb-0">
                                                <li class="list-inline-item me-2 mb-0"><a href="javascript:void(0)" class="text-muted like"><i class="uil uil-heart me-1"></i>33</a></li>
                                                <li class="list-inline-item"><a href="javascript:void(0)" class="text-muted comments"><i class="uil uil-comment me-1"></i>08</a></li>
                                            </ul>
                                            <a href="{{ route('blog.show',$blog->slug) }}" class="text-muted readmore">{{ __('Read More') }}<i class="uil uil-angle-right-b align-middle"></i></a>
                                        </div>
                                    </div>
                                    <div class="author">
                                        <small class="text-light user d-block"><i class="uil uil-user"></i>{{ __('Sara') }}</small>
                                        <small class="text-light date"><i class="uil uil-calendar-alt"></i>{{ $blog->created_at->isoFormat('ll') }}</small>
                                    </div>
                                </div>
                            </div><!--end col-->
                        @endforeach
                            
                        </div><!--end row-->
                    </div>
                </div>
            </div>
            <!-- BLog End -->

            <!-- START SIDEBAR -->
            <div class="col-lg-4 col-md-6 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                <div class="card border-0 sidebar sticky-bar ms-lg-4">
                    <div class="card-body p-0">
                        <!-- Author -->
                        <div class="text-center">
                            <span class="bg-light d-block py-2 rounded shadow text-center h6 mb-0">
                            {{ __('Author') }}
                            </span>

                            <div class="mt-4">
                                <img src="{{ asset('/assets/img/03.jpg')}}" class="img-fluid avatar avatar-medium rounded-pill shadow-md d-block mx-auto" alt="">

                                <a href="blog-about.html" class="text-primary h5 mt-4 mb-0 d-block">{{ __('Sara') }}</a>
                                <small class="text-muted d-block">{{ __('Blogger & Content Creator') }}</small>
                            </div>
                        </div>
                        <!-- Author -->

                        <!-- Search -->
                        <div class="subcribe-form d-block mt-4 py-2" data-aos="fade-up" data-aos-duration="2200">
                            <form action="{{ route('blog.search') }}" method="GET">
                                @csrf
                                <div class="mb-0">
                                    <input type="text" id="help" name="search" class="form-control bg-light rounded" required="" placeholder="{{ __('Search') }}">
                                    <button type="submit" class="btn rounded btn-primary"><i class="mdi mdi-magnify"></i></button>
                                </div>
                            </form>
                        </div>
                        <!-- Search End -->

                        <!-- RECENT POST -->
                        <div class="widget mt-4">
                            <span class="bg-light d-block py-2 rounded shadow text-center h6 mb-0">
                            {{ __('Recent Blogs') }}
                            </span>

                            <div class="mt-4">
                                @foreach ($blogs as $blog)
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset($blog->preview->value) }}" class="avatar avatar-small rounded" style="width: auto;" alt="">
                                        <div class="flex-1 ms-3">
                                            <a href="{{ route('blog.show',$blog->slug) }}" class="d-block title text-dark">{{ $blog->title }}</a>
                                            <span class="text-muted">{{ $blog->created_at->isoFormat('ll') }}</span>
                                        </div>
                                    </div>
                                @endforeach   
                            </div>
                        </div>
                        <!-- RECENT POST -->

                        <!-- TAG CLOUDS -->
                        <!-- <div class="widget mt-4">
                            <span class="bg-light d-block py-2 rounded shadow text-center h6 mb-0">
                                Tagclouds
                            </span>
                            
                            <div class="tagcloud text-center mt-4">
                                <a href="jvascript:void(0)" class="rounded">Business</a>
                                <a href="jvascript:void(0)" class="rounded">Finance</a>
                                <a href="jvascript:void(0)" class="rounded">Marketing</a>
                                <a href="jvascript:void(0)" class="rounded">Fashion</a>
                                <a href="jvascript:void(0)" class="rounded">Bride</a>
                                <a href="jvascript:void(0)" class="rounded">Lifestyle</a>
                                <a href="jvascript:void(0)" class="rounded">Travel</a>
                                <a href="jvascript:void(0)" class="rounded">Beauty</a>
                                <a href="jvascript:void(0)" class="rounded">Video</a>
                                <a href="jvascript:void(0)" class="rounded">Audio</a>
                            </div>
                        </div> -->
                        <!-- TAG CLOUDS -->
                        
                        <!-- SOCIAL -->
                        <!-- <div class="widget mt-4">
                            <span class="bg-light d-block py-2 rounded shadow text-center h6 mb-0">
                                Social Media
                            </span>

                            <ul class="list-unstyled social-icon text-center mb-0 mt-4">
                                <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="facebook" class="fea icon-sm fea-social"></i></a></li>
                                <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="instagram" class="fea icon-sm fea-social"></i></a></li>
                                <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="twitter" class="fea icon-sm fea-social"></i></a></li>
                                <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="linkedin" class="fea icon-sm fea-social"></i></a></li>
                                <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="github" class="fea icon-sm fea-social"></i></a></li>
                                <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="youtube" class="fea icon-sm fea-social"></i></a></li>
                                <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="gitlab" class="fea icon-sm fea-social"></i></a></li>
                            </ul>
                        </div> -->
                        <!-- SOCIAL -->
                    </div>
                </div>
            </div><!--end col-->
            <!-- END SIDEBAR -->
        </div><!--end row-->
    </div><!--end container-->
</section><!--end section-->
<!-- Blog End -->
<!-- footer area start -->
@include('layouts.frontend.partials.footer')
<!-- footer area end -->
@endsection