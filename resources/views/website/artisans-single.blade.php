@extends('layouts.website')

@section('title')
    Discover artisans | Barròco
@endsection

@section('content')
    <!-- artisans -->
    <div id="artisan-single">
        <div class="container container-expanded">
            <div class="margin-50"></div>
            <div class="brand__intro">
                <div class="image">
                    @if(!empty($data))
                        @if($data->avatar)
                            <img src="{{ asset('media/admin/'.$data->avatar) }}" alt="{{ $data->name }}">
                        @else
                            <img src="https://barrocoitalia.com/wp-content/uploads/2018/03/760x876_35.jpg" alt="">
                    @endif

                </div>
                <div class="text">
                    <div class="caption">

                        <h3>{{ $data->name }}</h3>
                        <h4>{{ $data->address}}</h4>
                        <p class="half"> {!! substr($data->description, 0, 150) !!}</p>

                    </div>
                </div>
                @endif
            </div>
            <div class="brand__video">
                <div class="video">
                    <a href="https://www.youtube.com/watch?v=dWnSLiptqP0" data-fancybox="">
                        <img src="{{asset('website/img/play-intro.svg')}}" alt="">
                    </a>
                    <img src="https://barrocoitalia.com/wp-content/uploads/2018/07/cover-video-960x480.jpg" alt="">
                </div>
                <div class="text">
                    <div class="caption"><h3>Shirtmakers from the XIX Century</h3>
                        <p>See how Camiceria Ambrosiana products was made and discover special details about them.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                {{--                <div class="col-md-5 mb-5">--}}
                {{--                    <div class="img-artisan-single">--}}
                {{--                        <a href="#">--}}
                {{--                            <img src="https://barrocoitalia.com/wp-content/uploads/2019/06/profilo.jpg" alt="">--}}
                {{--                        </a>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
                {{--                <div class="col-md-1"></div>--}}
                {{--                <div class="col-md-6">--}}
                {{--                    <div class="text-position-single">--}}
                {{--                        <div class="text">--}}
                {{--                            <div class="caption"><h3>Alberto Olivero</h3>--}}
                {{--                                <h4>Cuneo, Italy</h4>--}}
                {{--                                <p>In the extraordinary setting of Sommariva del Bosco, a gateway to the Roero, whose--}}
                {{--                                    has been declared an UNESCO World Heritage sitethat was born in 2016 the Alberto--}}
                {{--                                    Olivero brand.--}}
                {{--                                    The Brand can count on its own team of artisans, in fact even though the brand has--}}
                {{--                                    recently born, the Olivero family boasts experience and a consolidated leadership in--}}
                {{--                                    the Automotive sector. The skillful team of artisans, the design of the Founder--}}
                {{--                                    Alberto, combined with soft volumes and straight cut is what characterizes the--}}
                {{--                                    Alberto Olivero products. Each item is made strictly by hand, respecting the raw--}}
                {{--                                    material and enhancing every single step. Products then becomes the tangible result--}}
                {{--                                    of a process that involves people, stories, values ​​and emotions; a passion that--}}
                {{--                                    Alberto Olivero, together with his artisans, wants to continue to transmit over--}}
                {{--                                    time.</p>--}}
                {{--                            </div>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
            </div>

        </div>
        <div id="products-list">
            <div class="container container-expanded">
                <div class="margin-50"></div>
                <h3 class="product-head-text text-center">Alberto Olivero Products</h3>
                <div class="masonry">
                    @if(!empty($products))
                        @foreach($products as $artisanProduct)
                            <div class="item">
                                <div class="product-preview">
                                    <div class="product">
                                        <a href="#" class="product_wishlist-add"></a>
                                        <div class="product_inner">
                                            <a href="{{route('shop.products.detail', [$artisanProduct->category->slug, $artisanProduct->slug])}}">
                                                <div class="product_img">
                                                    <img src="{{ asset('media/product/thum/'. $artisanProduct->thum_image_1) }}" alt="Elegant and versatile women’s umbrella made by Pasotti" itemprop="image">
                                                    @if($artisanProduct->thum_image_2)
                                                        <img src="{{ asset('media/product/thum/'. $artisanProduct->thum_image_2) }}" alt="Elegant and versatile women’s umbrella made by Pasotti" class="alt">
                                                    @else
                                                        <img src="{{ asset('media/product/thum/'. $artisanProduct->thum_image_1) }}" alt="Elegant and versatile women’s umbrella made by Pasotti" class="alt">
                                                    @endif
                                                </div>
                                            </a>
                                            <div class="product_meta">
                                                <h4>{{ $data->name }}</h4>
                                                <h2 class="woocommerce-loop-product__title" itemprop="name">{{$artisanProduct->name}}</h2>
                                                <span class="price">
                                        <div>
                                            <span class="amount">{{$artisanProduct->price}}
                                            <span class="">€</span>
                                        </span>
                                        </div>
                                        <div>
                                            <small class="tax-free-text">TaxFree:
                                            <span class="amount">{{$artisanProduct->tax}}
                                                <span class="">€</span>
                                            </span>
                                        </small>
                                        </div>
                                    </span>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- End artisans -->
@endsection
