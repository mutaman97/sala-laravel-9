@extends('theme.elham.layouts.app')

@section('content')
    @php
        $header_slider_status=$page_data->header_slider_status ?? 'yes';
        $header_short_banner=$page_data->header_short_banner ?? 'yes';
        $latest_product_status=$page_data->latest_product_status ?? 'yes';
        $featured_category_status=$page_data->featured_category_status ?? 'yes';
        $filter_product_status=$page_data->filter_product_status ?? 'yes';
        $top_rated_product_status=$page_data->top_rated_product_status ?? 'yes';
        $promotion_area_status=$page_data->promotion_area_status ?? 'yes';
        $blog_area_status=$page_data->blog_area_status ?? 'yes';
        $brand_area_status=$page_data->brand_area_status ?? 'yes';
    @endphp
    {{-- @if($header_slider_status == 'yes')
    <section class="hero-area hero_slider_section" >
        <div class="hero-slider">
            <div class="content-preloader" >
                <div class="content-placeholder"   data-height="400px" data-width="100%"> </div>
            </div>
        </div>
    </section>
    @endif --}}
    @if($header_slider_status == 'yes')
        <div class="section-slider">
            {{-- <div class="index-main-slider < ?php echo ($ this->general_settings->slider_type == "boxed") ? "container container-boxed-slider" : "container-fluid"; ? >"> --}}
            <div class="index-main-slider container-fluid">
                <div class="row">
                    {{-- TODO RTL & LTR --}}
                    <div class="slider-container hero_slider_section">
                        {{-- Hero Slider Preloader --}}
                        <div class="content-preloader" >
                            <div class="content-placeholder" data-height="500px" data-width="100%">

                            </div>
                        </div>

                        <div id="hero-slider" class="main-slider hero-slider">
                            {{-- <div class="item lazyload" data-bg="/">
                                    <a href="/link-item">
                                        <div class="container">
                                        <div class="row row-slider-caption align-items-center">
                                                <div class="col-12">
                                                    <div class="caption">
                                                            <h2 class="title" data-animation="fadeInUp" data-delay="0.1s" style="color: green">item->title</h2>
                                                            <p class="description" data-animation="animation_description" data-delay="0.5s" style="color: red">item->description</p>
                                                            <button class="btn btn-slider" data-animation="animation_button" data-delay="0.9s" style="background-color: blue;border-color: black;color: red">button_text</button>
                                                    </div>
                                                </div>
                                        </div>
                                        </div>
                                    </a>
                            </div> --}}
                        </div>
                        <div id="main-slider-nav" class="main-slider-nav">
                            <button class="prev prev-owl"><i class="icon-arrow-left"></i></button>
                            <button class="next next-owl"><i class="icon-arrow-right"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid index-mobile-slider">
                <div class="row">
                    {{-- TODO RTL & LTR --}}
                    <div class="slider-container" dir="ltr">

                        <div class="content-preloader" >
                            <div class="content-placeholder" data-height="500px" data-width="100%">

                            </div>
                        </div>

                        <div id="hero-slider" class="main-slider hero-slider">
                            {{-- <div class="item lazyload" data-bg="/">
                                <a href="item-link">
                                    <div class="container">
                                    <div class="row row-slider-caption align-items-center">
                                        <div class="col-12">
                                            <div class="caption">
                                                <h2 class="title" data-animation="fadeInUp" data-delay="0.1s" style="color: blue">item->title</h2>
                                                <p class="description" data-animation="animation_description" data-delay="0.5s" style="color: black">item->description</p>
                                                <button class="btn btn-slider" data-animation="item->animation_button" data-delay="0.9s" style="background-color: blue;border-color: black;color: red">button_text</button>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                </a>
                            </div> --}}
                        </div>
                        <div id="main-slider-nav" class="main-slider-nav">
                            <button class="prev prev-owl"><i class="icon-arrow-left"></i></button>
                            <button class="next next-owl"><i class="icon-arrow-right"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif



    <!-- Wrapper -->
    <div id="wrapper" class="index-wrapper">
        <div class="container">
            <div class="row">
                {{-- TODO RTL & LTR --}}
                <h1 class="index-title">{{ $store_title }}</h1>
                @if($featured_category_status == 'yes')
                    <div class="col-12 section section-categories featured_category category_section">
                        <!-- featured categories -->
                        <div class="featured-categories">
                            <div class="card-columns department-slider">
                                {{-- < ?php foreach ($featured_categories as $category): ?> --}}
                                {{-- <h2>{{ $page_data->featured_category_title ?? '' }}</h2> --}}
                                {{-- < ?php endforeach; ?> --}}
                            </div>
                        </div>
                    </div>
                @endif

                {{-- Featured categories Banners --}}
                @if($header_short_banner == 'yes')
                    <div class="col-12 section section-index-bn short_banner_section">
                        <div class="row short_banner_featured_categories">
                        </div>
                    </div>
                @endif



                <!-- Featured Products Area -->
                {{-- <div class="featured_products_area">

                </div> --}}

                <div class="col-12 section section-category-products featured_products_area">

                </div>





                @if($latest_product_status == 'yes')
                    <div class="col-12 section section-category-products latest_product_section">
                        <div class="section-header">
                            <h3 class="title">{{ $page_data->latest_product_title ?? 'title' }}</h3>
                            <p class="small-title">{{ $page_data->latest_product_short_title ?? 'short' }}</p>
                        </div>
                            {{-- TODO RTL & LTR --}}
                        <div class="row-custom category-slider-container">
                            <div class="row row-product" id="slider_special_offers">
                                {{-- <div class="col-6 col-sm-4 col-md-3 col-mds-5 col-product latest_products_preloader">
                                </div> --}}
                                <div class="latest_products">
                                </div>
                                <div class="latest_products_preloader">
                                </div>
                            </div>

                            <div id="index-products-slider-nav" class="index-products-slider-nav">
                                <button class="prev prev-owl"><i class="icon-arrow-left"></i></button>
                                <button class="next next-owl"><i class="icon-arrow-right"></i></button>
                            </div>
                        </div>
                    </div>
                    {{--
                    <div class="col-12 section section-category-products">
                        <div class="section-header">
                            <h3 class="title">{{ $page_data->latest_product_title ?? '' }}</h3>
                        </div>
                        <div class="row row-product latest_products">

                        </div>
                    </div> --}}
                @endif






                @if($top_rated_product_status == 'yes')
                    <div class="col-12 section section-category-products toprated_products_area">
                        <div class="section-header">
                            <h3 class="title">{{ $page_data->top_rated_product_title ?? 'top_rated_product_title' }}</h3>
                            <p class="small-title">{{ $page_data->top_rated_product_short_title ?? 'top_rated_product_short_title' }}</p>
                        </div>
                            {{-- TODO RTL & LTR --}}
                        <div class="row-custom category-slider-container">
                            <div class="row row-product" id="slider_special_offers">
                                {{-- <div class="col-6 col-sm-4 col-md-3 col-mds-5 col-product latest_products_preloader">
                                </div> --}}
                                <div class="toprated_products">
                                </div>
                                <div class="toprated_products_preload">
                                </div>
                            </div>

                            <div id="index-products-slider-nav" class="index-products-slider-nav">
                                <button class="prev prev-owl"><i class="icon-arrow-left"></i></button>
                                <button class="next next-owl"><i class="icon-arrow-right"></i></button>
                            </div>
                        </div>
                    </div>
                    {{--
                    <div class="col-12 section section-category-products">
                        <div class="section-header">
                            <h3 class="title">{{ $page_data->latest_product_title ?? '' }}</h3>
                        </div>
                        <div class="row row-product latest_products">

                        </div>
                    </div> --}}
                @endif

                {{-- @if($top_rated_product_status == 'yes')
                    <section class="products-area bg-second section-padding toprated_products_area">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6 col-md-8 col-12">
                                <div class="section-title m-btm-30">
                                <p class="small-title font-stylish m-btm-10 pr-color">{{ $page_data->top_rated_product_short_title ?? '' }}</p>
                                <h2 class="s-content-title">{{ $page_data->top_rated_product_title ?? '' }}</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="product-area-main">
                                <div class="single-product-top product-latest-slider toprated_products_preload">



                                </div>
                                <div class="single-product-top product-latest-slider toprated_products">



                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </section>
                @endif --}}



                {{-- TODO --}}
                {{-- @if($latest_product_status == 'yes')
                <div class="col-12 section section-latest-products new_arrivals_section">
                    <h3 class="title">
                        <a href="< ?= generate_url('products'); ?>">{{ $page_data->latest_product_title ?? 'latest products title' }}</a>
                    </h3>
                    <p class="title-exp">{{ $page_data->latest_product_short_title ?? 'short title' }}</p>
                    <div class="row row-product new_arrivals">
                        <!-- <div class="new_arrivals">

                        </div> -->
                    </div>
                </div>
                @endif --}}




                @if($header_short_banner == 'yes')
                    <div class="col-12 section section-index-bn short_banner_section">
                        <div class="row short_banner_latest_products">
                        </div>
                    </div>
                @endif


                @if($header_short_banner == 'yes')
                    <div class="col-12 section section-index-bn short_banner_section">
                        <div class="row short_banner_top_rated_products">
                        </div>
                    </div>
                @endif




                @if($header_short_banner == 'yes')
                    <div class="col-12 section section-index-bn short_banner_section">
                        <div class="row short_banner_promotion_area">
                        </div>
                    </div>
                @endif






                    {{-- ----------------------------------------------------------------------------------------------------------------filter product start  --}}




                        @if($filter_product_status == 'yess')
                            <div class="col-12 section section-promoted">

                                <div id="promoted_posts">
                                    <h3 class="title">{{ $page_data->filter_product_title ?? 'Filter Products' }}</h3>
                                    <p class="title-exp">{{ $page_data->filter_product_short_title ?? 'Short Title' }}</p>
                                    <div id="row_promoted_products" class="row row-product">
                                        {{-- < ?php foreach ($promoted_products as $product): ?> --}}
                                            {{-- <div class="col-6 col-sm-4 col-md-3 col-mds-5 col-product">
                                                < ?php $this->load->view('product/_product_item', ['product' => $product, 'promoted_badge' => false, 'is_slider' => 0, 'discount_label' => 0]); ?>
                                            </div> --}}
                                        {{-- < ?php endforeach; ?> --}}




                                        <div class="row">
                                            <div class="col-12 wow fadeInUp"  data-wow-delay=".5s">
                                                <!-- Tab Menu -->
                                                <div class="latest-home-tabs">
                                                <ul class="list-group product_menu" id="list-tab" role="tablist">
                                                    <li><a class="list-group-item active" data-bs-toggle="list" href="#f-tab1" role="tab">{{ __('All') }} </a></li>

                                                </ul>
                                                </div>
                                                <!-- End Tab Menu -->
                                            </div>
                                            <div class="col-12">
                                                <!-- Tab Details -->
                                                <div class="latest-tab-details m-top-30">
                                                    <div class="tab-content" id="nav-tabContent">
                                                        <!-- Property Tab One -->
                                                        <div class="tab-pane fade show active tab1" id="f-tab1" role="tabpanel">
                                                            <div class="row random_products_preload">




                                                            </div>
                                                            <div class="row random_products">




                                                            </div>
                                                        </div>

                                                        <!-- Property Tab Two -->
                                                        <div class="tab-pane fade tab2" id="f-tab2" role="tabpanel">
                                                            <div class="row filtered_product_tab">

                                                            </div>
                                                        </div>


                                                    </div>
                                                </div>
                                                <!-- End Tab Details -->
                                            </div>
                                        </div>



                                    </div>
                                    {{-- <input type="hidden" id="promoted_products_offset" value="< ?php echo count($promoted_products); ?>"> --}}
                                    <div id="load_promoted_spinner" class="col-12 load-more-spinner">
                                        <div class="row">
                                            <div class="spinner">
                                                <div class="bounce1"></div>
                                                <div class="bounce2"></div>
                                                <div class="bounce3"></div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- < ?php if ($promoted_products_count > count($promoted_products)): ?> --}}
                                        <div class="row-custom text-center promoted-load-more-container">
                                            <a href="javascript:void(0)" class="link-see-more" onclick="loadMorePromotedProducts();"><span>{{ __('Load More') }}&nbsp;<i class="icon-arrow-down"></i></span></a>
                                        </div>
                                    {{-- < ?php endif; ?> --}}
                                </div>

                            </div>
                        @endif

                        {{-- -----------------------------------------------------------------------------end --}}



                @if($filter_product_status == 'yess')
                <!-- Product Home Tab -->
                <section class="product-home-tabs bg-second section-padding product_tab_section">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 offset-md-3 col-md-8 offset-md-2 col-12 wow fadeInUp"  data-wow-delay=".3s">
                            <div class="section-title m-btm-30 text-center">
                            <p class="small-title font-stylish m-btm-10 pr-color">{{ $page_data->filter_product_short_title ?? '' }}</p>
                            <h2 class="s-content-title">{{ $page_data->filter_product_title ?? '' }}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 wow fadeInUp"  data-wow-delay=".5s">
                            <!-- Tab Menu -->
                            <div class="latest-home-tabs">
                            <ul class="list-group product_menu" id="list-tab" role="tablist">
                                <li><a class="list-group-item active" data-bs-toggle="list" href="#f-tab1" role="tab">{{ __('All') }} </a></li>

                            </ul>
                            </div>
                            <!-- End Tab Menu -->
                        </div>
                        <div class="col-12">
                            <!-- Tab Details -->
                            <div class="latest-tab-details m-top-30">
                                <div class="tab-content" id="nav-tabContent">
                                    <!-- Property Tab One -->
                                    <div class="tab-pane fade show active tab1" id="f-tab1" role="tabpanel">
                                        <div class="row random_products_preload">




                                        </div>
                                        <div class="row random_products">




                                        </div>
                                    </div>

                                    <!-- Property Tab Two -->
                                    <div class="tab-pane fade tab2" id="f-tab2" role="tabpanel">
                                        <div class="row filtered_product_tab">

                                        </div>
                                    </div>


                                </div>
                            </div>
                            <!-- End Tab Details -->
                        </div>
                    </div>
                </div>
                </section>
                <!-- End Product Home Tab -->
                @endif










                {{--
                <!-- Products Area -->
                @if($latest_product_status == 'yes')
                <section class="products-area bg-second section-padding latest_product_section">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-8 col-12">
                            <div class="section-title m-btm-30">
                            <p class="small-title font-stylish m-btm-10 pr-color">{{ $page_data->latest_product_short_title ?? '' }}</p>
                            <h2 class="s-content-title">{{ $page_data->latest_product_title ?? '' }}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="product-area-main">
                            <div class="single-product-top product-latest-slider latest_products_preloader">
                            </div>
                            <div class="single-product-top product-latest-slider latest_products">
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                </section>
                @endif --}}



                <div class="col-12 section section-category-products latest_product_section">
                    <div class="section-header">
                        <h3 class="title">{{ $page_data->latest_product_title ?? 'title' }}</h3>
                        <p class="small-title">{{ $page_data->latest_product_short_title ?? 'short' }}</p>
                    </div>
                        {{-- TODO RTL & LTR --}}
                    <div class="row-custom category-slider-container">
                        <div class="row row-product" id="slider_special_offers">
                            {{-- <div class="col-6 col-sm-4 col-md-3 col-mds-5 col-product latest_products_preloader">
                            </div> --}}
                            <div class="latest_products">
                            </div>
                        </div>

                        <div id="index-products-slider-nav" class="index-products-slider-nav">
                            <button class="prev prev-owl"><i class="icon-arrow-left"></i></button>
                            <button class="next next-owl"><i class="icon-arrow-right"></i></button>
                        </div>
                    </div>
                </div>





                {{-- @if($blog_area_status == 'yes')
                <section class="blog-area bg-second section-padding blog_section">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-12 wow fadeInDown"  data-wow-delay=".2s">
                            <div class="section-title text-center m-btm-50">
                            <p class="small-title font-stylish m-btm-10 pr-color">{{ $page_data->blog_area_short_title ?? '' }}</p>
                            <h2 class="s-content-title">{{ $page_data->blog_area_title ?? '' }}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row latest_blogs">
                    </div>
                </div>
                </section>

                @endif --}}
                <!-- End Blog Area -->


                 {{-- <div class="col-12 section section-blog m-0">
                    <h3 class="title"><a href="<?= generateUrl('blog'); ?>"><?= trans("latest_blog_posts"); ?></a></h3>
                    <p class="title-exp"><?= trans("latest_blog_posts_exp"); ?></p>
                    <div class="row-custom">
                        <div class="blog-slider-container">
                            <div id="blog-slider" class="blog-slider">
                                < ?php foreach ($blogSliderPosts as $item):
                                    echo view('blog/_blog_item', ['item' => $item]);
                                endforeach; ?>
                            </div>
                            <div id="blog-slider-nav" class="blog-slider-nav">
                                <button class="prev"><i class="icon-arrow-left"></i></button>
                                <button class="next"><i class="icon-arrow-right"></i></button>
                            </div>
                        </div>
                    </div>
                </div> --}}


                <!-- Blog Area -->
                @if($blog_area_status == 'yes')
                    <div class="col-12 section section-blog m-0 blog_section">
                        <h3 class="title">
                            <a href="{{ url('/blog') }}">{{ $page_data->blog_area_title ?? __('Blog List') }}</a>
                        </h3>
                        <p class="title-exp">{{ $page_data->blog_area_short_title ?? __('Navigate Our Blog Lists') }}</p>
                        <div class="row-custom">
                            <div class="blog-slider-container">
                                <div class="row">
                                    <div class="blog-slider latest_blogs">

                                    </div>
                                </div>

                                <div id="blog-slider-nav" class="blog-slider-nav">
                                    <button class="prev-owl prev"><i class="icon-arrow-left"></i></button>
                                    <button class="next-owl next"><i class="icon-arrow-right"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                <!-- End Blog Area -->
            </div>
        </div>
    </div>
    <!-- Wrapper End  -->









    {{-- @if($header_short_banner == 'yes')
    <!-- Features -->
    <section class="content-preloader">
    <div class="container">
        <div class="row mt-3">
            <div class="col-lg-3 col-md-6 col-6  content-preloader" >
            <div class="content-placeholder"   data-height="250px" data-width="100%">
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-6  content-preloader" >
            <div class="content-placeholder"   data-height="250px" data-width="100%">
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-6  content-preloader" >
            <div class="content-placeholder"   data-height="250px" data-width="100%">
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-6  content-preloader" >
            <div class="content-placeholder"   data-height="250px" data-width="100%">
            </div>
        </div>
    </div>
    </div>
    </section>

    <section class="features short_banner_section">
    <div class="container">
        <div class="row short_banner">

        </div>
    </div>
    </section>
    <!-- End Features -->
    @endif --}}













    <!-- Products Area -->

    {{-- @if($latest_product_status == 'yess')
        <section class="products-area bg-second section-padding latest_product_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-12">
                    <div class="section-title m-btm-30">
                    <p class="small-title font-stylish m-btm-10 pr-color">{{ $page_data->latest_product_short_title ?? '' }}</p>
                    <h2 class="s-content-title">{{ $page_data->latest_product_title ?? '' }}</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="product-area-main">
                    <div class="single-product-top product-latest-slider latest_products_preloader">
                    </div>
                    <div class="single-product-top product-latest-slider latest_products">
                    </div>
                    </div>
                </div>
            </div>
        </div>
        </section>
    @endif --}}

    {{-- @if($featured_category_status == 'yess')
        <!-- Category Area Start -->
        <section class="featured_category category_section">
        <div class="category-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                    <div class="category-header">
                        <h2>{{ $page_data->featured_category_title ?? '' }}</h2>
                    </div>
                    </div>
                </div>
                <div class="row department-slider">


                </div>
            </div>
        </div>
        </section>
        <!-- Category Area end -->
    @endif --}}

    {{-- @if($filter_product_status == 'yess')
        <!-- Product Home Tab -->
        <section class="product-home-tabs bg-second section-padding product_tab_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-md-3 col-md-8 offset-md-2 col-12 wow fadeInUp"  data-wow-delay=".3s">
                    <div class="section-title m-btm-30 text-center">
                    <p class="small-title font-stylish m-btm-10 pr-color">{{ $page_data->filter_product_short_title ?? '' }}</p>
                    <h2 class="s-content-title">{{ $page_data->filter_product_title ?? '' }}</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 wow fadeInUp"  data-wow-delay=".5s">
                    <!-- Tab Menu -->
                    <div class="latest-home-tabs">
                    <ul class="list-group product_menu" id="list-tab" role="tablist">
                        <li><a class="list-group-item active" data-bs-toggle="list" href="#f-tab1" role="tab">{{ __('All') }} </a></li>

                    </ul>
                    </div>
                    <!-- End Tab Menu -->
                </div>
                <div class="col-12">
                    <!-- Tab Details -->
                    <div class="latest-tab-details m-top-30">
                    <div class="tab-content" id="nav-tabContent">
                        <!-- Property Tab One -->
                        <div class="tab-pane fade show active tab1" id="f-tab1" role="tabpanel">
                            <div class="row random_products_preload">




                            </div>
                            <div class="row random_products">




                            </div>
                        </div>

                        <!-- Property Tab Two -->
                        <div class="tab-pane fade tab2" id="f-tab2" role="tabpanel">
                            <div class="row filtered_product_tab">

                            </div>
                        </div>


                    </div>
                    </div>
                    <!-- End Tab Details -->
                </div>
            </div>
        </div>
        </section>
        <!-- End Product Home Tab -->
        <!-- Products Area -->
        <div class="featured_products_area">

        </div>
    @endif --}}
    <!-- End Products Area -->
    <!-- Products Area -->
    @if($top_rated_product_status == 'yess')
        <section class="products-area bg-second section-padding toprated_products_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-12">
                    <div class="section-title m-btm-30">
                    <p class="small-title font-stylish m-btm-10 pr-color">{{ $page_data->top_rated_product_short_title ?? '' }}</p>
                    <h2 class="s-content-title">{{ $page_data->top_rated_product_title ?? '' }}</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="product-area-main">
                    <div class="single-product-top product-latest-slider toprated_products_preload">



                    </div>
                    <div class="single-product-top product-latest-slider toprated_products">



                    </div>
                    </div>
                </div>
            </div>
        </div>
        </section>
    @endif
    <!-- End Products Area -->
    <!-- Call to action -->
    {{-- @if($promotion_area_status == 'yess')
        <div class="cta-main section-padding">
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="col-lg-5 col-md-5 col-12 wow fadeInLeft"  data-wow-delay=".2s">
                    <div class="food-ct-img">
                    <img class="lazy" src="{{ asset('uploads/preload.webp') }}" data-src="{{ asset($page_data->promotion_banner ?? '') }}" alt="">
                    <a href="{{ $page_data->promotion_video_link ?? '' }}" class="video-btn video video-popup mfp-fade"><i class="icofont-ui-play"></i></a>
                    </div>
                </div>
                <div class="col-lg-7 col-md-7 col-12 wow fadeInRight"  data-wow-delay=".4s">
                    <div class="cta-content">
                    <span>{{ $page_data->promotion_short_title ?? '' }}</span>
                    <h2>{{ $page_data->promotion_title ?? '' }}</h2>
                    <p>{{ $page_data->promotion_description ?? '' }}</p>
                    <div class="food-dt-button">
                        <a href="{{ $page_data->promotion_link ?? '' }}" class="theme-btn primary">{{ $page_data->promotion_button_title ?? '' }}</a>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    @endif --}}
    <!-- End Call to action -->
    <!-- Blog Area -->
                                {{-- DONE   ABOVE --}}

    {{-- @if($blog_area_status == 'yes')
    <section class="blog-area bg-second section-padding blog_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-12 wow fadeInDown"  data-wow-delay=".2s">
                <div class="section-title text-center m-btm-50">
                <p class="small-title font-stylish m-btm-10 pr-color">{{ $page_data->blog_area_short_title ?? '' }}</p>
                <h2 class="s-content-title">{{ $page_data->blog_area_title ?? '' }}</h2>
                </div>
            </div>
        </div>
        <div class="row latest_blogs">
        </div>
    </div>
    </section>

    @endif --}}
    <!-- End Blog Area -->



    {{-- @if($brand_area_status == 'yes')
    <!-- Partner Area -->
    <div class="partner-area gr-overlay section-padding brand_section" style="background-image:url({{ asset($page_data->brand_area_background ?? '')  }})">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-12">
                <div class="section-title s-white-title text-center m-btm-50">
                <p class="small-title font-stylish m-btm-10 pr-color">{{ $page_data->brand_area_short_title ?? '' }}</p>
                <h2 class="s-content-title">{{ $page_data->brand_area_title ?? '' }}</h2>
                </div>
            </div>
            <div class="col-lg-8 col-12">
                <div class="partner-slider">
                </div>
            </div>
        </div>
    </div>
    </div>
    @endif --}}
    <!-- End Partner Area -->

    <!-- Partners start -->
    @if($brand_area_status == 'yes')
        <section class="py-4 bg-light brand_section">
                <div class="container">
                    <div class="row justify-content-center partner-slider">

                    </div>
                </div>
        </section>
    @endif
    <!-- Partners End -->

    <!-- Modal -->
    @include('theme.elham.components.quickview')
    <!-- Modal end -->
    <input type="hidden" id="blog_read_more" value="{{ __('Learn More') }}">

@endsection

@php
$randomNumber = rand();
@endphp

@push('js')
    <script src="{{ asset('admin/js/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('admin/js/form.js') }}"></script>
    <script src="{{ asset('theme/jquery.unveil.js') }}"></script>
    <script src="{{ asset('theme/elham/js/home.js') }}?v={{ $randomNumber }}"></script>
@endpush
