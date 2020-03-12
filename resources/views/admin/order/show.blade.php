@extends('admin.master')

@section('title')
    Admin / Order
@endsection

@section('page_title')
    <h2>All Order</h2>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="zmdi zmdi-view-dashboard"></i>
            Dashboard</a></li>
    <li class="breadcrumb-item active">Order</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        <ul class="header-dropdown">
                            <li class="dropdown"><a href="javascript:void(0);" class="dropdown-toggle"
                                                    data-toggle="dropdown" role="button" aria-haspopup="true"
                                                    aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                                <ul class="dropdown-menu dropdown-menu-right slideUp float-right">
                                    <li><a href="javascript:void(0);">Action</a></li>
                                    <li><a href="javascript:void(0);">Another action</a></li>
                                    <li><a href="javascript:void(0);">Something else</a></li>
                                </ul>
                            </li>
                            <li class="remove">
                                <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="body table-responsive members_profiles">
                        <h4>Order details</h4>
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
                                    @if($order->products->thum_image_1)
                                        <img src="{{ asset('media/product/thum/'. $order->products->thum_image_1) }}" alt="{{ $order->product_name }}" width="20%">
                                    @endif
                                        <a href="#">{{ $order->product_name }}</a><strong class="product-quantity">×&nbsp;{{ $order->product_quantity }}</strong>
                                    </td>
                                    <td class="text-right">
                                        <span>{{ $order->product_quantity * $order->product_price }}</span><span>€</span>
                                    </td>
                                </tr>
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
                                <th scope="row">Status:</th>
                                <td><span class="">{{ $orders->status }}</span>
                                </td>
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
                        <h4>Customer details</h4>
                        <br>
                        <table class="shop_table_cart">
                            <tbody>
                            <tr class="">
                                <td class="">
                                    <strong>Name:</strong>
                                </td>
                                <td>{{ $orders->user->first_name }} {{ $orders->user->last_name }}</td>
                            </tr>
                            <tr class="">
                                <td class="">
                                    <strong>Email:</strong>
                                </td>
                                <td>{{ $orders->user->email }}</td>

                            </tr>
                            <tr class="">
                                <td class="">
                                    <strong>Phone:</strong>
                                </td>
                                <td>{{ isset($orders->user->phone_number) ? $orders->user->phone_number:'' }}</td>
                            </tr>
                            </tbody>
                        </table>
                        <br>
                        <section class="col2-set addresses">
                            <div class="">
                                <div class="inner">
                                    <h4>Shipping address</h4>
                                    <address> {{$orders->shippingAddress->street_address}}
                                        <br>
                                        {{$orders->shippingAddress->town}}
                                        <br>
                                        {{$orders->shippingAddress->district}}
                                    </address>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
