<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>LaraShop</title>
        {{-- fonts --}}
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat|Roboto:300,400,700">

        {{-- stlyes --}}
        <link rel="stylesheet" href="{{mix('css/app.css')}}">
        <link rel="stylesheet" href="{{asset('css/responsive.css')}}">
    </head>
    <body>
        <header>
            @extends('layout')
            {{-- end of top-nav --}}
            
            <div class="hero container">
                <div class="hero-copy">
                    <h1>RTX 3080</h1>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Qui reiciendis minus, impedit error aspernatur voluptate voluptatum doloremque quidem enim maiores dolorem quos incidunt atque porro!</p>
                    <div class="hero-buttons">
                        <a href="#" class="button button-white">button 1</a>   
                        <a href="#" class="button button-white">button 2</a>   
                    </div>   
                </div> {{-- end of hero-copy --}}
                
                <div class="hero-image">
                    <img src="img/rtx3080.png" alt="hero image">
                </div>
            </div> {{-- end of hero --}}
            
        </header>{{-- end of header --}}
        
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

        <footer>
            <div class="footer-content container">
                <div class="made-with">Made with <i class="fa fa-heart"></i> Rodglenn Chris Rojas</div>
                <ul>
                    <li>Follow Me:</li>
                    <li><a href="#"><i class="fa fa-globe"></i></a></li>
                    <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                    <li><a href="#"><i class="fa fa-github"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                </ul>
            </div>{{-- end footer-content --}}
        </footer>

    </body>
</html>
