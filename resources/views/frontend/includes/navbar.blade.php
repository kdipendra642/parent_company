@if($public_menu)
<ul>
    @foreach($public_menu as $menu)
    <li class=" @if($menu['child']) dropdown @endif">
        <a href="{{ $menu['link'] }}" title="">{{ $menu['label'] }} </a>
        @if( $menu['child'] )
        <ul class="sub-menu">
            @foreach( $menu['child'] as $child )
            <li class=""><a href="{{ $child['link'] }}" title="">{{ $child['label'] }}</a></li>
            @endforeach
        </ul><!-- /.sub-menu -->
        @endif
    </li>
    @endforeach
</ul>
@endif
<i class="bi bi-list mobile-nav-toggle"></i>