@extends('layouts.website')

@section('title')
    Checkout | Barròco
@endsection

@section('content')

    <!-- privacy policy -->
    <div class="container">
        <div id="page-inner-cart">
            <div class="checkout-inner">
                @if (session('success'))
                <div class="alert-golden" role="alert">
                    <p>{{ session('success') }}</p>
                </div>
                @elseif(session('error'))
                <div class="alert-black" role="alert">
                    <p>{{ session('error') }}</p>
                </div>
                @endif
                <form class="checkout_coupon_area" action="{{ route('apply.coupon') }}" method="post">
                    @csrf
                    <label>Have a coupon?</label>
                    <p class="form-row form-row-first">
                        <input type="text" name="coupon_code" class="input-text" placeholder="Coupon code"
                               id="coupon_code">
                    </p>
                    <p class="form-row form-row-last">
                        <button type="submit" class="btn" >Apply coupon</button>
                    </p>
                    <div class="clear"></div>
                </form>
                <form name="checkout" method="post" class="checkout" action="{{route('store.payment')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="col2-set row" id="customer_details">
                        <div class="col-md-6 col-12">
                          
                            <div class="woocommerce-billing-fields">
                                
                                <h3>Billing details</h3>
                                <p class="">
                                    <label>First name&nbsp;</label>
                                    <br>
                                    <input type="text" class="input-text " name="first_name" value="{{ old('first_name', isset($billingAddress->first_name) ? $billingAddress->first_name:'') }}">
                                </p>
                                <p class="">
                                    <label>LAST NAME&nbsp;</label>
                                    <br>
                                    <input type="text" class="input-text " name="last_name" value="{{ old('last_name', isset($billingAddress->last_name) ? $billingAddress->last_name:'') }}">
                                </p>
                                <p class="">
                                    <label class="optional">COMPANY NAME
                                        (OPTIONAL)&nbsp;</label>
                                    <br>
                                    <input type="text" class="input-text " name="company_name" value="{{ old('company_name', isset($billingAddress->company_name) ? $billingAddress->company_name:'') }}">
                                </p>
                                {{-- <p class="">
                                    <label>COUNTRY&nbsp;</label>
                                    <br>
                                    <select name="" class="input-select " id="">
                                        <option value="">Select a country</option>
                                        <option value="">Select a country</option>
                                        <option value="">Select a country</option>
                                    </select>
                                </p> --}}
                                <p class="">
                                    <label>COUNTRY </label>
                                    <br>
                                    <input type="text" class="input-text" name="country_id" value="{{ old('country_id', isset($billingAddress->country_id) ? $billingAddress->country_id:'') }}">
                                </p>
                                <p class="">
                                    <label>STREET ADDRESS&nbsp;</label>
                                    <br>
                                    <input type="text" class="input-text" placeholder="House number and street name" name="street_address" value="{{ old('street_address', isset($billingAddress->street_address) ? $billingAddress->street_address:'') }}">
                                </p>
                                <p class="">
                                    <label>TOWN / CITY&nbsp;</label>
                                    <br>
                                    <input type="text" class="input-text" name="town" value="{{ old('town', isset($billingAddress->town) ? $billingAddress->town:'') }}">
                                </p>
                                <p class="">
                                    <label>DISTRICT&nbsp;</label>
                                    <br>
                                    <input type="text" class="input-text" name="district" value="{{ old('district', isset($billingAddress->district) ? $billingAddress->district:'') }}">
                                </p>
                                <p class="">
                                    <label class="optional">POSTCODE / ZIP
                                        (OPTIONAL)&nbsp;</label>
                                    <br>
                                    <input type="text" class="input-text" name="post_code" value="{{ old('post_code', isset($billingAddress->post_code) ? $billingAddress->post_code:'') }}">
                                </p>
                                <p class="">
                                    <label>PHONE &nbsp;</label>
                                    <br>
                                    <input type="text" class="input-text" name="phone" value="{{ old('phone', isset($billingAddress->phone) ? $billingAddress->phone:'') }}">
                                </p>
                                <p class="">
                                    <label>EMAIL ADDRESS&nbsp;</label>
                                    <br>
                                    <input type="text" class="input-text" name="email" value="{{ old('email', isset($billingAddress->email) ? $billingAddress->email:'') }}">
                                </p>
                                <p class="">
                                    <label class="optional">
                                        <input class="input-checkbox" id="input-check" type="checkbox">
                                        <span>CREATE AN ACCOUNT?</span>
                                    </label>
                                </p>
                                <p class="if-true" style="display: none">
                                    <label>CREATE ACCOUNT PASSWORD &nbsp;</label>
                                    <br>
                                    <input type="text" class="input-text ">
                                </p>
                                <p class="">
                                    <label class="optional">
                                        <input class="input-checkbox" id="input-billing" type="checkbox">
                                        <span style="color: #C2915F;">Ship to a different address?</span>
                                    </label>
                                </p>
                                <div class="if-billing-true" style="display: none">
                                    <p class="">
                                        <label>FIRST NAME&nbsp;</label>
                                        <br>
                                        <input type="text" class="input-text "name="first_name" value="{{ old('first_name', isset($shippingAddress->first_name) ? $shippingAddress->first_name:'') }}">
                                    </p>
                                    <p class="">
                                        <label>LAST NAME&nbsp;</label>
                                        <br>
                                        <input type="text" class="input-text " name="last_name" value="{{ old('last_name', isset($shippingAddress->last_name) ? $shippingAddress->last_name:'') }}">
                                    </p>
                                    <p class="">
                                        <label class="optional">COMPANY NAME
                                            (OPTIONAL)&nbsp;</label>
                                        <br>
                                        <input type="text" class="input-text "  name="company_name" value="{{ old('company_name', isset($shippingAddress->company_name) ? $shippingAddress->company_name:'') }}">
                                    </p>
                                    {{-- <p class="">
                                        <label>COUNTRY&nbsp;</label>
                                        <br>
                                        <select name="country_id" class="input-select " id="">
                                            <option value="country_id">Bangladesh</option>
                                            <option value="country_id">India</option>
                                            <option value="country_id">Nepal</option>
                                        </select>
                                    </p> --}}
                                    <p class="">
                                        <label>COUNTRY </label>
                                        <br>
                                        <input type="text" class="input-text" name="country_id" value="{{ old('country_id', isset($shippingAddress->country_id) ? $shippingAddress->country_id:'') }}">
                                    </p>
                                    <p class="">
                                        <label>STREET ADDRESS&nbsp;</label>
                                        <br>
                                        <input type="text" class="input-text " name="street_address" value="{{ old('street_address', isset($shippingAddress->street_address) ? $shippingAddress->street_address:'') }}">
                                    </p>
                                    <p class="">
                                        <label>TOWN / CITY&nbsp;</label>
                                        <br>
                                        <input type="text" class="input-text " name="town" value="{{ old('town', isset($shippingAddress->town) ? $shippingAddress->town:'') }}">
                                    </p>
                                    <p class="">
                                        <label>DISTRICT&nbsp;</label>
                                        <br>
                                        <input type="text" class="input-text " name="district" value="{{ old('district', isset($shippingAddress->district) ? $shippingAddress->district:'') }}">
                                    </p>
                                    <p class="">
                                        <label class="optional">POSTCODE / ZIP
                                            (OPTIONAL)&nbsp;</label>
                                        <br>
                                        <input type="text" class="input-text " name="post_code" value="{{ old('post_code', isset($shippingAddress->post_code) ? $shippingAddress->post_code:'') }}">
                                    </p>
                                    
                                    
                                </div>
                                <p class="">
                                    <label class="optional">EMAIL ADDRESS&nbsp;</label>
                                    <br>
                                    <textarea placeholder="Notes about your order, e.g. special notes for delivery."
                                              name="" id="" cols="30" rows="10"></textarea>
                                </p>
                                
                            </div>
                            
                        </div>
                        <div class="col-md-6 col-12">
                            <h3>Your order</h3>
                            <table class="shop_table_cart">
                                <thead>
                                <tr>
                                    <th class="product-name">Product</th>
                                    <th class="product-total">Total</th>
                                </tr>
                                </thead>
                               
                                <tbody>
                                    @foreach(Cart::content() as $row)
                                <tr class="cart_item">
                                    <td class="product-name">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <img width="100" height="100" src="{!! asset('media/product/thum/'. $row->options->image) !!}"alt="{!! $row->name !!}">
                                            </div>
                                            <div class="col-md-7">{{ $row->name }}<br></div>
                                        </div>
                                    </td>
                                    <td class="product-total">
                                        <span>{{ $row->qty * $row->price }}
                                            <span>€</span>
                                        </span>
                                        <small>(incl. VAT)</small>
                                    </td>
                                    @endforeach
                                </tr>
                                </tbody>
                                <tfoot>
                                <tr class="cart-subtotal">
                                    <th>Subtotal</th>
                                    <td><span>{{Cart::subtotal()}}<span>€</span></span></td>
                                </tr>
                                <tr class="shipping">
                                    <th>Shipping</th>
                                    <td>International rate (International Shipping): <span>25<span>€</span></span>
                                        <input type="hidden">
                                    </td>
                                </tr>
                                <tr class="order-total">
                                    <th>Total</th>
                                    <td><strong><span>{{Cart::total()}}<span>€</span></span></strong>
                                    </td>
                                </tr>
                                </tfoot>
                            </table>
                            <div class="payment">
                                <ul>
                                    <li class="collapse-parent">
                                        <input type="radio" class="input-radio" name="payment_type" value="Credit Card">
                                        <label for="payment_method_stripe">CREDIT CARD
                                            <img src="{{ asset('website/img/cart/visa.svg')}}" alt="Visa">
                                            <img src="{{ asset('website/img/cart/amex.svg')}}" alt="American Express">
                                            <img src="{{ asset('website/img/cart/mastercard.svg')}}" alt="Mastercard">
                                        </label>
                                        <div class="payment-info">
                                            <p>Pay with your credit card through Stripe</p>
                                            <div class="">
                                                <label>Card Number</label>
                                                <div class="stripe-card-group">
                                                    <input type="text" placeholder="2134 1234 1234 1322" name="credit_card_number">
                                                    <i class="fa fa-credit-card logo"></i>
                                                </div>
                                            </div>
                                            <div class="">
                                                <label>Expiry Date</label>
                                                <div class="stripe-card-group">
                                                    <input type="text" placeholder="MM/YY" name="credit_card_expire_date">
                                                </div>
                                            </div>
                                            <div class="">
                                                <label>Card Code (CVC)</label>
                                                <div class="stripe-card-group">
                                                    <input type="text" placeholder="CVC" name=credit_card_code>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li  class="collapse-parent">
                                        <input type="radio" class="input-radio" name="payment_type" value="Paypal">
                                        <label for="payment_method_stripe">PAYPAL
                                            <img src="{{ asset('website/img/cart/paypal.png')}}" alt="paypal">
                                        </label>
                                        <a href="#" class="what-is-paypal">What is PayPal?</a>
                                        <div class="payment-info">
                                            <p>Pay with Paypal; you can pay with your credit card if you have not a
                                                Paypal account.</p>
                                        </div>
                                    </li>
                                    <li  class="collapse-parent">
                                        <input type="radio" class="input-radio" name="payment_type" value="Sepa Direct Debit">
                                        <label for="payment_method_stripe">SEPA DIRECT DEBIT
                                            <img src="{{ asset('website/img/cart/sepa.svg')}}" alt="Visa">
                                        </label>
                                        <div class="payment-info">
                                            <p>Tramite questa opzione di pagamento potrai eseguire la transazione in
                                                sicurezza tramite la tua banca.</p>
                                            <p>By providing your IBAN and confirming this payment, you are authorizing
                                                Barròco Italia and Stripe, our payment service provider, to send
                                                instructions to your bank to debit your account and your bank to debit
                                                your account in accordance with those instructions. You are entitled to
                                                a refund from your bank under the terms and conditions of your agreement
                                                with your bank. A refund must be claimed within 8 weeks starting from
                                                the date on which your account was debited.</p>
                                            <div class="">
                                                <label>IBAN.</label>
                                                <div class="stripe-card-group">
                                                    <input type="text" placeholder="IT00 A000 0000 0000 0000 0000 000" name="sepa_iban">
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="collapse-parent">
                                        <input type="radio" class="input-radio" name="payment_type" value="Sofort">
                                        <label for="payment_method_stripe">SOFORT
                                            <img src="{{ asset('website/img/cart/sofort.svg')}}" alt="Visa">
                                        </label>
                                        <div class="payment-info">
                                            <p>You will be redirected to SOFORT.</p>
                                        </div>
                                    </li>
                                    <li  class="collapse-parent">
                                        <input type="radio" class="input-radio" name="payment_type" value="Giropay">
                                        <label for="payment_method_stripe">GIROPAY
                                            <img src="{{ asset('website/img/cart/giropay.svg')}}" alt="Visa">
                                        </label>
                                        <div class="payment-info">
                                            <p>You will be redirected to Giropay.</p>
                                        </div>
                                    </li>
                                </ul>
                                <p>Your personal data will be used to process your order, support your experience on
                                    this website and for other purposes described in our privacy policy.
                                </p>
                                <p class="">
                                    <label class="optional">
                                        <input class="input-checkbox" id="input-check" type="checkbox">
                                        <span style="font-size: 12px"> <strong>I HAVE READ AND AGREE TO THE WEBSITE</strong> <a
                                                    href="#">TERMS AND CONDITIONS</a></span>
                                    </label>
                                </p>
                                <button type="submit" class="btn alt">Place Order</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End privacy policy -->
@endsection
