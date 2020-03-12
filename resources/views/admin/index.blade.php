@extends('admin.master')

@section('title')
    Admin Dashboard
@endsection

@section('page_title')
    <h2>Admin Dashboard
        <small class="text-muted">Welcome to Admin</small>
    </h2>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item active">Dashboard</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-4 col-md-12">
                <div class="card tasks_report">
                    <div class="header">
                        <h2><strong>Total</strong> Revenue</h2>
                        <ul class="header-dropdown">
                            <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                                <ul class="dropdown-menu dropdown-menu-right slideUp float-right">
                                    <li><a href="javascript:void(0);">Edit</a></li>
                                    <li><a href="javascript:void(0);">Delete</a></li>
                                    <li><a href="javascript:void(0);">Report</a></li>
                                </ul>
                            </li>
                            <li class="remove">
                                <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="body text-center">
                        <h4 class="m-t-0">Total Sale</h4>
                        <h6 class="m-b-20">2,45,124</h6>
                        <input type="text" class="knob dial1" value="66" data-width="140" data-height="140" data-thickness="0.1" data-fgColor="#00ced1" readonly>
                        <h6 class="m-t-30">Satisfaction Rate</h6>
                        <small class="displayblock">47% Average <i class="zmdi zmdi-trending-up"></i></small>
                        <div class="sparkline m-t-20" data-type="bar" data-width="97%" data-height="45px" data-bar-Width="2" data-bar-Spacing="8" data-bar-Color="#00ced1">3,2,6,5,9,8,7,8,4,5,1,2,9,5,1,3,5,7,4,6</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <div class="header">
                        <h2><strong>Total</strong> Income</h2>
                    </div>
                    <div class="body">
                        <h3 class="m-b-0">47,012</h3>
                        <small class="displayblock">23% Average <i class="zmdi zmdi-trending-up"></i></small>
                        <div class="sparkline" data-type="line" data-spot-Radius="1" data-highlight-Spot-Color="rgb(63, 81, 181)" data-highlight-Line-Color="#222"
                             data-min-Spot-Color="rgb(233, 30, 99)" data-max-Spot-Color="rgb(63, 81, 181)" data-spot-Color="rgb(63, 81, 181, 0.7)"
                             data-offset="90" data-width="100%" data-height="60px" data-line-Width="1" data-line-Color="rgb(63, 81, 181, 0.7)"
                             data-fill-Color="rgba(221,94,137, 0.2)"> 1,2,3,1,4,3,6,4,4,1 </div>
                    </div>
                </div>
                <div class="card">
                    <div class="header">
                        <h2><strong>Total</strong> Orders</h2>
                    </div>
                    <div class="body">
                        <h3 class="m-b-0">512</h3>
                        <small class="displayblock">18% Average <i class="zmdi zmdi-trending-down"></i></small>
                        <div class="sparkline" data-type="line" data-spot-Radius="1" data-highlight-Spot-Color="rgb(63, 81, 181)" data-highlight-Line-Color="#222"
                             data-min-Spot-Color="rgb(233, 30, 99)" data-max-Spot-Color="rgb(120, 184, 62)" data-spot-Color="rgb(63, 81, 181, 0.7)"
                             data-offset="90" data-width="100%" data-height="60px" data-line-Width="1" data-line-Color="rgb(63, 81, 181, 0.7)"
                             data-fill-Color="rgba(128,133,233, 0.2)"> 4,5,2,8,4,8,7,4,8,5</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <div class="header">
                        <h2><strong>Total</strong> Visitor</h2>
                    </div>
                    <div class="body">
                        <h3 class="m-b-0">1,612</h3>
                        <small class="displayblock">13% Average <i class="zmdi zmdi-trending-up"></i></small>
                        <div class="sparkline" data-type="line" data-spot-Radius="1" data-highlight-Spot-Color="rgb(63, 81, 181)" data-highlight-Line-Color="#222"
                             data-min-Spot-Color="rgb(233, 30, 99)" data-max-Spot-Color="rgb(120, 184, 62)" data-spot-Color="rgb(63, 81, 181, 0.7)"
                             data-offset="90" data-width="100%" data-height="60px" data-line-Width="1" data-line-Color="rgb(63, 81, 181, 0.7)"
                             data-fill-Color="rgba(44,168,255, 0.2)">1,5,9,3,5,7,8,5,2,3,5,7</div>
                    </div>
                </div>
                <div class="card">
                    <div class="header">
                        <h2><strong>Total</strong> Active Users</h2>
                    </div>
                    <div class="body">
                        <h3 class="m-b-0">721</h3>
                        <small class="displayblock">17% Average <i class="zmdi zmdi-trending-up"></i></small>
                        <div class="sparkline" data-type="line" data-spot-Radius="1" data-highlight-Spot-Color="rgb(63, 81, 181)" data-highlight-Line-Color="#222"
                             data-min-Spot-Color="rgb(233, 30, 99)" data-max-Spot-Color="rgb(120, 184, 62)" data-spot-Color="rgb(63, 81, 181, 0.7)"
                             data-offset="90" data-width="100%" data-height="60px" data-line-Width="1" data-line-Color="rgb(63, 81, 181, 0.7)"
                             data-fill-Color="rgba(0,0,0, 0.2)">8,6,4,2,3,6,5,7,9,8,5,2</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>Product</strong> Report</h2>
                        <ul class="header-dropdown">
                            <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                                <ul class="dropdown-menu dropdown-menu-right">
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
                    <div class="body">
                        <div class="sales-bars-chart" style="height: 320px;"> </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-8 col-md-12">
                <div class="card product-report">
                    <div class="header">
                        <h2><strong>Annual</strong> Report <small><strong>Note:</strong> Contrary to popular belief, Lorem Ipsum is not simply random text.</small></h2>
                        <ul class="header-dropdown">
                            <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                                <ul class="dropdown-menu dropdown-menu-right">
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
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="icon l-amber m-b-20"><i class="zmdi zmdi-chart-donut"></i></div>
                                <div class="col-in">
                                    <h3 class="counter m-b-0">$4,516</h3>
                                    <small class="text-muted m-t-0">Sales Report</small>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="icon l-turquoise m-b-20"><i class="zmdi zmdi-chart"></i></div>
                                <div class="col-in">
                                    <h3 class="counter m-b-0">$6,481</h3>
                                    <small class="text-muted m-t-0">Annual Revenue </small>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="icon l-parpl m-b-20"><i class="zmdi zmdi-card"></i></div>
                                <div class="col-in">
                                    <h3 class="counter m-b-0">$3,915</h3>
                                    <small class="text-muted m-t-0">Total Profit</small>
                                </div>
                            </div>
                        </div>
                        <div id="area_chart" class="graph m-t-20"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>USA</strong> Sales Report</h2>
                    </div>
                    <div class="body">
                        <div class="row">
                            <div class="col-sm-4 col-4 m-b-10">
                                <small class="text-muted">Today</small>
                                <h5 class="m-b-0">256</h5>
                            </div>
                            <div class="col-sm-4 col-4 m-b-10">
                                <small class="text-muted">This Week</small>
                                <h5 class="m-b-0">621</h5>
                            </div>
                            <div class="col-sm-4 col-4 m-b-10">
                                <small class="text-muted">This Month</small>
                                <h5 class="m-b-0">981</h5>
                            </div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar l-turquoise" role="progressbar" aria-valuenow="87" aria-valuemin="0" aria-valuemax="100" style="width: 87%;"></div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="header">
                        <h2><strong>India</strong> Sales Report</h2>
                    </div>
                    <div class="body">
                        <div class="row">
                            <div class="col-sm-4 col-4 m-b-10">
                                <small class="text-muted">Today</small>
                                <h5 class="m-b-0">195</h5>
                            </div>
                            <div class="col-sm-4 col-4 m-b-10">
                                <small class="text-muted">This Week</small>
                                <h5 class="m-b-0">235</h5>
                            </div>
                            <div class="col-sm-4 col-4 m-b-10">
                                <small class="text-muted">This Month</small>
                                <h5 class="m-b-0">312</h5>
                            </div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar l-coral" role="progressbar" aria-valuenow="58" aria-valuemin="0" aria-valuemax="100" style="width: 58%;"></div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="header">
                        <h2><strong>Europe</strong> Sales Report</h2>
                    </div>
                    <div class="body">
                        <div class="row">
                            <div class="col-sm-4 col-4 m-b-10">
                                <small class="text-muted">Today</small>
                                <h5 class="m-b-0">210</h5>
                            </div>
                            <div class="col-sm-4 col-4 m-b-10">
                                <small class="text-muted">This Week</small>
                                <h5 class="m-b-0">462</h5>
                            </div>
                            <div class="col-sm-4 col-4 m-b-10">
                                <small class="text-muted">This Month</small>
                                <h5 class="m-b-0">574</h5>
                            </div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar l-parpl" role="progressbar" aria-valuenow="71" aria-valuemin="0" aria-valuemax="100" style="width: 71%;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>Recent</strong> Orders</h2>
                        <ul class="header-dropdown">
                            <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                                <ul class="dropdown-menu dropdown-menu-right slideUp">
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
                                <th>Item</th>
                                <th>Address</th>
                                {{-- <th>Quantity</th> --}}
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $key => $order)
                            <tr>
                                @if($order->orderDetails->products->thum_image_1)
                                <td><img src="{{ asset('media/product/thum/'. $order->orderDetails->products->thum_image_1) }}" alt="{{ $order->orderDetails->products->name }}"></td>
                                @endif
                               
                                <td>{{  $order->user->first_name  }}</td>
                                <td>{{ $order->orderDetails->products->name }}</td>
                                <td>{{  $order->shippingAddress->street_address }}</td>
                                {{-- <td>{{ $order->product_quantity }}</td> --}}
                                <td>
                                @if($order->status == 'done')
                                    <span class="badge badge-success">Complete</span>
                                @elseif($order->status == 'reject')
                                    <span class="badge badge-danger">Reject</span>
                                @elseif($order->status == 'pending')
                                    <span class="badge badge-warning">Pending</span>
                                @else
                                <i class="zmdi zmdi-more"></i> 
                                @endif
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
