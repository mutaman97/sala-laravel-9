@extends('theme.modesy.layouts.app')
@section('content')

{{-- <style>

/*======================================
    Hero Area CSS
========================================*/
.hero-area {
	padding: 30px 0 80px;
}
.hero-area .hero-slider-head {
  position: relative;
}
.hero-slider {
  margin: 0;
}
.hero-slider-head .tns-controls {
	position: absolute;
	z-index: 9;
	display: block;
	right: 15px;
	bottom: 15px;
}
.hero-slider-head .tns-controls button {
	height: 42px;
	width: 42px;
	color: var(--black);
	line-height: 40px;
	background-color: var(--secondary);
	font-size: 20px;
	border-radius: 0;
	-webkit-transition: all 0.4s ease;
	-moz-transition: all 0.4s ease;
	transition: all 0.4s ease;
	border-radius: 100%;
	border: 0px solid #fff;
	position: relative;
	display: inline-block;
	margin-right: 8px;
	border: 2px solid #fff;
	box-shadow: 0px 0px 10px #0000003b;
}
.hero-slider-head .tns-controls button:last-child{
	margin:0;
	padding:0;
}
.hero-slider-head .tns-controls button:hover {
  color: var(--white);
  background-color: var(--black);
}
.hero-area .big-content {
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  height: 511px;
  margin-top: 30px;
  position: relative;
}
.hero-area .big-content .inner {
	position: absolute;
	left: 20px;
	top: 50%;
	transform: translateY(-50%);
	max-width: 65%;
	background: #fffffffa;
	padding: 30px;
	border-radius: 20px;
}
.hero-area .big-content .title {
	font-size: 46px;
	margin-bottom: 20px;
	font-weight: 700;
	text-transform: capitalize;
	line-height: 60px;
}
.hero-area .big-content .title span {
  color: var(--primary);
  display: inline-block;
}
.hero-area .big-content .des {
	font-size:16px;
}
.hero-area .big-content .button {
  margin-top: 40px;
  display: block;
}
.hero-area .big-content .button .btn {
	padding: 17px 34px;
	font-size: 15px;
	border-radius: 3px;
}
.hero-area .small-content {
  min-height: 240px;
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  margin-top: 30px;
  position: relative;
}
.hero-area .small-content .inner {
  padding: 30px;
  text-align: right;
  position: absolute;
  right: 0;
  top: 50%;
  transform: translateY(-50%);
}
.hero-area .small-content .title {
	font-size: 24px;
	margin-bottom: 20px;
	font-weight: 600;
	text-transform: capitalize;
}
.hero-area .small-content .title span {
  color: var(--primary);
}
.hero-area .small-content.dark .title {
  color: var(--white);
}
.hero-area .small-content.dark .title span {
  color: var(--white);
}
.hero-area .small-content .des {
}
.hero-area .small-content .button {
  margin-top: 10px;
  display: block;
}
.hero-area .small-content .button .btn {
  background: transparent;
  padding: 8px 20px;
  color: #333;
  border: 2px solid #333;
  font-size: 13px;
}
.hero-area .small-content .button .btn:hover {
	color: #fff;
	border-color: var(--primary);
}
.hero-area .small-content.dark .button .btn {
  background-color: var(--primary);
  color: var(--white);
  border: none;
  padding: 10px 20px;
}
.hero-area .small-content.dark .button .btn::before {
  background-color: var(--white);
}
.hero-area .small-content.dark .button .btn:hover {
  color: var(--black);
}

/*======================================
    End Hero Area CSS
========================================*/
   </style> --}}

