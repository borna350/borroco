@extends('layouts.website')

@section('title')
    Our Man Selection | Barròco
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
            <div class="feature-product">
                <div class="row">
                    <div class="col-md-12 owl-carousel owl-theme">
                        <div class="pro-item">

                        </div>

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
        </div>

        <div class="container container-expanded mt-5">
            <div class="home-product mt-4">
                <div class="row">
                    <div class="col-sm-6 col-lg-6 col-md-6">
                        <div class="pro-big-img">
                            <img class="img-fluid" src="{{ asset('website/img/products/First_Lunch-1-640x800.jpg') }}">
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-6 col-md-6">
                        <div class="text">
                            <div class="caption">
                                <h3>Overwhelming desire</h3>
                                <p>Sophisticated, pink and exclusive accessory!</p>
                                <a href="#" class="link-underline">Discover more</a>
                            </div>

                            <div class="products">
                                <div class="product-preview">
                                    <div class="row">
                                        <div class="col-sm-6 col-lg-6 col-md-6">
                                            <div class="product-list">
                                                <img src="{{ asset('website/img/products/1_list-4.jpg') }}">
                                            </div>
                                            <div class="product-info">
                                                <div class="product_meta">
                                                    <h4>Kastunis</h4>
                                                    <h2>Leather bag with natural stone</h2>
                                                    <span class="price">
                                                512 € - <small class="tax-free-text">TaxFree: 419€</small>
                                            </span>
                                                </div>
                                                <div class="product_link">
                                                    <a class=""> BUY</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-lg-6 col-md-6">
                                            <div class="product-list">
                                                <img src="{{ asset('website/img/products/1_list-4.jpg') }}">
                                            </div>
                                            <div class="product-info">
                                                <div class="product_meta">
                                                    <h4>Kastunis</h4>
                                                    <h2>Leather bag with natural stone</h2>
                                                    <span class="price">
                                                512 € - <small class="tax-free-text">TaxFree: 419€</small>
                                            </span>
                                                </div>
                                                <div class="product_link">
                                                    <a class=""> BUY</a>
                                                </div>
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
                    <div class="col-sm-6 col-lg-6 col-md-6">
                        <div class="text">
                            <div class="caption">
                                <h3>Federico Primiceri and the art of jewellery</h3>
                                <p>Research and creativity, care for the design and the selection of metals and precious stones.</p>
                                <a href="#" class="link-underline">Discover more</a>
                            </div>

                            <div class="products">
                                <div class="product-preview">
                                    <div class="row">
                                        <div class="col-sm-6 col-lg-6 col-md-6">
                                            <div class="product-list">
                                                <img src="{{ asset('website/img/products/fantasy-7.jpg') }}">
                                            </div>
                                            <div class="product-info">
                                                <div class="product_meta">
                                                    <h4>Kastunis</h4>
                                                    <h2>Leather bag with natural stone</h2>
                                                    <span class="price">
                                                512 € - <small class="tax-free-text">TaxFree: 419€</small>
                                            </span>
                                                </div>
                                                <div class="product_link">
                                                    <a class=""> BUY</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-lg-6 col-md-6">
                                            <div class="product-list">
                                                <img src="{{ asset('website/img/products/fantasy-7.jpg') }}">
                                            </div>
                                            <div class="product-info">
                                                <div class="product_meta">
                                                    <h4>Kastunis</h4>
                                                    <h2>Leather bag with natural stone</h2>
                                                    <span class="price">
                                                512 € - <small class="tax-free-text">TaxFree: 419€</small>
                                            </span>
                                                </div>
                                                <div class="product_link">
                                                    <a class=""> BUY</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-6 col-md-6">
                        <div class="pro-big-img">
                            <img class="img-fluid" src="{{ asset('website/img/products/Federico.jpg') }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container container-expanded">
            <div class="video-content mt-4">
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
                    <div class="col-md-7 col-sm-7">
                        <div class="ft-video">
                            <img src="{{ asset('website/img/products/video-leu.jpg') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Home Content -->
@endsection
