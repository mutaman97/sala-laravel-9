@if(!empty($menus))
    @php
    $mainMenus=$menus['data'] ?? [];
    @endphp

    <div class="row-custom">
        <h4 class="footer-title">{{ $menus['name'] }}</h4>
    </div>
    <div class="row-custom">
        <ul>
            @foreach ($mainMenus ?? [] as $row)
                @if (isset($row->children))
                    <li>
                        <a  href="javascript:void(0)" >
                            {{ $row->text }}
                        </a>
                        <ul class="dropdown" >
                            @foreach($row->children as $childrens)

                            @include('theme.elham.components.footermenu.child', ['childrens' => $childrens])
                            @endforeach
                        </ul>
                    </li>
                @else
                    <li >
                        <a @if(url()->current() == url($row->href)) class="active" @endif href="{{ url($row->href) }}" @if(!empty($row->target)) target="{{ $row->target }}" @endif>{{ $row->text }}
                        </a>
                    </li>
                @endif
            @endforeach
        </ul>
    </div>
@endif
