@extends('layouts.website')

@section('title')
    Our Woman Selection | Barròco
@endsection

@section('content')

    <!-- Banner -->
    <div id="page-banner" style="background-image:url({{ asset('website/img/banner.jpg') }})">
        <div class="container">
            <div class="player-image">
                <a href="#">
                    <img src="{{ asset('website/img/play-intro.svg') }}">
                </a>
            </div>

            <div class="banner-content">
                <h2>Strong dedication to Italian Leather goods since a Century</h2>
                <p>Leu Locati Master Artisans craft their products in unique manners.</p>
                <a href="#" class="btn-underline">SEE MORE</a>
            </div>
        </div>
    </div>
    <!-- End Banner -->

    <!-- Home Content -->
    <div id="main-content">
        <div class="container container-expanded">
            <div class="row">
                <div class="col-md-12 owl-carousel-1 owl-carousel owl-theme">
                    <div class="pro-item"></div>
                    <div class="pro-item">
                        <div class="feature-img">
                            <img src="{{ asset('website/img/products/fi1.jpg') }}">
                        </div>
                        <div class="feature-title">
                            <a href="#" class="link-underline">Bags</a>
                        </div>
                    </div>

                    <div class="pro-item">
                        <div class="feature-img">
                            <img src="{{ asset('website/img/products/fi2.jpg') }}">
                        </div>
                        <div class="feature-title">
                            <a href="#" class="link-underline">Jewels</a>
                        </div>
                    </div>

                    <div class="pro-item">
                        <div class="feature-img">
                            <img src="{{ asset('website/img/products/fi3.jpg') }}">
                        </div>
                        <div class="feature-title">
                            <a href="#" class="link-underline">Accessories</a>
                        </div>
                    </div>

                    <div class="pro-item">
                        <div class="feature-img">
                            <img src="{{ asset('website/img/products/fi4.jpg') }}">
                        </div>
                        <div class="feature-title">
                            <a href="#" class="link-underline">Shoes</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container container-expanded mt-5">
            <div class="home-product mt-4">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="pro-big-img">
                            <img class="img-fluid" src="{{ asset('website/img/products/First_Lunch-1-640x800.jpg') }}">
                        </div>
                    </div>

                    <div class="col-md-6 col-12">
                        <div class="text">
                            <div class="caption">
                                <h3>Overwhelming desire</h3>
                                <p>Sophisticated, pink and exclusive accessory!</p>
                                <a href="#" class="link-underline">Discover more</a>
                            </div>
                            <div class="products">
                                <div class="product-preview">
                                    <div class="row">
                                        <div class="col-6 col-md-6 res-col-pad-left">
                                            <div class="product-list">
                                                <img src="{{ asset('website/img/products/1_list-4.jpg') }}">
                                                <img src="https://barrocoitalia.com/wp-content/uploads/2018/10/3gr.jpg?x34755" alt="Leather pink bag with natural stone" class="alt">
                                            </div>
                                            <div class="product_meta">
                                                <h4>Kastunis</h4>
                                                <h2>Leather bag with natural stone</h2>
                                                <span class="price">512 € - <small class="tax-free-text">TaxFree: 419€</small></span>
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-6 res-col-pad-right">
                                            <div class="product-list">
                                                <img src="https://barrocoitalia.com/wp-content/uploads/2018/10/34grigio-1.jpg?x34755" alt="Leather Light blue bag with natural stone">
                                                <img src="https://barrocoitalia.com/wp-content/uploads/2018/10/35grigio.jpg?x34755" alt="Leather Light blue bag with natural stone" class="alt">
                                            </div>
                                            <div class="product_meta">
                                                <h4>Kastunis</h4>
                                                <h2>Leather bag with natural stone</h2>
                                                <span class="price">512 € - <small class="tax-free-text">TaxFree: 419€</small></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="home-product mt-4">
                <div class="row">
                    <div class="col-12 col-md-6 ">
                        <div class="text">
                            <div class="caption">
                                <h3>Federico Primiceri and the art of jewellery</h3>
                                <p>Research and creativity, care for the design and the selection of metals and precious stones.</p>
                                <a href="#" class="link-underline">Discover more</a>
                            </div>

                            <div class="products">
                                <div class="product-preview">
                                    <div class="row">
                                        <div class="col-6 res-col-pad-left col-md-6">
                                            <div class="product-list">
                                                <img class="" src="{{ asset('website/img/products/fantasy-7.jpg') }}">

                                            </div>
                                            <div class="product_meta">
                                                <h4>Kastunis</h4>
                                                <h2>Leather bag with natural stone</h2>
                                                <span class="price">512 € - <small class="tax-free-text">TaxFree: 419€</small></span>
                                            </div>
                                        </div>
                                        <div class="col-6 res-col-pad-right col-md-6">
                                            <div class="product-list">
                                                <img src="{{ asset('website/img/products/fantasy-7.jpg') }}">
                                            </div>
                                            <div class="product_meta">
                                                <h4>Kastunis</h4>
                                                <h2>Leather bag with natural stone</h2>
                                                <span class="price">512 € - <small class="tax-free-text">TaxFree: 419€</small></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 mt-res">
                        <div class="pro-big-img">
                            <img class="img-fluid" src="{{ asset('website/img/products/Federico.jpg') }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="video-content mt-4">
            <div class="container container-expanded">
                <div class="row">
                    <div class="col-md-5 col-sm-5 d-flex align-items-center">
                        <div class="video-text">
                            <div class="caption m-0">
                                <h3 class="text-white">Leu Locati and the Italian leather tradition</h3>
                                <p class="text-white">The historical Milanese company open its workshop where Leu Locati bags and shoes are crafted since 1905.</p>
                                <a href="#" class="link-underline text-white">SHOP</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 col-sm-7 mt-res">
                        <div class="ft-video">
                            <img src="{{ asset('website/img/products/video-leu.jpg') }}" alt="">
                            <a href="https://www.youtube.com/watch?v=uhO27VAP06g" class="vdo"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Home Content -->
@endsection
