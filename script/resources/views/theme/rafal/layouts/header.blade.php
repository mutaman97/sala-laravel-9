@php
$invoice_data=json_decode($autoload_data['invoice_data'] ?? '');
$languages=json_decode($autoload_data['languages']);
$default_language=$autoload_data['default_language'] ?? '';
$current_url=url()->current();
@endphp

 @if(url('/checkout') !=  $current_url &&  Request::is('customer/*') !=  $current_url)

      <!-- Cart Sidebar -->
      @php
      $cart_sidebar=$site_settings->cart_sidebar ?? 'yes';
      $bottom_bar=$site_settings->bottom_bar ?? 'yes';
      @endphp
      @if($cart_sidebar == 'yes')
      <div class="cart-sidebar">
         <div class="item-line">
            <div class="cart-line"><i class="icofont-cart-alt"></i></div>
            <div class="cart-line item-name"><span class="cart_count">{{ $cart_count }}</span><span>{{ __('Items') }}</span></div>
         </div>
         <div class="prrice-tag"><span class="cart_subtotal render_currency">{{ Cart::instance('default')->subtotal() }}</span></div>
      </div>
      <!-- End Cart Sidebar -->
      @endif
    @if($bottom_bar == 'yes') 
      <!-- Mobile Cart Show -->
      <div class="mobile-cart-show">
         <ul>
            <li>
               <div class="single-cart-show"><a href="{{ url('/') }}"><i class="icofont-home"></i><span>{{ __('Home') }}</span></a></div>
            </li>
            <li>
               <div class="single-cart-show"><a href="{{ url('/wishlist') }}"><i class="icofont-heart"></i><span>{{ __('Wishlist') }}</span></a></div>
            </li>
            <li>
               <div class="single-cart-show"><a href="{{ url('/cart') }}"><i class="icofont-cart"></i><span>{{ __('Cart') }}</span></a></div>
            </li>
            <li>
               <div class="single-cart-show"><a href="{{ url('/customer/dashboard') }}"><i class="icofont-ui-user"></i><span>{{ __('Account') }}</span></a></div>
            </li>
         </ul>
      </div>
      <!-- End Mobile Cart Show -->
    @endif
         
               
      <!-- Shopping Item -->
      <div class="shopping-item">
         <div class="dropdown-cart-header">
            <div class="close-button"><a href="#"><i class="icofont-close"></i></a></div>
            <span><span class="cart_count">{{ $cart_count }}</span> {{ __('Items') }}</span>
         </div>
         <div class="shopping-item-inner">
            <div class="cart-single-inner">
               <ul id="shopping" class="shopping-list">
                  
                  
               </ul>
            </div>
            <div class="cart-single-inner bottom">
               <div class="total">
                  <span>{{ __('Total') }}</span>
                  <span class="total-amount cart_subtotal">{{ Cart::instance('default')->subtotal() }}</span>
               </div>
               <a href="{{ url('/cart') }}" class="btn animate">{{ __('View Cart') }}</a>
               <a href="{{ url('/checkout') }}" class="btn primary animate">{{ __('Checkout') }}</a>
            </div>
         </div>
      </div>
      <!--/ End Shopping Item -->
      @endif
      <!-- Topbar Area -->
      <div class="topbar-area">
         <div class="container">
            <div class="row">
               <div class="col-lg-6 col-md-7 col-12">
                  <!-- Topbar Left -->
                  <div class="topbar-left">
                     <ul class="topbar-left-inner">
                        <li><i class="icofont-delivery-time"></i><span class="info"><a href="javascript:void(0)"><b>{{ __('Delivery') }}:</b>{{ $average_times->delivery_time ?? '' }}</a></span></li>
                        <li><i class="icofont-food-cart"></i><span class="info"><b>{{ __('Takeout') }}:</b>{{ $average_times->pickup_time ?? '' }}</span></li>
                     </ul>
                  </div>
               </div>
               <div class="col-lg-6 col-md-5 col-12">
                  <!-- Topbar Right -->
                  <div class="topbar-right">
                      <div class="topbar-language-section">
                        <li class="topbar-language">
                           <form class="change_lang_form" action="{{ url('/locale/lang') }}">
                              <select name="locale" class="trans_lang">
                                    @php
                                    $local=Session::get('locale');
                                    @endphp
                                 @foreach($languages ?? [] as $key => $row)
                                 <option value="{{ $row->code }}" @if($local == $row->code) selected @endif>{{ $row->name }}</option>
                                 @endforeach
                              </select>
                           </form>
                        </li>
                     </div>
                     <ul class="topbar-right-inner">
                        <!-- Topbar Language -->
                        @if(tenant('customer_modules') == 'on')
                        <li class="accounts-top-btn"><a href="{{ !Auth::check() ? '#' : url('/customer/dashboard') }}"><i class="icofont-user-male"></i><span>{{ !Auth::check() ? __('My Account') : Auth::user()->name }}</span></a>
                           @if(!Auth::check())
                           <!-- Topbar Accounts Form -->
                           <div class="accounts-signin-top-form">
                              <form action="{{ route('login') }}" method="post" class="accounts-signin-inner">
                                 @csrf
                                 <div class="row">
                                    <div class="col-12">
                                       <div class="form-group">

                                          <label><i class="icofont-ui-user"></i> {{ __('Email') }}</label>
                                          <input type="email" name="email"  required="required" placeholder="Enter Email">
                                          
                                       </div>
                                    </div>
                                    <div class="col-12">
                                       <div class="form-group">
                                          <label><i class="icofont-ssl-security"></i> {{ __('Password') }}</label>
                                          <input type="password" name="password" required="">
                                          <a href="{{ url('/password/reset') }}">{{ __('Forgot password?') }}</a>
                                       </div>
                                    </div>
                                    <div class="col-12">
                                       <div class="accounts-signin-btn">
                                          <button type="submit" class="theme-btn">{{ __('Sign in') }}</button>
                                       </div>   
                                    </div>   
                                    <div class="col-12">
                                       <div class="accounts-signin-bottom">
                                          <p>{{ __('Dont have any account?') }}</p>
                                          <a href="{{ url('customer/register') }}" class="theme-btn">Sign up</a>
                                       </div>
                                    </div>
                                 </div>   
                              </form>  
                           </div>
                           <!-- End Topbar Accounts Form -->
                           @endif
                        </li>
                        @endif
                     </ul>
                     
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- End Topbar Area -->
      
      <!-- Header Area -->
      <header class="header navbar-area">
         <div class="container">
            <div class="row align-items-center">
               <div class="col-12">
                  <div class="nav-inner">
                     <!-- navbar -->
                     <nav class="navbar navbar-expand-lg">
                        <a class="navbar-brand" href="{{ url('/') }}">
                           <img src="{{ asset('uploads/'.tenant('uid').'/logo.png?v='.tenant('cache_version')) }}" alt="">
                        </a>
                        <!-- Responsive Nav Button -->
                        <button class="navbar-toggler mobile-menu-btn" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" >
                           <span class="toggler-icon"></span>
                           <span class="toggler-icon"></span>
                           <span class="toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                           <ul id="nav" class="navbar-nav ms-auto">
                              {{ThemeMenu('header','theme.resto.components.menu')}}
                           </ul>
                        </div>
                     </nav>
                     <!-- End navbar -->
                     <div class="right-bar">
                        <ul class="cart-list-top">
                           <li class="single-bar"><a href="{{ url('/cart') }}" class="icon"><i class="icofont-cart-alt"></i><span class="count cart_count">{{ $cart_count }}</span></a></li>

                           <li class="single-bar"><a href="{{ url('/wishlist') }}" class="icon"><i class="icofont-heart-alt"></i><span class="count wishlist_count">{{ $wishlist_count }}</span></a></li>
                           
                        </ul>
                        <!--/ End Shopping Cart -->
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </header>
      <!-- End Header Area -->

      @php
