@extends('theme.elham.layouts.app')
@section('content')
<div id="wrapper">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="nav-breadcrumb" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-products">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item active"><a href="{{ url()->current() }}">{{ __($page_title) }}</a></li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-12 product-list-header">
                <h1 class="page-title product-list-title">{{ __($page_title) }}</h1>
                <div class="product-sort-by mb-3">
                    <span class="span-sort-by pr-4">{{ __('Sort By') }}:</span>
                    <div class="sort-select">
                        <select id="order_by" class="custom-select">
                            <option value="DESC">{{ __('Latest Products') }}</option>
                            <option value="ASC">{{ __('Default Sorting') }}</option>
                            <option value="rating">{{ __('Highest Rating') }}</option>
                        </select>
                    </div>
                </div>
                <button class="btn btn-filter-products-mobile mb-3" type="button" data-toggle="collapse" data-target="#collapseFilters" aria-expanded="false" aria-controls="collapseFilters">
                    <i class="icon-filter"></i>&nbsp;{{__('Filter Products')}}
                </button>
                <div class="product-sort-by">
                    <span class="span-sort-by">{{ __('Show') }}:</span>
                    <div class="sort-select">
                        <select id="product_limit" class="custom-select">
                            <option value="12" selected="selected">{{ __('12 Products') }}</option>
                            <option value="25">{{ __('25 Products') }}</option>
                            <option value="35">{{ __('35 Products') }}</option>
                            <option value="45">{{ __('45 Products') }}</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-3 col-sidebar-products">
                <div id="collapseFilters" class="product-filters">
                    <div class="filter-item">
                        <h4 class="title">{{ __('Category') }}</h4>
                        <div class="filter-list-container category_area">
                            {{-- <ul class="filter-list filter-custom-scrollbar< ?= !empty($category) ? ' filter-list-subcategories' : ' filter-list-categories'; ?>"> --}}
                            <ul class="filter-list filter-custom-scrollbar filter-list-categories product_category">

                            </ul>
                        </div>
                    </div>

                    <div class="filter-item">
                        <h4 class="title">{{ __('Shop By Brand') }}</h4>
                        <div class="filter-list-container  brand_area">
                                <!-- <input type="text" class="form-control filter-search-input" placeholder="< ?= trans("search") . ' ' . esc($filterName ); ?>" data-filter-id="product_filter_< ?= $customFilter->id; ?>"> -->
                                {{-- <input type="text" class="form-control filter-search-input" placeholder="{{ __('Search') }}" data-filter-id="product_filter_customFilter->id;"> --}}
                            <ul class="filter-list filter-custom-scrollbar product_brands">

                            </ul>
                        </div>
                    </div>
                    <div class="filter-item">
                        <h4 class="title">{{__('Price')}}</h4>
                        <div class="price-filter-inputs">
                            <div class="row align-items-baseline row-price-inputs">
                                <div class="col-4 col-md-4 col-lg-5 col-price-inputs">
                                    <span>{{__('Min')}}</span>
                                    <input type="text" id="price_min" class="form-control price-filter-input" placeholder="{{ __('Min') }}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                </div>
                                <div class="col-4 col-md-4 col-lg-5 col-price-inputs">
                                    <span>{{ __('Max') }}</span>
                                    <input type="text" id="price_max" class="form-control price-filter-input" placeholder="{{ __('Max') }}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                </div>

                                <div class="col-4 col-md-4 col-lg-2 col-price-inputs text-left">
                                    <button type="button" id="product_price_filter" class="btn btn-sm btn-default btn-filter-price float-left"><i class="icon-arrow-right"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="row-custom">
                    < ?= view('partials/_ad_spaces', ['adSpace' => 'products_sidebar', 'class' => 'm-b-15']); ?>
                </div> --}}
            </div>
            <div class="col-12 col-md-9 col-content-products">
                <div class="product-list-content">
                    <div class="row row-product primary_products_area">
                        <div class="col-12 zero_product">
                            <p class="no-records-found">{{ __('Sorry, No Products Found Here') }}</p>
                        </div>
                    </div>
                    <div class="row row-product primary_products_area_preloader">

                    </div>
                </div>
                {{-- < ?= view('partials/_ad_spaces', ['adSpace' => 'products_2', 'class' => 'mt-3']); ?> --}}
                <div class="product-list-pagination">
                    <div class="float-right">
                        <nav aria-label="{{ __('Page Navigation') }}">
                            <ul class="pagination pagination-list">
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<input type="hidden" id="cat" value="{{ $categoryid ?? '' }}">
<input type="hidden" id="term_src" value="{{ $request->src ?? '' }}">
@endsection
@push('js')
<script src="{{ asset('admin/js/sweetalert2.all.min.js') }}"></script>
<script src="{{ asset('admin/js/form.js') }}"></script>
<script src="{{ asset('theme/jquery.unveil.js') }}"></script>
<script src="{{ asset('theme/elham/js/products.js') }}?g=0243"></script>
@endpush
