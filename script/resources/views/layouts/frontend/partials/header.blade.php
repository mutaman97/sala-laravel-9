<section>
    <!-- Loader -->
    <div id="preloader">
        <div id="status">
            <div class="spinner">
                <div class="double-bounce1"></div>
                <div class="double-bounce2"></div>
            </div>
        </div>
    </div>
    <!-- Loader -->
    
    <!-- Navbar STart -->
    <header id="topnav" class="defaultscroll sticky">
        <div class="container">

            @php
                $info = get_option('theme',true);
                $logo=$info->logo_img ?? '';
            @endphp

            <!-- Logo container-->
            <a class="logo" href="{{ url('/') }}">
                @if (Session::get('locale') == 'ar') 
                    <img src="{{ asset('uploads/rtl.logo.svg') }}" height="50" class="logo-light-mode" alt="sala logo">
                    <!-- <img src="{{ asset('uploads/'.$logo) }}" height="65" class="logo-dark-mode" alt=""> -->
                @else
                <img src="{{ asset('uploads/ltr.logo.svg') }}" height="50" class="logo-light-mode" alt="sala logo">
                @endif
            </a>
            
            <!-- Logo End -->

            <!-- End Logo container-->
            <div class="menu-extras">
                <div class="menu-item">
                    <!-- Mobile menu toggle-->
                    <a class="navbar-toggle" id="isToggle" onclick="toggleMenu()">
                        <div class="lines">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </a>
                    <!-- End mobile menu toggle-->
                </div>
            </div>

            <!--Login button Start-->
            <ul class="buy-button list-inline mb-0">
                <!-- <li class="list-inline-item mb-0">
                    <a href="javascript:void(0)" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                        <div class="btn btn-icon btn-pills btn-soft-primary"><i data-feather="settings" class="fea icon-sm"></i></div>
                    </a>
                </li> -->
                <li class="list-inline-item ps-1 mb-0">
                    
                    @guest
                        <a href="{{ route('register') }}">
                            <div class="btn btn btn-pills btn-soft-primary">{{ __('Start Free Trial') }}</div>
                        </a>
                    @else
                        @if (Auth::user()->role_id==1)
                            <a href="{{ route('admin.dashboard') }}">
                                <div class="btn btn btn-pills btn-soft-primary">{{ __('Dashboard') }}</div>
                            </a>
                        @elseif (Auth::user()->role_id==2) 
                            <a href="{{ route('merchant.dashboard') }}">
                                <div class="btn btn btn-pills btn-soft-primary">{{ __('Dashboard') }}</div>
                            </a>
                        
                        @endif
                    @endguest
                </li>
            </ul>
            <!--Login button End-->
    
            <div id="navigation">
                <!-- Navigation Menu-->   
                <ul class="navigation-menu">

                    <li></li>
                        {{ThemeMenu('header','layouts.frontend.components.menu')}}
                </ul><!--end navigation menu-->
            </div><!--end navigation-->
        </div><!--end container-->
    </header><!--end header-->
</section><!-- Navbar End -->