$invoice_data=json_decode($autoload_data['invoice_data'] ?? '');
$languages=json_decode($autoload_data['languages']);
$default_language=$autoload_data['default_language'] ?? '';
$current_url=url()->current();
@endphp

 @if(url('/checkout') !=  $current_url &&  Request::is('customer/*') !=  $current_url)

<!-- Cart Sidebar -->
@php
$cart_sidebar=$site_settings->cart_sidebar ?? 'yes';
$bottom_bar=$site_settings->bottom_bar ?? 'yes';
@endphp
@if($cart_sidebar == 'yes')
      <div class="cart-sidebar">
         <div class="item-line">
            <div class="cart-line"><i class="icofont-cart-alt"></i></div>
            <div class="cart-line item-name"><span class="cart_count">{{ $cart_count }}</span><span>{{ __('Items') }}</span></div>
         </div>
         <div class="prrice-tag"><span class="cart_subtotal render_currency">{{ Cart::instance('default')->subtotal() }}</span></div>
      </div>
      <!-- End Cart Sidebar -->
      @endif
    @if($bottom_bar == 'yes') 
      <!-- Mobile Cart Show -->
      <div class="mobile-cart-show">
         <ul>
            <li>
               <div class="single-cart-show"><a href="{{ url('/') }}"><i class="icofont-home"></i><span>{{ __('Home') }}</span></a></div>
            </li>
            <li>
               <div class="single-cart-show"><a href="{{ url('/wishlist') }}"><i class="icofont-heart"></i><span>{{ __('Wishlist') }}</span></a></div>
            </li>
            <li>
               <div class="single-cart-show"><a href="{{ url('/cart') }}"><i class="icofont-cart"></i><span>{{ __('Cart') }}</span></a></div>
            </li>
            <li>
               <div class="single-cart-show"><a href="{{ url('/customer/dashboard') }}"><i class="icofont-ui-user"></i><span>{{ __('Account') }}</span></a></div>
            </li>
         </ul>
      </div>
      <!-- End Mobile Cart Show -->
    @endif
         
               
      <!-- Shopping Item -->
      <div class="shopping-item">
         <div class="dropdown-cart-header">
            <div class="close-button"><a href="#"><i class="icofont-close"></i></a></div>
            <span><span class="cart_count">{{ $cart_count }}</span> {{ __('Items') }}</span>
         </div>
         <div class="shopping-item-inner">
            <div class="cart-single-inner">
               <ul id="shopping" class="shopping-list">
                  
                  
               </ul>
            </div>
            <div class="cart-single-inner bottom">
               <div class="total">
                  <span>{{ __('Total') }}</span>
                  <span class="total-amount cart_subtotal">{{ Cart::instance('default')->subtotal() }}</span>
               </div>
               <a href="{{ url('/cart') }}" class="btn animate">{{ __('View Cart') }}</a>
               <a href="{{ url('/checkout') }}" class="btn primary animate">{{ __('Checkout') }}</a>
            </div>
         </div>
      </div>
      <!--/ End Shopping Item -->
      @endif
      <!-- Topbar Area -->
      <div class="topbar-area">
         <div class="container">
            <div class="row">
               <div class="col-lg-6 col-md-7 col-12">
                  <!-- Topbar Left -->
                  <div class="topbar-left">
                     <ul class="topbar-left-inner">
                        <li><i class="icofont-delivery-time"></i><span class="info"><a href="javascript:void(0)"><b>{{ __('Delivery') }}:</b>{{ $average_times->delivery_time ?? '' }}</a></span></li>
                        <li><i class="icofont-food-cart"></i><span class="info"><b>{{ __('Takeout') }}:</b>{{ $average_times->pickup_time ?? '' }}</span></li>
                     </ul>
                  </div>
               </div>
               <div class="col-lg-6 col-md-5 col-12">
                  <!-- Topbar Right -->
                  <div class="topbar-right">
                      <div class="topbar-language-section">
                        <li class="topbar-language">
                           <form class="change_lang_form" action="{{ url('/locale/lang') }}">
                              <select name="locale" class="trans_lang">
                                 @php
                                 $local=Session::get('locale');
                                 @endphp
                              @foreach($languages ?? [] as $key => $row)
                              <option value="{{ $row->code }}" @if($local == $row->code) selected @endif>{{ $row->name }}</option>
                              @endforeach
                           </select>
                          </form>
                        </li>
                      </div>
                     <ul class="topbar-right-inner">
                        <!-- Topbar Language -->
                        @if(tenant('customer_modules') == 'on')
                        <li class="accounts-top-btn"><a href="{{ !Auth::check() ? '#' : url('/customer/dashboard') }}"><i class="icofont-user-male"></i><span>{{ !Auth::check() ? __('My Account') : Auth::user()->name }}</span></a>
                           @if(!Auth::check())
                           <!-- Topbar Accounts Form -->
                           <div class="accounts-signin-top-form">
                              <form action="{{ route('login') }}" method="post" class="accounts-signin-inner">
                                 @csrf
                                 <div class="row">
                                    <div class="col-12">
                                       <div class="form-group">

                                          <label><i class="icofont-ui-user"></i> {{ __('Email') }}</label>
                                          <input type="email" name="email"  required="required" placeholder="Enter Email">
                                          
                                       </div>
                                    </div>
                                    <div class="col-12">
                                       <div class="form-group">
                                          <label><i class="icofont-ssl-security"></i> {{ __('Password') }}</label>
                                          <input type="password" name="password" required="">
                                          <a href="{{ url('/password/reset') }}">{{ __('Forgot password?') }}</a>
                                       </div>
                                    </div>
                                    <div class="col-12">
                                       <div class="accounts-signin-btn">
                                          <button type="submit" class="theme-btn">{{ __('Sign in') }}</button>
                                       </div>   
                                    </div>   
                                    <div class="col-12">
                                       <div class="accounts-signin-bottom">
                                          <p>{{ __('Dont have any account?') }}</p>
                                          <a href="{{ url('customer/register') }}" class="theme-btn">Sign up</a>
                                       </div>
                                    </div>
                                 </div>   
                              </form>  
                           </div>
                           <!-- End Topbar Accounts Form -->
                           @endif
                        </li>
                        @endif
                     </ul>
                     
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- End Topbar Area -->
      
      <!-- Header Area -->
      <header class="header navbar-area">
         <div class="container">
            <div class="row align-items-center">
               <div class="col-12">
                  <div class="nav-inner">
                     <!-- navbar -->
                     <nav class="navbar navbar-expand-lg">
                        <a class="navbar-brand" href="{{ url('/') }}">
                           <img src="{{ asset('uploads/'.tenant('uid').'/logo.png?v='.tenant('cache_version')) }}" alt="">
                        </a>
                        <!-- Responsive Nav Button -->
                        <button class="navbar-toggler mobile-menu-btn" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" >
                           <span class="toggler-icon"></span>
                           <span class="toggler-icon"></span>
                           <span class="toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                           <ul id="nav" class="navbar-nav ms-auto">
                              {{ThemeMenu('header','theme.resto.components.menu')}}
                           </ul>
                        </div>
                     </nav>
                     <!-- End navbar -->
                     <div class="right-bar">
                        <ul class="cart-list-top">
                           <li class="single-bar"><a href="{{ url('/cart') }}" class="icon"><i class="icofont-cart-alt"></i><span class="count cart_count">{{ $cart_count }}</span></a></li>

                           <li class="single-bar"><a href="{{ url('/wishlist') }}" class="icon"><i class="icofont-heart-alt"></i><span class="count wishlist_count">{{ $wishlist_count }}</span></a></li>
                           
                        </ul>
                        <!--/ End Shopping Cart -->
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </header>
      <!-- End Header Area -->

      

























