@if(!empty($menus))
	@php
	$mainMenus=$menus['data'] ?? [];
	
	@endphp
	@foreach ($mainMenus ?? [] as $row) 
	<li class="nav-item dropdown menu-li-more">
		@if (isset($row->children))
		
		<a class="nav-link dropdown-toggle" href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#submenu-1-5" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			{{ $row->text }}  
		</a>
		{{-- <ul class="sub-menu collapse" id="submenu-1-5">
			@foreach($row->children as $childrens)
			<!-- <li class="nav-item"><a href="dashboard.html">dashboard</a></li> -->
			@include('theme.resto.components.menu.child', ['childrens' => $childrens])
			@endforeach
		</ul> --}}
		@foreach($row->children as $childrens)
		<div class="dropdown-menu dropdown-menu-more-items">
			@foreach($row->children as $childrens)
			<a class="dropdown-item" @if(url()->current() == url($row->href)) class="active" @endif href="{{ url($childrens->href) }}" @if(!empty($childrens->target)) target="{{ $childrens->target }}" @endif data-has-sb="1">
				{{ $childrens->text }}			
			</a>
			@endforeach	
		</div>
		@endforeach
		@else
			<a class="nav-link" href="{{ url($row->href) }}" @if(!empty($row->target)) target="{{ $row->target }}" @endif role="button" aria-haspopup="true" aria-expanded="false">{{ __($row->text) }}</a>
			{{-- <a @if(url()->current() == url($row->href)) class="active" @endif href="{{ url($row->href) }}" @if(!empty($row->target)) target="{{ $row->target }}" @endif>{{ $row->text }} 
				@if(url()->current() == url($row->href))
				<b class="span-dot"><span class="span-circle"></span></b>
				@endif
			</a> --}}
		@endif
	</li>
	@endforeach
@endif

{{-- 
<li class="nav-item dropdown menu-li-more">
	<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">{{ __('More') }}</a>
	<div class="dropdown-menu dropdown-menu-more-items">
		<a href="generate_category_url" class="dropdown-item" data-id="$category->id" data-parent-id="category->parent_id" data-has-sb="1">{{ __('Category Name') }}</a>
		<a id="nav_main_category_$subcategory->id" href="generate_category_url" class="hidden" data-id="$subcategory->id" data-parent-id="subcategory->parent_id" data-has-sb="1">{{ __('Sub Category Name') }}</a>
		<a id="nav_main_category_third_category->id" href="generate_category_url" class="hidden" data-id="third_category->id" data-parent-id="third_category->parent_id" data-has-sb="0">{{ __('Third Category Name') }}</a>
	</div>
</li> --}}

