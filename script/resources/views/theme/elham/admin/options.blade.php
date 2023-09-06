@extends('layouts.backend.app')
@section('head')
@include('layouts.backend.partials.headersection',['title'=>'Theme Settings'])
@endsection

@section('style')
<link rel="stylesheet" href="{{ asset('admin/assets/css/summernote/summernote-bs4.css') }}">
<link rel="stylesheet" href="{{ asset('admin/plugins/dropzone/dropzone.css') }}">
@endsection
@section('content')
<div class="row">
	<div class="col-md-4">
		<div class="card">
			<div class="card-header">
				{{-- <h4>{{ __('Theme Settings') }}</h4> --}}
			</div>
			<div class="card-body">
				{{-- <div class="row"> --}}
					{{-- <div class="col-12 col-sm-12 col-md-4"> --}}
						<ul class="nav nav-pills flex-column" id="myTab4" role="tablist">
							<li class="nav-item">
								<a class="nav-link active"  data-toggle="tab" href="#home_page" role="tab" aria-controls="home" aria-selected="true">{{ __('Home Page') }}</a>
							</li>
							<li class="nav-item">
								<a class="nav-link"  data-toggle="tab" href="#product_page" role="tab" aria-controls="profile" aria-selected="false">{{ __('Product Page') }}</a>
							</li>
							<li class="nav-item">
								<a class="nav-link"  data-toggle="tab" href="#cart_page" role="tab" aria-controls="profile" aria-selected="false">{{ __('Cart Page') }}</a>
							</li>
							<li class="nav-item">
								<a class="nav-link"  data-toggle="tab" href="#wishlist_page" role="tab" aria-controls="profile" aria-selected="false">{{ __('Wishlist Page') }}</a>
							</li>
							<li class="nav-item">
								<a class="nav-link"  data-toggle="tab" href="#checkout_page" role="tab" aria-controls="profile" aria-selected="false">{{ __('Checkout Page') }}</a>
							</li>

							<li class="nav-item">
								<a class="nav-link"  data-toggle="tab" href="#products_page" role="tab" aria-controls="profile" aria-selected="false">{{ __('Products Page') }}</a>
							</li>
							<li class="nav-item">
								<a class="nav-link"  data-toggle="tab" href="#deal_page" role="tab" aria-controls="profile" aria-selected="false">{{ __('Deal Page') }}</a>
							</li>
							<li class="nav-item">
								<a class="nav-link"  data-toggle="tab" href="#blog_page" role="tab" aria-controls="profile" aria-selected="false">{{ __('Blogs Page') }}</a>
							</li>
							<li class="nav-item">
								<a class="nav-link"  data-toggle="tab" href="#settings_page" role="tab" aria-controls="profile" aria-selected="false">{{ __('Template primary settings') }}</a>
							</li>
							<li class="nav-item">
								<a class="nav-link"  data-toggle="tab" href="#mailchimp" role="tab" aria-controls="profile" aria-selected="false">{{ __('Newsletter Settings') }}</a>
							</li>
							<li class="nav-item">
								<a class="nav-link"  data-toggle="tab" href="#contact" role="tab" aria-controls="profile" aria-selected="false">{{ __('Contact Page') }}</a>
							</li>
                            <li class="nav-item">
								<a class="nav-link"  data-toggle="tab" href="#socialmedia" role="tab" aria-controls="profile" aria-selected="false">{{ __('Social media links') }}</a>
							</li>

						</ul>
					{{-- </div> --}}
                    </div>
            </div>
        </div>
        <style>
            </style>
            <div class="col-md-8">
                <div class="card" id="settings-card">
                    <div class="card-header">
                        {{-- <h4>{{ __('Settings') }}</h4> --}}
                    </div>
                    <div class="card-body">
                        <div class="tab-content no-padding" id="myTab2Content">
							<div class="tab-pane fade show active" id="home_page" role="tabpanel" aria-labelledby="home_page">
								<form method="post" class="ajaxform" action="{{ route('seller.themeoption.update','home_page') }}">
									@csrf
									@php
									$home_page_data=get_option('home_page',true);
									$home_page_data=$home_page_data->meta ?? '';
									@endphp
								@php
								    $header_slider_status=$home_page_data->header_slider_status ?? 'yes';
								@endphp
								<div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Home Page Slider') }}</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class="form-control selectric" name="option[header_slider_status]">
                                            <option value="yes" @if($header_slider_status == 'yes') selected="" @endif>{{ __('Enabled') }}</option>
                                            <option value="no" @if($header_slider_status == 'no') selected="" @endif>{{ __('Disabled') }}</option>
                                        </select>
                                    </div>
								</div>
								@php
								    $header_short_banner=$home_page_data->header_short_banner ?? 'yes';
								@endphp
								<div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Short Banner') }}</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class="form-control selectric" name="option[header_short_banner]">
                                            <option value="yes" @if($header_short_banner == 'yes') selected="" @endif>{{ __('Enabled') }}</option>
                                            <option value="no" @if($header_short_banner == 'no') selected="" @endif>{{ __('Disabled') }}</option>
                                        </select>
                                    </div>
								</div>

								<h6 class="text-primary py-3">{{ __('Latest Products Area') }}</h6>
								<div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Short Title') }}</label>
									<div class="col-sm-12 col-md-7">
                                        <input type="text"  value="{{ $home_page_data->latest_product_short_title ?? '' }}" name="option[latest_product_short_title]" class="form-control">
                                    </div>
                                </div>
								<div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Title') }}</label>
									<div class="col-sm-12 col-md-7">
                                        <input type="text" value="{{ $home_page_data->latest_product_title ?? '' }}" name="option[latest_product_title]" class="form-control">
                                    </div>
                                </div>
								@php
								    $latest_product_status=$home_page_data->latest_product_status ?? 'yes';
								@endphp
								<div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Status') }}</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class="form-control selectric" name="option[latest_product_status]">
                                            <option value="yes" @if($latest_product_status == 'yes') selected="" @endif>{{ __('Enabled') }}</option>
                                            <option value="no" @if($latest_product_status == 'no') selected="" @endif>{{ __('Disabled') }}</option>
                                        </select>
                                    </div>
								</div>

								<h6 class="text-primary py-3">{{ __('Featured Category Area') }}</h6>
								<div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Short Title') }}</label>
                                    <div class="col-sm-12 col-md-7">
									    <input type="text"  value="{{ $home_page_data->featured_category_short_title ?? '' }}" name="option[featured_category_short_title]" class="form-control">
                                    </div>
                                </div>
								<div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Title') }}</label>
                                    <div class="col-sm-12 col-md-7">
									    <input type="text"  value="{{ $home_page_data->featured_category_title ?? '' }}" name="option[featured_category_title]" class="form-control">
                                    </div>
                                </div>
								@php
								    $featured_category_status=$home_page_data->featured_category_status ?? 'yes';
								@endphp
								<div class="form-group row mb-4">
									<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Status') }}</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class="form-control selectric" name="option[latest_product_status]">
                                            <option value="yes" @if($featured_category_status == 'yes') selected="" @endif>{{ __('Enabled') }}</option>
										    <option value="no" @if($featured_category_status == 'no') selected="" @endif>{{ __('Disabled') }}</option>
                                        </select>
                                    </div>
								</div>
								<div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Background Image') }}</label>
                                    <div class="col-sm-12 col-md-7">
                                        {{mediasection([
                                            'preview_class'=>'featured_category_image',
                                            'input_id'=>'featured_category_image',
                                            'input_class'=>'featured_category_image',
                                            'input_name'=>'option[featured_category_image]',
                                            'value'=>$home_page_data->featured_category_image ?? '',
                                            'preview'=>$home_page_data->featured_category_image ?? 'admin/img/img/placeholder.png'
                                        ])}}
                                    </div>
								</div>

								<h6 class="text-primary py-3">{{ __('Filter Products Area') }}</h6>
								<div class="form-group row mb-4">
									<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Short Title') }}</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" value="{{ $home_page_data->filter_product_short_title ?? '' }}" name="option[filter_product_short_title]" class="form-control">
                                    </div>
                                </div>
								<div class="form-group row mb-4">
									<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Title') }}</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" value="{{ $home_page_data->filter_product_title ?? '' }}" name="option[filter_product_title]" class="form-control">
                                    </div>
                                </div>
								@php
								    $filter_product_status=$home_page_data->filter_product_status ?? 'yes';
								@endphp
								<div class="form-group row mb-4">
									<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Status') }}</label>
									<div class="col-sm-12 col-md-7">
                                        <select class="form-control selectric" name="option[latest_product_status]">
                                            <option value="yes" @if($filter_product_status == 'yes') selected="" @endif>{{ __('Enabled') }}</option>
										    <option value="no" @if($filter_product_status == 'no') selected="" @endif>{{ __('Disabled') }}</option>
                                        </select>
                                    </div>
								</div>


								<h6 class="text-primary py-3">{{ __('Top Rated Products Area') }}</h6>
								<div class="form-group row mb-4">
									<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Short Title') }}</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="option[top_rated_product_short_title]" value="{{ $home_page_data->top_rated_product_short_title ?? '' }}" class="form-control">
                                    </div>
                                </div>
								<div class="form-group row mb-4">
									<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Title') }}</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="option[top_rated_product_title]" value="{{ $home_page_data->top_rated_product_title ?? '' }}" class="form-control">
                                    </div>
                                </div>
								@php
								$top_rated_product_status=$home_page_data->top_rated_product_status ?? 'yes';
								@endphp
								<div class="form-group row mb-4">
									<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Status') }}</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class="form-control selectric" name="option[latest_product_status]">
                                            <option value="yes" @if($top_rated_product_status == 'yes') selected="" @endif>{{ __('Enabled') }}</option>
                                            <option value="no" @if($top_rated_product_status == 'no') selected="" @endif>{{ __('Disabled') }}</option>
                                        </select>
                                    </div>
								</div>

								<h6 class="text-primary py-3">{{ __('Promotion Area') }}</h6>
								<div class="form-group row mb-4">
									<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Short Title') }}</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" value="{{ $home_page_data->promotion_short_title ?? '' }}" name="option[promotion_short_title]" class="form-control">
                                    </div>
                                </div>
								<div class="form-group row mb-4">
									<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Title') }}</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" value="{{ $home_page_data->promotion_title ?? '' }}" name="option[promotion_title]" class="form-control">
                                    </div>
                                </div>
								<div class="form-group row mb-4">
									<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Description') }}</label>
                                    <div class="col-sm-12 col-md-7">
									    <textarea  name="option[promotion_description]" class="form-control">{{ $home_page_data->promotion_description ?? '' }}</textarea>
                                    </div>
								</div>
								<div class="form-group row mb-4">
									<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Button Title') }}</label>
                                    <div class="col-sm-12 col-md-7">
									    <input type="text" value="{{ $home_page_data->promotion_button_title ?? '' }}" name="option[promotion_button_title]" class="form-control">
                                    </div>
								</div>
								<div class="form-group row mb-4">
									<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Button Link') }}</label>
									<div class="col-sm-12 col-md-7">
                                        <input type="text" value="{{ $home_page_data->promotion_link ?? '' }}" name="option[promotion_link]" class="form-control">
                                    </div>
                                </div>
								<div class="form-group row mb-4">
									<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Promotion Video Link') }}</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" value="{{ $home_page_data->promotion_video_link ?? '' }}" name="option[promotion_video_link]" class="form-control">
                                    </div>
                                </div>
								<div class="form-group row mb-4">
									<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Banner Image') }}</label>
                                    <div class="col-sm-12 col-md-7">
                                        {{mediasection([
                                            'preview_class'=>'promotion_banner',
                                            'input_id'=>'promotion_banner',
                                            'input_class'=>'promotion_banner',
                                            'input_name'=>'option[promotion_banner]',
                                            'value'=>$home_page_data->promotion_banner ?? '',
                                            'preview'=>$home_page_data->promotion_banner ?? 'admin/img/img/placeholder.png'
                                        ])}}
                                    </div>
								</div>
								@php
								    $promotion_area_status=$home_page_data->promotion_area_status ?? 'yes';
								@endphp
								<div class="form-group row mb-4">
									<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Status') }}</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class="form-control selectric" name="option[promotion_area_status]">
                                            <option value="yes" @if($promotion_area_status == 'yes') selected="" @endif>{{ __('Enabled') }}</option>
                                            <option value="no" @if($promotion_area_status == 'no') selected="" @endif>{{ __('Disabled') }}</option>
                                        </select>
                                    </div>
								</div>

								<h6 class="text-primary py-3">{{ __('Blog Area') }}</h6>
								<div class="form-group row mb-4">
									<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Short Title') }}</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" value="{{ $home_page_data->blog_area_short_title ?? '' }}" name="option[blog_area_short_title]" class="form-control">
                                    </div>
                                </div>
								<div class="form-group row mb-4">
									<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Title') }}</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" value="{{ $home_page_data->blog_area_title ?? '' }}" name="option[blog_area_title]" class="form-control">
                                    </div>
                                </div>
								@php
								    $blog_area_status=$home_page_data->blog_area_status ?? 'yes';
								@endphp
								<div class="form-group row mb-4">
									<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Status') }}</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class="form-control selectric" name="option[blog_area_status]">
                                            <option value="yes" @if($blog_area_status == 'yes') selected="" @endif>{{ __('Enabled') }}</option>
                                            <option value="no" @if($blog_area_status == 'no') selected="" @endif>{{ __('Disabled') }}</option>
                                        </select>
                                    </div>
								</div>

								<h6 class="text-primary py-3">{{ __('Brands Area') }}</h6>
								<div class="form-group row mb-4">
									<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Short Title') }}</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" value="{{ $home_page_data->brand_area_short_title ?? '' }}" name="option[brand_area_short_title]" class="form-control">
                                    </div>
                                </div>
								<div class="form-group row mb-4">
									<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Title') }}</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" value="{{ $home_page_data->brand_area_title ?? '' }}" name="option[brand_area_title]" class="form-control">
                                    </div>
                                </div>

								<div class="form-group row mb-4">
									<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Banner Image') }}</label>
                                    <div class="col-sm-12 col-md-7">
                                        {{mediasection([
                                            'preview_class'=>'brand_area_background',
                                            'input_id'=>'brand_area_background',
                                            'input_class'=>'brand_area_background',
                                            'input_name'=>'option[brand_area_background]',
                                            'value'=>$home_page_data->brand_area_background ?? '',
                                            'preview'=>$home_page_data->brand_area_background ?? 'admin/img/img/placeholder.png'
                                        ])}}
                                    </div>
								</div>

								@php
								$brand_area_status=$home_page_data->brand_area_status ?? 'yes';
								@endphp
								<div class="form-group row mb-4">
									<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Status') }}</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class="form-control selectric" name="option[brand_area_status]">
                                            <option value="yes" @if($brand_area_status == 'yes') selected="" @endif>{{ __('Enabled') }}</option>
                                            <option value="no" @if($brand_area_status == 'no') selected="" @endif>{{ __('Disabled') }}</option>
                                        </select>
                                    </div>
								</div>

								<div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
									    <button class="btn btn-primary basicbtn">{{ __('Update') }}</button>
                                    </div>
								</div>
								</form>
							</div>

							<div class="tab-pane fade" id="product_page" role="tabpanel" aria-labelledby="profile-tab4">
								@php
								$product_page_data=get_option('product_page',true);
								$product_page_data=$product_page_data->meta ?? '';
								@endphp
								<form method="post" class="ajaxform" action="{{ route('seller.themeoption.update','product_page') }}">
									@csrf
								<div class="form-group">
									<label>{{ __('Page Banner') }}</label>
									{{mediasection([
										'preview_class'=>'product_page_icon',
										'input_id'=>'product_page_icon',
										'input_class'=>'product_page_image',
										'input_name'=>'option[product_page_banner]',
										'value'=>$product_page_data->product_page_banner ?? '',
										'preview'=>$product_page_data->product_page_banner ?? 'admin/img/img/placeholder.png'
									])}}
								</div>

								<div class="form-group">
									<label>{{ __('Product Description Area Short Title') }}</label>
									<input type="text" name="option[product_page__detail_short_title]" value="{{ $product_page_data->product_page__detail_short_title ?? '' }}" class="form-control">
								</div>
								<div class="form-group">
									<label>{{ __('Product Description Area Title') }}</label>
									<input type="text"  value="{{ $product_page_data->product_page_detail_title ?? '' }}" name="option[product_page_detail_title]" class="form-control">
								</div>

								<div class="form-group">
									<label>{{ __('Related Product Area Short Title') }}</label>
									<input placeholder="Related products" type="text" name="option[product_page_related_short_title]" value="{{ $product_page_data->product_page_related_short_title ?? '' }}" class="form-control">
								</div>
								<div class="form-group">
									<label>{{ __('Related Product Area Title') }}</label>
									<input type="text"  value="{{ $product_page_data->product_page_related_title ?? '' }}" name="option[product_page_related_title]" class="form-control">
								</div>

								@php
								$related_product_status=$product_page_data->related_product_status ?? 'yes';
								@endphp
								<div class="form-group">
									<label>{{ __('Related Product Status') }} </label>
									<select class="form-control selectric" name="option[related_product_status]">
										<option value="yes" @if($related_product_status == 'yes') selected="" @endif>{{ __('Enabled') }}</option>

										<option value="no" @if($related_product_status == 'no') selected="" @endif>{{ __('Disabled') }}</option>
									</select>
								</div>

								<div class="form-group">
									<button class="btn btn-primary basicbtn">{{ __('Update') }}</button>
								</div>
							  </form>
							</div>


							<div class="tab-pane fade" id="cart_page" role="tabpanel" aria-labelledby="profile-tab4">
								@php
								$cart_page=get_option('cart_page',true);
								$cart_page=$cart_page->meta ?? '';
								@endphp
								<form method="post" class="ajaxform" action="{{ route('seller.themeoption.update','cart_page') }}">
									@csrf

								<div class="form-group">
									<label>{{ __('Title') }}</label>
									<input type="text" value="{{ $cart_page->cart_page_title ?? '' }}" name="option[cart_page_title]" class="form-control">
								</div>

								<div class="form-group">
									<label>{{ __('Description') }}</label>
									<textarea name="option[cart_page_description]" class="form-control">{{ $cart_page->cart_page_description ?? '' }}</textarea>
								</div>
								<div class="form-group">
									<label>{{ __('Page Banner') }}</label>
									{{mediasection([
										'preview_class'=>'cart_page_icon',
										'input_id'=>'cart_page_icon',
										'input_class'=>'cart_page_image',
										'input_name'=>'option[cart_page_banner]',
										'value'=>$cart_page->cart_page_banner ?? '',
										'preview'=>$cart_page->cart_page_banner ?? 'admin/img/img/placeholder.png'
									])}}
								</div>
								<div class="form-group">
									<button class="btn btn-primary basicbtn">{{ __('Update') }}</button>
								</div>
							  </form>
							</div>

							<div class="tab-pane fade" id="wishlist_page" role="tabpanel" aria-labelledby="profile-tab4">
								@php
								$wishlist_page=get_option('wishlist_page',true);
								$wishlist_page=$wishlist_page->meta ?? '';
								@endphp
								<form method="post" class="ajaxform" action="{{ route('seller.themeoption.update','wishlist_page') }}">
									@csrf

								<div class="form-group">
									<label>{{ __('Title') }}</label>
									<input type="text" value="{{ $wishlist_page->wishlist_page_title ?? '' }}" name="option[wishlist_page_title]" class="form-control">
								</div>

								<div class="form-group">
									<label>{{ __('Description') }}</label>
									<textarea name="option[wishlist_page_description]" class="form-control">{{ $wishlist_page->wishlist_page_description ?? '' }}</textarea>
								</div>
								<div class="form-group">
									<label>{{ __('Page Banner') }}</label>
									{{mediasection([
										'preview_class'=>'wishlist_page_icon',
										'input_id'=>'wishlist_page_icon',
										'input_class'=>'wishlist_page_image',
										'input_name'=>'option[wishlist_page_banner]',
										'value'=>$wishlist_page->wishlist_page_banner ?? '',
										'preview'=>$wishlist_page->wishlist_page_banner ?? 'admin/img/img/placeholder.png'
									])}}
								</div>
								<div class="form-group">
									<button class="btn btn-primary basicbtn">{{ __('Update') }}</button>
								</div>
							  </form>
							</div>
							<div class="tab-pane fade" id="checkout_page" role="tabpanel" aria-labelledby="profile-tab4">
								@php
								$checkout_page=get_option('checkout_page',true);
								$checkout_page=$checkout_page->meta ?? '';
								@endphp
								<form method="post" class="ajaxform" action="{{ route('seller.themeoption.update','checkout_page') }}">
									@csrf

								<div class="form-group">
									<label>{{ __('Title') }}</label>
									<input type="text" value="{{ $checkout_page->cart_page_title ?? '' }}" name="option[cart_page_title]" class="form-control">
								</div>

								<div class="form-group">
									<label>{{ __('Description') }}</label>
									<textarea name="option[cart_page_description]" class="form-control">{{ $checkout_page->cart_page_description ?? '' }}</textarea>
								</div>
								<div class="form-group">
									<label>{{ __('Page Banner') }}</label>
									{{mediasection([
										'preview_class'=>'checkout_page_icon',
										'input_id'=>'checkout_page_icon',
										'input_class'=>'checkout_page_image',
										'input_name'=>'option[checkout_page_banner]',
										'value'=>$checkout_page->checkout_page_banner ?? '',
										'preview'=>$checkout_page->checkout_page_banner ?? 'admin/img/img/placeholder.png'
									])}}
								</div>
								<div class="form-group">
									<label>{{ __('Checkout Form Title') }}</label>
									<input type="text" value="{{ $checkout_page->checkout_form_title ?? '' }}" name="option[checkout_form_title]" class="form-control">
								</div>

								<div class="form-group">
									<label>{{ __('Checkout Description') }}</label>
									<textarea name="option[checkout_form_description]" class="form-control">{{ $checkout_page->checkout_form_description ?? '' }}</textarea>
								</div>

								<div class="form-group">
									<button class="btn btn-primary basicbtn">{{ __('Update') }}</button>
								</div>
							  </form>
							</div>

							<div class="tab-pane fade" id="blog_page" role="tabpanel" aria-labelledby="profile-tab4">
								@php
								$blog_page=get_option('blog_page',true);
								$blog_page=$blog_page->meta ?? '';
								@endphp
								<form method="post" class="ajaxform" action="{{ route('seller.themeoption.update','blog_page') }}">
									@csrf

								<div class="form-group">
									<label>{{ __('Title') }}</label>
									<input type="text" value="{{ $blog_page->blog_page_title ?? '' }}" name="option[blog_page_title]" class="form-control">
								</div>

								<div class="form-group">
									<label>{{ __('Description') }}</label>
									<textarea name="option[blog_page_description]" class="form-control">{{ $blog_page->blog_page_description ?? '' }}</textarea>
								</div>
								<div class="form-group">
									<label>{{ __('Page Banner') }}</label>
									{{mediasection([
										'preview_class'=>'blog_page_icon',
										'input_id'=>'blog_page_icon',
										'input_class'=>'blog_page_image',
										'input_name'=>'option[blog_page_banner]',
										'value'=>$blog_page->blog_page_banner ?? '',
										'preview'=>$blog_page->blog_page_banner ?? 'admin/img/img/placeholder.png'
									])}}
								</div>


								<div class="form-group">
									<button class="btn btn-primary basicbtn">{{ __('Update') }}</button>
								</div>
							  </form>
							</div>




							<div class="tab-pane fade" id="products_page" role="tabpanel" aria-labelledby="profile-tab4">
								@php
								$products_page=get_option('products_page',true);
								$products_page=$products_page->meta ?? '';
								@endphp
								<form method="post" class="ajaxform" action="{{ route('seller.themeoption.update','products_page') }}">
									@csrf
								<h3>{{ __('Products page header section') }}</h3>
								<div class="form-group">
									<label>{{ __('Title') }}</label>
									<input type="text" value="{{ $products_page->products_page_title ?? '' }}" name="option[products_page_title]" class="form-control">
								</div>

								<div class="form-group">
									<label>{{ __('Description :') }}</label>
									<textarea name="option[products_page_description]" class="form-control">{{ $products_page->products_page_description ?? '' }}</textarea>
								</div>
								<div class="form-group">
									<label>{{ __('Page Banner') }}</label>
									{{mediasection([
										'preview_class'=>'products_page_icon',
										'input_id'=>'products_page_icon',
										'input_class'=>'products_page_image',
										'input_name'=>'option[products_page_banner]',
										'value'=>$products_page->products_page_banner ?? '',
										'preview'=>$products_page->products_page_banner ?? 'admin/img/img/placeholder.png'
									])}}
								</div>

								<div class="form-group">
									<button class="btn btn-primary basicbtn">{{ __('Update') }}</button>
								</div>
							  </form>
							</div>

							<div class="tab-pane fade" id="deal_page" role="tabpanel" aria-labelledby="profile-tab4">
								@php
                                    $deal_page=get_option('deal_page',true);
                                    $deal_page=$deal_page->meta ?? '';
								@endphp
								<form method="post" class="ajaxform" action="{{ route('seller.themeoption.update','deal_page') }}">
									@csrf
                                    <h3>{{ __('Deal page header section') }}</h3>
                                    <div class="form-group">
                                        <label>{{ __('Title') }}</label>
                                        <input type="text" value="{{ $deal_page->deal_page_title ?? '' }}" name="option[deal_page_title]" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>{{ __('Description') }}</label>
                                        <textarea name="option[deal_page_description]" class="form-control">{{ $deal_page->deal_page_description ?? '' }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>{{ __('Page Banner') }}</label>
                                        {{mediasection([
                                            'preview_class'=>'deal_page_icon',
                                            'input_id'=>'deal_page_icon',
                                            'input_class'=>'deal_page_image',
                                            'input_name'=>'option[deal_page_banner]',
                                            'value'=>$deal_page->deal_page_banner ?? '',
                                            'preview'=>$deal_page->deal_page_banner ?? 'admin/img/img/placeholder.png'
                                        ])}}
                                    </div>


                                    <div class="form-group">
                                        <button class="btn btn-primary basicbtn">{{ __('Update') }}</button>
                                    </div>
							  </form>
							</div>
                            {{-- SETTINGS AREA START --}}
							<div class="tab-pane fade" id="settings_page" role="tabpanel" aria-labelledby="profile-tab4">
								@php
                                    $site_settings=get_option('site_settings',true);
                                    $site_settings=$site_settings->meta ?? '';
                                    $active_languages=get_option('active_languages');
                                    $activeLanguagesArray = json_decode($active_languages, true);
								@endphp
                                <ul class="nav nav-pills d-flex justify-content-around mb-3" role="tablist">
                                    @foreach ($activeLanguagesArray as $code => $name)
                                        <li class="nav-item">
                                            <a class="nav-link {{ Session::get('locale') == $code ? 'active' : '' }}" data-toggle="tab" href="#{{ $code }}" role="tab">{{ __($name) }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                                <h6>{{ __('Template primary settings') }}</h6>
                                <div class="tab-content clearfix" id="myTabContent2">
                                    @foreach ($activeLanguagesArray as $code => $name)
                                        <div class="tab-pane fade show {{ Session::get('locale') == $code ? 'active' : '' }}" id="{{ $code }}">
                                            <form method="post" class="ajaxform" action="{{ route('seller.themeoption.update','site_settings') }}">
                                                @csrf
                                                <input type="hidden" name="selected_locale" value="{{ $code }}">
                                                <div class="form-group">
                                                    <label>{{ __('Store Description') }}</label>
                                                    <textarea name="option[footer_store_description]" class="form-control h-200">{{ $site_settings->{$code}->footer_store_description ?? '' }}</textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>{{ __('Store Address') }}</label>
                                                    <input type="text"  name="option[footer_store_address]" class="form-control" value="{{ $site_settings->{$code}->footer_store_address ?? '' }}">
                                                </div>
                                                <div class="form-group">
                                                    <label>{{ __('Contact Number') }}</label>
                                                    <input type="text"  name="option[footer_contact_number]" class="form-control" value="{{ $site_settings->{$code}->footer_contact_number ?? '' }}">
                                                </div>
                                                <div class="form-group">
                                                    <label>{{ __('Copyright text') }}</label>
                                                    <input type="text"  name="option[footer_copyright]" class="form-control" value="{{ $site_settings->{$code}->footer_copyright ?? '' }}">
                                                </div>
                                                @php
                                                    $cart_sidebar=$site_settings->{$code}->cart_sidebar ?? 'yes';
                                                    $sidebar=$site_settings->{$code}->sidebar ?? 'yes';
                                                    $preloader=$site_settings->{$code}->preloader ?? 'yes';
                                                    $bottom_bar=$site_settings->{$code}->bottom_bar ?? 'yes';
                                                    $newsletter_status=$site_settings->{$code}->newsletter_status ?? 'yes';
                                                @endphp
                                                <div class="form-group">
                                                    <label>{{ __('Cart Sidebar') }}</label>
                                                    <select class="form-control" name="option[cart_sidebar]">
                                                        <option value="yes" @if($cart_sidebar == 'yes') selected="" @endif>{{ __('Enable') }}</option>
                                                        <option value="no" @if($cart_sidebar == 'no') selected="" @endif>{{ __('Disable') }}</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>{{ __('Sidebar') }}</label>
                                                    <select class="form-control" name="option[sidebar]">
                                                        <option value="yes" @if($sidebar == 'yes') selected="" @endif>{{ __('Enable') }}</option>
                                                        <option value="no" @if($sidebar == 'no') selected="" @endif>{{ __('Disable') }}</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>{{ __('Mobile bottom menubar') }}</label>
                                                    <select class="form-control" name="option[bottom_bar]">
                                                        <option value="yes" @if($bottom_bar == 'yes') selected="" @endif>{{ __('Enable') }}</option>
                                                        <option value="no" @if($bottom_bar == 'no') selected="" @endif>{{ __('Disable') }}</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>{{ __('Newsletter form') }}</label>
                                                    <select class="form-control" name="option[newsletter_status]">
                                                        <option value="yes" @if($newsletter_status == 'yes') selected="" @endif>{{ __('Enable') }}</option>
                                                        <option value="no" @if($newsletter_status == 'no') selected="" @endif>{{ __('Disable') }}</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <button class="btn btn-primary basicbtn">{{ __('Update') }}</button>
                                                </div>
                                            </form>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            {{-- MAIL CHIMP AREA START --}}
							<div class="tab-pane fade" id="mailchimp" role="tabpanel" aria-labelledby="profile-tab4">
								@php
                                    $mailchimp=get_option('mailchimp',true);
                                    $mailchimp=$mailchimp->meta ?? '';
								@endphp
								<form method="post" class="ajaxform" action="{{ route('seller.themeoption.update','mailchimp') }}">
									@csrf
								<h6>{{ __('Mailchimp Api Settings') }}</h6>
								<div class="form-group">
									<label>{{ __('MAILCHIMP API KEY') }}</label>
									<input type="text"  name="option[mailchimp_api_key]" class="form-control" value="{{ $mailchimp->mailchimp_api_key ?? '' }}" required="">
								</div>
								<div class="form-group">
									<label>{{ __('MAILCHIMP LIST ID') }}</label>
									<input type="text"  name="option[mailchimp_list_id]" class="form-control" value="{{ $mailchimp->mailchimp_list_id ?? '' }}" required="">
								</div>
								<div class="form-group">
									<button class="btn btn-primary basicbtn">{{ __('Update') }}</button>
								</div>
							  </form>
							</div>
                            {{-- CONTACT AREA START --}}
							<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="profile-tab4">
								@php
								$contact_info=get_option('contact_page',true);
								$contact_info=$contact_info->meta ?? '';

								@endphp
								<form method="post" class="ajaxform" action="{{ route('seller.themeoption.update','contact_page') }}">
									@csrf
								<h6>{{ __('Contact Page') }}</h6>
								<div class="form-group">
									<label>{{ __('Title') }}</label>
									<input type="text"  name="option[contact_page_title]" class="form-control" value="{{ $contact_info->contact_page_title ?? '' }}" required="">
								</div>

								<div class="form-group">
									<label>{{ __('Description') }}</label>
									<textarea name="option[contact_des]" id="" cols="30" rows="10" class="form-control">{{ $contact_info->contact_des ?? '' }}</textarea>
								</div>
								<div class="form-group">
									<label>{{ __('Page Banner') }}</label>
									{{mediasection([
										'preview_class'=>'contact_banner',
										'input_id'=>'contact_banner',
										'input_class'=>'contact_banner',
										'input_name'=>'option[contact_banner]',
										'value'=>$contact_info->contact_banner ?? '',
										'preview'=>$contact_info->contact_banner ?? 'admin/img/img/placeholder.png'
									])}}
								</div>
								<div class="form-group">
									<button class="btn btn-primary basicbtn">{{ __('Update') }}</button>
								</div>
							  </form>
							</div>
                            {{-- SOCIAL MEDIA AREA START --}}
                            <div class="tab-pane fade" id="socialmedia" role="tabpanel" aria-labelledby="profile-tab4">
                                <h6>{{ __('Social media settings') }}</h6>
                                <div class="alert alert-light alert-has-icon">
                                    <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                                    <div class="alert-body">
                                      <div class="alert-title">{{ __('Notice') }}</div>
                                      {{ __('If you left any of the following URLs space empty, that means it\'s disabled and it will not appear at your store') }}
                                    </div>
                                </div>
                                @php
                                    $socialmedia=get_option('socialmedia',true);
                                    $socialmedia=$socialmedia->meta ?? '';
								@endphp
								<form method="post" class="ajaxform" action="{{ route('seller.themeoption.update','socialmedia') }}">
									@csrf
                                    <div class="form-group">
                                        <label class="control-label">{{ __('Facebook URL') }}</label>
                                        <input type="text" class="form-control" name="option[facebook_url]" placeholder="{{ __('Facebook URL') }}" value="{{ $socialmedia->facebook_url ?? '' }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">{{ __('Twitter URL') }}</label>
                                        <input type="text" class="form-control" name="option[twitter_url]" placeholder="{{ __('Twitter URL') }}" value="{{ $socialmedia->twitter_url ?? '' }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">{{ __('Instagram URL') }}</label>
                                        <input type="text" class="form-control" name="option[instagram_url]" placeholder="{{ __('Instagram URL') }}" value="{{ $socialmedia->instagram_url ?? '' }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">{{ __('Pinterest URL') }}</label>
                                        <input type="text" class="form-control" name="option[pinterest_url]" placeholder="{{ __('Pinterest URL') }}" value="{{ $socialmedia->pinterest_url ?? '' }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">{{ __('Linkedin URL') }}</label>
                                        <input type="text" class="form-control" name="option[linkedin_url]" placeholder="{{ __('Linkedin URL') }}" value="{{ $socialmedia->linkedin_url ?? '' }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">{{ __('VK URL') }}</label>
                                        <input type="text" class="form-control" name="option[vk_url]" placeholder="VK URL" value="{{ $socialmedia->vk_url ?? '' }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">{{ __('WhatsApp URL') }}</label>
                                        <input type="text" class="form-control form-input" name="option[whatsapp_url]" placeholder="{{ __('WhatsApp URL') }}" value="{{ $socialmedia->whatsapp_url ?? '' }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">{{ __('Telegram URL') }}</label>
                                        <input type="text" class="form-control form-input" name="option[telegram_url]" placeholder="{{ __('Telegram URL') }}" value="{{ $socialmedia->telegram_url ?? '' }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">{{ __('Youtube URL') }}</label>
                                        <input type="text" class="form-control" name="option[youtube_url]" placeholder="{{ __('Youtube URL') }}" value="{{ $socialmedia->youtube_url ?? '' }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">{{ __('Rss URL') }}</label>
                                        <input type="text" class="form-control" name="option[rss_url]" placeholder="{{ __('Rss URL') }}" value="{{ $socialmedia->rss_url ?? '' }}">
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary basicbtn">{{ __('Update') }}</button>
                                    </div>
							    </form>
							</div>
                            {{-- END --}}


						</div>
                    </div>
                </div>


					</div>
				{{-- </div>  --}}
			</div>
		</div>
	</div>
</div>
{{ mediasingle() }}
@endsection

@push('script')
<script src="{{ asset('admin/assets/js/summernote-bs4.js') }}"></script>
<script src="{{ asset('admin/assets/js/summernote.js') }}"></script>
<!-- JS Libraies -->
<script src="{{ asset('admin/plugins/dropzone/dropzone.min.js') }}"></script>

<!-- Page Specific JS File -->
<script src="{{ asset('admin/plugins/dropzone/components-multiple-upload.js') }}"></script>
<script src="{{ asset('admin/js/media.js') }}"></script>
<script type="text/javascript">
	"use strict";

	$('.exampleclick').on('click',function(){
		var html=$(this).data('html');
		var target=$(this).data('target');

		$(target).val(html);
	});
</script>
@endpush
