<div class="row-custom product-share">
    <label>{{ __('Share') }}:</label>
    <ul>
        <li>
            <a href="javascript:void(0)" onclick='window.open("https://www.facebook.com/sharer/sharer.php?u={{ url('/product',$info->slug) }}", "Share this product", "width=640,height=450");return false'>
                <i class="icon-facebook"></i>
            </a>
        </li>
        <li>
            <a href="javascript:void(0)" onclick='window.open("https://twitter.com/share?url={{ url('/product',$info->slug) }} &amp;text={{ $info->title }}", "Share this product", "width=640,height=450");return false'>
                <i class="icon-twitter"></i>
            </a>
        </li>
        <li>
            <a href="https://api.whatsapp.com/send?text={{ $info->title }} - {{ url('/product',$info->slug) }}" target="_blank">
                <i class="icon-whatsapp"></i>
            </a>
        </li>
        <li>
            <a href="javascript:void(0)" onclick='window.open("http://pinterest.com/pin/create/button/?url={{ url('/product',$info->slug) }}&amp;media={{ asset($preview) }}", "Share this product", "width=640,height=450");return false'>
                <i class="icon-pinterest"></i>
            </a>
        </li>
        <li>
            <a href="javascript:void(0)" onclick='window.open("http://www.linkedin.com/shareArticle?mini=true&amp;url={{ url('/product',$info->slug) }}", "Share this product", "width=640,height=450");return false'>
                <i class="icon-linkedin"></i>
            </a>
        </li>
    </ul>
</div>
