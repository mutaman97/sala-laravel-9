<div class="">
</div>
<!-- Shape Start -->
<div class="position-relative">
    <div class="shape overflow-hidden text-footer">
        <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
        </svg>
    </div>
</div>
<!-- <div class="position-relative">
    <div class="shape overflow-hidden text-footer">
        <svg viewBox="0 0 2880 250" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M720 125L2160 0H2880V250H0V125H720Z" fill="currentColor"></path>
        </svg>
    </div>
</div> -->
<!--Shape End-->
    @php
        $info = get_option('footer_theme',true);
        $theme = get_option('theme',true);
        $logo_img=$theme->logo_img ?? '';
    @endphp

<!-- Footer Start -->
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="footer-py-60">
                    <div class="row">
                        <div class="col-lg-4 col-12 mb-0 mb-md-4 pb-0 pb-md-2">
                            <a href="{{ url('/') }}" class="logo-footer">
                                @if (Session::get('locale') == 'ar')
                                    <img src="{{ asset('uploads/rtl.logo.svg') }}" height="50" class="logo-light-mode" alt="sala logo">
                                @else
                                    <img src="{{ asset('uploads/ltr.logo.svg') }}" height="50" class="logo-light-mode" alt="sala logo">
                                @endif
                            </a>
                            <p class="mt-4">{{ $info->address ?? '' }}</p>
                            <p>{{ $info->email ?? ''  }}</p>
                            <p>{{ $info->phone  ?? '' }}</p>
                            <ul class="list-unstyled social-icon foot-social-icon mb-0 mt-4">
                                <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="facebook" class="fea icon-sm fea-social"></i></a></li>
                                <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="instagram" class="fea icon-sm fea-social"></i></a></li>
                                <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="twitter" class="fea icon-sm fea-social"></i></a></li>
                                <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="linkedin" class="fea icon-sm fea-social"></i></a></li>
                            </ul><!--end icon-->

                            @php
                                $languages = json_decode(get_option('active_languages'), true);
                                $count = count($languages);
                            @endphp

                            @if ($count > 1)
                                <div class="col-lg-4 col-md-4 col-4 mb-1 mt-2 pt-2 pb-md-2">
                                    <select name="language" class="form-select" id="language">
                                        @foreach ($languages as $key => $language)
                                            <option {{ App::currentLocale() == $key ? 'selected' : '' }} value="{{ $key }}">{{ $language }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif


                        </div><!--end col-->

                        <div class="col-lg-2 col-md-4 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                            <h5 class="footer-head">{{ __('About Company') }}</h5>
                            <ul class="list-unstyled footer-list mt-4">
                                {{ThemeMenu('footer_left_menu','layouts.components.menu')}}

                            </ul>
                        </div><!--end col-->

                        <div class="col-lg-3 col-md-4 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                            <h5 class="footer-head">{{ __('Our Services') }}</h5>
                            <ul class="list-unstyled footer-list mt-4">
                                {{ThemeMenu('footer_right_menu','layouts.components.menu')}}

                            </ul>
                        </div><!--end col-->

                        <div class="col-lg-3 col-md-4 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                            <h5 class="footer-head">{{ __('Newsletter') }}</h5>
                            <p class="mt-4">{{ __('Sign up and receive the latest tips via email') }}</p>
                            <form action="{{ route('subscribe') }}" method="POST" class="ajaxform_with_reset">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="foot-subscribe mb-3">
                                            <label class="form-label">{{ __('Write your email') }} <span class="text-danger">*</span></label>
                                            <div class="form-icon position-relative">
                                                <i data-feather="mail" class="fea icon-sm icons"></i>
                                                <input type="email" name="email" id="emailsubscribe" class="form-control ps-5 rounded" placeholder="{{ __('Enter Email Address') }}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="d-grid">
                                            <input type="submit" id="submitsubscribe" name="send" class="btn btn-soft-primary" value="{{ __('Subscribe') }}">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div><!--end col-->
                    </div><!--end row-->
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->

    <div class="footer-py-30 footer-bar">
        <div class="container text-center">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <div class="text-sm-start">
                        {{-- <p>{{ $info->copyright ?? '' }}</p> --}}
                        <p class="mb-0">{{ __('Made With') }} <i class="mdi mdi-heart text-danger"></i> {{ __('By') }} <a href="https://sala.sd" target="_blank" class="text-reset">{{ __('Sala Platform') }} © 2019 - {{ date('Y') }}</a></p>

                    </div>
                </div><!--end col-->


                <div class="col-sm-6 mt-4 mt-sm-0 pt-2 pt-sm-0">
                    <ul class="list-unstyled text-sm-end mb-0">
                        <li class="list-inline-item"><a href="javascript:void(0)"><img src="{{ asset('/assets/img/payment/cashondeliveryNew.svg')}}" class="avatar avatar-ex-sm" title="Cash On Delivery" alt=""></a></li>
                        <li class="list-inline-item"><a href="javascript:void(0)"><img src="{{ asset('/assets/img/payment/syberlogo.svg')}}" class="avatar avatar-ex-sm" title="Syber Pay" alt=""></a></li>
                        <li class="list-inline-item"><a href="javascript:void(0)"><img src="{{ asset('/assets/img/payment/arabic-mbok.svg')}}" class="avatar avatar-ex-sm" title="Mbok" alt=""></a></li>
                        <li class="list-inline-item"><a href="javascript:void(0)"><img src="{{ asset('/assets/img/payment/stripe.svg')}}" class="avatar avatar-ex-sm" title="Stripe" alt=""></a></li>
                        <li class="list-inline-item"><a href="javascript:void(0)"><img src="{{ asset('/assets/img/payment/mastercard.svg')}}" class="avatar avatar-ex-sm" title="Master Card" alt=""></a></li>
                        <li class="list-inline-item"><a href="javascript:void(0)"><img src="{{ asset('/assets/img/payment/paypal.svg')}}" class="avatar avatar-ex-sm" title="Paypal" alt=""></a></li>
                        <li class="list-inline-item"><a href="javascript:void(0)"><img src="{{ asset('/assets/img/payment/visa.svg')}}" class="avatar avatar-ex-sm" title="Visa" alt=""></a></li>
                    </ul>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </div>
</footer><!--end footer-->

<!-- Offcanvas Start -->
<!-- <div class="offcanvas offcanvas-end bg-white shadow" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header p-4 border-bottom">
        <h5 id="offcanvasRightLabel" class="mb-0">
            <img src="images/logo-dark.png" height="24" class="light-version" alt="">
            <img src="images/logo-light.png" height="24" class="dark-version" alt="">
        </h5>
        <button type="button" class="btn-close d-flex align-items-center text-dark" data-bs-dismiss="offcanvas" aria-label="Close"><i class="uil uil-times fs-4"></i></button>
    </div>
    <div class="offcanvas-body p-4">
        <div class="row">
            <div class="col-12">
                <img src="{{ asset('/frontend/images/contact.svg')}}" class="img-fluid d-block mx-auto" style="max-width: 256px;" alt="">
                <div class="card border-0 mt-5" style="z-index: 1">
                    <div class="card-body p-0">
                        <form method="post" name="myForm" onsubmit="return validateForm()">
                            <p id="error-msg" class="mb-0"></p>
                            <div id="simple-msg"></div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Your Name <span class="text-danger">*</span></label>
                                        <div class="form-icon position-relative">
                                            <i data-feather="user" class="fea icon-sm icons"></i>
                                            <input name="name" id="name" type="text" class="form-control ps-5" placeholder="Name :">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Your Email <span class="text-danger">*</span></label>
                                        <div class="form-icon position-relative">
                                            <i data-feather="mail" class="fea icon-sm icons"></i>
                                            <input name="email" id="email" type="email" class="form-control ps-5" placeholder="Email :">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label">Subject</label>
                                        <div class="form-icon position-relative">
                                            <i data-feather="book" class="fea icon-sm icons"></i>
                                            <input name="subject" id="subject" class="form-control ps-5" placeholder="subject :">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label">Comments <span class="text-danger">*</span></label>
                                        <div class="form-icon position-relative">
                                            <i data-feather="message-circle" class="fea icon-sm icons clearfix"></i>
                                            <textarea name="comments" id="comments" rows="4" class="form-control ps-5" placeholder="Message :"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="d-grid">
                                        <button type="submit" id="submit" name="send" class="btn btn-primary">Send Message</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="offcanvas-footer p-4 border-top text-center">
        <ul class="list-unstyled social-icon social mb-0">
            <li class="list-inline-item mb-0"><a href="https://1.envato.market/4n73n" target="_blank" class="rounded"><i class="uil uil-shopping-cart align-middle" title="Buy Now"></i></a></li>
            <li class="list-inline-item mb-0"><a href="https://dribbble.com/shreethemes" target="_blank" class="rounded"><i class="uil uil-dribbble align-middle" title="dribbble"></i></a></li>
            <li class="list-inline-item mb-0"><a href="https://www.facebook.com/shreethemes" target="_blank" class="rounded"><i class="uil uil-facebook-f align-middle" title="facebook"></i></a></li>
            <li class="list-inline-item mb-0"><a href="https://www.instagram.com/shreethemes/" target="_blank" class="rounded"><i class="uil uil-instagram align-middle" title="instagram"></i></a></li>
            <li class="list-inline-item mb-0"><a href="https://twitter.com/shreethemes" target="_blank" class="rounded"><i class="uil uil-twitter align-middle" title="twitter"></i></a></li>
            <li class="list-inline-item mb-0"><a href="mailto:support@shreethemes.in" class="rounded"><i class="uil uil-envelope align-middle" title="email"></i></a></li>
            <li class="list-inline-item mb-0"><a href="https://shreethemes.in" target="_blank" class="rounded"><i class="uil uil-globe align-middle" title="website"></i></a></li>
        </ul>
    </div>
</div> -->
<!-- Offcanvas End -->

        <!-- Cookies Start -->
        <!-- <div class="cookie-popup bg-white shadow rounded py-3 px-4">
            <p class="text-muted mb-0">This website uses cookies to provide you with a great user experience. By using it, you accept our <a href="https://shreethemes.in" target="_blank" class="text-success h6">use of cookies</a></p>
            <div class="cookie-popup-actions text-end">
                <button><i class="uil uil-times text-dark fs-4"></i></button>
            </div>
        </div> -->
        <!--Note: Cookies Js including in plugins.init.js (path like; js/plugins.init.js) and Cookies css including in _helper.scss (path like; scss/_helper.scss)-->
        <!-- Cookies End -->

        <!-- Back to top -->
        <!-- <a href="#" onclick="topFunction()" id="back-to-top" class="back-to-top fs-5"><i data-feather="arrow-up" class="fea icon-sm icons align-middle"></i></a> -->
        <!-- Back to top -->

        <!-- Style switcher -->
        <!-- <div id="style-switcher" class="bg-light border p-3 pt-2 pb-2" onclick="toggleSwitcher()">
            <div>
                <h6 class="title text-center">Select Your Color</h6>
                <ul class="pattern">
                    <li class="list-inline-item">
                        <a class="color1" href="javascript: void(0);" onclick="setColor('default')"></a>
                    </li>
                    <li class="list-inline-item">
                        <a class="color2" href="javascript: void(0);" onclick="setColor('green')"></a>
                    </li>
                    <li class="list-inline-item">
                        <a class="color3" href="javascript: void(0);" onclick="setColor('purple')"></a>
                    </li>
                    <li class="list-inline-item">
                        <a class="color4" href="javascript: void(0);" onclick="setColor('red')"></a>
                    </li>
                    <li class="list-inline-item">
                        <a class="color5" href="javascript: void(0);" onclick="setColor('skyblue')"></a>
                    </li>
                    <li class="list-inline-item">
                        <a class="color6" href="javascript: void(0);" onclick="setColor('skobleoff')"></a>
                    </li>
                    <li class="list-inline-item">
                        <a class="color7" href="javascript: void(0);" onclick="setColor('cyan')"></a>
                    </li>
                    <li class="list-inline-item">
                        <a class="color8" href="javascript: void(0);" onclick="setColor('slateblue')"></a>
                    </li>
                    <li class="list-inline-item">
                        <a class="color9" href="javascript: void(0);" onclick="setColor('yellow')"></a>
                    </li>
                </ul>

                <h6 class="title text-center pt-3 mb-0">Theme Option</h6>
                <ul class="text-center list-unstyled">
                    <li class="d-grid"><a href="javascript:void(0)" class="btn btn-sm btn-block btn-primary rtl-version t-rtl-light mt-2" onclick="setTheme('style-rtl')">RTL</a></li>
                    <li class="d-grid"><a href="javascript:void(0)" class="btn btn-sm btn-block btn-primary ltr-version t-ltr-light mt-2" onclick="setTheme('style')">LTR</a></li>
                    <li class="d-grid"><a href="javascript:void(0)" class="btn btn-sm btn-block btn-primary dark-rtl-version t-rtl-dark mt-2" onclick="setTheme('style-dark-rtl')">RTL</a></li>
                    <li class="d-grid"><a href="javascript:void(0)" class="btn btn-sm btn-block btn-primary dark-ltr-version t-ltr-dark mt-2" onclick="setTheme('style-dark')">LTR</a></li>
                    <li class="d-grid"><a href="javascript:void(0)" class="btn btn-sm btn-block btn-dark dark-version t-dark mt-2" onclick="setTheme('style-dark')">Dark</a></li>
                    <li class="d-grid"><a href="javascript:void(0)" class="btn btn-sm btn-block btn-dark light-version t-light mt-2" onclick="setTheme('style')">Light</a></li>
                </ul>

                <h6 class="title text-center pt-3 mb-0 border-top">Admin</h6>
                <ul class="text-center list-unstyled mb-0">
                    <li><a href="javascript:void(0)" target="_blank" class="btn btn-sm btn-block btn-success mt-2">Admin Dashboard</a></li>
                </ul>
            </div>
            <div class="bottom">
                <a href="javascript: void(0);" class="settings bg-white title-bg-dark shadow d-block"><i class="mdi mdi-cog ms-1 mdi-24px position-absolute mdi-spin text-primary"></i></a>
            </div>
        </div> -->
        <!-- end Style switcher -->
