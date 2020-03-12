@extends('layouts.website')

@section('title')
    Our Woman Accessories | Barròco
@endsection

@section('submenu')
    <div class="header_subnav">
        @if(!empty($thisCategory->subcategories))
            @foreach($thisCategory->subcategories as $menuSub)
                <a class="{{ Request::is('shop/'.$thisCategory->slug.'/'.$menuSub->slug) ? 'active':'' }}"
                   href="{{ url('shop/'."$thisCategory->slug/$menuSub->slug") }}">{{ $menuSub->title }}</a>
            @endforeach
        @endif
    </div>
@endsection

@section('content')
    <!-- Products -->
    <div id="products-list">
        <div class="container container-expanded">
            <div class="filters collapse-parent">
                <div class="bar">
                    <a href="#" class="collapse-custom" id="filters-toggle">FILTERS
                        <img src="https://barrocoitalia.com/wp-content/themes/barroco/assets/images/ico-filters.svg"
                             alt="">
                    </a>
                    <div class="sortby">
                        <span>SORT BY:</span>
                        <a href="#" class="current">Automatic</a>
                        <a href="#">Lower price</a>
                        <a href="#">Higher price</a>
                    </div>
                    <div class="pull"><a href="" id="filters-reset">RESET</a>
                        <a href="#" id="filters-close" style="display:none;">CLOSE</a>
                    </div>
                </div>
                <div class="wrapper collapse-manu" style="display:none;">
                    <div class="list">
                        <div class="filter"><h5>Modello</h5>
                            <ul class="woocommerce-widget-layered-nav-list">
                                <li class=" "><a rel="nofollow"
                                                 href="#">Belt</a>
                                    <span class="count">2</span></li>
                            </ul>
                        </div>
                        <div class="filter"><h5>Materiale</h5>
                            <ul class="woocommerce-widget-layered-nav-list">
                                <li class="">
                                    <a rel="nofollow" href="#">Alligator</a>
                                    <span class="count">3</span></li>
                            </ul>
                        </div>
                        <div class="filter"><h5>Disponibilità</h5>
                            <ul class="woocommerce-widget-layered-nav-list">
                                <li class="#">
                                    <a rel="nofollow" href="#">&lt;1 week</a> <span class="count">6</span>
                                </li>
                            </ul>
                        </div>
                        <div class="filter"><h5>Colore</h5>
                            <ul class="woocommerce-widget-layered-nav-list">
                                <li class="#">
                                    <a rel="nofollow" href="#">Black</a>
                                    <span class="count">3</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="masonry">
                @if($products)
                    @foreach($products as $product)
                        <div class="item">
                            <div class="product-preview">
                                <div class="product">
                                    @if(isset($product->wId))
                                        <a href="{{ route('destroy', $data->id)}}"
                                           class="product_wishlist-add added"></a>
                                    @else
                                        <a href="{{ route('wishlist', $product->slug)}}"
                                           class="product_wishlist-add"></a>
                                    @endif
                                    <div class="product_inner">
                                        <a href="{{route('shop.products.detail', [$thisCategory->slug, $product->slug])}}">
                                            <div class="product_img">
                                                <img src="{{ asset('media/product/thum/'. $product->thum_image_1) }}">
                                                @if($product->thum_image_2)
                                                    <img
                                                        src="{{ asset('media/product/thum/'. $product->thum_image_2) }}"
                                                        class="alt">
                                                @else
                                                    <img
                                                        src="{{ asset('media/product/thum/'. $product->thum_image_1) }}"
                                                        class="alt">
                                                @endif
                                            </div>
                                        </a>
                                        <div class="product_meta">
                                            <h4>Davide Albertario</h4>
                                            <h2 class="woocommerce-loop-product__title" itemprop="name">Purse in gray
                                                python
                                                with white shades</h2>
                                            <span class="price">
                                            <div>
                                                <span class="amount">305<span class="">€</span>
                                            </span>
                                            </div>
                                            <div>
                                                <small class="tax-free-text">TaxFree:
                                                <span class="amount">250
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
    <!-- End Products -->
@endsection