<!--header-->
<header class="hdr-wrap">
	<div class="hdr-content hdr-content-sticky">
		<div class="container">
			<div class="row">
				<div class="col-auto show-mobile">
					<!-- Menu Toggle -->
               <div class="menu-toggle"> <a href="#" class="mobilemenu-toggle"><i class="icon-menu"></i></a> </div>
               <!-- /Menu Toggle -->
				</div>
				<div class="col-auto hdr-logo">
					<a href="index.html" class="logo"><img srcset="images/skins/fashion/logo.png 1x, images/skins/fashion/logo2x.png 2x" alt="Logo"></a>
				</div>
				<!--navigation-->
				<div class="hdr-nav hide-mobile nav-holder-s"></div>
				<!--//navigation-->
				<div class="hdr-links-wrap col-auto ml-auto">
					<div class="hdr-inline-link">
						<!-- Header Search -->
                  <div class="search_container_desktop">
                     <div class="dropdn dropdn_search dropdn_fullwidth">
                        <a href="#" class="dropdn-link  js-dropdn-link only-icon"><i class="icon-search"></i><span class="dropdn-link-txt">Search</span></a>
                        <div class="dropdn-content">
                           <div class="container">
                              <form method="get" action="#" class="search search-off-popular">
                                 <input name="search" type="text" class="search-input input-empty" placeholder="What are you looking for?">
                                 <button type="submit" class="search-button"><i class="icon-search"></i></button>
                                 <a href="#" class="search-close js-dropdn-close"><i class="icon-close-thin"></i></a>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- /Header Search -->
						<!-- Header Wishlist -->
                  <div class="dropdn dropdn_wishlist">
                     <a href="account-wishlist.html" class="dropdn-link only-icon wishlist-link ">
                        <i class="icon-heart"></i><span class="dropdn-link-txt">Wishlist</span><span class="wishlist-qty">3</span>
                     </a>
                  </div>
                  <!-- /Header Wishlist -->
						<!-- Header Account -->
                  <div class="dropdn dropdn_account dropdn_fullheight">
                     <a href="#" class="dropdn-link js-dropdn-link js-dropdn-link only-icon" data-panel="#dropdnAccount"><i class="icon-user"></i><span class="dropdn-link-txt">Account</span></a>
                  </div>
                  <!-- /Header Account -->
						<div class="dropdn dropdn_fullheight minicart">
                     <a href="#" class="dropdn-link js-dropdn-link minicart-link only-icon" data-panel="#dropdnMinicart">
                        <i class="icon-basket"></i>
                        <span class="minicart-qty">{{ $cart_count }}</span>
                        <span class="minicart-total hide-mobile">{{ Cart::instance('default')->subtotal() }}</span>
                     </a>
                  </div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="hdr">
		<div class="hdr-topline hdr-topline--dark js-hdr-top">
			<div class="container">
				<div class="row flex-nowrap">
					<div class="col hdr-topline-left hide-mobile">
                  <!-- Header Social -->
						<div class="hdr-line-separate">
							<ul class="social-list list-unstyled">
								<li>
									<a href="#"><i class="icon-facebook"></i></a>
								</li>
								<li>
									<a href="#"><i class="icon-twitter"></i></a>
								</li>
								<li>
									<a href="#"><i class="icon-google"></i></a>
								</li>
								<li>
									<a href="#"><i class="icon-instagram"></i></a>
								</li>
								<li>
									<a href="#"><i class="icon-vimeo"></i></a>
								</li>
								<li>
									<a href="#"><i class="icon-linkedin"></i></a>
								</li>
							</ul>
						</div>
						<!-- /Header Social -->
               </div>
               <div class="col hdr-topline-center">
                  <div class="custom-text js-custom-text-carousel" data-slick='{"speed": 1000, "autoplaySpeed": 3000}'>
                     <div class="custom-text-item"><i class="icon-fox"></i> Use promocode <span>FOXIC</span> to get 15% discount!</div>
                     <div class="custom-text-item"><i class="icon-air-freight"></i> <span>Free</span> plane shipping over <span>$250</span></div>
                     <div class="custom-text-item"><i class="icon-gift"></i> Today only! Post <span>holiday</span> Flash Sale! 2 for $20</div>

                     <div class="custom-text-item"><i class="icon-gift"></i> <span>{{ __('Takeout') }}</span> Whithin <span>{{ $average_times->pickup_time ?? '' }}</span></div>
                     <div class="custom-text-item"><i class="icon-air-freight"></i> <span>{{ __('Delivery') }}</span> Time <span>{{ $average_times->delivery_time ?? '' }}</span></div>
                  </div>
               </div>
            <div class="col hdr-topline-right hide-mobile">
               <div class="hdr-inline-link">
                  <!-- Header Language -->
                  <div class="dropdn_language">
                     <div class="dropdn dropdn_language dropdn_language--noimg dropdn_caret">
                        <a href="#" class="dropdn-link js-dropdn-link"><span class="js-dropdn-select-current">English</span><i class="icon-angle-down"></i></a>
                        <div class="dropdn-content">
                           <ul>
                              <li class="active"><a href="#"><img src="images/flags/en.png" alt="">English</a></li>
                              <li><a href="#"><img src="images/flags/sp.png" alt="">Spanish</a></li>
                              <li><a href="#"><img src="images/flags/de.png" alt="">German</a></li>
                              <li><a href="#"><img src="images/flags/fr.png" alt="">French</a></li>
                           </ul>
                        </div>
                     </div>

                  </div>
                  <!-- /Header Language -->

                  <!-- Header Currency -->
                  <div class="dropdn_currency">
                     <div class="dropdn dropdn_caret">
                        <a href="#" class="dropdn-link js-dropdn-link">US dollars<i class="icon-angle-down"></i></a>
                        <div class="dropdn-content">
                           <ul>
                              <li class="active"><a href="#"><span>US dollars</span></a></li>
                              <li><a href="#"><span>Euro</span></a></li>
                              <li><a href="#"><span>UK pounds</span></a></li>

                           </ul>
                        </div>
                     </div>
                  </div>
                  <!-- /Header Currency -->
                  <div class="hdr_container_desktop">
                     <!-- Header Account -->
                     <div class="dropdn dropdn_account dropdn_fullheight">
                        <a href="#" class="dropdn-link js-dropdn-link" data-panel="#dropdnAccount"><i class="icon-user"></i><span class="dropdn-link-txt">Account</span></a>
                     </div>
                     <!-- /Header Account -->
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="hdr-content">
      <div class="container">
         <div class="row">
            <div class="col-auto show-mobile">
               <!-- Menu Toggle -->
               <div class="menu-toggle"> <a href="#" class="mobilemenu-toggle"><i class="icon-menu"></i></a> </div>
               <!-- /Menu Toggle -->
            </div>
            <div class="col-auto hdr-logo">
               <a href="index.html" class="logo"><img srcset="images/skins/fashion/logo.png 1x, images/skins/fashion/logo2x.png 2x" alt="Logo"></a>
            </div>
            <!--navigation-->
            <div class="hdr-nav hide-mobile nav-holder justify-content-center px-4">
               <!--mmenu-->
               <ul class="mmenu mmenu-js">
                  <li class="mmenu-item--simple"><a href="#" class="active">Home</a>
                     <div class="mmenu-submenu d-flex">
                        <ul class="submenu-list mt-0">
                           <li><a href="index.html">Fashion (Default) Skin</a><span class="submenu-link-image"><img src="images/screen/screen01.png" alt=""></span></li>
                           <li><a href="index-sport.html">Sport Skin</a><span class="submenu-link-image"><img src="images/screen/screen-sport.png" alt=""></span></li>
                           <li><a href="index-books.html">Books Skin <span class="menu-label  menu-label--color3">NEW</span></a><span class="submenu-link-image"><img src="images/screen/screen-books.png" alt=""></span></li>
                           <li><a href="index-electronics.html">Electronics Skin <span class="menu-label  menu-label--color3">NEW</span></a><span class="submenu-link-image"><img src="images/screen/screen-electronics.png" alt=""></span></li>
                           <li><a href="index-viping.html">Vaping Skin <span class="menu-label  menu-label--color3">NEW</span></a><span class="submenu-link-image"><img src="images/screen/screen-vaping.png" alt=""></span></li>
                           <li><a href="index-pets.html">Pets Skin</a><span class="submenu-link-image"><img src="images/screen/screen-pets.png" alt=""></span></li>
                           <li><a href="index-lingeries.html">Lingeries Skin</a><span class="submenu-link-image"><img src="images/screen/screen-lingeries.png" alt=""></span></li>
                           <li><a href="index-games.html">Games Skin</a><span class="submenu-link-image"><img src="images/screen/screen-games.png" alt=""></span></li>
                           <li><a href="index-helloween.html">Halloween Skin</a><span class="submenu-link-image"><img src="images/screen/screen-halloween.png" alt=""></span></li>
                           <li><a href="index-medical.html">Medical Skin</a><span class="submenu-link-image"><img src="images/screen/screen-medical.png" alt=""></span></li>
                           <li><a href="index-food.html">Food Market Skin</a><span class="submenu-link-image"><img src="images/screen/screen-food.png" alt=""></span></li>
                           <li><a href="index-cosmetics.html">Cosmetics Skin</a><span class="submenu-link-image"><img src="images/screen/screen-cosmetics.png" alt=""></span></li>
                           <li><a href="index-fishing.html">Fishing Skin</a><span class="submenu-link-image"><img src="images/screen/screen-fishing.png" alt=""></span></li>
                        </ul>
                        <ul class="submenu-list mt-0">
                           <li><a href="#">Cups&Mugs Skin <span class="menu-label menu-label--color1">Coming Soon</span></a><span class="submenu-link-image"><img src="images/screen/screen-cups.png" alt=""></span></li>
                           <li><a href="#">Bikes Skin <span class="menu-label menu-label--color2">Coming Soon</span></a><span class="submenu-link-image"><img src="images/screen/screen-bikes.png" alt=""></span></li>
                           <li><a href="#">T-Shirts Skin <span class="menu-label">Coming Soon</span></a><span class="submenu-link-image"><img src="images/screen/screen-tshirts.png" alt=""></span></li>
                           <li><a href="index-02.html">Home page 2</a><span class="submenu-link-image"><img src="images/screen/screen02.png" alt=""></span></li>
                           <li><a href="index-03.html">Home page 3</a><span class="submenu-link-image"><img src="images/screen/screen03.png" alt=""></span></li>
                           <li><a href="index-04.html">Home page 4</a><span class="submenu-link-image"><img src="images/screen/screen04.png" alt=""></span></li>
                           <li><a href="index-05.html">Home page 5</a><span class="submenu-link-image"><img src="images/screen/screen05.png" alt=""></span></li>
                           <li><a href="index-06.html">Home page 6</a><span class="submenu-link-image"><img src="images/screen/screen06.png" alt=""></span></li>
                           <li><a href="index-07.html">Home page 7</a><span class="submenu-link-image"><img src="images/screen/screen07.png" alt=""></span></li>
                           <li><a href="index-08.html">Home page 8</a><span class="submenu-link-image"><img src="images/screen/screen08.png" alt=""></span></li>
                           <li><a href="index-09.html">Home page 9</a><span class="submenu-link-image"><img src="images/screen/screen09.png" alt=""></span></li>
                           <li><a href="index-10.html">Home page 10</a><span class="submenu-link-image"><img src="images/screen/screen10.png" alt=""></span></li>
                           <li><a href="index-rtl.html">Home page RTL</a><span class="submenu-link-image"><img src="images/screen/screen-rtl.png" alt=""></span></li>
                        </ul>
                     </div>
	               </li>
                  <li class="mmenu-item--simple"><a href="#">Pages</a>
                     <div class="mmenu-submenu">
                        <ul class="submenu-list">
                           <li><a href="product.html">Product page</a>
                              <ul>
                                 <li><a href="product.html">Product page variant 1<span class="menu-label menu-label--color3">Popular</span></a></li>
                                 <li><a href="product-2.html">Product page variant 2</a></li>
                                 <li><a href="product-3.html">Product page variant 3</a></li>
                                 <li><a href="product-4.html">Product page variant 4</a></li>
                                 <li><a href="product-5.html">Product page variant 5</a></li>
                                 <li><a href="product-6.html">Product page variant 6</a></li>
                                 <li><a href="product-7.html">Product page variant 7</a></li>
                              </ul>
                           </li>
                           <li><a href="category.html">Category page</a>
                              <ul>
                                 <li><a href="category.html">Left sidebar filters</a></li>
                                 <li><a href="category-closed-filter.html">Closed filters</a></li>
                                 <li><a href="category-horizontal-filter.html">Horizontal filters</a></li>
                                 <li><a href="category-listview.html">Listing View</a></li>
                                 <li><a href="category-empty.html">Empty category</a></li>
                              </ul>
                           </li>
                           <li><a href="cart.html">Cart & Checkout</a>
                              <ul>
                                 <li><a href="cart.html">Cart Page</a></li>
                                 <li><a href="cart-empty.html">Empty cart</a></li>
                                 <li><a href="checkout.html">Checkout variant 1</a></li>
                                 <li><a href="checkout-2.html">Checkout variant 2</a></li>
                                 <li><a href="checkout-3.html">Checkout variant 3</a></li>
                              </ul>
                           </li>
                           <li><a href="account-create.html">Account</a>
                              <ul>
                                 <li><a href="account-create.html">Login</a></li>
                                 <li><a href="account-create.html">Create account</a></li>
                                 <li><a href="account-details.html">Account details</a></li>
                                 <li><a href="account-addresses.html">Account addresses</a></li>
                                 <li><a href="account-history.html">Order History</a></li>
                                 <li><a href="account-wishlist.html">Wishlist</a></li>
                              </ul>
                           </li>
                           <li><a href="blog.html">Blog</a>
                              <ul>
                                 <li><a href="blog.html">Right sidebar</a></li>
                                 <li><a href="blog-left-sidebar.html">Left sidebar</a></li>
                                 <li><a href="blog-without-sidebar.html">No sidebar</a></li>
                                 <li><a href="blog-sticky-sidebar.html">Sticky sidebar</a></li>
                                 <li><a href="blog-grid.html">Grid</a></li>
                                 <li><a href="blog-post.html">Blog post</a></li>
                              </ul>
                           </li>
                           <li><a href="gallery.html">Gallery</a></li>
                           <li><a href="faq.html">Faq</a></li>
                           <li><a href="about.html">About Us</a></li>
                           <li><a href="contact.html">Contact Us</a></li>
                           <li><a href="404.html">404 Page</a></li>
                           <li><a href="typography.html">Typography</a></li>
                           <li><a href="coming-soon.html" target="_blank">Coming soon</a></li>
                        </ul>
                     </div>
                  </li>
                  <li><a href="category.html">Accessories<span class="menu-label">SALE</span></a></li>
                  <li class="mmenu-item--mega"><a href="category.html">Men</a>
                     <div class="mmenu-submenu mmenu-submenu--has-bottom">
                        <div class="mmenu-submenu-inside">
                           <div class="container">
                              <div class="mmenu-left width-25">
                                 <div class="mmenu-bnr-wrap">
                                    <a href="#" class="image-hover-scale"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-srcset="images/menu/mmenu-bnr-01.png" class="lazyload fade-up" alt=""></a>
                                 </div>
                                 <h3 class="submenu-title"><a href="category.html">Pre-Collection<br>Spring-Summer 2021</a></h3>
                              </div>
                              <div class="mmenu-cols column-4">
                                 <div class="mmenu-col">
                                    <h3 class="submenu-title"><a href="category.html">Collections</a></h3>
                                    <ul class="submenu-list">
                                       <li><a href="category.html">Martins d'Art 2020/21<span class="submenu-link-txt">Available in boutiques from June 2019</span></a></li>
                                       <li><a href="category.html">Spring-Summer 2021<span class="submenu-link-txt">Available in boutiques from March 2019</span></a></li>
                                       <li><a href="category.html">Spring-Summer 2021 Pre-Collection<span class="submenu-link-txt">In boutiques</span></a></li>
                                       <li><a href="category.html">Cruise 2020/21<span class="submenu-link-txt">In boutiques</span></a></li>
                                       <li><a href="category.html">Fall-Winter 2020/21</a></li>
                                    </ul>
                                 </div>
                                 <div class="mmenu-col">
                                    <h3 class="submenu-title"><a href="category.html">Ready-to-wear</a></h3>
                                    <ul class="submenu-list">
                                       <li><a href="category.html" class="active">Jackets</a>
                                          <ul class="sub-level">
                                             <li><a href="category.html">Bomber Jackets</a></li>
                                             <li><a href="category.html">Biker Jacket</a></li>
                                             <li><a href="category.html">Trucker Jacket</a></li>
                                             <li><a href="category.html">Denim Jackets</a></li>
                                             <li><a href="category.html">Blouson Jacket<span class="menu-label">SALE</span></a></li>
                                             <li><a href="category.html">Overcoat</a></li>
                                             <li><a href="category.html">Trench Coat</a></li>
                                          </ul>
                                       </li>
                                       <li><a href="category.html">Dresses<span class="menu-label menu-label--color3">SALE</span></a></li>
                                       <li><a href="category.html">Blouses & Tops</a></li>
                                       <li><a href="category.html">Cardigans & Pullovers</a></li>
                                       <li><a href="category.html">Skirts</a></li>
                                       <li><a href="category.html">Pants & Shorts</a></li>
                                       <li><a href="category.html">Outerwear</a></li>
                                       <li><a href="category.html">Swimwear</a></li>
                                    </ul>
                                 </div>
                                 <div class="mmenu-col">
                                    <h3 class="submenu-title"><a href="category.html">Accessories</a></h3>
                                    <ul class="submenu-list">
                                       <li><a href="category.html">Jackets</a></li>
                                       <li><a href="category.html">Dresses</a></li>
                                       <li><a href="category.html">Blouses & Tops</a></li>
                                       <li><a href="category.html">Cardigans & Pullovers</a></li>
                                       <li><a href="category.html">Skirts<span class="menu-label">SALE</span></a></li>
                                       <li><a href="category.html">Pants & Shorts</a></li>
                                       <li><a href="category.html">Outerwear</a></li>
                                    </ul>
                                 </div>
                                 <div class="mmenu-col">
                                    <h3 class="submenu-title"><a href="category.html">Brands</a></h3>
                                    <ul class="submenu-list">
                                       <li><a href="category.html">Jackets</a></li>
                                       <li><a href="category.html">Dresses</a></li>
                                       <li><a href="category.html">Blouses & Tops</a></li>
                                       <li><a href="category.html">Cardigans & Pullovers</a></li>
                                       <li><a href="category.html">Skirts<span class="menu-label menu-label--color1">SALE</span></a></li>
                                       <li><a href="category.html">Pants & Shorts</a></li>
                                       <li><a href="category.html">Outerwear</a></li>
                                    </ul>
                                 </div>
                                 <div class="mmenu-bottom justify-content-center">
                                    <a href="#"><i class="icon-fox icon--lg"></i><b>FOXshop News</b><i class="icon-arrow-right"></i></a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </li>
                  <li class="mmenu-item--mega"><a href="category.html">Women</a>
                     <div class="mmenu-submenu mmenu-submenu--has-bottom">
                        <div class="mmenu-submenu-inside">
                           <div class="container">
                              <div class="mmenu-right width-25">
                                 <div class="mmenu-bnr-wrap">
                                    <a href="#" class="image-hover-scale"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-srcset="images/menu/mmenu-bnr-02.png" class="lazyload fade-up" alt=""></a>
                                 </div>
                                 <h3 class="submenu-title"><a href="category.html">Pre-Collection<br>Spring-Summer 2021</a></h3>
                              </div>
                              <div class="mmenu-cols column-4">
                                 <div class="mmenu-col">
                                    <h3 class="submenu-title"><a href="category.html">Collections</a></h3>
                                    <ul class="submenu-list">
                                       <li><a href="category.html">Martins d'Art 2020/21<span class="submenu-link-txt">Available in boutiques from June 2019</span></a></li>
                                       <li><a href="category.html">Spring-Summer 2021<span class="submenu-link-txt">Available in boutiques from March 2019</span></a></li>
                                       <li><a href="category.html">Spring-Summer 2021 Pre-Collection<span class="submenu-link-txt">In boutiques</span></a></li>
                                       <li><a href="category.html">Cruise 2020/21<span class="submenu-link-txt">In boutiques</span></a></li>
                                       <li><a href="category.html">Fall-Winter 2020/21</a></li>
                                    </ul>
                                 </div>
                                 <div class="mmenu-col">
                                    <h3 class="submenu-title"><a href="category.html">Ready-to-wear</a></h3>
                                    <ul class="submenu-list">
                                       <li><a href="category.html">Jackets</a></li>
                                       <li><a href="category.html">Dresses<span class="menu-label menu-label--color3">SALE</span></a></li>
                                       <li><a href="category.html">Blouses & Tops</a>
                                          <ul>
                                             <li><a href="category.html">Jackets</a></li>
                                             <li><a href="category.html">Dresses<span class="menu-label menu-label--color3">SALE</span></a></li>
                                             <li><a href="category.html">Blouses & Tops</a>
                                                <ul>
                                                   <li><a href="category.html">Jackets</a></li>
                                                   <li><a href="category.html">Dresses<span class="menu-label menu-label--color3">SALE</span></a>
                                                      <ul>
                                                         <li><a href="category.html">Jackets</a></li>
                                                         <li><a href="category.html">Dresses<span class="menu-label menu-label--color3">SALE</span></a>
                                                            <ul>
                                                               <li><a href="category.html">Jackets</a></li>
                                                               <li><a href="category.html">Dresses<span class="menu-label menu-label--color3">SALE</span></a></li>
                                                               <li><a href="category.html">Blouses & Tops</a></li>
                                                               <li><a href="category.html">Cardigans & Pullovers</a></li>
                                                               <li><a href="category.html">Skirts</a></li>
                                                               <li><a href="category.html">Pants & Shorts</a></li>
                                                               <li><a href="category.html">Outerwear</a></li>
                                                               <li><a href="category.html">Swimwear</a></li>
                                                            </ul>
                                                         </li>
                                                         <li><a href="category.html">Blouses & Tops</a></li>
                                                         <li><a href="category.html">Cardigans & Pullovers</a></li>
                                                         <li><a href="category.html">Skirts</a></li>
                                                         <li><a href="category.html">Pants & Shorts</a></li>
                                                         <li><a href="category.html">Outerwear</a></li>
                                                         <li><a href="category.html">Swimwear</a></li>
                                                      </ul>
                                                   </li>
                                                   <li><a href="category.html">Blouses & Tops</a></li>
                                                   <li><a href="category.html">Cardigans & Pullovers</a></li>
                                                   <li><a href="category.html">Skirts</a></li>
                                                   <li><a href="category.html">Pants & Shorts</a></li>
                                                   <li><a href="category.html">Outerwear</a></li>
                                                   <li><a href="category.html">Swimwear</a></li>
                                                </ul>
                                             </li>
                                             <li><a href="category.html">Cardigans & Pullovers</a></li>
                                             <li><a href="category.html">Skirts</a></li>
                                             <li><a href="category.html">Pants & Shorts</a></li>
                                             <li><a href="category.html">Outerwear</a></li>
                                             <li><a href="category.html">Swimwear</a></li>
                                          </ul>
                                       </li>
                                       <li><a href="category.html">Cardigans & Pullovers</a></li>
                                       <li><a href="category.html">Skirts</a></li>
                                       <li><a href="category.html">Pants & Shorts</a></li>
                                       <li><a href="category.html">Outerwear</a></li>
                                       <li><a href="category.html">Swimwear</a></li>
                                    </ul>
                                 </div>
                                 <div class="mmenu-col">
                                    <h3 class="submenu-title"><a href="category.html">Accessories</a></h3>
                                    <ul class="submenu-list">
                                       <li><a href="category.html">Jackets</a></li>
                                       <li><a href="category.html">Dresses</a></li>
                                       <li><a href="category.html">Blouses & Tops</a></li>
                                       <li><a href="category.html">Cardigans & Pullovers</a></li>
                                       <li><a href="category.html">Skirts<span class="menu-label">SALE</span></a></li>
                                       <li><a href="category.html">Pants & Shorts</a></li>
                                       <li><a href="category.html">Outerwear</a></li>
                                    </ul>
                                 </div>
                                 <div class="mmenu-col">
                                    <h3 class="submenu-title"><a href="category.html">Brands</a></h3>
                                    <ul class="submenu-list">
                                       <li><a href="category.html">Jackets</a></li>
                                       <li><a href="category.html">Dresses</a></li>
                                       <li><a href="category.html">Blouses & Tops</a></li>
                                       <li><a href="category.html">Cardigans & Pullovers</a></li>
                                       <li><a href="category.html">Skirts<span class="menu-label menu-label--color1">SALE</span></a></li>
                                       <li><a href="category.html">Pants & Shorts</a></li>
                                       <li><a href="category.html">Outerwear</a></li>
                                    </ul>
                                 </div>
                                 <div class="mmenu-bottom justify-content-center">
                                    <a href="#"><i class="icon-fox icon--lg"></i><b>FOXshop News</b><i class="icon-arrow-right"></i></a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </li>
               </ul>
               <!--/mmenu-->
            </div>
            <!--//navigation-->
            <div class="hdr-links-wrap col-auto ml-auto">
               <div class="hdr-inline-link">
                  <!-- Header Search -->
                  <div class="search_container_desktop">
                     <div class="dropdn dropdn_search dropdn_fullwidth">
                        <a href="#" class="dropdn-link  js-dropdn-link only-icon"><i class="icon-search"></i><span class="dropdn-link-txt">Search</span></a>
                        <div class="dropdn-content">
                           <div class="container">
                              <form method="get" action="#" class="search search-off-popular">
                                 <input name="search" type="text" class="search-input input-empty" placeholder="What are you looking for?">
                                 <button type="submit" class="search-button"><i class="icon-search"></i></button>
                                 <a href="#" class="search-close js-dropdn-close"><i class="icon-close-thin"></i></a>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- /Header Search -->
                  <!-- Header Wishlist -->
                  <div class="dropdn dropdn_wishlist">
                     <a href="account-wishlist.html" class="dropdn-link only-icon wishlist-link ">
                        <i class="icon-heart"></i><span class="dropdn-link-txt">Wishlist</span><span class="wishlist-qty">3</span>
                     </a>
                  </div>
                  <!-- /Header Wishlist -->
                  <div class="hdr_container_mobile show-mobile">
                     <!-- Header Account -->
                     <div class="dropdn dropdn_account dropdn_fullheight">
                        <a href="#" class="dropdn-link js-dropdn-link" data-panel="#dropdnAccount"><i class="icon-user"></i><span class="dropdn-link-txt">Account</span></a>
                     </div>
                     <!-- /Header Account -->
                  </div>
                  <div class="dropdn dropdn_fullheight minicart">
                     <a href="#" class="dropdn-link js-dropdn-link minicart-link" data-panel="#dropdnMinicart">
                        <i class="icon-basket"></i>
                        <span class="minicart-qty">3</span>
                        <span class="minicart-total hide-mobile">$34.99</span>
                     </a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