<div class="section-slider">
   <div class="index-main-slider container container-boxed-slider container-fluid">
      <div class="row">
         <div class="slider-container" dir="rtl">
               <div id="man-slider" class="main-slider">
                  <div class="item lazyload" data-bg="/">
                        <a href="/link-item">
                           <div class="container">
                              <div class="row row-slider-caption align-items-center">
                                    <div class="col-12">
                                       <div class="caption">
                                                <h2 class="title" data-animation="animation_title" data-delay="0.1s" style="color: green">item->title</h2>
                                                <p class="description" data-animation="animation_description" data-delay="0.5s" style="color: red">item->description</p>
                                                <button class="btn btn-slider" data-animation="animation_button" data-delay="0.9s" style="background-color: blue;border-color: black;color: red">button_text</button>
                                       </div>
                                    </div>
                              </div>
                           </div>
                        </a>
                  </div>
               </div>
               <div id="main-slider-nav" class="main-slider-nav">
                  <button class="prev"><i class="icon-arrow-left"></i></button>
                  <button class="next"><i class="icon-arrow-right"></i></button>
               </div>
         </div>
      </div>
   </div>
   <div class="container-fluid index-mobile-slider">
      <div class="row">
         <div class="slider-container" dir="rtl">
               <div id="main-mobile-slider" class="main-slider">
                  <div class="hero-slider">




                  </div>
{{--
                  <div class="item lazyload" data-bg="/">
                     <a href="item-link">
                        <div class="container">
                              <div class="row row-slider-caption align-items-center">
                                 <div class="col-12">
                                    <div class="caption">
                                       <h2 class="title" data-animation="animation_title" data-delay="0.1s" style="color: blue">item->title</h2>
                                       <p class="description" data-animation="animation_description" data-delay="0.5s" style="color: black">item->description</p>
                                       <button class="btn btn-slider" data-animation="item->animation_button" data-delay="0.9s" style="background-color: blue;border-color: black;color: red">button_text</button>
                                    </div>
                                 </div>
                              </div>
                        </div>
                     </a>
                  </div> --}}

               </div>
               <div id="main-mobile-slider-nav" class="main-slider-nav">
                  <button class="prev"><i class="icon-arrow-left"></i></button>
                  <button class="next"><i class="icon-arrow-right"></i></button>
               </div>
         </div>
      </div>
   </div>
</div>




<!-- Start Hero Area -->
      {{-- <section class="hero-area">
         <div class="container">
            <div class="row">
               <div class="col-lg-8 col-12">
                  <div class="hero-slider-head">
                     <div class="hero-slider">




                     </div>
                  </div>
               </div>
               <div class="col-lg-4 col-12">
                  <div class="row short_banner">


                  </div>
               </div>
            </div>
         </div>
      </section> --}}
      <!--/ End Hero Area -->


<!-- Wrapper -->
<div id="wrapper" class="index-wrapper">
    <div class="container">
        <div class="row">
            {{-- <h1 class="index-title">< ?php echo html_escape($this->settings->site_title); ?></h1>
            < ?php if (item_count($featured_categories) > 0 && $this->general_settings->featured_categories == 1): ?>
                <div class="col-12 section section-categories">
                    <!-- featured categories -->
                    < ?php $this->load->view("partials/_featured_categories"); ?>
                </div>
            < ?php endif; ?>
            < ?php $this->load->view("product/_index_banners", ['banner_location' => 'featured_categories']); ? >

             <div class="col-12">
                <div class="row-custom row-bn">
                    <!--Include banner-->
                    < ?php $this->load->view("partials/_ad_spaces", ["ad_space" => "index_1", "class" => ""]); ? >
                </div>
            </div>  --}}






