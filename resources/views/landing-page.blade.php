@extends('main-layout')
@section('title', 'Home')
@section('content')
    <div class="featured-section">
        <div class="container">
            <h1 class="text-center">CSS Grid Example</h1>
            
            <p class="section-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam, dicta nobis. Excepturi odio soluta odit ducimus qui hic nulla, debitis deserunt rem possimus enim amet.</p>

            <div class="text-center button-container">
                <a href="#" class="button">Featured</a>
                <a href="#" class="button">On Sale</a>
            </div>

            <div class="products text-center">
                @foreach ($products as $product)
                
                <div class="product">
                    <a href="#"><img src="img/rtx3080.png" alt="product"></a>
                    <a href="#"><div class="product-name">{{$product->name}}</div></a>
                    <div class="product-price">{{$product->setPrice()}}</div>
                </div>

                @endforeach

            </div> {{-- end of products --}}
            
            <div class="text-center button-container">
                <a href="#" class="button">View more Products</a>
            </div>

        </div> {{-- end container --}}

    </div> {{-- end featured-section --}}

    <div class="blog-section">
        <div class="container">
            <h1 class="text-center">From Our Website</h1>

            <p class="section-description">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Tempore rerum ipsa ullam iure incidunt repellendus officiis tenetur placeat expedita alias aperiam, earum vitae harum repellat.</p>

            <div class="blog-posts">
                <div class="blog-post">
                    <a href="#"><img src="img/blog1.png" alt="blog image"></a>
                    <a href="#"><h2 class="blog-title">Blog Post Title 1</h2></a>
                    <div class="blog-description">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab adipisci temporibus corrupti, veniam eligendi perspiciatis?</div>
                </div>
                <div class="blog-post">
                    <a href="#"><img src="img/blog1.png" alt="blog image"></a>
                    <a href="#"><h2 class="blog-title">Blog Post Title 2</h2></a>
                    <div class="blog-description">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab adipisci temporibus corrupti, veniam eligendi perspiciatis?</div>
                </div>
                <div class="blog-post">
                    <a href="#"><img src="img/blog1.png" alt="blog image"></a>
                    <a href="#"><h2 class="blog-title">Blog Post Title 3</h2></a>
                    <div class="blog-description">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab adipisci temporibus corrupti, veniam eligendi perspiciatis?</div>
                </div>

            </div>{{-- end blog-post --}}

        </div> {{-- end container --}}

    </div>{{-- end blog-section --}}
@endsection