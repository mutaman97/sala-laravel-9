{{-- <style>
    /* todo these three lines */
body {font-family: "Open Sans", Helvetica, sans-serif}
        .index_bn_1 {-ms-flex: 0 0 50%;flex: 0 0 50%;max-width: 50%;}  .index_bn_2 {-ms-flex: 0 0 50%;flex: 0 0 50%;max-width: 50%;}  .index_bn_3 {-ms-flex: 0 0 33.33%;flex: 0 0 33.33%;max-width: 33.33%;}
        .index_bn_5 {-ms-flex: 0 0 33.33%;flex: 0 0 33.33%;max-width: 33.33%;}  .index_bn_4 {-ms-flex: 0 0 33.33%;flex: 0 0 33.33%;max-width: 33.33%;}

    a:active,a:focus,a:hover{color:<?=$theme_color?>}.btn-custom, .modal-newsletter .btn,.newsletter-button{background-color:<?=$theme_color?>;border-color:<?=$theme_color?>}
    .btn-block{background-color:<?=$theme_color?>}.btn-outline{border:1px solid <?=$theme_color?>;color:<?=$theme_color?>}.btn-outline:hover{background-color:<?=$theme_color?>!important}
    .btn-filter-products-mobile{border:1px solid <?=$theme_color?>;background-color:<?=$theme_color?>}.form-control:focus{border-color:<?=$theme_color?>}.link{color:<?=$theme_color?>!important}
    .link-color{color:<?=$theme_color?>}.top-search-bar .btn-search{background-color:<?=$theme_color?>}
    .nav-top .nav-top-right .nav li a:active,.nav-top .nav-top-right .nav li a:focus,.nav-top .nav-top-right .nav li a:hover{color:<?=$theme_color?>}
    .nav-top .nav-top-right .nav li .btn-sell-now{background-color:<?=$theme_color?>!important}
    .nav-main .navbar>.navbar-nav>.nav-item:hover .nav-link:before{background-color:<?=$theme_color?>}
    .li-favorites a i{color:<?=$theme_color?>}.product-share ul li a:hover{color:<?=$theme_color?>}.pricing-card:after{background-color:<?=$theme_color?>}
    .selected-card{-webkit-box-shadow:0 3px 0 0 <?=$theme_color?>;box-shadow:0 3px 0 0 <?=$theme_color?>}.selected-card .btn-pricing-button{background-color:<?=$theme_color?>}
    .profile-buttons .social ul li a:hover{background-color:<?=$theme_color?>;border-color:<?=$theme_color?>}.btn-product-promote{background-color:<?=$theme_color?>}
    .contact-social ul li a:hover{background-color:<?=$theme_color?>;border-color:<?=$theme_color?>}.price-slider .ui-slider-horizontal .ui-slider-handle{background:<?=$theme_color?>}
    .price-slider .ui-slider-range{background:<?=$theme_color?>}.p-social-media a:hover{color:<?=$theme_color?>}.blog-content .blog-categories .active a{background-color:<?=$theme_color?>}
    .nav-payout-accounts .active,.nav-payout-accounts .show>.nav-link{background-color:<?=$theme_color?>!important}
    .pagination .active a{border:1px solid <?=$theme_color?>!important;background-color:<?=$theme_color?>!important}
    .pagination li a:active,.pagination li a:focus,.pagination li a:hover{background-color:<?=$theme_color?>;border:1px solid <?=$theme_color?>}
    .spinner>div{background-color:<?=$theme_color?>}::selection{background:<?=$theme_color?>!important}::-moz-selection{background:<?=$theme_color?>!important}
    .cookies-warning a{color:<?=$theme_color?>}.custom-checkbox .custom-control-input:checked~.custom-control-label::before{background-color:<?=$theme_color?>}
    .custom-control-input:checked~.custom-control-label::before{border-color:<?=$theme_color?>;background-color:<?=$theme_color?>}
    .custom-control-variation .custom-control-input:checked~.custom-control-label{border-color:<?=$theme_color?>!important}.btn-wishlist .icon-heart{color:<?=$theme_color?>}
    .product-item-options .item-option .icon-heart{color:<?=$theme_color?>}
    .mobile-language-options li .selected,.mobile-language-options li a:hover{color:<?=$theme_color?>;border:1px solid <?=$theme_color?>}
    .mega-menu .link-view-all, .link-add-new-shipping-option{color:<?=$theme_color?>!important;}
    .mega-menu .menu-subcategories ul li .link-view-all:hover{border-color:<?=$theme_color?>!important}.custom-select:focus{border-color:<?=$theme_color?>}
    .all-help-topics a{color:<?=$theme_color?>}


    .scrollup i{background-color:<?=$theme_color?>}
    </style>


<script>
var mds_config = {base_url: "{{ url('/') }}", lang_base_url: "{{ url('/') }}", sys_lang_id: "{{ str_replace('_', '-', app()->getLocale()) }}",
thousands_separator: ",", csfr_token_name: "csrf-token", csfr_cookie_name: "{{ csrf_token() }}", txt_all: "{{ __('All') }}",
txt_no_results_found: "{{ __('No Results Found') }}", sweetalert_ok: "{{ __('Ok') }}", sweetalert_cancel: "{{ __('Cancel') }}",
msg_accept_terms: "{{ __('You agree to the terms of usage') }}", cart_route: "/cart",

// todo this line
slider_fade_effect: "1", is_recaptcha_enabled: "true",


rtl: @if (Session::get('locale') == 'ar') true @else false @endif,
txt_add_to_cart: "{{ __('Add to cart') }}", txt_added_to_cart: "{{ __('Added to cart') }}", txt_add_to_wishlist: "{{ __('Add to wishlist') }}",
txt_remove_from_wishlist: "{{ __('Remove from wishlist') }}"};if(mds_config.rtl==1){mds_config.rtl=true;}
</script> --}}











