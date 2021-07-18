@extends('layouts.others-layout')
@section('title','Shop')
@section('content')
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Shop</li>
            </ol>
        </nav>

        <div class="products-section container">
            <div class="sidebar">
                <h3>By Category</h3>
                <ul>
                    @foreach ($categories as $category)
                        <li class="{{ setActiveCategory($category->slug)}}"><a href="{{ route('shop.index', ['category' => $category->slug]) }}">{{ $category->name }}</a></li>
                    @endforeach
                </ul>
            </div> <!-- end sidebar -->

            <div>
                <div class="products-header">
                    <h1 class="stylish-heading">{{ $categoryName }}</h1>
                    <div>
                        <strong>Price: </strong>
                        <a href="{{ route('shop.index', ['category'=> request()->category, 'sort' => 'low_high']) }}">Low to High</a> |
                        <a href="{{ route('shop.index', ['category'=> request()->category, 'sort' => 'high_low']) }}">High to Low</a>
    
                    </div>
                </div>
    
                <div class="products text-center">
                    @forelse ($products as $product)
                        <div class="product">
                            <a href="{{route('shop.show', $product->slug)}}"><img src="{{ productImage($product->image) }}" alt="product"></a>
                            <a href="{{route('shop.show', $product->slug)}}"><div class="product-name">{{ $product->name }}</div></a>
                            <div class="product-price">{{ $product->setPrice() }}</div>
                        </div>
                    @empty
                        <div style="text-align: left">No items found</div>
                    @endforelse

                </div> <!-- end products -->
    
                <br>
               {!! $products->appends(request()->input())->links('vendor.pagination.custom') !!}
 
            </div>
    </div>
@endsection