</header>
<div class="header-side-panel">
	<!-- Mobile Menu -->
<div class="mobilemenu js-push-mbmenu">
	<div class="mobilemenu-content">
		<div class="mobilemenu-close mobilemenu-toggle">Close</div>
		<div class="mobilemenu-scroll">
			<div class="mobilemenu-search"></div>
			<div class="nav-wrapper show-menu">
				<div class="nav-toggle">
					<span class="nav-back"><i class="icon-angle-left"></i></span>
					<span class="nav-title"></span>
					<a href="#" class="nav-viewall">view all</a>
				</div>
				<ul class="nav nav-level-1">
					<li><a href="index.html">Layouts<span class="menu-label menu-label--color1">New</span><span class="arrow"><i class="icon-angle-right"></i></span></a>
						<ul class="nav-level-2">
							<li><a href="#">Fashion (Default) Skin</a></li>
							<li><a href="#">Sport Skin</a></li>
							<li><a href="index-helloween.html">Halloween Skin</a></li>
							<li><a href="index-medical.html">Medical Skin</a></li>
							<li><a href="index-food.html">Food Market Skin</a></li>
							<li><a href="index-cosmetics.html">Cosmetics Skin</a></li>
							<li><a href="index-fishing.html">Fishing Skin</a></li>
							<li><a href="#">Books Skin<span class="menu-label menu-label--color1">Coming Soon</span></a></li>
							<li><a href="#">Electronics Skin<span class="menu-label menu-label--color2">Coming Soon</span></a></li>
							<li><a href="#">Games Skin<span class="menu-label menu-label--color3">Coming Soon</span></a></li>
							<li><a href="#">Vaping Skin<span class="menu-label">Coming Soon</span></a></li>
							<li><a href="index-02.html">Home page 2</a></li>
							<li><a href="index-03.html">Home page 3</a></li>
							<li><a href="index-04.html">Home page 4</a></li>
							<li><a href="index-05.html">Home page 5</a></li>
							<li><a href="index-06.html">Home page 6</a></li>
							<li><a href="index-07.html">Home page 7</a></li>
							<li><a href="index-08.html">Home page 8</a></li>
							<li><a href="index-09.html">Home page 9</a></li>
							<li><a href="index-10.html">Home page 10</a></li>
							<li><a href="index-rtl.html">Home page RTL</a></li>
						</ul>
					</li>
					<li><a href="#">Pages<span class="arrow"><i class="icon-angle-right"></i></span></a>
						<ul class="nav-level-2">
							<li><a href="product.html">Product page<span class="arrow"><i class="icon-angle-right"></i></span></a>
								<ul class="nav-level-3">
									<li><a href="product.html">Product page variant 1<span class="menu-label menu-label--color3">Popular</span></a></li>
									<li><a href="product-2.html">Product page variant 2</a></li>
									<li><a href="product-3.html">Product page variant 3</a></li>
									<li><a href="product-4.html">Product page variant 4</a></li>
									<li><a href="product-5.html">Product page variant 5</a></li>
									<li><a href="product-6.html">Product page variant 6</a></li>
									<li><a href="product-7.html">Product page variant 7</a></li>
								</ul>
							</li>
							<li><a href="category.html">Category page<span class="arrow"><i class="icon-angle-right"></i></span></a>
								<ul class="nav-level-3">
									<li><a href="category.html">Left sidebar filters</a></li>
									<li><a href="category-closed-filter.html">Closed filters</a></li>
									<li><a href="category-horizontal-filter.html">Horizontal filters</a></li>
									<li><a href="category-listview.html">Listing View</a></li>
									<li><a href="category-empty.html">Empty category</a></li>
								</ul>
							</li>
							<li><a href="cart.html">Cart & Checkout<span class="arrow"><i class="icon-angle-right"></i></span></a>
								<ul class="nav-level-3">
									<li><a href="cart.html">Cart Page</a></li>
									<li><a href="cart-empty.html">Empty cart</a></li>
									<li><a href="checkout.html">Checkout variant 1</a></li>
									<li><a href="checkout-2.html">Checkout variant 2</a></li>
									<li><a href="checkout-3.html">Checkout variant 3</a></li>
								</ul>
							</li>
							<li><a href="account-create.html">Account<span class="arrow"><i class="icon-angle-right"></i></span></a>
								<ul class="nav-level-3">
									<li><a href="account-create.html">Login</a></li>
									<li><a href="account-create.html">Create account</a></li>
									<li><a href="account-details.html">Account details</a></li>
									<li><a href="account-addresses.html">Account addresses</a></li>
									<li><a href="account-history.html">Order History</a></li>
									<li><a href="account-wishlist.html">Wishlist</a></li>
								</ul>
							</li>
							<li><a href="blog.html">Blog<span class="arrow"><i class="icon-angle-right"></i></span></a>
								<ul class="nav-level-3">
									<li><a href="blog.html">Right sidebar</a></li>
									<li><a href="blog-left-sidebar.html">Left sidebar</a></li>
									<li><a href="blog-without-sidebar.html">No sidebar</a></li>
									<li><a href="blog-sticky-sidebar.html">Sticky sidebar</a></li>
									<li><a href="blog-grid.html">Grid</a></li>
									<li><a href="blog-post.html">Blog post</a></li>
								</ul>
							</li>
							<li><a href="gallery.html">Gallery</a></li>
							<li><a href="faq.html">Faq</a></li>
							<li><a href="about.html">About Us</a></li>
							<li><a href="contact.html">Contact Us</a></li>
							<li><a href="404.html">404 Page</a></li>
							<li><a href="typography.html">Typography</a></li>
							<li><a href="coming-soon.html" target="_blank">Coming soon</a></li>
						</ul>
					</li>
					<li><a href="category.html">New Arrivals<span class="arrow"><i class="icon-angle-right"></i></span></a>
						<ul class="nav-level-2">
							<li><a href="category.html">Shoes<span class="arrow"><i class="icon-angle-right"></i></span></a>
								<ul class="nav-level-3">
									<li><a href="category.html">Heels</a></li>
									<li><a href="category.html">Boots</a></li>
									<li><a href="category.html">Flats</a></li>
									<li><a href="category.html">Sneakers &amp; Athletic</a></li>
									<li><a href="category.html">Clogs &amp; Mules</a></li>
								</ul>
							</li>
							<li><a href="category.html">Tops<span class="arrow"><i class="icon-angle-right"></i></span></a>
								<ul class="nav-level-3">
									<li><a href="category.html">Dresses</a></li>
									<li><a href="category.html">Shirts &amp; Tops</a></li>
									<li><a href="category.html">Coats &amp; Outerwear</a></li>
									<li><a href="category.html">Sweaters</a></li>
								</ul>
							</li>
							<li><a href="category.html">Shoes<span class="arrow"><i class="icon-angle-right"></i></span></a>
								<ul class="nav-level-3">
									<li><a href="category.html">Heels</a></li>
									<li><a href="category.html">Boots</a></li>
									<li><a href="category.html">Flats</a></li>
									<li><a href="category.html">Sneakers &amp; Athletic</a></li>
									<li><a href="category.html">Clogs &amp; Mules</a></li>
								</ul>
							</li>
							<li><a href="category.html">Bottoms<span class="arrow"><i class="icon-angle-right"></i></span></a>
								<ul class="nav-level-3">
									<li><a href="category.html">Jeans</a></li>
									<li><a href="category.html">Pants</a></li>
									<li><a href="category.html">slippers</a></li>
									<li><a href="category.html">suits</a></li>
									<li><a href="category.html">socks</a></li>
								</ul>
							</li>
							<li><a href="category.html">Accessories<span class="arrow"><i class="icon-angle-right"></i></span></a>
								<ul class="nav-level-3">
									<li><a href="category.html">Sunglasses</a></li>
									<li><a href="category.html">Hats</a></li>
									<li><a href="category.html">Watches</a></li>
									<li><a href="category.html">Jewelry</a></li>
									<li><a href="category.html">Belts</a></li>
								</ul>
							</li>
							<li><a href="category.html">Bags<span class="arrow"><i class="icon-angle-right"></i></span></a>
								<ul class="nav-level-3">
									<li><a href="category.html">Handbags</a></li>
									<li><a href="category.html">Backpacks</a></li>
									<li><a href="category.html">Luggage</a></li>
									<li><a href="category.html">wallets</a></li>
								</ul>
							</li>
						</ul>
					</li>
					<li><a href="#buynow" target="_blank">Buy Theme<span class="menu-label menu-label--color3">Hurry Up!</span><span class="arrow"><i class="icon-angle-right"></i></span></a></li>
				</ul>
			</div>
			<div class="mobilemenu-bottom">
				<div class="mobilemenu-currency">
					<!-- Header Currency -->