<style>:root {--vr-color-main: <?=$theme_color?>;}
{{--     <?php if(!empty($indexBannersArray)):foreach ($indexBannersArray as $bannerSet):foreach ($bannerSet as $banner):?>
    .index_bn_<?= $banner->id;?>
    {-ms-flex: 0 0 <?= $banner->banner_width;?>%;flex: 0 0 <?= $banner->banner_width;?>%;max-width: <?= $banner->banner_width;?>%;}
    <?php endforeach; endforeach; endif; ?> --}}

    @if(!empty($indexBannersArray))
        @foreach ($indexBannersArray as $banner)
                .index_bn_{{ $banner->id }} {
                    -ms-flex: 0 0 {{ json_decode($banner->slug)->banner_width ?? '' }}%;
                    flex: 0 0 {{ json_decode($banner->slug)->banner_width ?? '' }}%;
                    max-width: {{ json_decode($banner->slug)->banner_width ?? '' }}%;
                }
        @endforeach
    @endif

    /* <?php if (!empty($adSpaces)):foreach ($adSpaces as $item):if (!empty($item->desktop_width) && !empty($item->desktop_height)): echo '.bn-ds-'.$item->id. '{width: ' . $item->desktop_width . 'px; height: ' . $item->desktop_height . 'px;}'; echo '.bn-mb-'.$item->id. '{width: ' . $item->mobile_width . 'px; height: ' . $item->mobile_height . 'px;}';endif;endforeach;endif; ?> */

    .modal-newsletter .newsletter-form{min-height:350px;height:auto}
    .form-logout{display:block;margin:4px}
    .btn-logout{display:block;width:100%;background-color:transparent!important;border:0!important;box-shadow:none!important;padding:4px 15px;line-height:24px;color:#606060!important;white-space:nowrap;text-align: left}
    .btn-logout:hover{background-color:#f5f5f5!important}
    .btn-logout-mobile{color:#222!important;font-size:15px!important;padding:8px 15px}
    .btn-logout-mobile:hover{background-color:transparent!important}
    @if (Session::get('locale') == 'ar')
     .btn-logout{text-align:right}.modal-newsletter .newsletter-form {padding: 60px 30px 60px 30px !important;}
     .modal-newsletter .modal-body .close {right: auto;left: 5px;}
     @endif
     .scrollup i{background-color:<?=$theme_color?>}

     .avatar.avatar-ex-sm {
      max-height: 25px;
    }

</style>

<script>
    var MdsConfig = {baseURL: '{{ url('/') }}', langBaseURL: "{{ url('/') }}", sysLangId: "{{ str_replace('_', '-', app()->getLocale()) }}",
    thousandsSeparator: ",", csrfTokenName: 'csrf_token', csrfCookieName: '{{ csrf_token() }}', textAll: "{{ __('All') }}",
    textNoResultsFound: "{{ __('No Results Found') }}", textOk: "{{ __('Ok') }}", textCancel: "{{ __('Cancel') }}",
    textAcceptTerms: "{{ __('You agree to the terms of usage') }}", cartRoute: "/cart",

    sliderFadeEffect: "1", isRecaptchaEnabled: "0", rtl: @if (Session::get('locale') == 'ar') true @else false @endif,
    textAddtoCart: "{{ __('Add to cart') }}", textAddedtoCart: "{{ __('Added to cart') }}",
    textAddtoWishlist: "{{ __('Add to wishlist') }}", textRemoveFromWishlist: "{{ __('Remove from wishlist') }}"};
</script>
