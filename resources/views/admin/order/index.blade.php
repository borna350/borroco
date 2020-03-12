@extends('admin.master')

@section('title')
    Admin / Order
@endsection

@section('page_title')
    <h2>All Order</h2>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="zmdi zmdi-view-dashboard"></i> Dashboard</a></li>
    <li class="breadcrumb-item active">Order</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        <ul class="header-dropdown">
                            <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
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
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th style="width:60px;">#</th>
                                <th>Name</th>
                                <th>Date</th>
                                <th>Address</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th width="15%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $key => $order)
                            <tr>
                                @if($order->orderDetails->products->thum_image_1)
                                <td><img src="{{ asset('media/product/thum/'. $order->orderDetails->products->thum_image_1) }}" alt="{{ $order->orderDetails->products->name}}"></td>
                                @endif
                                <td>{{ $order->user->first_name }}</td>
                                <td>{{ date("j F, Y h:i a", strtotime($order->created_at)) }}</td>
                                <td>{{ $order->shippingAddress->street_address }}</td>
                                <td><span class="">{{ $order->total_amount }}
                                    <span class="">€</span>
                                </span></td>
                                {{-- <td>{{ $order->status }}</td> --}}
                                <td>
                                    <div class="header">
                                    <ul class="header-dropdown">
                                        <li class="dropdown"> <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        @if($order->status == 'done')
                                            <span class="badge badge-success">Complete</span>
                                        @elseif($order->status == 'reject')
                                            <span class="badge badge-danger">Reject</span>
                                        @elseif($order->status == 'pending')
                                            <span class="badge badge-warning">Pending</span>
                                        @else
                                        <i class="zmdi zmdi-more"></i> 
                                        @endif
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-left slideUp float-left">
                                                <li> <a href="{{ url('admin/order-done/'. $order->id) }}"> <span class="badge badge-success">Complete</span></a></li>
                                                <li><a href="{{ url('admin/order-reject/'. $order->id) }}"> <span class="badge badge-danger">Reject</span></a></li>
                                                <li><a href="{{ url('admin/order-pending/'. $order->id) }}"> <span class="badge badge-warning">Pending</span></a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                    </div>
                                </td>
                                <td class="p-1">
                                    <form action="{{ route('order.destroy', $order->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{route('order.show',$order->id)}}" class="btn btn-default btn-icon btn-simple btn-icon-mini btn-round"><i class="zmdi zmdi-eye m-2"></i></a>
                                        <button type="submit" onclick="return confirm('Are you sure...?')"  class="btn btn-default btn-icon btn-simple btn-icon-mini btn-round"><i class="zmdi zmdi-delete"></i></button>
                                    </form>

                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
