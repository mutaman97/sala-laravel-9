<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="footer-top">
                    <div class="row">
                        <div class="col-12 col-md-3 footer-widget">
                            @php
                                $logoPath = asset('uploads/'.tenant('uid').'/logo.png?v='.tenant('cache_version'));
                                $defaultLogoPath = asset('theme/elham/img/logo.png');
                            @endphp
                            <div class="row-custom">
                                <div class="footer-logo">
                                    <a href="{{ url('/') }}">
                                        <img src="{{ isset($logoPath) && file_exists(public_path($logoPath)) ? $logoPath : $defaultLogoPath }}" alt="logo">
                                    </a>
                                </div>
                            </div>
                            <div class="row-custom">
                                <div class="footer-about">
                                    <p>{{ $site_settings->{Session::get('locale')}->footer_store_description ?? '' }}</p>
                                    <p>{{ $site_settings->{Session::get('locale')}->footer_store_address ?? '' }}</p>
                                    <p>{{ $site_settings->{Session::get('locale')}->footer_contact_number ?? '' }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-3 footer-widget">
                            <div class="nav-footer">
                                {{ ThemeMenu('footer_menu_1', 'theme.elham.components.footermenu') }}
                            </div>
                        </div>
                        <div class="col-12 col-md-3 footer-widget">
                            <div class="nav-footer">
                                {{ ThemeMenu('footer_menu_2', 'theme.elham.components.footermenu') }}
                            </div>
                        </div>
                        <div class="col-12 col-md-3 footer-widget">
                            <div class="row">
                                <div class="col-12">
                                    <h4 class="footer-title">{{ __('follow us') }}</h4>
                                    <div class="footer-social-links">
                                        <!-- include social media links-->
                                        <ul>
                                            @if(!empty($socialmedia->facebook_url))
                                                <li><a href="{{ $socialmedia->facebook_url }}" class="facebook" target="_blank"><i class="icon-facebook"></i></a></li>
                                            @endif
                                            @if(!empty($socialmedia->twitter_url))
                                                <li><a href="{{ $socialmedia->twitter_url }}" class="twitter" target="_blank"><i class="icon-twitter"></i></a></li>
                                            @endif
                                            @if(!empty($socialmedia->instagram_url))
                                                <li><a href="{{ $socialmedia->instagram_url }}" class="instagram" target="_blank"><i class="icon-instagram"></i></a></li>
                                            @endif
                                            @if(!empty($socialmedia->pinterest_url))
                                                <li><a href="{{ $socialmedia->pinterest_url }}" class="pinterest" target="_blank"><i class="icon-pinterest"></i></a></li>
                                            @endif
                                            @if(!empty($socialmedia->linkedin_url))
                                                <li><a href="{{ $socialmedia->linkedin_url }}" class="linkedin" target="_blank"><i class="icon-linkedin"></i></a></li>
                                            @endif
                                            @if(!empty($socialmedia->vk_url))
                                                <li><a href="{{ $socialmedia->vk_url }}" class="vk" target="_blank"><i class="icon-vk"></i></a></li>
                                            @endif
                                            @if(!empty($socialmedia->whatsapp_url))
                                                <li><a href="{{ $socialmedia->whatsapp_url }}" class="whatsapp" target="_blank"><i class="icon-whatsapp"></i></a></li>
                                            @endif
                                            @if(!empty($socialmedia->telegram_url))
                                                <li><a href="{{ $socialmedia->telegram_url }}" class="telegram" target="_blank"><i class="icon-telegram"></i></a></li>
                                            @endif
                                            @if(!empty($socialmedia->youtube_url))
                                                <li><a href="{{ $socialmedia->youtube_url }}" class="youtube" target="_blank"><i class="icon-youtube"></i></a></li>
                                            @endif
                                            @if(!empty($socialmedia->rss_url))
                                                <li><a href="{{ $socialmedia->rss_url }}" class="rss" target="_blank"><i class="icon-rss"></i></a></li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    @php
                                    $news_status=$site_settings->newsletter_status ?? 'no';
                                    @endphp

                                    @if($news_status == 'yes')
                                        <div class="newsletter">
                                            <div class="widget-newsletter">
                                                <h4 class="footer-title">{{ __('newsletter') }}</h4>
                                                <form  action="{{ route('customer.subscribe') }}" method="post" class="form-newsletter ajaxform_with_reset">
                                                    @csrf
                                                    <div class="newsletter">
                                                        <input type="email" name="email" class="newsletter-input" maxlength="199" placeholder="{{ __('Enter Email') }}" required>
                                                        <button type="submit" name="submit" value="form" class="newsletter-button basicbtn">{{ __('Subscribe') }}</button>
                                                    </div>
                                                    <input type="text" name="url">
                                                    {{-- This is modeys related code
                                                    <div id="form_newsletter_response"></div>
                                                    end --}}
                                                </form>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="footer-bottom">
                <div class="container">
                    <div class="copyright">
                        {{ $site_settings->{Session::get('locale')}->footer_copyright ?? '' }}
                    </div>
                    <div class="footer-payment-icons">
                        <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-src="{{ asset('theme/modesy/img/payment/visa.svg') }}" alt="visa" class="lazyload">
                        <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-src="{{ asset('theme/modesy/img/payment/mastercard.svg') }}" alt="mastercard" class="lazyload">
                        <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-src="{{ asset('theme/modesy/img/payment/maestro.svg') }}" alt="maestro" class="lazyload">
                        <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-src="{{ asset('theme/modesy/img/payment/amex.svg') }}" alt="amex" class="lazyload">
                        <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-src="{{ asset('theme/modesy/img/payment/discover.svg') }}" alt="discover" class="lazyload">
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- < ?php if (!isset($_COOKIE["modesy_cookies_warning"]) && $this->settings->cookies_warning): ? > -->
      {{-- <div class="cookies-warning">
        <div class="text">cookies_warning_text</div>
        <a href="javascript:void(0)" onclick="hide_cookies_warning();" class="icon-cl"> <i class="icon-close"></i></a>
      </div> --}}
<!-- < ?php endif; ? > -->

{{-- < ?php if (!empty($load_support_editor)):
    $this->load->view('support/_editor');
endif; ?> --}}

{{--
<!--  Footer -->
      <footer class="footer-area">
         <!--  Footer Top -->
         <div class="footer-top bg-full">
            <div class="container">
               <div class="row">
                  <div class="col-lg-3 col-md-6 col-12">
                     <!-- Footer Widget -->
                     <div class="footer-widget footer-about">

                        {{ content_format($site_settings->footer_column1 ?? '') }}
                     </div>
                     <!-- End Footer Widget -->
                  </div>
                  <div class="col-lg-3 col-md-6 col-12">
                     <!-- Footer Widget -->
                     <div class="footer-widget footer-links">
                       {{ content_format($site_settings->footer_column2 ?? '') }}
                     </div>
                     <!-- End Footer Widget -->
                  </div>
                  <div class="col-lg-3 col-md-6 col-12">
                     <!-- Footer Widget -->
                     <div class="footer-widget footer-links">
                        {{ content_format($site_settings->footer_column3 ?? '') }}
                     </div>
                     <!-- End Footer Widget -->
                  </div>
                  <div class="col-lg-3 col-md-6 col-12">
                     <!-- Footer Widget -->
                     <div class="footer-widget newslatter">
                         {{ content_format($site_settings->footer_column4 ?? '') }}
                         @php
                         $news_status=$site_settings->newsletter_status ?? 'no';
                         @endphp
                         @if($news_status == 'yes')
                        <div class="newsletter-inner">
                           <form  method="post" class="newsletter-area ajaxform_with_reset" action="{{ route('customer.subscribe') }}">
                              @csrf
                              <input type="email" name="email" placeholder="Your email address">
                              <button type="submit" class="basicbtn">{{ __('Subscribe Now') }}</button>
                           </form>
                        </div>

                        @endif
                     </div>
                     <!-- End Footer Widget -->
                  </div>
               </div>
            </div>
         </div>
         <!-- End Footer Top -->
         <!-- Copyright -->
         <div class="copyright">
            <div class="container">
               <div class="row ">
                  <div class="col-lg-6 col-md-6 col-12">
                     {{ content_format($site_settings->bottom_left_column ?? '') }}
                  </div>
                  <div class="col-lg-6 col-md-6 col-12">

                     {{ content_format($site_settings->bottom_right_column ?? '') }}
                  </div>
               </div>
            </div>
         </div>
         <!-- End Copyright -->
      </footer>
      <!-- End Footer --> --}}
