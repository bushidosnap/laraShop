@extends('layouts.others-layout')
@section('title', 'Shopping Cart')


@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
        </ol>
    </nav>

    <div class="cart-section container">
        <div>
            @if (session()->has('success_message'))
                <div class="alert alert-success">
                    {{ session()->get('success_message') }}
                </div>
            @endif

            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (Cart::instance('default')->count() > 0)

            <h2>{{ Cart::instance('default')->count() }} item(s) in Shopping Cart</h2>
            
            <div class="cart-table">
                @foreach (Cart::content() as $item)
                <div class="cart-table-row">
                    <div class="cart-table-row-left">
                        <a href="{{ route('shop.show', $item->model->slug) }}"><img src="{{ productImage($item->model->image) }}" alt="item" class="cart-table-img"></a>
                        <div class="cart-item-details">
                            <div class="cart-table-item"><a href="{{ route('shop.show', $item->model->slug) }}">{{ $item->model->name }}</a></div>
                            <div class="cart-table-description">{{ $item->model->details }}</div>
                        </div>
                    </div>
                    <div class="cart-table-row-right">
                        <div class="cart-table-actions">
                            <form action="{{ route('cart.destroy', $item->rowId) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-outline-danger btn-sm">Remove</button>
                            </form>
                            <form action="{{ route('cart.wishList', $item->rowId) }}" method="POST">
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-outline-success btn-sm">Add to Wish List</button>
                            </form>
                        </div>
                        <div>
                            <select class="quantity" data-id="{{ $item->rowId }}" data-productQuantity="{{ $item->model->qty }}">
                                @for ($i = 1; $i < 5 + 1 ; $i++)
                                    <option {{ $item->qty == $i ? 'selected' : '' }}>{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                        <div>{{ setPrice($item->subtotal()) }}</div>
                        
                    </div>
                </div> <!-- end cart-table-row -->
                @endforeach

            </div> <!-- end cart-table -->

            @if (! session()->has('coupon'))

                <a href="#" class="have-code">Have a Code?</a>

                <div class="have-code-container">
                    <form action="{{ route('coupon.store') }}" method="POST">
                        {{ csrf_field() }}
                        <input type="text" name="coupon_code" id="coupon_code">
                        <button type="submit" class="button button-plain">Apply</button>
                    </form>
                </div> <!-- end have-code-container -->
            @endif

            <div class="cart-totals">
                <div class="cart-totals-left">
                    Shipping is free because we’re awesome like that. Also because that’s additional stuff 
                    I don’t feel like figuring out :).
                </div>

                <div class="cart-totals-right">
                    
                    <div>
                        Subtotal <br>
                        @if (session()->has('coupon'))
                            Code ({{ session()->get('coupon')['name'] }})
                            <form action="{{ route('coupon.destroy') }}" method="POST" style="display:block">
                                {{ csrf_field() }}
                                {{ method_field('delete') }}
                                <button type="submit" class="btn btn-outline-danger btn-sm" style="font-size:14px;">Remove</button>
                            </form>
                            <hr>
                            New Subtotal <br>
                        @endif
                        Tax ({{config('cart.tax')}}%)<br>
                        <span class="cart-totals-total">Total</span>
                    </div>
                    <div class="cart-totals-subtotal">
                        {{ setPrice(Cart::subtotal()) }} <br>
                        @if (session()->has('coupon'))
                            -{{ setPrice($discount) }} <br>&nbsp;<br>
                            <hr>
                            {{ setPrice($newSubtotal) }}
                             <br>
                        @endif
                        {{ setPrice($newTax) }}<br>
                        <span class="cart-totals-total">{{ setPrice($newTotal) }}</span>
                    </div>
                </div>
            </div> <!-- end cart-totals -->

            <div class="cart-buttons">
                <a href="{{ route('shop.index') }}" class="button">Continue Shopping</a>
                <a href="{{ route('checkout.index') }}" class="button">Proceed to Checkout</a>
            </div>

            @else

                <h3>No items in Cart!</h3>
                <br><br>
                <a href="{{ route('shop.index') }}" class="button">Continue Shopping</a>
                <br><br>

            @endif
            <br>
            @if (Cart::instance('wishList')->count() > 0)

            <h2>{{ Cart::instance('wishList')->count() }} item(s) on your Wish List</h2>

            <div class="saved-for-later cart-table">
                @foreach (Cart::instance('wishList')->content() as $item)
                <div class="cart-table-row">
                    <div class="cart-table-row-left">
                        <a href="{{ route('shop.show', $item->model->slug) }}"><img src="{{ productImage($item->model->image) }}" alt="item" class="cart-table-img"></a>
                        <div class="cart-item-details">
                            <div class="cart-table-item"><a href="{{ route('shop.show', $item->model->slug) }}">{{ $item->model->name }}</a></div>
                            <div class="cart-table-description">{{ $item->model->details }}</div>
                        </div>
                    </div>
                    <div class="cart-table-row-right">
                        <div class="cart-table-actions">
                            <form action="{{ route('wishList.destroy', $item->rowId) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}

                                <button type="submit" class="btn btn-outline-danger btn-sm">Remove</button>
                            </form>

                            <form action="{{ route('wishList.switchToCart', $item->rowId) }}" method="POST">
                                {{ csrf_field() }}

                                <button type="submit" class="btn btn-outline-success btn-sm">Move to Cart</button>
                            </form>
                        </div>

                        <div>{{ setPrice($item->model->price) }}</div>
                    </div>
                </div> <!-- end cart-table-row -->
                @endforeach

            </div> <!-- end saved-for-later -->

            @else

            <h3>You have no items on your Wish List.</h3>

            @endif

        </div>

    </div> <!-- end cart-section -->

    @include('partials.mightAlsoLike')


@endsection

@section('extra-js')
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        (function(){
            const classname = document.querySelectorAll('.quantity')
            Array.from(classname).forEach(function(element) {
                element.addEventListener('change', function() {
                    const id = element.getAttribute('data-id')
                    const productQuantity = element.getAttribute('data-productQuantity')
                    axios.patch(`/cart/${id}`, {
                        quantity: this.value,
                        productQuantity: productQuantity
                    })
                    .then(function (response) {
                        // console.log(response);
                        window.location.href = '{{ route('cart.index') }}'
                    })
                    .catch(function (error) {
                        // console.log(error);
                        window.location.href = '{{ route('cart.index') }}'
                    });
                })
            })
        })();
    </script>

    <!-- Include AlgoliaSearch JS Client and autocomplete.js library -->
    <script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
    <script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js"></script>
    <script src="{{ asset('js/algolia.js') }}"></script>
@endsection