<div class="dropdn_currency">
	<div class="dropdn dropdn_caret">
			<a href="#" class="dropdn-link js-dropdn-link">US dollars<i class="icon-angle-down"></i></a>
			<div class="dropdn-content">
					<ul>
						<li class="active"><a href="#"><span>US dollars</span></a></li>
						<li><a href="#"><span>Euro</span></a></li>
						<li><a href="#"><span>UK pounds</span></a></li>

					</ul>
			</div>
	</div>
</div>
<!-- /Header Currency -->
				</div>
				<div class="mobilemenu-language">
					<!-- Header Language -->
<div class="dropdn_language">
	<div class="dropdn dropdn_language dropdn_language--noimg dropdn_caret">
		<a href="#" class="dropdn-link js-dropdn-link"><span class="js-dropdn-select-current">English</span><i class="icon-angle-down"></i></a>
		<div class="dropdn-content">
			<ul>
				<li class="active"><a href="#"><img src="images/flags/en.png" alt="">English</a></li>
				<li><a href="#"><img src="images/flags/sp.png" alt="">Spanish</a></li>
				<li><a href="#"><img src="images/flags/de.png" alt="">German</a></li>
				<li><a href="#"><img src="images/flags/fr.png" alt="">French</a></li>
			</ul>
		</div>
	</div>