{{--
 < ?php if (!empty($special_offers)):
    if (item_count($special_offers) > 4): ? > --}}

   @if($page_data->featured_products_status ?? 'yes' == 'yes')
        <div class="col-12 section section-category-products">
            <div class="section-header">
                <h3 class="title">{{ $page_data->featured_products_title ?? 'Top Product' }}</h3>
            </div>
            <div class="row-custom category-slider-container" dir="rtl">
                <div class="row row-product" id="slider_special_offers">
                    {{-- < ?php foreach ($special_offers as $product): ?>
                        <div class="col-6 col-sm-4 col-md-3 col-mds-5 col-product">
                            < ?php $this->load->view('product/_product_item', ['product' => $product, 'promoted_badge' => false, 'is_slider' => 1, 'discount_label' => 1]); ?>
                        </div>
                    < ?php endforeach; ?> --}}
               <div class="popular-food-slider">



               </div>
                </div>
                <div id="slider_special_offers_nav" class="index-products-slider-nav">
                    <button class="prev"><i class="icon-arrow-left"></i></button>
                    <button class="next"><i class="icon-arrow-right"></i></button>
                </div>
            </div>
        </div>
   @endif

    <!-- < ?php else: ?> -->
        <div class="col-12 section section-category-products">
            <div class="section-header">
                <h3 class="title">{{ __('Special Offers') }}</h3>
            </div>
            <div class="row row-product">
                <!-- < ?php foreach ($special_offers as $product): ?>
                    <div class="col-6 col-sm-4 col-md-3 col-mds-5 col-product">
                        < ?php $this->load->view('product/_product_item', ['product' => $product, 'promoted_badge' => false, 'is_slider' => 0, 'discount_label' => 1]); ?>
                    </div>
                < ?php endforeach; ?> -->
            </div>
        </div>
    <!-- < ?php endif;
endif; ?> -->








            <!-- < ?php $this->load->view("product/_index_banners", ['banner_location' => 'special_offers']); ?> -->

            <!-- < ?php if ($this->general_settings->index_promoted_products == 1 && $this->general_settings->promoted_products == 1 && !empty($promoted_products)): ?> -->
                <div class="col-12 section section-promoted">
                    <!-- promoted products -->
                    <!-- < ?php $this->load->view("product/_featured_products"); ?> -->
                </div>
            <!-- < ?php endif; ?> -->
            <!-- < ?php $this->load->view("product/_index_banners", ['banner_location' => 'featured_products']); ?> -->

            <!-- < ?php if ($this->general_settings->index_latest_products == 1 && !empty($latest_products)): ?> -->
                <div class="col-12 section section-latest-products">
                    <h3 class="title">
                        <a href="/products">{{ __('New Arrivals')}}</a>
                    </h3>
                    <p class="title-exp">{{ __('Latest products exp')}}</p>
                    <div class="row row-product">
                        <!--print products-->
                        <!-- < ?php foreach ($latest_products as $product): ?>
                            <div class="col-6 col-sm-4 col-md-3 col-mds-5 col-product">
                                < ?php $this->load->view('product/_product_item', ['product' => $product, 'promoted_badge' => false, 'is_slider' => 0, 'discount_label' => 0]); ?>
                            </div>
                        < ?php endforeach; ?> -->
                    </div>
                </div>
            <!-- < ?php endif; ?>
            < ?php $this->load->view("product/_index_banners", ['banner_location' => 'new_arrivals']); ?>

            < ?php $this->load->view('product/_index_category_products', ['index_categories' => $index_categories]); ?> -->

            <!-- <div class="col-12">
                <div class="row-custom row-bn"> -->
                    <!--Include banner-->
                    <!-- < ?php $this->load->view("partials/_ad_spaces", ["ad_space" => "index_2", "class" => ""]); ?>
                </div>
            </div> -->
            <!-- < ?php if ($this->general_settings->index_blog_slider == 1 && !empty($blog_slider_posts)): ?> -->
                <div class="col-12 section section-blog m-0">
                    <h3 class="title">
                        <a href="/blog">{{ __('Latest blog posts')}}</a>
                    </h3>
                    <p class="title-exp">{{ __('Latest blog posts exp') }}</p>
                    <div class="row-custom">
                        <!-- main slider -->
                        <!-- < ?php $this->load->view("blog/_blog_slider", ['blog_slider_posts' => $blog_slider_posts]); ?> -->
                    </div>
                </div>
            <!-- < ?php endif; ?> -->
        </div>
    </div>
</div>






