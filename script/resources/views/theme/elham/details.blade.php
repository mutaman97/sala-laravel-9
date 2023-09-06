@extends('theme.elham.layouts.app')
@section('content')

{{-- Product Details Start --}}
<div id="wrapper">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="nav-breadcrumb" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-products">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('Home') }}</a></li>
                        @if (isset($info->category))
                            @foreach ($info->category as $item)
                            <li class="breadcrumb-item"><a href="{{ $item->slug ? route('category', $item->slug) : url()->current() }}">{{ $item->name }}</a>
                            </li>
                            @endforeach
                        @endif
                        <li class="breadcrumb-item active"><a href="{{ url('/product',$info->slug) }}">{{ $info->title }}</a></li>
                    </ol>
                </nav>
            </div>
            <div class="col-12">
                {{-- <div class="product-details-container < ?= (!empty($video) || !empty($audio)) && countItems($productImages) < 2 ? 'product-details-container-digital' : ''; ?>"> --}}
                <div class="product-details-container">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-6">
                            <div id="product_slider_container">
                                {{-- < ?php $imageCount = 0;
                                        if (!empty($productImages)) {
                                            $imageCount = countItems($productImages);
                                        }
                                        if ($imageCount <= 1 && (!empty($video) || !empty($audio))):
                                            if (!empty($video)): ?>
                                                <div class="product-video-preview">
                                                    <video id="player" playsinline controls>
                                                        <source src="< ?= getProductVideoUrl($video); ?>" type="video/mp4">
                                                    </video>
                                                </div>
                                            < ?php endif;
                                            if (!empty($audio)):
                                                echo view('product/details/_audio_player');
                                            endif; ?>
                                        < ?php else: ?> --}}
                                <div class="product-slider-container">
                                    @if(!empty($galleries))
                                    <div class="left">
                                        <div class="product-slider-content">
                                            <div id="product_thumbnails_slider" class="product-thumbnails-slider">
                                                @foreach ($galleries ?? [] as $key => $row)
                                                <div class="item">
                                                    <div class="item-inner">
                                                        <img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" class="img-bg" alt="slider-bg">
                                                        <img style="width: 450px; height: 300px;" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-lazy="{{ asset($row) }}" class="img-thumbnail" alt="{{ $info->title ?? '' }}">
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                            @if (count($galleries) > 7)
                                            <div id="product-thumbnails-slider-nav" class="product-thumbnails-slider-nav">
                                                <button class="prev"><i class="icon-arrow-up"></i></button>
                                                <button class="next"><i class="icon-arrow-down"></i></button>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                    @endif
                                    <div class="right">
                                        <div class="product-slider-content">
                                            <div id="product_slider" class="product-slider gallery">
                                                <!-- Images slider -->
                                                @if(!empty($galleries))
                                                    @foreach ($galleries ?? [] as $key => $row)
                                                    <div class="item">
                                                        <a href="{{ asset($row) }}" title="">
                                                            <img src="{{ asset("theme/elham/img/slider_bg.png") }}" class="img-bg" alt="slider-bg">
                                                            <img style="width: 570px; height: 500px;" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-lazy="{{ asset($row) }}" alt="{{ $info->title ?? '' }}" class="img-product-slider">
                                                        </a>
                                                    </div>
                                                    @endforeach
                                                @else
                                                    <div class="item">
                                                        <a href="javascript:void(0)" title="">
                                                            <img src="{{ asset("theme/elham/img/slider_bg.png") }}" class="img-bg" alt="slider-bg">
                                                            <img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-lazy="{{ asset("theme/elham/img/no-image.jpg") }}" alt="{{ $info->title ?? '' }}" class="img-product-slider">
                                                        </a>
                                                    </div>
                                                @endif
                                                <!-- End Images slider -->
                                            </div>
                                            @if (count($galleries) > 1)
                                            <div id="product-slider-nav" class="product-slider-nav">
                                                <button class="prev"><i class="icon-arrow-left"></i></button>
                                                <button class="next"><i class="icon-arrow-right"></i></button>
                                            </div>
                                            @endif
                                        </div>
                                        {{-- <div class="row-custom text-center">
                                                < ?php if (!empty($video)): ?>
                                                    <button class="btn btn-lg btn-video-preview" data-toggle="modal" data-target="#productVideoModal"><i class="icon-play"></i>video</button>
                                                < ?php endif;
                                                if (!empty($audio)): ?>
                                                    <button class="btn btn-lg btn-video-preview" data-toggle="modal" data-target="#productAudioModal"><i class="icon-music"></i>audio</button>
                                                < ?php endif; ?>
                                        </div> --}}
                                    </div>
                                </div>
                                {{-- < ?php endif;
                                        if ($imageCount > 1 && !empty($video)): ?>
                                            <div class="modal fade" id="productVideoModal" role="dialog">
                                                <div class="modal-dialog modal-dialog-centered modal-product-video" role="document">
                                                    <div class="modal-content">
                                                        <button type="button" class="close" data-dismiss="modal"><i class="icon-close"></i></button>
                                                        <div class="product-video-preview m-0">
                                                            <video id="player" playsinline controls>
                                                                <source src="< ?= getProductVideoUrl($video); ?>" type="video/mp4">
                                                            </video>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        < ?php endif;
                                        if ($imageCount > 1 && !empty($audio)): ?>
                                            <div class="modal fade" id="productAudioModal" role="dialog">
                                                <div class="modal-dialog modal-dialog-centered modal-product-video" role="document">
                                                    <div class="modal-content">
                                                        <div class="row-custom" style="width: auto !important;">
                                                            <button type="button" class="close" data-dismiss="modal"><i class="icon-close"></i></button>
                                                            < ?= view('product/details/_audio_player'); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <  ?php endif;
                                        --}}

                                {{-- < ?php if (countItems($productImages) <= 7): ?> --}}
                                <style>
                                    .product-thumbnails-slider .slick-track {
                                        transform: none !important;
                                    }
                                </style>
                                {{-- < ?php endif; ?> --}}
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6">
                            <div id="response_product_details" class="product-content-details">
                                <div class="row">
                                    <div class="col-12">
                                        {{-- <div class="row-custom m-t-10">
                                                <form action="download-free-digital-file-post" method="post">

                                                    <input type="hidden" name="product_id" value="product->id">
                                                    <button class="btn btn-instant-download"><i class="icon-download-solid"></i>{{ __('Download') }}</button>
                                                </form>
                                            </div>
                                            <div class="row-custom m-t-10">
                                                <button class="btn btn-instant-download" data-toggle="modal" data-target="#loginModal"><i class="icon-download-solid"></i>download</button>
                                            </div>
                                            <label class="label-instant-download"><i class="icon-download-solid"></i>nstant_download</label> --}}
                                        <h1 class="product-title">{{ $info->title }}</h1>
                                            {{-- <label class="badge badge-warning badge-product-status">pending</label>
                                            <label class="badge badge-danger badge-product-status">hidden</label> --}}
                                        <div class="row-custom meta">
                                            <div class="product-details-user">
                                                {{ __('By') }}&nbsp;<a href="javascript:void(0)">{{ __('Admin') }}</a>
                                            </div>
                                            {{-- <span><i class="icon-comment"></i>{{__('9')}}</span> --}}
                                            <div class="product-details-review">
                                                @include('theme.elham.components._review_stars', ['rating' => $info->rating])
                                                <span>({{ $info->rating }})</span>
                                            </div>
                                            {{-- <span><i class="icon-heart"></i>5</span> --}}
                                            <span><i class="icon-eye"></i>{{ $info->visit_count_total }}</span>
                                        </div>
                                        <div class="row-custom price">
                                            <div id="product_details_price_container" class="d-inline-block">
                                                {{-- < ?php if ($product->is_sold == 1): ?> --}}

                                                    {{-- <strong class="lbl-price lbl-price-sold">
                                                            1115 $
                                                            <span class="price-line"></span>
                                                        </strong> --}}

                                                {{-- < ?php else:
                                                if ($product->is_free_product == 1):?> --}}

                                                {{-- <strong class="lbl-free">Free</strong> --}}

                                                {{-- TODO Price area hide the price bug --}}
                                                <strong class="lbl-price price_area">
                                                    <b class="discount-original-price">
                                                        {{ count($info->optionwithcategories ?? []) == 0 ? $info->price->old_price ?? '' : '' }}
                                                        <span class="price-line"></span>
                                                    </b>
                                                    {{ count($info->optionwithcategories ?? []) == 0 ? $info->price->price ?? '' : '' }}
                                                </strong>
                                                @if (!empty($info->discount))
                                                    <div class="discount-rate">
                                                        -{{ $info->discount->special_price }}&nbsp;
                                                        {{ $info->discount->price_type == 1 ? '%' : currency_symbol() }}
                                                    </div>
                                                @endif
                                                {{-- < ?php if ($product->is_sold == 1) : ?>--}}
                                                {{-- <strong class="lbl-sold">< ?= trans("sold"); ?></strong> --}}
                                                {{-- < ?phpendif;?> --}}
                                            </div>
                                            {{-- if ($showAsk == true):?>
                                            @guest
                                                <button class="btn btn-contact-seller" data-toggle="modal" data-target="#loginModal"><i class="icon-envelope"></i>{{ __('Ask question') }}</button>
                                            @endguest
                                            @auth
                                                <button class="btn btn-contact-seller" data-toggle="modal" data-target="#messageModal"><i class="icon-envelope"></i>{{ __('Ask question') }}</button>
                                            @endauth
                                            endif; ?> --}}
                                        </div>
                                        <div class="row-custom details">
                                            {{-- < ?php if ($product->listing_type != 'ordinary_listing' && $product->product_type != 'digital'): ?> --}}
                                            <div class="item-details">
                                                <div class="left">
                                                    <label>{{ __('Status') }}</label>
                                                </div>
                                                {{-- disabled by mutaman -- this is modesy js part --}}
                                                {{-- <div id="text_product_stock_status" class="right"> --}}
                                                <div class="right stock_status @if(count($info->optionwithcategories ?? []) != 0) none @endif">
                                                    <span class="stock_status_display status-in-stock">
                                                        @if(count($info->optionwithcategories ?? []) == 0)
                                                            <a href="javascript:void(0)" class="text-{{ $info->price->stock_status == 1 ? 'success' : 'danger' }}">
                                                                {{ $info->price->stock_status == 1 ? 'In Stock' : 'Out of stock' }}
                                                            </a>
                                                        @endif
                                                    </span>
                                                </div>
                                            </div>
                                            {{-- < ?php endif; --}}
                                            <div class="item-details">
                                                <div class="left">
                                                    <label>{{ __('Sku') }}</label>
                                                </div>
                                                <div class="right">
                                                    <span>{{ $info->price->sku }}</span>
                                                </div>
                                            </div>
                                            {{-- if ($product->product_type == 'digital' && !empty($product->files_included)): ?> --}}
                                            {{-- <div class="item-details">
                                                <div class="left">
                                                    <label>Files Included</label>
                                                </div>
                                                <div class="right">
                                                    <span>{{ __('5') }}</span>
                                                </div>
                                            </div> --}}
                                            {{-- < ?php endif; --}}

                                            @if(count($info->brands ?? []) != 0)
                                            <div class="item-details">
                                                <div class="left">
                                                    <label>{{ __('Brand') }}</label>
                                                </div>
                                                <div class="right">
                                                    <span>
                                                        @foreach($info->brands ?? [] as $row)
                                                            <a href="{{ url('/brand',$row->slug) }}" data-id="{{ $row->id }}">{{ $row->name }}</a>
                                                        @endforeach
                                                    </span>
                                                </div>
                                            </div>
                                            @endif
                                            @if(count($info->tags ?? []) != 0)
                                            <div class="item-details">
                                                <div class="left">
                                                    <label>{{ __('Tags') }}</label>
                                                </div>
                                                <div class="right">
                                                    <div class="product-tags">
                                                        <ul>
                                                            @foreach($info->tags ?? [] as $row)
                                                                <li>
                                                                    <a href="{{ url('/tag',$row->slug) }}" data-id="{{ $row->id }}">{{ $row->name }}</a>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                            @if(count($info->category ?? []) != 0)
                                            <div class="item-details">
                                                <div class="left">
                                                    <label>{{ __('Category') }}</label>
                                                </div>
                                                <div class="right">
                                                    <div class="product-tags">
                                                        <ul>
                                                            @foreach($info->category ?? [] as $row)
                                                                <li>
                                                                    <a href="{{ url('/category',$row->slug) }}" data-id="{{ $row->id }}">{{ $row->name }}</a>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                {{-- < ?php if ($product->listing_type == 'sell_on_site' || $product->listing_type == 'license_key'): ?> --}}
                                {{-- < form action="< ?= getProductFormData($product)->addToCartUrl; ?>" method="post" id="form_add_cart"> --}}
                                {{-- < ?= csrf_field(); ?> --}}
                                {{-- < ?php endif; --}}

                                {{-- if ($product->listing_type == 'bidding'): ?> --}}
                                {{-- < form action="< ?= getProductFormData($product)->addToCartUrl; ?>" method="post" id="form_request_quote"> --}}
                                {{-- < ?= csrf_field(); ?> --}}
                                {{-- < ?php endif; ?> --}}
                                {{-- <input type="hidden" name="product_id" value="$product->id"> --}}
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row-custom product-variations">
                                            <div class="row row-product-variation item-variation">
                                                {{-- < ?php if (!empty($fullWidthProductVariations)):
                                                    foreach ($fullWidthProductVariations as $variation):
                                                        echo view('product/details/_product_variations', ['variation' => $variation]);
                                                    endforeach;
                                                endif;
                                                if (!empty($halfWidthProductVariations)):
                                                    foreach ($halfWidthProductVariations as $variation):
                                                        echo view('product/details/_product_variations', ['variation' => $variation]);
                                                    endforeach;
                                                endif; ?> --}}
                                                <form class="product_option_form" method="post" action="{{ route('add.tocart') }}">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $info->id }}">
                                                    @if(count($info->optionwithcategories ?? []) == 0)
                                                    {{-- <input
                                                       class="none pricesvariationshide"
                                                       data-stockstatus="{{ $info->price->stock_status }}"
                                                       data-stockmanage="{{ $info->price->stock_manage }}"
                                                       data-sku="{{ $info->price->sku }}"
                                                       data-qty="{{ $info->price->qty }}"
                                                       data-oldprice="{{ $info->price->old_price }}"
                                                       data-price="{{ $info->price->price }}"
                                                       type="radio"
                                                       checked
                                                       > --}}
                                                   @else
                                                    @include('theme.elham.components.variations',['info'=>$info ?? ''])
                                                   @endif
                                               <!--/ End Description -->

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="row">
                                    <div class="col-12">
                                        < ?php $session = session();
                                        if ($session->getFlashdata('product_details_success')): ?>
                                            <div class="row-custom m-b-15">
                                                <div class="product-details-message success-message">
                                                    <p>
                                                        <i class="icon-check"></i>
                                                        {{__('Session Success')}}
                                                        < ?= $session->getFlashdata('product_details_success'); ?>
                                                    </p>
                                                </div>
                                            </div>
                                        < ?php elseif ($session->getFlashdata('product_details_error')): ?>
                                            <div class="row-custom m-b-15">
                                                <div class="product-details-message error-message">
                                                    <p>
                                                        <i class="icon-times"></i>
                                                        {{ __('Session Failed') }}
                                                        < ?= $session->getFlashdata('product_details_error'); ?>
                                                    </p>
                                                </div>
                                            </div>
                                        < ?php endif; ?>
                                    </div>
                                </div> --}}
                                <div class="row">
                                    <div class="col-12 product-add-to-cart-container">
                                        {{-- < ?php if ($product->is_sold != 1 && $product->listing_type != 'ordinary_listing' && $product->product_type != 'digital'): ?> --}}
                                        <div class="number-spinner">
                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                    <button type="button" class="btn btn-default btn-spinner-minus minus_qty" data-dir="dwn"  data-type="minus" data-field="quant[1]">-</button>
                                                </span>
                                                <input type="text" class="form-control text-center input_qty" name="qty" data-min="1" data-max="10" value="1">
                                                <span class="input-group-btn">
                                                    <button type="button" class="btn btn-default btn-spinner-plus qty_increase" data-dir="up" data-type="plus" data-field="quant[1]">+</button>
                                                </span>
                                            </div>
                                        </div>
                                        {{-- < ?php endif; --}}
                                        {{-- $buttton = getProductFormData($product)->button;
                                            if ($product->is_sold != 1 && !empty($buttton)):?> --}}
                                        <div class="button-container">
                                            {{-- < ?= $buttton; ?> --}}
                                            <button class="btn btn-md btn-block btn-product-cart add_to_cart_btn"><span class="btn-cart-icon"><i class="icon-cart-solid"></i></span>
                                                {{ __('Add to cart') }}
                                            </button>
                                        </div>
                                        {{-- < ?php endif; ?> --}}
                                        <div class="button-container button-container-wishlist">
                                            {{-- < ?php if ($isProductInWishlist == 1): ?> --}}
                                            <a href="javascript:void(0)" class="btn-wishlist btn-add-remove-wishlist wishlist_btn wishlist_row" data-id="{{ $info->id }}"><i class="icon-heart"></i><span>{{ __('Remove From Wishlist') }}</span></a>
                                            {{-- < ?php else: ?> --}}
                                            {{-- <a href="javascript:void(0)" class="btn-wishlist btn-add-remove-wishlist" data-product-id="product->id" data-type="details"><i class="icon-heart-o"></i><span>{{__('Add To Wishlist')}}</span></a> --}}
                                            {{-- < ?php endif; ?> --}}
                                        </div>
                                    </div>
                                    {{-- < ?php if (!empty($product->demo_url)): ?>
                                    <div class="col-12 product-add-to-cart-container">
                                        <div class="button-container">
                                            <a href="product->demo_url" target="_blank" class="btn btn-md btn-live-preview"><i class="icon-preview"></i>live_preview</a>
                                        </div>
                                    </div>
                                    < ?php endif; ?> --}}
                                </div>
                                {{-- </form> --}}
                                @include('theme.elham.components._share_product',['info'=>$info ?? ''])
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="product-description post-text-responsive">
                            <ul class="nav nav-tabs nav-tabs-horizontal" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="tab_description" data-toggle="tab" href="#tab_description_content" role="tab" aria-controls="tab_description" aria-selected="true">{{ __('Description') }}</a>
                                </li>
                                <!-- < ?php if (!empty($customFields)): ?> -->
                                {{-- <li class="nav-item">
                                        <a class="nav-link" id="tab_additional_information" data-toggle="tab" href="#tab_additional_information_content" role="tab" aria-controls="tab_additional_information" aria-selected="false">additional_information</a>
                                    </li> --}}
                                <!-- < ?php endif; -->
                                {{-- if ($shippingStatus == 1 || $productLocationStatus == 1): ?> --}}

                                {{-- TODO --}}
                                {{-- <li class="nav-item">
                                    <!-- < ?php if ($shippingStatus == 1 && $productLocationStatus != 1): ?> -->
                                    <a class="nav-link" id="tab_shipping" data-toggle="tab" href="#tab_shipping_content" role="tab" aria-controls="tab_shipping" aria-selected="false">shipping</a>
                                    <!-- < ?php elseif ($shippingStatus != 1 && $productLocationStatus == 1): ?> -->
                                    <a class="nav-link" id="tab_shipping" data-toggle="tab" href="#tab_shipping_content" role="tab" aria-controls="tab_shipping" aria-selected="false" onclick="loadProductShopLocationMap();">location</a>
                                    <!-- < ?php else: ?> -->
                                    <a class="nav-link" id="tab_shipping" data-toggle="tab" href="#tab_shipping_content" role="tab" aria-controls="tab_shipping" aria-selected="false" onclick="loadProductShopLocationMap();">shipping_location</a>
                                    <!-- < ?php endif; ?> -->
                                </li> --}}

                                <!-- < ?php endif;
                                    if ($generalSettings->reviews == 1): ?> -->
                                <li class="nav-item">
                                    <a class="nav-link" id="tab_reviews" data-toggle="tab" href="#tab_reviews_content" role="tab" aria-controls="tab_reviews" aria-selected="false">{{ __('Reviews') }} &nbsp;({{ number_format($info->rating, 1) }})</a>
                                </li>
                                <!-- < ?php endif; -->
                                {{-- if ($generalSettings->product_comments == 1): ?> --}}

                                {{-- TODO --}}
                                {{-- <li class="nav-item">
                                    <a class="nav-link" id="tab_comments" data-toggle="tab" href="#tab_comments_content" role="tab" aria-controls="tab_comments" aria-selected="false">comments &nbsp;($commentCount)</a>
                                </li> --}}

                                <!-- < ?php endif; -->
                                <!-- if ($generalSettings->facebook_comment_status == 1): ?> -->
                                <li class="nav-item">
                                    <a class="nav-link" id="tab_facebook_comments" data-toggle="tab" href="#tab_facebook_comments_content" role="tab" aria-controls="facebook_comments" aria-selected="false">{{ __('Facebook Comments') }}</a>
                                </li>
                                <!-- < ?php endif; ?> -->
                            </ul>
                            <div id="accordion" class="tab-content">
                                <div class="tab-pane fade show active" id="tab_description_content" role="tabpanel">
                                    <div class="card">
                                        <div class="card-header">
                                            <a class="card-link" data-toggle="collapse" href="#collapse_description_content">
                                                {{ __('Description') }}<i class="icon-arrow-down"></i><i class="icon-arrow-up"></i>
                                            </a>
                                        </div>
                                        <div id="collapse_description_content" class="collapse-description-content collapse show" data-parent="#accordion">
                                            <div class="description">
                                                {{ content_format($info->description->value ?? '') }}
                                            </div>
                                            {{-- <div class="row-custom text-right m-b-10">
                                                <!-- < ?php if (authCheck()):
                                                        if ($product->user_id != user()->id):?> -->
                                                <a href="javascript:void(0)" class="text-muted link-abuse-report" data-toggle="modal" data-target="#reportProductModal">
                                                    {{ __('Report This Product') }}
                                                </a>
                                                <!-- < ?php endif;
                                                    else: ?> -->
                                                <a href="javascript:void(0)" class="text-muted link-abuse-report" data-toggle="modal" data-target="#loginModal">
                                                        report_this_product
                                                    </a>
                                                <!-- < ?php endif; ?> -->
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>

                                {{-- TODO --}}
                                {{-- <!-- < ?php if (!empty($customFields)): ?> -->
                                <div class="tab-pane fade" id="tab_additional_information_content" role="tabpanel">
                                    <div class="card">
                                        <div class="card-header">
                                            <a class="card-link collapsed" data-toggle="collapse" href="#collapse_additional_information_content">
                                                additional_information<i class="icon-arrow-down"></i><i class="icon-arrow-up"></i>
                                            </a>
                                        </div>
                                        <div id="collapse_additional_information_content" class="collapse-description-content collapse" data-parent="#accordion">
                                            <table class="table table-striped table-product-additional-information">
                                                <tbody>
                                                    <!-- < ?php foreach ($customFields as $customField):
                                                            $fieldValue = getCustomFieldProductValues($customField, $product->id, selectedLangId());
                                                            if (!empty($fieldValue)):?> -->
                                                    <tr>
                                                        <td class="td-left">$customField->name_array</td>
                                                        <td class="td-right">fieldValue</td>
                                                    </tr>
                                                    <!-- < ?php endif;
                                                        endforeach; ?> -->
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div> --}}


                                {{-- TODO --}}
                                {{-- <!-- < ?php endif;
                                    if ($shippingStatus == 1 || $productLocationStatus == 1): ?> -->
                                <div class="tab-pane fade" id="tab_shipping_content" role="tabpanel">
                                    <div class="card">
                                        <div class="card-header">
                                            <!-- < ?php if ($shippingStatus == 1 && $productLocationStatus != 1): ?> -->
                                            <a class="card-link collapsed" data-toggle="collapse" href="#collapse_shipping_content">shipping<i class="icon-arrow-down"></i><i class="icon-arrow-up"></i></a>
                                            <!-- < ?php elseif ($shippingStatus != 1 && $productLocationStatus == 1): ?> -->
                                            <a class="card-link collapsed" data-toggle="collapse" href="#collapse_shipping_content" onclick="loadProductShopLocationMap();">location<i class="icon-arrow-down"></i><i class="icon-arrow-up"></i></a>
                                            <!-- < ?php else: ?> -->
                                            <a class="card-link collapsed" data-toggle="collapse" href="#collapse_shipping_content" onclick="loadProductShopLocationMap();">shipping_location<i class="icon-arrow-down"></i><i class="icon-arrow-up"></i></a>
                                            <!-- < ?php endif; ?> -->
                                        </div>
                                        <div id="collapse_shipping_content" class="collapse-description-content collapse" data-parent="#accordion">
                                            <table class="table table-product-shipping">
                                                <tbody>
                                                    <!-- < ?php if ($shippingStatus == 1): ?> -->
                                                    <tr>
                                                        <td class="td-left">< ?= trans('shipping_cost') ?></td>
                                                        <td class="td-right">
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <label class="control-label">select_your_location</label>
                                                                    </div>
                                                                    <div class="col-12 col-md-4 m-b-sm-15">
                                                                        <select id="select_countries_product" name="country_id" class="select2 form-control" data-placeholder="country" onchange="getStates(this.value, 'product'); $('#product_shipping_cost_container').empty();">
                                                                            <option></option>
                                                                            <!-- < ?php if (!empty($activeCountries)):
                                                                                        foreach ($activeCountries as $item): ?> -->
                                                                            <option value="item->id">item->name
                                                                            </option>
                                                                            <!-- < ?php endforeach;
                                                                                    endif; ?> -->
                                                                        </select>
                                                                    </div>
                                                                    <div id="get_states_container_product" class="col-12 col-md-4">
                                                                        <select id="select_states_product" name="state_id" class="select2 form-control" data-placeholder="state" onchange="getProductShippingCost(this.value, 'productid');">
                                                                            <option></option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div id="product_shipping_cost_container" class="product-shipping-methods"></div>
                                                            <div class="row-custom">
                                                                <div class="product-shipping-loader">
                                                                    <div class="spinner">
                                                                        <div class="bounce1"></div>
                                                                        <div class="bounce2"></div>
                                                                        <div class="bounce3"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <!-- < ?php if (!empty($deliveryTime)): ?> -->
                                                    <tr>
                                                        <td class="td-left">< ?= trans('delivery_time') ?></td>
                                                        <td class="td-right"><span>deliveryTime</span></td>
                                                    </tr>
                                                    <!-- < ?php endif;
                                                        endif;
                                                        if ($productLocationStatus == 1): ?> -->
                                                    <tr>
                                                        <td class="td-left">shop_location</td>
                                                        <td class="td-right"><span id="span_shop_location_address">getLocation</span></td>
                                                    </tr>
                                                    <!-- < ?php endif; ?> -->
                                                </tbody>
                                            </table>
                                            <!-- < ?php if ($productLocationStatus == 1): ?> -->
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="product-location-map">
                                                        <iframe id="iframe_shop_location_address" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- < ?php endif; ?> -->
                                        </div>
                                    </div>
                                </div> --}}

                                <div class="tab-pane fade" id="tab_reviews_content" role="tabpanel">
                                    <div class="card">
                                        <div class="card-header">
                                            <a class="card-link collapsed" data-toggle="collapse" href="#collapse_reviews_content">
                                                {{ __('Reviews') }}<i class="icon-arrow-down"></i><i class="icon-arrow-up"></i>
                                            </a>
                                        </div>
                                        <div id="collapse_reviews_content" class="collapse-description-content collapse" data-parent="#accordion">
                                            <div id="review-result">
                                                <div class="reviews-container">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="review-total">
                                                                @include('theme.elham.components._review_stars',['rating'=>$info->rating ?? ''])
                                                                <label class="label-review">{{ __('Reviews') }}&nbsp;({{ number_format($info->rating, 1) }})</label>
                                                                @if ($hasPurchased)
                                                                    <button type="button" data-product-id="product->id" class="btn btn-sm btn-custom display-flex align-items-center m-l-15" data-toggle="modal" data-target="#rateProductModal" onclick="$('#review_product_id').val('product->id');">
                                                                        {{ __('Add Review') }}
                                                                    </button>
                                                                @endif
                                                            </div>
                                                            @if($info->rating != null && $info->rating != 0)
                                                                <ul class="list-unstyled list-reviews list_reviews">
                                                                    {{-- @foreach ($info->reviews as $review)
                                                                        <li class="media">
                                                                            <a href="javascript:void(0)">
                                                                                <img src="{{ gravatar($review->user->email) }}" alt="{{ $review->user->name }}">
                                                                            </a>
                                                                            <div class="media-body">
                                                                                <div class="row-custom">
                                                                                    @include('theme.elham.components._review_stars',['rating'=>$review->rating ?? ''])
                                                                                </div>
                                                                                <div class="row-custom">
                                                                                    <a href="javascript:void(0)">
                                                                                        <h5 class="username">{{ $review->user->name }}</h5>
                                                                                    </a>
                                                                                </div>
                                                                                <div class="row-custom">
                                                                                    <div class="review">
                                                                                        {{ $review->comment }}
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row-custom">
                                                                                    <span class="date">{{ $review->created_at->diffForHumans() }}</span>
                                                                                </div>
                                                                            </div>
                                                                            <a href="javascript:void(0)" class="text-muted link-abuse-report" data-toggle="modal" data-target="#reportReviewModal" onclick="$('#report_review_id').val('review->id');">
                                                                                {{ __('Report') }}
                                                                            </a>
                                                                        </li>
                                                                    @endforeach --}}
                                                                </ul>
                                                            @else
                                                            <p class="no-comments-found">{{ __('No Reviews Found') }}</p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>

                                                {{-- Report Review Modal --}} {{-- TODO --}}
                                                <!-- < ?= view('partials/_modal_report_review', ['subject' => esc($title), 'productId' => $product->id]); ?> -->
                                                @include('theme.elham.components._modal_report_review', ['info' => $info ?? '',])
                                                {{-- TODO  -- this affect add to cart button --}}
                                                {{-- Review Product Modal --}}
                                                @include('theme.elham.components._modal_review_product', ['info' => $info ?? '',])

                                                {{-- TODO --}}
                                                {{-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">{{ __('Leave a feedback') }}</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <form method="post" class="form review_form ajaxform_with_reload">
                                                                @csrf
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="col-sm-12">
                                                                            <label for="recipient-name" class="col-form-label">{{ __('Rating') }}</label>
                                                                            <div class="product-availity">
                                                                                <select name="rating" class="rating_option">
                                                                                    <option value="5">{{ __('5 Star') }}</option>
                                                                                    <option value="4">{{ __('4 Star') }}</option>
                                                                                    <option value="3">{{ __('3 Star') }}</option>
                                                                                    <option value="2">{{ __('2 Star') }}</option>
                                                                                    <option value="1">{{ __('1 Star') }}</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12">
                                                                            <label for="feedback">{{ __('Feedback') }}</label>
                                                                            <textarea id="feedback" maxlength="200" class="form-control feedback" name="feedback"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
                                                                    <button type="submit" class="btn btn-primary basicbtn">{{ __('Leave') }}</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- TODO --}}
                                <!-- < ?php endif;
                                    if ($generalSettings->product_comments == 1): ?> -->
                                {{-- <div class="tab-pane fade" id="tab_comments_content" role="tabpanel">
                                    <div class="card">
                                        <div class="card-header">
                                            <a class="card-link collapsed" data-toggle="collapse" href="#collapse_comments_content">
                                                {{ __('Comments') }}<i class="icon-arrow-down"></i><i class="icon-arrow-up"></i>
                                            </a>
                                        </div>
                                        <div id="collapse_comments_content" class="collapse-description-content collapse" data-parent="#accordion">
                                            <input type="hidden" value="commentLimit" id="product_comment_limit">
                                            <div class="comments-container">
                                                <div class="row">
                                                    <div class="col-12 col-md-6">
                                                        <!-- < ?= view('product/details/_comments'); ?> -->
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <div class="col-comments-inner">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="row-custom row-comment-label">
                                                                        <label class="label-comment">add_a_comment</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <form id="form_add_comment">
                                                                        <input type="hidden" name="product_id" value="product->id">
                                                                        <!-- < ?php if (!authCheck()): ?> -->
                                                                        <div class="form-row">
                                                                            <div class="form-group col-md-6">
                                                                                <input type="text" name="name" id="comment_name" class="form-control form-input" placeholder="name">
                                                                            </div>
                                                                            <div class="form-group col-md-6">
                                                                                <input type="email" name="email" id="comment_email" class="form-control form-input" placeholder="email_address">
                                                                            </div>
                                                                        </div>
                                                                        <!-- < ?php endif; ?> -->
                                                                        <div class="form-group">
                                                                            <textarea name="comment" id="comment_text" class="form-control form-input form-textarea" placeholder="comment"></textarea>
                                                                        </div>
                                                                        <!-- < ?php if (!authCheck()): ?> -->
                                                                        <div class="form-group">
                                                                            <!-- < ?php reCaptcha('generate'); ?> -->
                                                                        </div>
                                                                        <!-- < ?php endif; ?> -->
                                                                        <div class="form-group">
                                                                            <button type="submit" class="btn btn-md btn-custom">submit</button>
                                                                        </div>
                                                                    </form>
                                                                    <div id="message-comment-result" class="message-comment-result"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}


                                <!-- < ?php endif;
                                    if ($generalSettings->facebook_comment_status == 1): ?> -->
                                <div class="tab-pane fade" id="tab_facebook_comments_content" role="tabpanel">
                                    <div class="card">
                                        <div class="card-header">
                                            <a class="card-link collapsed" data-toggle="collapse" href="#collapse_facebook_comments_content">
                                                {{ __('Facebook Comments') }}<i class="icon-arrow-down"></i><i class="icon-arrow-up"></i>
                                            </a>
                                        </div>
                                        <div id="collapse_facebook_comments_content" class="collapse-description-content collapse" data-parent="#accordion">
                                            <div class="fb-comments" data-href="current_url" data-width="100%" data-numposts="5" data-colorscheme="light"></div>
                                        </div>
                                    </div>
                                </div>
                                <!-- < ?php endif; ?> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 section section-category-products latest_product_section">
                <div class="section-header">
                    <h3 class="title">{{ $home_data->product_page_related_title ?? __('Related Products') }}</h3>
                    <p class="small-title">{{ $home_data->product_page_related_short_title ?? __('you may also like') }}</p>
                </div>
                <div class="row-custom category-slider-container">
                    <div class="row row-product" id="slider_special_offers">
                        <div class="related_product_slider_preloader">
                        </div>

                        <div class="related-slider">
                        </div>
                    </div>

                    <div id="index-products-slider-nav" class="index-products-slider-nav">
                        <button class="prev prev-owl"><i class="icon-arrow-left"></i></button>
                        <button class="next next-owl"><i class="icon-arrow-right"></i></button>
                    </div>
                </div>
            </div>
            <!-- < ?= view('partials/_ad_spaces', ['adSpace' => 'product_2', 'class' => 'mb-4']); ?> -->
        </div>
    </div>
</div>

{{-- TODO --}}
<!-- < ?= view('partials/_modal_send_message', ['subject' => esc($title), 'productId' => $product->id]); ?> -->
@include('theme.elham.components._modal_send_message', ['info' => $info ?? '',])
@include('theme.elham.components._modal_report_product', ['info' => $info ?? '',])

{{-- < ?php endif;
if ($generalSettings->facebook_comment_status == 1):
    echo $generalSettings->facebook_comment;
endif; ?> --}}

@endsection

@php
$randomNumber = rand();
@endphp

@push('js')
    {{-- added by mutaman for gravatar in details.js --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"></script>
    {{-- end --}}
    <script src="{{ asset('admin/js/sweetalert2.all.min.js') }}?v={{ $randomNumber }}"></script>
    <script src="{{ asset('admin/js/form.js') }}?v={{ $randomNumber }}"></script>
    <script src="{{ asset('theme/jquery.unveil.js') }}?v={{ $randomNumber }}"></script>
    <script src="{{ asset('theme/elham/js/details.js') }}?v={{ $randomNumber }}"></script>

    <script type="text/javascript">
    "use strict";
    getreviews(base_url+'/get-product-reviews/'+{{$info->id}});
    </script>
@endpush
