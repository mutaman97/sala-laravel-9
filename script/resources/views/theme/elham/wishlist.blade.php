@extends('theme.elham.layouts.app')
@section('content')
<div id="wrapper">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="nav-breadcrumb" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-products">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item active"><a href="{{ url()->current() }}">{{ __($page_data->wishlist_page_title) ?? __('Wishlist') }}</a></li>
                    </ol>
                </nav>
            </div>
            <div class="col-12">
                <div class="page-contact">
                    <div class="row row-product wishlist_page">
                        <div class="col-12 zero_product d-none">
                            <p class="no-records-found">{{ __('Sorry, No Products Found Here') }}</p>
                        </div>
                    </div>
                    <div class="row row-product wishlist_page_preloader">

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

@endsection
@push('js')
<script src="{{ asset('admin/js/sweetalert2.all.min.js') }}"></script>
<script src="{{ asset('admin/js/form.js') }}"></script>
@endpush
