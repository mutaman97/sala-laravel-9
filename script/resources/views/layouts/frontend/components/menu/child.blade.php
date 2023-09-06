@if ($childrens)
	<li>
		@if (isset($childrens->children)) 
		<a href="{{ url($childrens->href) }}" @if(!empty($childrens->target)) target={{ $childrens->target }} @endif class="sub-menu-item">{{ $childrens->text }}</a>
		<ul class="submenu" id="submenu-1-4">
			@foreach($childrens->children ?? [] as $row)
			@include('layouts.frontend.components.menu.child', ['childrens' => $row])
			@endforeach
			
		</ul>
		@else
		<a href="{{ url($childrens->href) }}" class="sub-menu-item">{{ $childrens->text }}</a>
		@endif
	</li>
@endif


