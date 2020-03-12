@extends('layouts.website')

@section('title')
    {{ $data->name }}| Barròco
@endsection

@section('submenu')
    <div class="header_subnav">
        @if(!empty($thisCategory->subcategories))
            @foreach($thisCategory->subcategories as $menuSub)
                <a class="{{ isset($thisSubCategory) && $thisSubCategory->id ==  $menuSub->id ? 'active':'' }}" href="{{ url('shop/'."$thisCategory->slug/$menuSub->slug") }}">{{ $menuSub->title }}</a>
            @endforeach
        @endif
    </div>
@endsection

@section('content')
    <!-- Products Detail-->
    <div id="products-Detail">
        <div class="container container-expanded">
            <div id="breadcrumbs">
                <ul>
                    <li><a href="{{ url('shop/'.$thisCategory->slug) }}">{{ $thisCategory->title }}</a></li>
                    <li><a href="{{ url('shop/'."$thisCategory->slug/$thisSubCategory->slug") }}">{{ $thisSubCategory->title }}</a></li>
                    <li><span>{{ $data->name }}</span></li>
                </ul>
            </div>
            <div class="product">
                <div class="product_head">
                    <div class="product_images">
                        <div class="inner">
                            <div class="product_loader">
                                <span></span>
                            </div>
                            <div class="product_image">
                                @if(!empty($data->images))
                                    @foreach($data->images as $kay => $productImg)
                                    <a class="img{{ $kay }} p-img {{ $kay == 0 ? 'active':'' }}" href="{{ asset('media/product/'. $productImg->image ) }}" data-fancybox>
                                        <img src="{{ asset('media/product/'. $productImg->image ) }}" alt="{{ $data->name }}" class="in">
                                    </a>
                                    @endforeach
                                @endif
                            </div>
                            <div class="product_thumbs">
                                <ul>
                                    @if(!empty($data->images))
                                        @foreach($data->images as $kay => $thumImg)
                                        <li class="thmb-img {{ $kay == 0 ? 'active':'' }}" data-id="{{ $kay }}">
                                            <a href="#">
                                                <img src="{{ asset('media/product/'. $thumImg->image ) }}" alt="{{ $data->name }}" width="100">
                                            </a>
                                        </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="product_meta">
                        <div class="stick-not">
                            <div class="title-product">
                                <h5>Sartoria Corrado</h5>
                                <h2>{{ $data->name }}</h2>
                            </div>
                            <span class="price">
                                <span class=" amount">{{ $data->price }}
                                    <span class="woocommerce-Price-currencySymbol">€</span>
                                </span>
                                @if($data->tax)
                                <span class="price-sep"> - </span>
                                <small class="tax-free-text">TaxFree:
                                    <span class="woocommerce-Price-amount">{{ $data->tax }}
                                        <span class="woocommerce-Price-currencySymbol">€</span>
                                    </span>
                                </small>
                                @endif
                            </span>
                            <div class="mobile-show-carousel owl-carousel owl-carousel4">
                                @if(!empty($data->images))
                                    @foreach($data->images as $kay => $productImg)
                                    <div class="item">
                                        <img src="{{ asset('media/product/'. $productImg->image ) }}" alt="{{ $data->name }}">
                                    </div>
                                    @endforeach
                                @endif
                            </div>

                        <form action="{{ route('addToCart', $data->slug) }}" method="post">
                                @csrf
                                @if(!empty($data->sizes))
                                <table class="size-table">
                                    <tbody>
                                    <tr>
                                        <td class="label">
                                            <label for="asd">Size ( EU )</label>
                                            <div class="sizes">
                                                <a href="https://barrocoitalia.com/wp-content/uploads/2019/01/size_guide_trousers.pdf"
                                                   target="_blank">Size guide</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="value">
                                            <div class="variations-options">
                                                @foreach($data->sizes as $proSize)
                                                <label class="position-relative">
                                                    <input name="size" hidden value="{{ $proSize->size }}" class="input-hide" type="radio">
                                                    <span class="checkmark">{{ $proSize->size }}</span>
                                                </label>
                                                @endforeach
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                @endif
                                <div class="single_variation_wrap">
                                    <div class="woocommerce-add-to-custom">
                                        <div class="wrapper">
                                            <div class="cell">
                                                <a href="#" class="btn product__wishlist ">ADD TO WISHLIST</a>
                                            </div>
                                            <div class="cell">
                                                <div class="quantity" style="display: none;">
                                                    <label class="screen-reader-text" for="quantity_5ddf71333a2e0">Quantity</label>
                                                    <input type="number" class="input-text qty text"></div>
                                                <button type="submit"
                                                        class="btn w-100">Add to cart
                                                </button>
                                                <input type="hidden" name="add-to-cart">
                                                <input type="hidden" name="product_id">
                                                <input type="hidden" name="variation_id" class="variation_id"></div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="product__inner">
                                <div class="box collapse-parent">
                                    <div class="head collapse-custom">
                                        <img src="{{asset('website/img/ico-info.svg')}}"
                                             alt="">
                                        PRODUCT DESCRIPTION
                                        <span class="trigger">
                                            <i class="fa fa-plus togglePlus" style="display: none"></i>
                                            <i class="fa fa-minus togglePlus"></i>
                                        </span>
                                    </div>
                                    <div class="cont collapse-manu" style="display: block">
                                        <p>{!! $data->description !!}</p>
                                    </div>
                                </div>
                                <div class="box collapse-parent">
                                    <div class="head collapse-custom">
                                        <img src="{{asset('website/img/ico-ship.svg')}}"
                                             alt="">SHIPPING &amp; RETURN
                                        <span class="trigger">
                                            <i class="fa fa-plus togglePlus"></i>
                                            <i class="fa fa-minus togglePlus" style="display: none"></i>
                                        </span>
                                    </div>
                                    <div class="cont collapse-manu" style="">
                                        <p><strong>Costs</strong><br>Shipping UE: {{ $data->ShippingReturn->shipping_ue }}€
                                            @if($data->ShippingReturn->shipping_extra_ue)
                                            <br>Shipping Extra-UE: {{ $data->ShippingReturn->shipping_extra_ue }}€
                                            @endif
                                        </p>
                                        <p><strong>Delivery Time</strong><br>{{ $data->ShippingReturn->delivery_time }}</p>
                                        <p><strong>Return Policy</strong><br>
                                         {!! $data->ShippingReturn->return_policy !!}
                                        </p>
                                    </div>
                                </div>
                                <div class="box collapse-parent">
                                    <div class="head collapse-custom">
                                        <img src="{{asset('website/img/ico-warranty.svg')}}"
                                             alt="">
                                        CUSTOMER PROTECTION
                                        <span class="trigger">
                                            <i class="fa fa-plus togglePlus"></i>
                                            <i class="fa fa-minus togglePlus" style="display: none"></i>
                                        </span>
                                    </div>
                                    <div class="cont collapse-manu" style="">
                                        {!! $data->customer_production !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if(!empty($data->craftsman_id))
        <div class="container container-expanded  ">
            <div class="generic-carousel">
                <h3>YOU MAY BE INTERESTED IN</h3>
                <div class="owl-carousel owl-carousel-2 owl-loaded owl-drag">
                    
                        @foreach($relatedProducts as $related)
                        <div class="item">
                            <div class="product-preview">
                                <div class="product">
                                    <div class="product_inner">
                                        <h5 class="product__note">Made for Barròco</h5>
                                        <a href="{{route('shop.products.detail', [$related->category->slug, $related->slug])}}">
                                        <div class="product_img">
                                            <img src="{{ asset('media/product/thum/'. $related->thum_image_1) }}" alt="{{ $related->name }}">
                                            @if($related->thum_image_2)
                                                <img src="{{ asset('media/product/thum/'. $related->thum_image_2) }}" alt="{{ $related->name }}" class="alt">
                                            @else
                                                <img src="{{ asset('media/product/thum/'. $related->thum_image_1) }}" alt="{{ $related->name }}" class="alt">
                                            @endif
                                        </div>
                                        </a>
                                        <div class="product_meta"><h4>{{ $related->craftsman->name }}</h4>
                                            <h2>{{ $related->name }}</h2>
                                            <span class="price">
                                                <span class=" amount">{{ $related->price }}
                                                    <span class="">€</span>
                                                </span>
                                                <span class="price-sep"> - </span>
                                                <small class="tax-free-text">TaxFree: <span
                                                            class="amount">{{ $related->tax }}
                                                        <span class="">€</span>
                                                    </span>
                                                </small>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    
                </div>
            </div>
        </div>
        @endif
        @if($data->craftsman_id)
        <div class="product__box-wrap">
            <div class="container container-expanded">
                <div class="product__box">
                
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="image">
                                <a href="{{ route('shop.artisans.single',$data->craftsman->slug) }}">
                                    @if(!empty($data->craftsman))
                                    @if($data->craftsman->avatar)
                                        <img src="{{ asset('media/admin/'.$data->craftsman->avatar) }}" alt="{{ $data->craftsman->name }}">
                                    @else
                                        <img src="https://barrocoitalia.com/wp-content/uploads/2018/03/760x876_35.jpg" alt="">
                                    @endif
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="text">
                                <div class="description"><h1 style="text-align: center;">{{ $data->craftsman->name }}</h1>
                                    <p>{!! substr($data->craftsman->description , 0, 150) !!}</p>
                                </div>
                                <a href="{{ route('shop.artisans.single',$data->craftsman->slug) }}" class="link-underline">SEE MORE</a>
                            </div>
                        </div>
                                    @endif
                    </div>
                  
                </div>
            </div>
        </div>
        @endif
    </div>
    <!-- End Products Detail-->
@endsection
