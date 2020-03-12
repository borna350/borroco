@extends('layouts.website')

@section('title')
    Discover artisans | Barròco
@endsection

@section('content')
    <!-- artisans -->
    <div id="artisan-content">
        <div class="container container-expanded">
            @if(!empty($data))
                @foreach($data as $key => $artisan)
                    @if(!empty($artisan->artisanProduct))
                        @if($key % 2 == 0)
                            <div class="brand">
                            <div class="images">
                                <div class="wrapper">
                                    <div class="image">
                                        <a href="{{route('shop.artisans.single',$artisan->slug)}}">
                                            @if($artisan->avatar)
                                                <img src="{{ asset('media/admin/'.$artisan->avatar) }}" alt="{{ $artisan->name }}">
                                            @else
                                                <img src="https://barrocoitalia.com/wp-content/uploads/2019/06/profilo.jpg" alt="">
                                            @endif
                                        </a>
                                    </div>
                                    <div class="carousel">
                                        <div class="product-preview">
                                            <div class="product">
                                                <div class="product__inner">
                                                    <a href="{{route('shop.products.detail', [$artisan->artisanProduct->category->slug, $artisan->artisanProduct->slug])}}">
                                                    <div class="product__image">

                                                        <img src="{{ asset('media/product/thum/'. $artisan->artisanProduct->thum_image_1) }}">
                                                        @if($artisan->artisanProduct->thum_image_2)
                                                            <img src="{{ asset('media/product/thum/'. $artisan->artisanProduct->thum_image_2) }}" class="alt">
                                                        @else
                                                            <img src="{{ asset('media/product/thum/'. $artisan->artisanProduct->thum_image_1) }}" class="alt">
                                                        @endif

                                                    </div>
                                                </a>
                                                    <div class="product__meta"><h4>{{ $artisan->name }}</h4>
                                                        <h2>{{ $artisan->artisanProduct->name }}</h2>
                                                        <span class="price">
                                                            <span class="amount">{{ $artisan->artisanProduct->price }}
                                                                <span class="">€</span>
                                                            </span>
                                                            @if($artisan->artisanProduct->tax)
                                                            <span class="price-sep"> - </span>
                                                            <small class="tax-free-text">TaxFree: <span class="amount">{{ $artisan->artisanProduct->tax }}
                                                                    <span class="">€</span>
                                                                </span>
                                                            </small>
                                                            @endif
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text">
                                <div class="caption">
                                    <h3>{{ $artisan->name }}</h3>
                                    <p>
                                        {!! substr($artisan->description, 0, 150) !!}
                                    </p>
                                    <a href="{{ route('shop.artisans.single',$artisan->slug) }}" class="link-underline">Discover more</a>
                                </div>
                            </div>
                        </div>
                        @else
                            <div class="brand alternate">
                            <div class="images">
                                <div class="wrapper">
                                    <div class="image">
                                        <a href="{{route('shop.artisans.single',$artisan->slug)}}">
                                            @if($artisan->avatar)
                                                <img src="{{ asset('media/admin/'.$artisan->avatar) }}" alt="{{ $artisan->name }}">
                                            @else
                                                <img src="https://barrocoitalia.com/wp-content/uploads/2019/06/profilo.jpg" alt="">
                                            @endif
                                        </a>
                                    </div>
                                    <div class="carousel">
                                        <div class="product-preview">
                                            <div class="product">
                                                <div class="product__inner">
                                                    <a href="{{route('shop.products.detail', [$artisan->artisanProduct->category->slug, $artisan->artisanProduct->slug])}}">
                                                    <div class="product__image">
                                                        <img src="{{ asset('media/product/thum/'. $artisan->artisanProduct->thum_image_1) }}">
                                                        @if($artisan->artisanProduct->thum_image_2)
                                                            <img src="{{ asset('media/product/thum/'. $artisan->artisanProduct->thum_image_2) }}" class="alt">
                                                        @else
                                                            <img src="{{ asset('media/product/thum/'. $artisan->artisanProduct->thum_image_1) }}" class="alt">
                                                        @endif
                                                    </div>
                                                </a>
                                                    <div class="product__meta">
                                                        <h4>{{ $artisan->name }}</h4>
                                                        <h2>{{ $artisan->artisanProduct->name }}</h2>
                                                        <span class="price">
                                                            <span class="amount">{{ $artisan->artisanProduct->price }}
                                                                <span class="">€</span>
                                                            </span>
                                                            @if($artisan->artisanProduct->tax)
                                                                <span class="price-sep"> - </span>
                                                                <small class="tax-free-text">TaxFree: <span class="amount">{{ $artisan->artisanProduct->tax }}
                                                                    <span class="">€</span>
                                                                </span>
                                                            </small>
                                                            @endif
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text">
                                <div class="caption">
                                    <h3>{{ $artisan->name }}</h3>
                                    <p>{!! substr($artisan->description, 0, 150) !!}</p>
                                    <a href="{{ route('shop.artisans.single',$artisan->slug) }}" class="link-underline">Discover more</a>
                                </div>
                            </div>
                        </div>
                        @endif
                    @endif
                @endforeach
            @endif
        </div>
    </div>
    <!-- End artisans -->
@endsection
