@extends('layouts.website')

@section('title')
    My Order | Barròco
@endsection

@section('content')
    <div id="account-inner">
        <div class="container ">
            @include('website.includes.user_navbar')
            <div class="user-info">
                <p> The following addresses will be used on the checkout page by default.</p>
                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="inner">
                            <header class="">
                                <h3>Billing address</h3>
                                <a href="{{route('user.accounts.billing')}}" class="edit">Edit</a>
                            </header>
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
                    <div class="col-md-6 col-12">
                        <div class="inner">
                            <header><h3>Shipping address</h3> <a
                                href="{{route('user.accounts.shipping')}}"
                                class="edit">Edit</a></header>
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
                </div>
            </div>
        </div>
    </div>
@endsection
