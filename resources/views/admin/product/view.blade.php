@extends('admin.master')

@section('title')
    Admin / {{ $data->title }} /Product Details
@endsection

@section('page_title')
    <h2>Product Details</h2>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="zmdi zmdi-view-dashboard"></i> Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('product.index') }}"><i class="zmdi zmdi-apps"></i> Products</a></li>
    <li class="breadcrumb-item active">Product Details</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
                            <div class="row">
                                <div class="preview col-lg-4 col-md-12">
                                    <div class="preview-pic tab-content">
                                        <div class="tab-pane active">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <img src="{{ asset('media/product/thum/'.$data->thum_image_1) }}" class="img-fluid" />
                                                </div>
                                                <div class="col-md-6">
                                                    <img src="{{ asset('media/product/thum/'.$data->thum_image_2) }}" class="img-fluid" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="details col-lg-8 col-md-12">
                                    <div class="row">
                                        <div class="col-md-6 border-right">
                                            @if($data->craftsman_id)
                                                <h3 class="product-title m-b-0">
                                                    {{ $data->craftsman->name }}
                                                </h3>
                                            @endif
                                            <h5>{{ $data->name }}</h5>
                                            <h4 class="price m-t-0">{{ $data->price }}€ - TaxFree: {{ $data->tax }}€</h4>
                                            @if($data->discount_price &&  $data->discount_prescriptions)
                                                <h5 class="price m-t-0">Discount Price: {{ $data->discount_price }}€ - Discount Prescriptions: {{ $data->discount_prescriptions }}%</h5>
                                            @endif
                                            @if(!empty($data->material->title))
                                                <h5><strong>Material: </strong>{{ $data->material->title }}</h5>
                                            @endif
                                            <h5><strong>Category: </strong>{{ $data->category->title }}</h5>
                                            <h5><strong>Subcategory: </strong>{{ $data->subcategory->title }}</h5>
                                        </div>

                                        <div class="col-md-6">
                                            @if(!empty($data->colors))
                                                <h5 class="sizes">Colors:
                                                    @foreach($data->colors as $color)
                                                        <small class="size" title="small">{{ $color->colors }}</small>
                                                    @endforeach
                                                </h5>
                                            @endif
                                            @if(!empty($data->sizes))
                                                <h5 class="sizes">Sizes:
                                                    @foreach($data->sizes as $size)
                                                        <small class="size" title="small">{{ $size->size }}</small>
                                                    @endforeach
                                                </h5>
                                            @endif

                                            <h5 class="sizes">Stock:
                                                @if($data->in_stock > 20)
                                                    <small class="size col-green">In Stock ({{ $data->in_stock }})</small>
                                                @elseif($data->in_stock > 0 && $data->in_stock < 20)
                                                    <small class="size col-amber">Low Stock ({{ $data->in_stock }})</small>
                                                @elseif($data->in_stock == 0)
                                                    <small class="size col-red">Out Of Stock</small>
                                                @endif
                                            </h5>

                                            <h5 class="sizes">Status:
                                                @if($data->status == 'active')
                                                    <small class="size badge badge-success">Active</small>
                                                @else
                                                    <small class="size badge badge-danger">Inactive</small>
                                                @endif
                                            </h5>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card">
                        <ul class="nav nav-tabs">
                            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#description">Description</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#customerProduction">Customer Production</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#shippingReturns">Shipping Returns</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#images">Images</a></li>
                        </ul>
                    </div>
                    <div class="card">
                        <div class="body">
                            <div class="tab-content">

                                <div class="tab-pane active" id="description">
                                    {!! $data->description !!}
                                </div>

                                <div class="tab-pane" id="customerProduction">
                                    {!! $data->customer_production !!}
                                </div>

                                <div class="tab-pane" id="shippingReturns">
                                    <h5>Costs</h5>
                                    <p>
                                        Shipping UE: {{ $data->ShippingReturn->shipping_ue }}€
                                        <br>
                                        @if($data->ShippingReturn->shipping_extra_ue)
                                            Shipping Extra-UE:{{ $data->ShippingReturn->shipping_extra_ue }}€</p>
                                        @endif

                                    <h5>Delivery Time</h5>
                                    <p>{{ $data->ShippingReturn->delivery_time }}</p>

                                    <h5>Return Policy</h5>
                                    <p>{!! $data->ShippingReturn->return_policy !!}</p>
                                </div>

                                <div class="tab-pane" id="images">

                                    <div id="aniimated-thumbnials" class="list-unstyled row clearfix">
                                        @if(!empty($data->images))
                                            @foreach($data->images as $img)
                                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 m-b-20">
                                                    <a href="{{ asset('media/product/'.$img->image) }}">
                                                        <img class="img-fluid img-thumbnail" src="{{ asset('media/product/'.$img->image) }}">
                                                    </a>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
