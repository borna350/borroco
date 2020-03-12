@extends('layouts.website')

@section('title')
    My Order | Barròco
@endsection

@section('content')
    <div id="account-inner">
        <div class="container ">
            @include('website.includes.user_navbar')
            <div class="user-info">
                {{--                <div class="alert-black" style="padding-bottom: 20px">NO ORDER HAS BEEN MADE YET.</div>--}}

                <table class="shop_table_cart">
                    <thead>
                    <tr>
                        <th class="">
                            <span class="nobr">Order</span>
                        </th>
                        <th class="">
                            <span class="nobr">Date</span>
                        </th>
                        <th class="">
                            <span class="nobr">Status</span>
                        </th>
                        <th class="">
                            <span class="nobr">Total</span>
                        </th>
                        <th class="">
                            <span class="nobr">Actions</span></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $key => $order)
                    <tr class="">
                        <td class="">
                            <a href="{{route('user.accounts.order.view',$order->id)}}">{{ $order->id }}</a>
                        </td>
                        <td class="">
                            <time datetime="2019-12-19T05:55:19+00:00">{{ date("j F, Y h:i a", strtotime($order->created_at)) }}</time>
                        </td>
                        <td class=""> {{ $order->status }} </td>
                        <td class="">
                            <span class="">{{ $order->total_amount }}
                                <span class="">€</span>
                            </span>
                        </td>
                        <td class="">
                            <a href="#">Pay</a>
                            <a href="{{route('user.accounts.order.view',$order->id)}}">View</a>
                            <a href="#">Cancel</a></td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