<!-- Start Hero Area -->
      <section class="hero-area">
         <div class="container">
            <div class="row">
               <div class="col-lg-8 col-12">
                  <div class="hero-slider-head">
                     <div class="main-slider">




                     </div>
                  </div>
               </div>
               <div class="col-lg-4 col-12">
                  <div class="row short_banner">


                  </div>
               </div>
            </div>
         </div>
      </section>
<!--/ End Hero Area -->

      <!--/ Start Popular Area -->
      @if($page_data->featured_products_status ?? 'yes' == 'yes')
      <section class="popular__food">
         <div class="container">
            <div class="row">
               <div class="col-lg-6 col-md-8 col-12">
                  <div class="section__title text-left">
                     <h2 class="main__title"><span></span>{{ $page_data->featured_products_title ?? 'Top Product' }}</h2>
                     <p class="section__text">
                        {{ $page_data->featured_products_description ?? '' }}
                     </p>
                     <div class="waves-block">
                        <div class="waves wave-1"></div>
                        <div class="waves wave-2"></div>
                        <div class="waves wave-3"></div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="p-slider-head">
               <div class="popular-food-slider">



               </div>
            </div>
         </div>
      </section>
      @endif
      <!--/ End Popular Area -->

      <!-- Start Food Tab Area -->
      <section class="food-tab-main section">
         <div class="container">
            <div class="row">
               <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-12">
                  <div class="section__title text-center">
                     <span class="sub__title wow fadeInUp" data-wow-delay=".2s">{{ $page_data->products_area_short_title ?? 'For you' }}</span>
                     <h2 class="main__title wow fadeInUp" data-wow-delay=".4s"><span></span>{{ $page_data->products_area_title ?? 'Latest Foods' }}</h2>
                     <p class="section__text">{{ $page_data->products_area_description ?? '' }}</p>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-12">
                  <ul class="nav nav-tabs menutab" id="myTab" role="tablist">
                     <li class="nav-item" role="presentation">
                        <button class="nav-link active"  id="meat-tab" data-bs-toggle="tab" data-bs-target="#meat" type="button" role="tab" aria-controls="meat" aria-selected="true"> {{ __('All') }}</button>
                     </li>


                     <li class="nav-item content-preloader" role="presentation">
                        <button class="content-placeholder"  type="button" data-height="40px" data-width="100%"> </button>
                     </li>
                      <li class="nav-item content-preloader" role="presentation">
                        <button class="content-placeholder"  type="button" data-height="40px" data-width="100%"> </button>
                     </li>
                     <li class="nav-item content-preloader" role="presentation">
                        <button class="content-placeholder"  type="button" data-height="40px" data-width="100%"> </button>
                     </li>
                     <li class="nav-item content-preloader" role="presentation">
                        <button class="content-placeholder"  type="button" data-height="40px" data-width="100%"> </button>
                     </li>
                     <li class="nav-item content-preloader" role="presentation">
                        <button class="content-placeholder"  type="button" data-height="40px" data-width="100%"> </button>
                     </li>
                  </ul>
                  <div class="tab-content" id="myTabContent">
                     <div class="tab-pane fade show active" id="meat" role="tabpanel" aria-labelledby="meat-tab">
                        <div class="row latest_products">
                           <div class="col-lg-3 col-md-6 col-6 content-preloader">
                              <div class="single-popular-product  content-placeholder" data-height="200px" data-width="100%"  >
                              </div>
                           </div>
                           <div class="col-lg-3 col-md-6 col-6 content-preloader">
                              <div class="single-popular-product  content-placeholder" data-height="200px" data-width="100%"  >
                              </div>
                           </div>
                           <div class="col-lg-3 col-md-6 col-6 content-preloader">
                              <div class="single-popular-product  content-placeholder" data-height="200px" data-width="100%"  >
                              </div>
                           </div>
                           <div class="col-lg-3 col-md-6 col-6 content-preloader">
                              <div class="single-popular-product  content-placeholder" data-height="200px" data-width="100%"  >
                              </div>
                           </div>
                           <div class="col-lg-3 col-md-6 col-6 content-preloader">
                              <div class="single-popular-product  content-placeholder" data-height="200px" data-width="100%"  >
                              </div>
                           </div>
                           <div class="col-lg-3 col-md-6 col-6 content-preloader">
                              <div class="single-popular-product  content-placeholder" data-height="200px" data-width="100%"  >
                              </div>
                           </div>
                           <div class="col-lg-3 col-md-6 col-6 content-preloader">
                              <div class="single-popular-product  content-placeholder" data-height="200px" data-width="100%"  >
                              </div>
                           </div>
                           <div class="col-lg-3 col-md-6 col-6 content-preloader">
                              <div class="single-popular-product  content-placeholder" data-height="200px" data-width="100%"  >
                              </div>
                           </div>


                        </div>
                     </div>
                     <div class="tab-pane fade" id="filteredtab" role="tabpanel" aria-labelledby="filteredtab-tab" >
                         <div class="row filtered_product_tab">

                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- /End Food Tab Area -->

      <!-- Start Call To Action Area -->
      <section class="call-to-action section large_banner">

      </section>
      <!-- End Call To Action Area -->
      @if($page_data->discount_product_status ?? 'yes' == 'yes')
      <!-- Start Count Down Area -->
      <section class="count-down section">
         <div class="container">
            <div class="section__title align-left p-0">
               <div class="row align-items-center">
                  <div class="col-lg-5 col-md-5 col-12">
                     <div class="section__title text-left m-0">
                        <h2 class="main__title"><span></span>{{ $page_data->discount_product_title ?? '' }}</h2>
                        <p class="section__text">{{ $page_data->discount_product_description ?? '' }}
                        </p>
                        <div class="waves-block off-white">
                           <div class="waves wave-1"></div>
                           <div class="waves wave-2"></div>
                           <div class="waves wave-3"></div>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-7 col-md-7 col-12">

                  </div>
               </div>
               <div class="single-deal-main">
                  <div class="row getdiscountbleproducts">


                  </div>
               </div>
            </div>
         </div>
      </section>
      @endif


      {{-- <!-- /End Count Down Area -->
      @if($page_data->testimonial_status ?? 'yes' == 'yes')
      <!-- Start Testimonials Area -->
      <section class="testimonials section" style="background-image:url({{ $page_data->testimonial_background ?? '' }})">
         <div class="container">
            <div class="row">
               <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-12">
                  <div class="section__title section-white text-center">
                     <h2 class="main__title wow fadeInUp" data-wow-delay=".2s">{{ $page_data->testimonial_title ?? 'Happy Clients Say' }}</h2>
                     <p class="section__text wow fadeInUp" data-wow-delay=".4s">{{ $page_data->testimonial_description ?? 'There are many variations of passages of Lorem Ipsum available,but the majority have suffered alteration in some form.' }}</p>
                  </div>
               </div>
            </div>
            <div class="row testimonial-slider">


            </div>
         </div>
      </section>
      <!-- End Testimonial Area -->
      @endif
 --}}

      {{-- @if($page_data->menu_area_status ?? 'yes' == 'yes')
      <!-- Start Recommendations Area -->
      <section class="recommendations section">
         <div class="container">
            <div class="row">
               <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-12">
                  <div class="section__title text-center">

                     <h2 class="main__title wow fadeInUp" data-wow-delay=".4s">{{ $page_data->menu_area_title ?? 'Our special menu' }}</h2>
                     <p class="section__text wow fadeInUp" data-wow-delay=".6s">{{ $page_data->menu_area_description ?? 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.' }}</p>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-lg-10 offset-lg-1">
                  <div class="row">
                    <div class="col-lg-6 offset-lg-0 col-md-6 col-md-10 offset-md-1 col-12 day1">

                    </div>
                     <div class="col-lg-6 col-12">
                        <div class="row day2">



                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- End Recommendations Area -->
      @endif --}}


      {{-- @if($page_data->blog_area_status ?? 'yes' == 'yes')
      <!-- Start Blog Area  -->
      <section class="shop-blog section blog_section">
         <div class="container">
            <div class="row">
               <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-12">
                  <div class="section__title text-center">
                     <h5 class="sub__title wow fadeInUp" data-wow-delay=".2s">{{ $page_data->blog_area_short_title ?? 'Read articles' }}</h5>
                     <h2 class="main__title wow fadeInUp" data-wow-delay=".4s">{{ $page_data->blog_area_title ?? 'Recent News & Blogs' }}</h2>
                     <p class="section__text wow fadeInUp" data-wow-delay=".6s">{{ $page_data->blog_area_description ?? 'There are many variations of passages of Lorem Ipsum available,but the majority have suffered alteration in some form.' }}</p>
                  </div>
               </div>
            </div>
            <div class="row latest_blogs">
               <input type="hidden" class="blog_read_more" value="Continue Reading">

            </div>
         </div>
      </section>
      <!-- End Blog Area  -->
      @endif --}}






<!-- Wrapper -->
<div id="wrapper" class="index-wrapper">
   <div class="container">
      <div class="row">
         @if($page_data->blog_area_status ?? 'yes' == 'yes')
         <div class="col-12 section section-blog m-0">
            <h3 class="title">
               <a href="/blog">{{ $page_data->blog_area_title ?? 'Recent News & Blogs' }}</a>
            </h3>
            <p class="title-exp">{{ $page_data->blog_area_short_title ?? 'Read articles' }}</p>
            <div class="row-custom">
               <!-- main slider -->
               <div class="blog-slider-container">
                  <div id="blog-slider" class="row blog-slider latest_blogs">
                     {{-- <div class="blog-item">
                        <input type="hidden" class="blog_read_more" value="Continue Reading">

                     </div> --}}
                  </div>
                  <div id="blog-slider-nav" class="blog-slider-nav">
                     <button class="prev"><i class="icon-arrow-left"></i></button>
                     <button class="next"><i class="icon-arrow-right"></i></button>
                  </div>
               </div>
            </div>
         </div>
         @endif
      </div>
   </div>
</div>

{{--
         <div class="blog-slider-container">
            <div id="blog-slider" class="blog-slider">
               < ?php foreach ($blog_slider_posts as $item):
               <div class="blog-item">
                  <div class="blog-item-img">
                     <a href="/">
                           <img src="/" data-src="/image_small" alt="item->title" class="img-fluid lazyload"/>
                     </a>
                  </div>
                  <h3 class="blog-post-title">
                     <a href="/">
                           item->title
                     </a>
                  </h3>
                  <div class="blog-post-meta">
                     <a href="/">
                           <i class="icon-folder"></i>category_name
                     </a>
                     <span><i class="icon-clock"></i>32-44-1234</span>
                  </div>
                  <div class="blog-post-description">
                     item->summary
                  </div>
               </div>
               endforeach; ?>
            </div>
            <div id="blog-slider-nav" class="blog-slider-nav">
               <button class="prev"><i class="icon-arrow-left"></i></button>
               <button class="next"><i class="icon-arrow-right"></i></button>
            </div>
         </div> --}}

@endsection
@push('js')
<script src="{{ asset('admin/js/sweetalert2.all.min.js') }}"></script>
<script src="{{ asset('admin/js/form.js') }}"></script>
<script src="{{ asset('theme/jquery.unveil.js') }}"></script>
<script src="{{ asset('theme/modesy/restojs/home.js') }}"></script>
{{-- <script src="{{ asset('theme/modesy/restojs/home.js?v='.tenant('cache_version')) }}"></script> --}}
{{-- <script src="{{ asset('https://static.staticsave.com/modesy/home.js') }}"></script> --}}


@endpush
