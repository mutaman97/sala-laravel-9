@extends('theme.elham.layouts.app')

@section('content')
<div id="wrapper">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="blog-content">
                    <nav class="nav-breadcrumb" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('Home') }}</a></li>
                            <li class="breadcrumb-item active"><a href="{{ route('blog.index') }}">{{ $page_data->blog_page_title ?? 'Blog' }}</a></li>
                        </ol>
                    </nav>
                    <h1 class="page-title">{{__('Blog')}}</h1>
                    <div class="row d-flex justify-content-center">
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                            <div class="top-search-bar top-search-bar-single-vendor w-100">
                                <form action="{{ url('/blog') }}">
                                    <input type="text" name="src" maxlength="300" pattern=".*\S+.*" class="form-control input-search" value="" placeholder="{{ __('Search in blogs') }}" required autocomplete="off">
                                    <button type="submit" class="btn btn-default btn-search"><i class="icon-search"></i></button>
                                    <div id="response_search_results_mobile" class="search-results-ajax"></div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <ul class="blog-categories">
                                {{-- <li class="< ?= ($activeCategory == 'all') ? 'active' : ''; ?>">
                                    <a href="< ?= generateUrl("blog"); ?>">< ?= trans('all'); ?></a>
                                </li> --}}
                                {{-- < ?php if (!empty($categories)):
                                    foreach ($categories as $category): ?>
                                        <li class="< ?= $activeCategory == $category->slug ? 'active' : ''; ?>">
                                            <a href="< ?= generateUrl("blog") . '/' . esc($category->slug); ?>">< ?= esc($category->name); ?></a>
                                        </li>
                                    < ?php endforeach;
                                endif; ?> --}}
                            </ul>
                        </div>
                    </div>

                    {{-- < ?= view('partials/_ad_spaces', ['adSpace' => 'blog_1', 'class' => 'mb-4']); ?> --}}
                    <div class="row">
                        @if (!empty($posts))
                            @foreach($posts as $item)
                            <div class="col-xs-12 col-sm-6 col-lg-4">
                                {{-- < ?= view('blog/_blog_item', ['item' => $item]); ?> --}}
                                @include('theme.elham.components._blog_item', ['item' => $item])
                            </div>
                            @endforeach
                        @endif
                    </div>
                    {{-- < ?= view('partials/_ad_spaces', ['adSpace' => 'blog_2', 'class' => 'mb-4']); ?> --}}
                    <div class="row">
                        <div class="col-sm-12">
                            {{-- < ?= view('partials/_pagination'); ?> --}}
                            {{ $posts->links('vendor.pagination.theme.elham.paginator') }}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
