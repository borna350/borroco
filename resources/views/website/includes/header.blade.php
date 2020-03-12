<div id="main-header" class="mobile-hide">
    <div class="container container-expanded">
        <!-- Top Header-->
        <div class="header_top">
            <div class="row">
                <div class="col-md-4 lang_col header_extra pt-10">
                    <a href="{{ route('shop')}}" class="logo">
                        <img src="{{asset('website/img/logo-mark.svg')}}" alt="">
                    </a>
                    <div class="lang">
                        <ul class="">
                            <li class="">
                                <a class="nav-link-custom" href="#">ITA</a>
                            </li>
                            <li class="">
                                <a class="nav-link-custom active" href="#">ENG</a>
                            </li>
                        </ul>
                    </div>
                    <div class="currency">
                        <div class="">
                            <ul>
                                <li class="wcml-cs-active-currency"><a rel="EUR">€ EUR</a></li>
                                <li><a rel="USD">$ USD</a></li>
                                <li><a rel="GBP">£ GBP</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="web_logo">
                        <a href="{{ route('shop')}}"> <img src="{{ asset('website/img/logo.svg') }}"></a>
                    </div>
                    <div class="header_nav d-flex justify-content-center align-content-center">
                        <nav class=" navbar-expand-lg">
                            <div class="collapse navbar-collapse">
                                <ul class="navbar-nav menu">
                                    @if(!empty(getAllCategories()))
                                        @foreach(getAllCategories() as $navCategory)
                                            <li class="nav-item menu-item-has-children text-uppercase">
                                                <a class="nav-link {{ Request::is('shop/'.$navCategory->slug.'*') ? 'active':'' }}" href="{{ route('category.shop', $navCategory->slug) }}">
                                                    {{ $navCategory->title }}
                                                </a>
                                            </li>
                                        @endforeach
                                    @endif

                                    <li class="nav-item menu-item-has-children">
                                        <a class="nav-link {{ (\Request::route()->getName() == 'shop.artisans') ? 'active2' : '' }}"
                                           href="{{route('shop.artisans')}}">ARTISANS</a>
                                    </li>

                                    <li class="nav-item menu-item-has-children">
                                        <a class="nav-link {{ (\Request::route()->getName() == 'shop.about') ? 'active2' : '' }}"  href="{{route('shop.about')}}">ABOUT</a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
                <div class="col-md-4 pt-10 header_user">
                    @guest
                        @if (Route::has('user.login.page'))
                    <a class="sign-text" href="{{ route('user.login.page')}}">SIGNUP</a>
                        @endif
                    @else
                    <a class="sign-text" href="{{route('user.accounts.dashboard')}}">MY ACCOUNT </a>
                    @endguest
                    <div class="wishlist">
                        <a href="{{ route('shop.wish')}}">
                            <img width="16px" height="18px" src="{{asset('website/img/ico-wishlist-w.svg')}}" alt="">
                        </a>
                    </div>
                    <div class="cart">
                        <a href="{{ route('shop.cart')}}" class="cart-contents">
                            <img src="{{asset('website/img/ico-bag.svg')}}"
                                 alt="">
                            @if(Cart::count())
                                <span class="cart-count">{{ Cart::count() }}</span>
                            @endif
                        </a>
                        <div id="mini-cart" class="mini-cart">
                            <div class="mini-cart__content">
                                <ul>
                                    @if(!empty(Cart::content()))
                                        @foreach(Cart::content() as $row)
                                        <li>
                                            <div class="image">
                                                <a href="#">
                                                    <img src="{!! asset('media/product/thum/'. $row->options->image) !!}" alt="{!! $row->name !!}">
                                                </a>
                                            </div>
                                            <div class="meta">
                                                <h4>{{ $row->name }}</h4>
                                                <span class="price">
                                                    <span class="woocommerce-Price-amount amount">{{ $row->price }}
                                                        <span class="woocommerce-Price-currencySymbol">€</span>
                                                    </span>
                                                    @if(!empty( Cart::tax()))
                                                    <span class="price-sep"> - </span>
                                                    <small class="tax-free-text">TaxFree:
                                                        <span class="woocommerce-Price-amount amount">{{Cart::tax()}}
                                                            <span class="woocommerce-Price-currencySymbol">€</span>
                                                        </span>
                                                    </small>
                                                    @endif
                                                </span>
                                                <a href="{{ route('remove.cart', $row->rowId) }}" class="remove">Remove</a></div>
                                        </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                            <div class="mini-cart__bottom"><a href="#" class="btn">BUY</a>
                                <a href="{{route('shop.cart')}}" class="recap">Go to cart</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @yield('submenu')
</div>
<div class="mobile-nav mobile-show collapse-parent">
    <a href="#" class="menu-trigger collapse-custom"><span></span></a>
    <a href="{{ route('shop')}}">
        <img src="https://barrocoitalia.com/wp-content/themes/barroco/assets/images/logo.svg" alt="">
    </a>
    <div class="cart">
        <a href="#">
            <img src="https://barrocoitalia.com/wp-content/themes/barroco/assets/images/ico-wishlist-w.svg" alt="">
        </a> <a class="cart-contents">
            <img src="https://barrocoitalia.com/wp-content/themes/barroco/assets/images/ico-bag.svg" alt="">
            <span class="cart-count">0</span>
        </a>
    </div>
    <div class="nav-detail collapse-manu">
        <div class="header-opt">
            <div class="lang">
                <ul>
                    <li><a href="#">ITA</a></li>
                    <li><a href="#" class="current">ENG</a></li>
                </ul>
            </div>
            <div class="currency">
                <ul>
                    <li><a class="current">€ EUR</a></li>
                    <li><a>$ USD</a></li>
                    <li><a>£ GBP</a></li>
                </ul>
            </div>
        </div>
        <ul class="menu">
            @if(!empty(getAllCategories()))
                @foreach(getAllCategories() as $navCategory)
                    <li class="collapse-parent-inner">
                        <a href="{{ route('category.shop', $navCategory->slug) }}"> {{ $navCategory->title }}
                            <span class="collapse-custom-inner"></span>
                        </a>
                        @if(!empty($navCategory->subcategories))
                        <ul class="sub-menu collapse-manu-inner">
                            @foreach($navCategory->subcategories as $navSubCat)
                            <li>
                                <a href="#">{{ $navSubCat->title }}</a>
                            </li>
                            @endforeach
                        </ul>
                        @endif
                    </li>
                @endforeach
            @endif
            <li>
                <a href="#">Artisans</a>
            </li>
            <li>
                <a href="{{route('shop.about')}}">About</a>
            </li>
        </ul>
    </div>
</div>