</div>
<!-- /Header Language -->
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /Mobile Menu -->
	<div class="dropdn-content account-drop" id="dropdnAccount">
	<div class="dropdn-content-block">
		<div class="dropdn-close"><span class="js-dropdn-close">Close</span></div>
		<ul>
			<li><a href="account-create.html"><span>Log In</span><i class="icon-login"></i></a></li>
			<li><a href="account-create.html"><span>Register</span><i class="icon-user2"></i></a></li>
			<li><a href="checkout.html"><span>Checkout</span><i class="icon-card"></i></a></li>
		</ul>
		<div class="dropdn-form-wrapper">
			<h5>Quick Login</h5>
			<form action="#">
				<div class="form-group">
					<input type="text" class="form-control form-control--sm is-invalid" placeholder="Enter your e-mail">
					<div class="invalid-feedback">Can't be blank</div>
				</div>
				<div class="form-group">
					<input type="password" class="form-control form-control--sm" placeholder="Enter your password">
				</div>
				<button type="submit" class="btn">Enter</button>
			</form>
		</div>
	</div>
	<div class="drop-overlay js-dropdn-close"></div>
</div>
<div class="dropdn-content minicart-drop" id="dropdnMinicart">
	<div class="dropdn-content-block">
		<div class="dropdn-close"><span class="js-dropdn-close">Close</span></div>
		<div class="minicart-drop-content js-dropdn-content-scroll">
			<div class="minicart-prd row">
				<div class="minicart-prd-image image-hover-scale-circle col">
					<a href="product.html"><img class="lazyload fade-up" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-01-1.jpg" alt=""></a>
				</div>
				<div class="minicart-prd-info col">
					<div class="minicart-prd-tag">FOXic</div>
					<h2 class="minicart-prd-name"><a href="#">Leather Pegged Pants</a></h2>
					<div class="minicart-prd-qty"><span class="minicart-prd-qty-label">Quantity:</span><span class="minicart-prd-qty-value">1</span></div>
					<div class="minicart-prd-price prd-price">
						<div class="price-old">$200.00</div>
						<div class="price-new">$180.00</div>
					</div>
				</div>
				<div class="minicart-prd-action">
					<a href="#" class="js-product-remove" data-line-number="1"><i class="icon-recycle"></i></a>
				</div>
			</div>
			<div class="minicart-prd row">
				<div class="minicart-prd-image image-hover-scale-circle col">
					<a href="product.html"><img class="lazyload fade-up" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-16-1.jpg" alt=""></a>
				</div>
				<div class="minicart-prd-info col">
					<div class="minicart-prd-tag">FOXic</div>
					<h2 class="minicart-prd-name"><a href="#">Cascade Casual Shirt</a></h2>
					<div class="minicart-prd-qty"><span class="minicart-prd-qty-label">Quantity:</span><span class="minicart-prd-qty-value">1</span></div>
					<div class="minicart-prd-price prd-price">
						<div class="price-old">$200.00</div>
						<div class="price-new">$180.00</div>
					</div>
				</div>
				<div class="minicart-prd-action">
					<a href="#" class="js-product-remove" data-line-number="2"><i class="icon-recycle"></i></a>
				</div>
			</div>
			<div class="minicart-empty js-minicart-empty d-none">
				<div class="minicart-empty-text">Your cart is empty</div>
				<div class="minicart-empty-icon">
					<i class="icon-shopping-bag"></i>
					<svg version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 306 262" style="enable-background:new 0 0 306 262;" xml:space="preserve"><path class="st0" d="M78.1,59.5c0,0-37.3,22-26.7,85s59.7,237,142.7,283s193,56,313-84s21-206-69-240s-249.4-67-309-60C94.6,47.6,78.1,59.5,78.1,59.5z"/></svg>
				</div>
			</div>
			<a href="#" class="minicart-drop-countdown mt-3">
				<div class="countdown-box-full">
					<div class="row no-gutters align-items-center">
						<div class="col-auto"><i class="icon-gift icon--giftAnimate"></i></div>
						<div class="col">
							<div class="countdown-txt">WHEN BUYING TWO
								THINGS A THIRD AS A GIFT
							</div>
							<div class="countdown js-countdown" data-countdown="2021/07/01"></div>
						</div>
					</div>
				</div>
			</a>
			<div class="minicart-drop-info d-none d-md-block">
				<div class="shop-feature-single row no-gutters align-items-center">
					<div class="shop-feature-icon col-auto"><i class="icon-truck"></i></div>
					<div class="shop-feature-text col"><b>SHIPPING!</b> Continue shopping to add more products and receive free shipping</div>
				</div>
			</div>
		</div>
		<div class="minicart-drop-fixed js-hide-empty">
			<div class="loader-horizontal-sm js-loader-horizontal-sm" data-loader-horizontal=""><span></span></div>
			<div class="minicart-drop-total js-minicart-drop-total row no-gutters align-items-center">
				<div class="minicart-drop-total-txt col-auto heading-font">Subtotal</div>
				<div class="minicart-drop-total-price col" data-header-cart-total="">$340</div>
			</div>
			<div class="minicart-drop-actions">
				<a href="cart.html" class="btn btn--md btn--grey"><i class="icon-basket"></i><span>Cart Page</span></a>
				<a href="checkout.html" class="btn btn--md"><i class="icon-checkout"></i><span>Check out</span></a>
			</div>
			<ul class="payment-link mb-2">
				<li><i class="icon-amazon-logo"></i></li>
				<li><i class="icon-visa-pay-logo"></i></li>
				<li><i class="icon-skrill-logo"></i></li>
				<li><i class="icon-klarna-logo"></i></li>
				<li><i class="icon-paypal-logo"></i></li>
				<li><i class="icon-apple-pay-logo"></i></li>
			</ul>
		</div>
	</div>
	<div class="drop-overlay js-dropdn-close"></div>
</div>

</div>
<!--//header-->