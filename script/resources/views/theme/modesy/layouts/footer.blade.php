<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="footer-top">
                    <div class="row">
                        <div class="col-12 col-md-3 footer-widget">
                            <div class="row-custom">
                                <div class="footer-logo">
                                    <a href="lang_base_ur"><img src="get_logo" alt="logo"></a>
                                </div>
                            </div>
                            <div class="row-custom">
                                <div class="footer-about">
                                    <!-- < ?= $this->settings->about_footer; ?> -->
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-3 footer-widget">
                            <div class="nav-footer">
                                <div class="row-custom">
                                    <h4 class="footer-title">{{ __('quick links') }}</h4>
                                </div>
                                <div class="row-custom">
                                    <ul>
                                        <li><a href="lang_base_url">{{ __('quick links') }}</a></li>

                                                    <li><a href="/ljjj">{{ __('menu title') }}</a></li>
                                                    <li><a href="/ljjj">{{ __('menu title') }}</a></li>
                                                    <li><a href="/ljjj">{{ __('menu title') }}</a></li>
                                                    <li><a href="/ljjj">{{ __('menu title') }}</a></li>

                                        <li><a href="/help_center">{{ __('help center') }}</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-3 footer-widget">
                            <div class="nav-footer">
                                <div class="row-custom">
                                    <h4 class="footer-title">{{ __('footer information') }}</h4>
                                </div>
                                <div class="row-custom">
                                    <ul>

                                                    <li><a href="item_link">{{ __('menu title') }}</a></li>
                                                    <li><a href="item_link">{{ __('menu title') }}</a></li>
                                                    <li><a href="item_link">{{ __('menu title') }}</a></li>


                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-3 footer-widget">
                            <div class="row">
                                <div class="col-12">
                                    <h4 class="footer-title">{{ __('follow us') }}</h4>
                                    <div class="footer-social-links">
                                        <!-- in clude social links-->

                                        <ul>
        <li><a href="/" class="facebook"><i class="icon-facebook"></i></a></li>

        <li><a href="/" class="twitter"><i class="icon-twitter"></i></a></li>

        <li><a href="/" class="instagram"><i class="icon-instagram"></i></a></li>

        <li><a href="/" class="pinterest"><i class="icon-pinterest"></i></a></li>

        <li><a href="/" class="linkedin"><i class="icon-linkedin"></i></a></li>

        <li><a href="/" class="vk"><i class="icon-vk"></i></a></li>

        <li><a href="/" class="whatsapp"><i class="icon-whatsapp"></i></a></li>

        <li><a href="/" class="telegram"><i class="icon-telegram"></i></a></li>

        <li><a href="/" class="youtube"><i class="icon-youtube"></i></a></li>

        <li><a href="/" class="rss"><i class="icon-rss"></i></a></li>

</ul>


                                    </div>
                                </div>
                            </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="newsletter">
                                            <div class="widget-newsletter">
                                                <h4 class="footer-title">{{ __('newsletter') }}</h4>
                                                <form id="form_newsletter_footer" class="form-newsletter">
                                                    <div class="newsletter">
                                                        <input type="email" name="email" class="newsletter-input" maxlength="199" placeholder="{{ __('Enter Email') }}" required>
                                                        <button type="submit" name="submit" value="form" class="newsletter-button">{{ __('Subscribe') }}</button>
                                                    </div>
                                                    <input type="text" name="url">
                                                    <div id="form_newsletter_response"></div>
                                                </form>
                                            </div>
                                        </div>
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
                        {{ content_format($site_settings->bottom_center_column ?? '') }}
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
    <!-- <div class="cookies-warning">
        <div class="text">cookies_warning_text</div>
        <a href="javascript:void(0)" onclick="hide_cookies_warning();" class="icon-cl"> <i class="icon-close"></i></a>
    </div> -->
<!-- < ?php endif; ? > -->




{{-- < ?php if (!empty($load_support_editor)):
    $this->load->view('support/_editor');
endif; ?> --}}

<!-- Start Footer Area  -->
      {{-- <footer class="footer">
         <div class="footer-middle">
            <div class="container">
               <div class="bottom-inner">
                  <div class="row">
                     <div class="col-lg-3 col-md-6 col-12">
                        <div class="single-footer our-app">
                           {{ content_format($site_settings->footer_column1 ?? '') }}
                        </div>
                     </div>
                     <div class="col-lg-3 col-md-6 col-12">
                        <div class="single-footer f-contact">
                            {{ content_format($site_settings->footer_column2 ?? '') }}
                        </div>
                     </div>
                     <div class="col-lg-3 col-md-6 col-12">
                        <div class="single-footer f-link">
                           {{ content_format($site_settings->footer_column3 ?? '') }}
                        </div>
                     </div>
                     <div class="col-lg-3 col-md-6 col-12">
                        <div class="single-footer f-link">
                            {{ content_format($site_settings->footer_column4 ?? '') }}
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="footer-bottom">
            <div class="container">
               <div class="inner-content">
                  <div class="row align-items-center">
                     <div class="col-lg-4 col-12">
                        <div class="payment-gateway">
                            {{ content_format($site_settings->bottom_left_column ?? '') }}
                        </div>
                     </div>
                     <div class="col-lg-4 col-12">
                        <div class="copyright">
                           {{ content_format($site_settings->bottom_center_column ?? '') }}
                        </div>
                     </div>
                     <div class="col-lg-4 col-12">
                        {{ content_format($site_settings->bottom_right_column ?? '') }}
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </footer> --}}

      <!-- End Footer Area  -->
      <!--  scroll-top -->

       {{-- @if($site_settings->scroll_to_top ?? 'yes' == 'yes')
      <a href="#" class="scroll-top btn-hover"><i class="icofont-long-arrow-up"></i></a>
      @endif --}}