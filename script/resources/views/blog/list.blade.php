@extends('layouts.frontend.app')

@section('title','Blog Lists')

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
                    <h4 class="title mb-0">{{ __('Blog Lists') }}</h4>
                </div>
            </div>  <!--end col-->
        </div><!--end row-->
        @if($blogs->count() > 0)
        <div class="position-breadcrumb">
            <nav aria-label="breadcrumb" class="d-inline-block">
                <ul class="breadcrumb bg-white rounded shadow mb-0 px-4 py-2">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('Home') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('Blog Lists') }}</li>
                </ul>
            </nav>
        </div>
        <div class="subcribe-form mt-4 pt-2" data-aos="fade-up" data-aos-duration="2200">
            <form action="{{ route('blog.search') }}" method="GET">
                @csrf
                <div class="mb-0">
                    <input type="text" id="help" name="search" class="form-control bg-white rounded-pill" required="" placeholder="{{ __('Search for blog post') }}">
                    <button type="submit" class="btn btn-pills btn-primary">{{ __('Search') }}</button>
                </div>
            </form>
        </div>
        @endif
    </div> <!--end container-->
</section><!--end section-->

<div class="position-relative">
    <div class="shape overflow-hidden text-white">
        <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
        </svg>
    </div>
</div>
<!-- Hero End -->

<!--Blog Lists Start-->
<section class="section">
    <div class="container">
        <div class="row">
            @if($blogs->count() > 0)
            <!-- Blog Post Start -->
            <div class="col-lg-8 col-12">
                <div class="row">
                    @foreach ($blogs as $blog)
                    <div class="col-12 mb-4 pb-2">
                        <div class="card blog rounded border-0 shadow overflow-hidden">
                            <div class="row align-items-center g-0">
                                <div class="col-md-6">
                                    <img src="{{ asset($blog->preview->value) }}" class="img-fluid" alt="">
                                    <div class="overlay bg-dark"></div>
                                    <div class="author">
                                        <small class="text-light user d-block"><i class="uil uil-user"></i>{{ __('Sara') }}</small>
                                        <small class="text-light date"><i class="uil uil-calendar-alt"></i>{{ $blog->created_at->isoFormat('ll') }}</small>
                                    </div>
                                </div><!--end col-->

                                <div class="col-md-6">
                                    <div class="card-body content">
                                        <h5><a href="{{ route('blog.show',$blog->slug) }}" class="card-title title text-dark">{{ $blog->title }}</a></h5>
                                        <p class="text-muted mb-0">{{ $blog->excerpt->value }}</p>
                                        <div class="post-meta d-flex justify-content-between mt-3">
                                            <ul class="list-unstyled mb-0">
                                                <li class="list-inline-item me-2 mb-0"><a href="javascript:void(0)" class="text-muted like"><i class="uil uil-heart me-1"></i>33</a></li>
                                                <li class="list-inline-item"><a href="javascript:void(0)" class="text-muted comments"><i class="uil uil-comment me-1"></i>08</a></li>
                                            </ul>
                                            <a href="{{ route('blog.show',$blog->slug) }}" class="text-muted readmore">Read More <i class="uil uil-angle-right-b align-middle"></i></a>
                                        </div>
                                    </div>
                                </div><!--end col-->
                            </div> <!--end row-->
                        </div><!--end blog post-->
                    </div><!--end col-->
                    @endforeach

                    <!-- PAGINATION START -->
                    <div class="col-12 pagination justify-content-center mb-0">
                        {{ $blogs->links() }}
                    </div><!--end col-->
                    <!-- PAGINATION END -->
                </div><!--end row-->
            </div><!--end col-->
            <!-- Blog Post End -->

            <!-- START SIDEBAR -->
            <div class="col-lg-4 col-12 mt-4 mt-lg-0 pt-2 pt-lg-0">
                <div class="card border-0 sidebar sticky-bar ms-lg-4">
                    <div class="card-body p-0">
                        <!-- Author -->
                        <div class="text-center">
                            <span class="bg-light d-block py-2 rounded shadow text-center h6 mb-0">
                            {{ __('Author') }}
                            </span>

                            <div class="mt-4">
                                <img src="{{ asset('/assets/img/03.jpg')}}" class="img-fluid avatar avatar-medium rounded-pill shadow-md d-block mx-auto" alt="">

                                <a href="#" class="text-primary h5 mt-4 mb-0 d-block">{{ __('Sara') }}</a>
                                <small class="text-muted d-block">{{ __('Blogger & Content Creator') }}</small>
                            </div>
                        </div>
                        <!-- Author -->
                        <!-- RECENT POST -->
                        <div class="widget mt-4">
                            <span class="bg-light d-block py-2 rounded shadow text-center h6 mb-0">
                            {{ __('Recent Blogs') }}
                            </span>

                            <div class="mt-4">
                            @foreach ($recent_blogs as $blog)
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
                         {{-- <div class="widget mt-4">
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
                        </div>  --}}
                        <!-- TAG CLOUDS -->

                        <!-- SOCIAL -->
                         {{-- <div class="widget mt-4">
                            <span class="bg-light d-block py-2 rounded shadow text-center h6 mb-0">
                                Share
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
                        </div>

                        <div class="row-custom">
                            <div class="post-share">
                                <h4 class="title">Share</h4>
                                <a href="javascript:void(0)"
                                    onclick='window.open("https://www.facebook.com/sharer/sharer.php?u=https://modesy.codingest.com/blog/fashion/various-versions-have-evolved-over-the-years", "Share This Post", "width=640,height=450");return false'
                                    class="btn btn-md btn-share facebook">
                                    <i class="icon-facebook"></i>
                                    <span>Facebook</span>
                                </a>

                                <a href="javascript:void(0)"
                                    onclick='window.open("https://twitter.com/share?url=https://modesy.codingest.com/blog/fashion/various-versions-have-evolved-over-the-years&amp;text={{ $blog->title }}", "Share This Post", "width=640,height=450");return false'
                                    class="btn btn-md btn-share twitter">
                                    <i class="icon-twitter"></i>
                                    <span>Twitter</span>
                                </a>

                                <a href="https://api.whatsapp.com/send?text={{ $blog->title }} - {{ route('blog.show',$blog->slug) }}" target="_blank"
                                    class="btn btn-md btn-share whatsapp">
                                    <i class="icon-whatsapp"></i>
                                    <span>Whatsapp</span>
                                </a>

                                <a href="javascript:void(0)"
                                    onclick='window.open("http://pinterest.com/pin/create/button/?url={{ route('blog.show',$blog->slug) }}&amp;media={{ asset($blog->preview->value) }}", " Share This Post", "width=640,height=450");return false'
                                    class="btn btn-md btn-share pinterest">
                                    <i class="icon-pinterest"></i>
                                    <span>Pinterest</span>
                                </a>
                            </div>
                        </div>  --}}
                        <!-- SOCIAL -->
                    </div>
                </div>
            </div><!--end col-->
            <!-- END SIDEBAR -->
            @else
            <div class="col-lg-12">
                <div class="blog-no-found-data text-center">
                    <p>{{ __('No Found Data!😓😢😪') }}</p>
                </div>
            </div>
            @endif
        </div><!--end row-->
    </div><!--end container-->
</section><!--end section -->
<!--Blog Lists End-->

<!-- footer area start -->
@include('layouts.frontend.partials.footer')
<!-- footer area end -->
@endsection
