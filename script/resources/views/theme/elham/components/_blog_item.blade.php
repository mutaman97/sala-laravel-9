<div class="blog-item">
    <div class="blog-item-img">
        <a href="{{ url('blog',$item->slug) }}">
            <img src="{{ asset('theme/elham/img/img_bg_blog_small.jpg') }}" data-src="{{ asset($item->thum_image->value) }}" alt="{{ $item->title }}" class="img-fluid lazyload">
        </a>
    </div>
    <h3 class="blog-post-title">
        <a href="{{ url('blog',$item->slug) }}">{{ Str::limit($item->title,56) }}</a>
    </h3>
    <div class="blog-post-meta">
        <span><i class="icon-clock"></i>{{ $item->created_at->diffForHumans() }}</span>
        <a href="#"><i class="icon-folder"></i>{{__('Category')}}</a>
    </div>
    <div class="blog-post-description">
        {{ Str::limit($item->excerpt->value ?? '',100) }}
    </div>
</div>


