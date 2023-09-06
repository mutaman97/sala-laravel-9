@extends('theme.elham.layouts.app')
@section('content')
<div id="wrapper">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="nav-breadcrumb" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-products">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item active"><a href="{{ url()->current() }}">{{ __($page_data->cart_page_title) ?? __('Cart') }}</a></li>
                    </ol>
                </nav>
            </div>
            <div class="col-12">
                <div class="shopping-cart">
                    <div class="row">
                        <div class="col-sm-12 col-lg-8">
                            <div class="left cart_page">
                                {{-- <h1 class="cart-section-title cart_count">{{ __('My Cart') }} ({{ Cart::instance('default')->count() }})</h1> --}}
                                <h1 class="cart-section-title">
                                {{ __('My Cart') }}
                                (<span class="cart_count">{{ Cart::instance('default')->count() }}</span>)
                                </h1>

                                    <!-- <div class="cart-item-image">
                                        <div class="img-cart-product">
                                            <a href="< ?= generateProductUrl($product); ?>">
                                                <img src="#" data-src="#" alt="#" class="lazyload img-fluid img-product" onerror="this.src='#'">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="cart-item-details">
                                            <div class="list-item">
                                                <label class="label-instant-download label-instant-download-sm"><i class="icon-download-solid"></i>{{ __('Instant Download') }}</label>
                                            </div>
                                        <div class="list-item">
                                            <a href="generateProductUrl">{{ __('product title') }}</a>
                                                <div class="lbl-enough-quantity">{{__('Out Of Stock')}}</div>
                                        </div>
                                        <div class="list-item seller">
                                            {{ __('By') }}&nbsp;<a href="generateProductUrlBySlug">$product->user_username</a>
                                        </div>
                                            <div class="list-item m-t-15">
                                                <label>{{ __('Unite Price') }}:</label>
                                                <strong class="lbl-price">

                                                        <span class="discount-rate-cart">
                                                        (< ?= discountRateFormat $cartItem->discount_rate)
                                                    </span>
                                                </strong>
                                            </div>
                                        <div class="list-item">
                                            <label>{{ __('Total') }}:</label>
                                            <strong class="lbl-price">priceDecimal $cartItem->total_price, $cartItem->currency</strong>
                                        </div>
                                            <div class="list-item">
                                                <label>{{ __('Vat') }}&nbsp;10%:</label>
                                                <strong class="lbl-price">66$</strong>
                                            </div>
                                        <a href="javascript:void(0)" class="btn btn-sm btn-outline-gray btn-cart-remove" onclick="removeFromCart('< ?= $cartItem->cart_item_id; ?>');"><i class="icon-close"></i> {{__('Remove')}}</a>
                                    </div>
                                    <div class="cart-item-quantity">
                                        <span>{{__('Quantity')}} . ': ' . $cartItem->quantity</span>
                                        <div class="number-spinner">
                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                    <button type="button" class="btn btn-default btn-spinner-minus" data-cart-item-id="< ?= $cartItem->cart_item_id; ?>" data-dir="dwn">-</button>
                                                </span>
                                                <input type="text" id="q-< ?= $cartItem->cart_item_id; ?>" class="form-control text-center" value="< ?= $cartItem->quantity; ?>" data-product-id="< ?= $cartItem->product_id; ?>" data-cart-item-id="< ?= $cartItem->cart_item_id; ?>">
                                                <span class="input-group-btn">
                                                    <button type="button" class="btn btn-default btn-spinner-plus" data-cart-item-id="< ?= $cartItem->cart_item_id; ?>" data-dir="up">+</button>
                                                </span>
                                            </div>
                                        </div>
                                    </div> -->

                            </div>
                            <a href="< ?= langBaseUrl(); ?>" class="btn btn-md btn-custom m-t-15"><i class="icon-arrow-left m-r-2"></i>{{__('Keep Shopping')}}</a>
                        </div>
                        <div class="col-sm-12 col-lg-4">
                            <div class="right">
                                <div class="row-custom m-b-15">
                                    <strong>{{ __('Subtotal') }}<span class="float-right cart_subtotal render_currency">{{ Cart::instance('default')->subtotal() }}</span></strong>
                                </div>
                                <div class="row-custom m-b-15">
                                    <strong>{{ __('Vat') }}<span class="float-right">{{ Cart::instance('default')->tax() }}</span></strong>
                                </div>
                                <div class="row-custom m-b-15">
                                    {{-- <strong>{{ __('You Save') }}<span class="float-right">{{ Cart::instance('default')->discount() }}</span></strong> --}}
                                </div>
                                {{-- <div class="row-custom">
                                    <strong>{{ __('Coupon') }}&nbsp;&nbsp;[{{ session()->get('coupon')['name'] ?? '' }}]&nbsp;&nbsp;<a href="javascript:void(0)" class="font-weight-normal" onclick="{{ Cart::setGlobalDiscount(0); }}">[{{ __('Remove') }}]</a><span class="float-right">-&nbsp;{{ Cart::instance('default')->discount() }}</span></strong>
                                </div> --}}
                                @if (session()->has('coupon'))
                                <div class="row-custom m-b-15">
                                    <form id="removeCartDiscountForm" action="{{ route('removediscount') }}" method="post">
                                        @csrf
                                        {{-- TODO Cart Discount JavaScript --}}
                                        <strong>{{ __('Coupon') }}&nbsp;&nbsp;[{{ session()->get('coupon')['name'] ?? '' }}]&nbsp;&nbsp;<a href="javascript:void(0)" class="font-weight-normal" onclick="removeCartDiscountCoupon();" type="button">[remove]</a><span class="float-right cart_discount render_currency">-&nbsp;{{ Cart::instance('default')->discount() }}</span></strong>
                                    </form>
                                </div>
                                @endif


                                <div class="row-custom">
                                    <p class="line-seperator"></p>
                                </div>
                                <div class="row-custom m-b-10">
                                    <strong>{{ __('Total') }}<span class="float-right render_currency cart_total">{{ Cart::instance('default')->total() }}</span></strong>
                                </div>




                                {{-- <div class="cart-total">
                                    <h4>{{ __('Cart Subtotal') }}<span class="cart_subtotal render_currency"> {{ Cart::instance('default')->subtotal() }}</span></h4>
                                </div>

                                <div class="single-cart-widget">
                                    <ul class="s-widget-cart-list">

                                        <li>{{ __('Tax') }}<span>{{ Cart::instance('default')->tax() }}</span></li>
                                        <li>{{ __('You Save') }}<span>{{ Cart::instance('default')->discount() }}</span></li>
                                        <li class="last">{{ __('Total') }}<span class="cart_tota pay-aml render_currency cart_total">{{ Cart::instance('default')->total() }}</span></li>

                                    </ul>
                                </div>  --}}



                                <div class="row-custom m-t-30 m-b-15">
                                    <!-- <a href="javascript:void(0)" class="btn btn-block">{{ __('Continue to checkout') }}</a>
                                    <a href="#" class="btn btn-block" data-toggle="modal" data-target="#loginModal">{{ __('Continue to checkout') }}</a>
                                    <a href="< ?= generateUrl('cart', 'shipping'); ?>" class="btn btn-block">{{ __('Continue to checkout') }}</a> -->
                                    <a href="{{ url('/checkout') }}" class="btn btn-block">{{ __('Continue to checkout') }}</a>
                                </div>
                                <div class="payment-icons">
                                    <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-src="{{ asset('theme/modesy/img/payment/visa.svg') }}" alt="visa" class="lazyload">
                                    <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-src="{{ asset('theme/modesy/img/payment/mastercard.svg') }}" alt="mastercard" class="lazyload">
                                    <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-src="{{ asset('theme/modesy/img/payment/maestro.svg') }}" alt="maestro" class="lazyload">
                                    <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-src="{{ asset('theme/modesy/img/payment/amex.svg') }}" alt="amex" class="lazyload">
                                    <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-src="{{ asset('theme/modesy/img/payment/discover.svg') }}" alt="discover" class="lazyload">
                                </div>

                                @if (!session()->has('coupon'))
                                    <hr class="m-t-30 m-b-30">
                                    <form action="{{ route('makediscount') }}" method="post" class="m-0 ajaxform_with_reload">
                                        @csrf
                                        <label class="font-600">{{ __('Discount Coupon') }}</label>
                                        <div class="cart-discount-coupon">
                                            <input type="text" name="coupon" class="form-control form-input" value="{{ old('coupon') ?? '' }}" maxlength="254" placeholder="{{ __('Enter Your Coupon') }}" required>
                                            <button type="submit" class="btn basicbtn btn-custom m-l-5">{{ __('Apply') }}</button>
                                        </div>
                                    </form>
                                    <!-- <div class="cart-coupon-error">
                                        <div class="text-danger">
                                            Error
                                        </div>
                                    </div> -->
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="shopping-cart-empty">
                    <p><strong class="font-600">{{ __('Your cart is empty') }}</strong></p>
                    <a href="{{ url('/products') }}" class="btn btn-lg btn-custom"><i class="icon-arrow-left"></i>&nbsp;{{ __('Keep Shopping') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>






























{{--
<!-- Start Breadcrumbs Area -->
<section class="breadcrumbs">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="bread-inner  gr-overlay" style="background-image:url({{ asset($page_data->cart_page_banner ?? '') }})">
					<div class="row">
						<!-- Breadcrumb-Content -->
						<div class="col-lg-6 col-md-8 col-12">
							<div class="breadcrumb-content">
								<h2 >{{ $page_data->cart_page_title ?? 'Cart' }}</h2>
								<p>{{ $page_data->cart_page_description ?? '' }}</p>
								<ul class="breadcrumb-nav">
									<li><a href="{{ url('/') }}"><i class="icofont-home"></i> {{ __('Home') }}</a></li>
									<li><i class="icofont-cart"></i> {{ $page_data->cart_page_title ?? 'Cart' }}</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--/ End Breadcrumbs Area -->


<div class="shopping-cart section-padding">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-12">
				<div class="checkout-cart">
					<h2>{{ __('Shopping Cart') }}</h2>
					<p><span class="cart_count">{{ Cart::instance('default')->count() }}</span> {{ __('Items') }}</p>
				</div>
				<!-- Shopping Summery -->
				<table class="table shopping-summery">
					<thead>
						<tr class="main-hading">
							<th>{{ __('Product Details') }}</th>

							<th class="text-center">{{ __('Quantity') }}</th>
							<th class="text-center">{{ __('Unit Price') }}</th>
						</tr>
					</thead>
					<tbody class="cart_page">


					</tbody>
				</table>
				<!--/ End Shopping Summery -->
				<div class="button-check">
					<a href="{{ url('/products') }}" class="btn">{{ __('Continue shopping') }}</a>
				</div>
			</div>
			<div class="col-lg-4 col-12">
				<!-- Total Amount -->
				<div class="total-amount">
					<div class="cart-total">
						<h4>{{ __('Cart Subtotal') }}<span class="cart_subtotal render_currency"> {{ Cart::instance('default')->subtotal() }}</span></h4>
					</div>

					<div class="single-cart-widget">
						<ul class="s-widget-cart-list">

							<li>{{ __('Tax') }}<span>{{ Cart::instance('default')->tax() }}</span></li>
							<li>{{ __('You Save') }}<span>{{ Cart::instance('default')->discount() }}</span></li>
							<li class="last">{{ __('Total') }}<span class="cart_tota pay-aml render_currency cart_total">{{ Cart::instance('default')->total() }}</span></li>

						</ul>
					</div>
					<div class="single-cart-widget coupon-area">
						<h4>{{ __('Have a coupon? Put that here') }}</h4>

						<form method="post" action="{{ route('makediscount') }}" class="ajaxform_with_reload">
							@csrf
							<input name="coupon" required="" placeholder="Enter Your Coupon">
							<button class="btn basicbtn" type="submit">{{ __('Apply') }}</button>
						</form>
					</div>
					<div class="button-check two">
						<a href="{{ url('/checkout') }}" class="btn">Checkout</a>
					</div>
				</div>
				<!--/ End Total Amount -->
			</div>
		</div>
	</div>
</div> --}}
@endsection
@push('js')
<script src="{{ asset('admin/js/sweetalert2.all.min.js') }}"></script>
<script src="{{ asset('admin/js/form.js') }}"></script>
@endpush
