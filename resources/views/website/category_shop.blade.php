@extends('layouts.website')

@section('title')
    Our {{ $data->title }} Selection | Barròco
@endsection

@section('submenu')
    <div class="header_subnav">
        @if(!empty($data->subcategories))
            @foreach($data->subcategories as $menuSub)
                <a href="{{ url('shop/'."$data->slug/$menuSub->slug") }}">{{ $menuSub->title }}</a>
            @endforeach
        @endif
    </div>
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
                    @if(!empty($data->subcategories))
                        @foreach($data->subcategories as $subcategory)
                            <div class="pro-item">
                                <div class="feature-img">
                                    @if($subcategory->image)
                                        <img src="{{ asset('media/subcategory/'.$subcategory->image) }}">
                                    @else
                                        <img src="{{ asset('website/img/placeholder/subcategory-deft.png') }}">
                                    @endif
                                </div>
                                <div class="feature-title">
                                    <a href="#" class="link-underline">{{ $subcategory->title }}</a>
                                </div>
                            </div>
                        @endforeach
                    @endif

                </div>
            </div>
        </div>

        <div class="container container-expanded mt-5">
            @if(!empty($data->homeSubcategories))
                @foreach($data->homeSubcategories as $key => $homeSubCat)
                    @if($key % 2 == 0)
                    <div class="home-product mt-4">
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="pro-big-img">
                                    <img class="img-fluid" src="{{ asset('media/subcategory/'.$homeSubCat->feature_image) }}">
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="text">
                                    <div class="caption">
                                        <h3>{{ $homeSubCat->feature_title }}</h3>
                                        <p>{{ $homeSubCat->feature_subtitle }}!</p>
                                        <a href="{{ url('shop/'.$data->slug.'/'.$homeSubCat->slug) }}" class="link-underline">Discover more</a>
                                    </div>
                                    <div class="products">
                                        <div class="product-preview">
                                            <div class="row">
                                                @if(!empty($homeSubCat->subCateWiseProducts))
                                                    @foreach($homeSubCat->subCateWiseProducts as $catProduct)
                                                        <div class="col-6 col-md-6 res-col-pad-left">
                                                            <a href="{{ url('shop/'.$data->slug.'/product', $catProduct->slug) }}">
                                                                <div class="product-list">
                                                                    <img src="{{ asset('media/product/thum/'. $catProduct->thum_image_1) }}">
                                                                    @if($catProduct->thum_image_2)
                                                                        <img src="{{ asset('media/product/thum/'. $catProduct->thum_image_2) }}" class="alt">
                                                                    @else
                                                                        <img src="{{ asset('media/product/thum/'. $catProduct->thum_image_1) }}" class="alt">
                                                                    @endif
                                                                </div>
                                                            </a>
                                                            <div class="product_meta">
                                                                @if($catProduct->craftsman_id)
                                                                    <h4>{{ $catProduct->craftsman->name }}</h4>
                                                                @endif
                                                                <h2>{{ $catProduct->name }}</h2>
                                                                <span class="price">{{ $catProduct->price }} € @if($catProduct->tax)- <small class="tax-free-text">TaxFree: {{$catProduct->tax}}€ @endif</small></span>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @else
                        <div class="home-product mt-4">
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="text">
                                        <div class="caption">
                                            <h3>{{ $homeSubCat->feature_title }}</h3>
                                            <p>{{ $homeSubCat->feature_subtitle }}!</p>
                                            <a href="{{ url('shop/'.$data->slug.'/'.$homeSubCat->slug) }}" class="link-underline">Discover more</a>
                                        </div>
                                        <div class="products">
                                            <div class="product-preview">
                                                <div class="row">
                                                    @if(!empty($homeSubCat->subCateWiseProducts))
                                                        @foreach($homeSubCat->subCateWiseProducts as $catProduct)
                                                        <div class="col-6 col-md-6 res-col-pad-left">
                                                            <a href="{{ url('shop/'.$data->slug.'/product', $catProduct->slug) }}">
                                                                <div class="product-list">
                                                                    <img src="{{ asset('media/product/thum/'. $catProduct->thum_image_1) }}">
                                                                    @if($catProduct->thum_image_2)
                                                                        <img src="{{ asset('media/product/thum/'. $catProduct->thum_image_2) }}" class="alt">
                                                                    @else
                                                                        <img src="{{ asset('media/product/thum/'. $catProduct->thum_image_1) }}" class="alt">
                                                                    @endif
                                                                </div>
                                                            </a>
                                                            <div class="product_meta">
                                                                @if($catProduct->craftsman_id)
                                                                    <h4>{{ $catProduct->craftsman->name }}</h4>
                                                                @endif
                                                                <h2>{{ $catProduct->name }}</h2>
                                                                <span class="price">{{ $catProduct->price }} € @if($catProduct->tax)- <small class="tax-free-text">TaxFree: {{$catProduct->tax}}€ @endif</small></span>
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="pro-big-img">
                                        <img class="img-fluid" src="{{ asset('media/subcategory/'.$homeSubCat->feature_image) }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            @endif
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
