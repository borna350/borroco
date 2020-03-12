@extends('layouts.website')

@section('title')
    Cart | Barròco
@endsection

@section('content')

    <!-- Cart -->
    <div class="container">
        <div id="page-inner-cart">
            <div class="cart-inner">
                <div class="empty-cart">
                    <p class="cart-empty">Your cart is currently empty.</p>
                    <p class="return-to-shop">
                        <a class="btn" href="#"> Return to shop </a>
                    </p>
                </div>
                <form action="{{ route('update.cart') }}" method="POST">
                    @csrf
                    <table class="shop_table_cart">
                        <thead>
                        <tr>
                            <th class="product-remove">&nbsp;</th>
                            <th class="product-thumbnail">&nbsp;</th>
                            <th class="product-name">Product</th>
                            <th class="product-price">Price</th>
                            <th class="product-quantity">Quantity</th>
                            <th class="product-subtotal">Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(!empty(Cart::content()))
                            <tr class="">
                                @foreach(Cart::content() as $row)
                                <input type="hidden" name="row_id[]" value="{{ $row->rowId }}">
                                    <td class="product-remove">
                                        <a href="{{ route('remove.cart', $row->rowId) }}" class="remove"aria-label="Remove this product">×</a>
                                    </td>
                                    <td class="product-thumbnail">
                                        <a href="#">
                                            <img src="{!! asset('media/product/thum/'. $row->options->image) !!}"alt="{!! $row->name !!}">
                                        </a>
                                    </td>
                                    <td class="product-name">
                                        <a href="#">{{ $row->name }}</a>
                                    </td>
                                    <td class="product-price">{{ $row->price }}
                                    </td>
                                    <td class="product-quantity">
                                       
                                        <input type="number" name="qty[]" value="{{ $row->qty }}" class="input-text text">
                                      
                                    </td>
                                    <td class="product-subtotal">
                                <span class="amount">{{ $row->qty * $row->price }}
                                    <span class="">€</span>
                                </span>
                                        <small>(inc. VAT)</small>
                                    </td>
                            </tr>
                                @endforeach
                        @endif
                        <tr>
                            <td colspan="6" class="actions">
            
                                <button type="submit" class="btn" >Update cart</button>
                            
                            </td>
                        </tr>
                        </tbody>
                    </table> 
                </form>
                <table class="shop_table_cart">
                    <tr>
                        <td>
                            <div class="coupon">
                                <form action="{{ route('apply.coupon') }}" method="POST">
                                    @csrf
                                    <input type="text" name="coupon_code" class="input-text" placeholder="Enter your coupon code" style="width: auto;">
                                    <button type="submit" class="btn" >Apply coupon</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                </table>
                <div class="cart-collaterals">
                    <div class="cart_totals"><h2>Total cart</h2>
                        <table class="shop_table">
                            <tbody>
                            <tr class="">
                                <th>Subtotal</th>
                                <td><span class="amount">€ <span> {{Cart::subtotal()}}</span></span>
                                    <small class="tax_label">(inc. VAT)</small>
                                </td>
                            </tr>
                            <tr class="shipping">
                                <th><span>Shipping</span></th>
                                <td>Shipping Italy (Free Shipping): <span>0</span> <span>€</span>
                                    <form class="collapse-parent">
                                        <p class="collapse-custom">
                                            <a href="javascript:void(0)" class="shipping-calculator-button">
                                                Calculate shipping
                                            </a>
                                        </p>
                                        <section class="shipping-calculator-form collapse-manu" style="display:none;">
                                            <p>
                                                <select name="" id="">
                                                    <option value="">Select Country</option>
                                                </select>
                                            </p>
                                            <p>
                                                <span>
                                                    <select placeholder="Provincia">
                                                        <option>Selezionare una provincia…</option>
                                                     </select>
                                                </span>
                                            </p>
                                            <p>
                                                <input class="input-text" placeholder="C.A.P.">
                                            </p>
                                            <p>
                                                <button type="submit" name="calc_shipping" value="1" class="btn">
                                                    Aggiorna totale
                                                </button>
                                            </p>
                                        </section>
                                    </form>
                                </td>
                            </tr>
                            <tr class="order-total">
                                <th>Total</th>
                                <td>
                                    <strong><span class="amount"><€</span></strong>
                                    <strong><span class="amount"> {{Cart::total()}}</span></strong>
                                    <small>(including €<span class="amount"> 216</span>VAT)</small>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        
                        <div class="wc-proceed-to-checkout">
                                <a href="{{route('shop.checkout')}}" class="btn alt"> Proceed to checkout</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- End Cart -->

@endsection
