@extends('theme.elham.layouts.app')
@section('content')

<div id="wrapper">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="blog-content">
                    <nav class="nav-breadcrumb" aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-products">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('Home') }}</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('blog.index') }}">{{ $page_data->blog_page_title ?? 'Blog' }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="{{ url()->current() }}">{{ Str::limit($info->title,50) }}</a></li>
                        </ol>
                    </nav>
                    <div class="row">
                        <div class="col-sm-12 col-md-9">
                            <div class="post-content">
                                <div class="row-custom">
                                    <h1 class="title">{{ $info->title }}</h1>
                                </div>
                                <div class="row-custom">
                                    <div class="blog-post-meta">
                                        <a href="#"><i class="icon-folder"></i>{{__('Category')}}</a>
                                        <span><i class="icon-clock"></i>{{ $info->updated_at->diffForHumans() }}</span>
                                    </div>
                                </div>
                                <div class="row-custom">
                                    <div class="post-image">
                                        <img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="{{ asset($info->preview->value ?? '') }}" width="1280" height="990" alt="{{ $info->title }}" class="img-fluid lazyload"/>
                                    </div>
                                </div>
                                {{-- < ?= view('partials/_ad_spaces', ['adSpace' => 'blog_1', 'class' => 'mt-2 mb-4']); ?> --}}
                                <div class="row-custom">
                                    <div class="post-text post-text-responsive">
                                        {{ content_format($info->description->value ?? '') }}
                                    </div>
                                </div>
                                <div class="row-custom m-b-20">
                                    <div class="post-tags">
                                        <ul>
                                            {{-- < ?php if (!empty($postTags)):
                                                foreach ($postTags as $tag): ?>
                                                    <li>
                                                        <a href="< ?= generateUrl('blog', 'tag') . '/' . esc($tag->tag_slug); ?>">< ?= esc($tag->tag); ?></a>
                                                    </li>
                                                < ?php endforeach;
                                            endif; ?> --}}
                                            <li>
                                                <a href="#">{{ __('Tag') }}</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row-custom">
                                    <div class="post-share">
                                        <h4 class="title">{{ __('Share') }}</h4>
                                        <a href="javascript:void(0)" onclick='window.open("https://www.facebook.com/sharer/sharer.php?u={{ url('blog',$info->slug) }}", "Share This Post", "width=640,height=450");return false' class="btn btn-md btn-share facebook">
                                            <i class="icon-facebook"></i>
                                            <span>{{ __('Facebook') }}</span>
                                        </a>
                                        <a href="javascript:void(0)" onclick='window.open("https://twitter.com/share?url={{ url('blog',$info->slug) }}&amp;text={{ $info->title }}", "Share This Post", "width=640,height=450");return false' class="btn btn-md btn-share twitter">
                                            <i class="icon-twitter"></i>
                                            <span>{{ __('Twitter') }}</span>
                                        </a>
                                        <a href="https://api.whatsapp.com/send?text={{ str_replace('&', '', $info->title ?? '') }} - {{ url('blog',$info->slug) }}" target="_blank" class="btn btn-md btn-share whatsapp">
                                            <i class="icon-whatsapp"></i>
                                            <span>{{ __('Whatsapp') }}</span>
                                        </a>
                                        <a href="javascript:void(0)" onclick='window.open("http://pinterest.com/pin/create/button/?url={{ url('blog',$info->slug) }}&amp;media={{ asset($info->thum_image->value ?? '') }}", " Share This Post", "width=640,height=450");return false' class="btn btn-md btn-share pinterest">
                                            <i class="icon-pinterest"></i>
                                            <span>{{__('Pinterest')}}</span>
                                        </a>
                                    </div>
                                </div>
                                {{-- < ?= view('partials/_ad_spaces', ['adSpace' => 'blog_2', 'class' => 'mb-4']); ?> --}}
                                <div class="row-custom">
                                    <div class="related-posts">
                                        <h4 class="blog-section-title">{{__('Related Blogs')}}</h4>
                                        <div class="row">
                                            @if(!empty($related_posts))
                                                @foreach($related_posts as $item)
                                                <div class="col-xs-12 col-sm-6 col-lg-4">
                                                        @include('theme.elham.components._blog_item_small', ['item' => $item])
                                                </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                {{-- < ?php if ($generalSettings->blog_comments == 1 || $generalSettings->facebook_comment_status == 1): ?>
                                    <div class="blog-comments-section">
                                        <ul class="nav nav-tabs">
                                            < ?php if ($generalSettings->blog_comments == 1): ?>
                                                <li class="nav-item">
                                                    <a class="nav-link active" data-toggle="tab" href="#comments">< ?= trans("comments"); ?></a>
                                                </li>
                                            < ?php endif;
                                            if ($generalSettings->facebook_comment_status == 1): ?>
                                                <li class="nav-item">
                                                    <a class="nav-link < ?= ($generalSettings->blog_comments != 1) ? 'active' : ''; ?>" data-toggle="tab" href="#facebook_comments">
                                                        < ?= trans("facebook_comments"); ?>
                                                    </a>
                                                </li>
                                            < ?php endif; ?>
                                        </ul>
                                        <div class="tab-content">
                                            < ?php if ($generalSettings->blog_comments == 1): ?>
                                                <div class="tab-pane container active" id="comments">
                                                    < ?= view('blog/_comment'); ?>
                                                </div>
                                            < ?php endif;
                                            if ($generalSettings->facebook_comment_status == 1): ?>
                                                <div class="tab-pane container < ?= ($generalSettings->blog_comments != 1) ? 'active' : 'fade'; ?>" id="facebook_comments">
                                                    <div class="fb-comments" data-href="< ?= current_url(); ?>" data-width="100%" data-numposts="5" data-colorscheme="light"></div>
                                                </div>
                                            < ?php endif; ?>
                                        </div>
                                    </div>
                                < ?php endif; ?> --}}
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-3">
                            <div class="latest-posts">
                                <h4 class="blog-section-title">{{ __('Latest Blogs') }}</h4>
                                <div class="row">
                                    @if(!empty($recent_posts))
                                        @foreach($recent_posts as $item)
                                            <div class="col-sm-12">
                                                @include('theme.elham.components._blog_item_small', ['item' => $item])
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <div class="blog-tags">
                                <h4 class="blog-section-title">{{ __('Tags') }}</h4>
                                <ul>
                                    {{-- < ?php if (!empty($randomTags)):
                                        foreach ($randomTags as $tag): ?>
                                            <li>
                                                <a href="< ?= generateUrl('blog', 'tag') . '/' . esc($tag->tag_slug); ?>">< ?= esc($tag->tag); ?></a>
                                            </li>
                                        < ?php endforeach;
                                    endif; ?> --}}
                                    <li>
                                        <a href="#">{{ __('Random Tag') }}</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="row-custom">
                                {{-- < ?= view('partials/_ad_spaces', ['adSpace' => 'blog_post_details_sidebar', 'class' => 'm-t-30 text-left']); ?> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- < ?php if ($generalSettings->facebook_comment_status == 1) {
    echo $generalSettings->facebook_comment;
} ?> --}}


@endsection
