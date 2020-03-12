@extends('layouts.website')

@section('title')
    My Order | Barròco
@endsection

@section('content')
    <div id="account-inner">
        <div class="container ">
            @include('website.includes.user_navbar')
            <div class="user-info">
                <p>Order #
                    <mark class="order-number">{{ $orders->id}}</mark>
                   
                    was placed on
                    <mark class="order-date">{{ date("j F, Y h:i a", strtotime($orders->created_at)) }}</mark>
                    
                    and is currently
                    <mark class="order-status">{{ $orders->status }}</mark>
                    
                    .
                </p>
                <h2>Order details</h2>
                <br>
                <table class="shop_table_cart">
                    <thead>
                    <tr>
                        <th class="">
                            <span class="nobr">PRODUCT</span>
                        </th>
                        <th class="text-right">
                            <span class="">TOTAL</span>
                        </th>
                    </tr>
                    </thead>
                   
                    <tbody>
                    @foreach($orderDetails as $order)
                    <tr class="">
                        <td class="">
                            <a href="#">{{ $order->product_name }}</a><strong class="product-quantity">×&nbsp;{{ $order->product_quantity }}</strong>
                        </td>
                        <td class="text-right">
                            {{-- <span>{{ $order->orders->total_amount }}</span><span>€</span> --}}
                            <span>{{ $order->product_quantity * $order->product_price }}</span><span>€</span>
                        </td>
                       
                    </tr>
                    {{-- <tr>
                    <th scope="row">Payment method:</th>
                    <td>{{ $order->payment->payment_type }}</td> --}}

                     @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th scope="row">Subtotal:</th>
                        <td><span class="">{{ $orders->sub_total_amount }}
                                <span>€</span>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Shipping:</th>
                        <td><span class="">25
                                <span>€</span>
                            </span>&nbsp;
                            <small class="shipped_via">via International rate (International Shipping)</small>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Payment method:</th>
                        <td>{{ $payment->payment_type }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Total:</th>
                        <td><span>{{ $orders->total_amount }}
                                <span>€</span>
                            </span>
                        </td>
                    </tr>
                    </tfoot>
                   
                </table>
                <br>
                <h2>Customer details</h2>
                <br>
                <table class="shop_table_cart">
                    <tbody>
                    <tr class="">
                        <td class="">
                            <strong>Email:</strong>
                        </td>
                        <td>{{ old('email', isset($user->email) ? $user->email:'') }}</td>
                    </tr>
                    <tr class="">
                        <td class="">
                            <strong>Phone:</strong>
                        </td>
                        <td>{{ old('phone_number', isset($user->phone_number) ? $user->phone_number:'') }}</td>
                    </tr>
                    </tbody>
                </table>
                <br>
                <section class="col2-set addresses">
                    <div class="col-1">
                        <div class="inner">
                            <h3 class="woocommerce-column__title">Billing address</h3>
                            @if(!empty($billingAddress))
                            <address>{{$billingAddress->first_name}} {{$billingAddress->last_name}}
                                <br>
                                {{$billingAddress->street_address}}
                                <br>
                                {{$billingAddress->town}}
                                <br>
                                {{$billingAddress->district}}
                                <br>
                                {{-- {{$billingAddress->country_id}} --}}
                            </address>
                            @endif
                        </div>
                    </div>
                    <div class="col-1">
                        <div class="inner">
                            <h3 class="woocommerce-column__title">Shipping address</h3>
                            @if(!empty($shippingAddress))
                            <address> {{$shippingAddress->first_name}} {{$shippingAddress->last_name}}
                                <br>
                                {{$shippingAddress->street_address}}
                                <br>
                                {{$shippingAddress->town}}
                                <br>
                                {{$shippingAddress->district}}
                                <br>
                                {{-- {{$shippingAddress->country_id}} --}}
                            </address>
                            @endif
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
