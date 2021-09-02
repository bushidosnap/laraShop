  <header>
    <div class="top-nav container">
      <div class="top-nav-left">
        <div class="logo"><a href="{{route('landing-page')}}">LaraShop</a></div>
        <ul>
          <li><a href="{{route('shop.index')}}">Shop</a></li>
          <li><a href="#">About</a></li>
          <li><a href="#">Blog</a></li>
          {{-- <li><a href="{{route('cart.index')}}">Cart
            @if (Cart::content()->count() > 0)
            <span class="badge badge-pill badge-warning">{{Cart::content()->count()}}</span>
            @endif
            </a>
          </li> --}}
        </ul>
      </div>
      <div class="top-nav-right">
        @include('partials.menus.main-right')
      </div>
</header>