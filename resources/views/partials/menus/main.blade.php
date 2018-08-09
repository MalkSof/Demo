<ul class="navbar-nav mr-auto">
    @foreach($items as $menu_item)
        <li class="nav-item">
            <a class="nav-link" href="{{ $menu_item->link() }}">
                {{ $menu_item->title }}
                @if ($menu_item->title === 'Carrito')
                    @if (Cart::instance('default')->count() > 0)
                    <span class="cart-count"><span>{{ Cart::instance('default')->count() }}</span></span>
                    @endif
                @endif
            </a>
        </li>
    @endforeach
</ul>
