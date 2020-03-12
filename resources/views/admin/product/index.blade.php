@extends('admin.master')

@section('title')
    Admin / Products
@endsection

@section('page_title')
    <h2>All Products</h2>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="zmdi zmdi-view-dashboard"></i> Dashboard</a></li>
    <li class="breadcrumb-item active">Products</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card product_item_list">
                        <div class="header">
                            <h2>
                                <a href="{{ route('product.create') }}" class="btn btn-raised btn-info -mt5 btn-sm btn-round waves-effect">
                                    <i class="zmdi zmdi-plus-circle"></i> Add New
                                </a>
                            </h2>
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
                        <div class="body table-responsive">
                            <table class="table table-hover m-b-0">
                                <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Product Name</th>
                                    <th>Categories/Material</th>
                                    <th data-breakpoints="sm xs">Detail</th>
                                    <th data-breakpoints="xs">Amount</th>
                                    <th data-breakpoints="xs md">Stock</th>
                                    <th data-breakpoints="xs md">Status</th>
                                    <th data-breakpoints="sm xs md">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $product)
                                <tr>
                                    <td>
                                        @if($product->thum_image_1)
                                            <img src="{{ asset('media/product/thum/'. $product->thum_image_1) }}" width="48" alt="{{ $product->name }}">
                                        @endif
                                    </td>
                                    <td>
                                        @if($product->craftsman_id)
                                            <h5>{{ $product->craftsman->name }}</h5>
                                        @endif
                                        <h5>{{ $product->name }}</h5>
                                    </td>
                                    <td>
                                        @if(!empty($product->material->title))
                                         <h5><strong>Material: </strong>{{ $product->material->title }}</h5>
                                        @endif
                                         <h5><strong>Category: </strong>{{ $product->category->title }}</h5>
                                         <h5><strong>Subcategory: </strong>{{ $product->subcategory->title }}</h5>
                                    </td>
                                    <td><span class="text-muted">{!! substr($product->description, 0, 50) !!}</span></td>
                                    <td>${{ $product->price }}</td>
                                    <td>
                                        @if($product->in_stock > 20)
                                            <span class="col-green">In Stock ({{ $product->in_stock }})</span>
                                        @elseif($product->in_stock > 0 && $product->in_stock < 20)
                                            <span class="col-amber">Low Stock ({{ $product->in_stock }})</span>
                                        @elseif($product->in_stock == 0)
                                            <span class="col-red">Out Of Stock</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($product->status == 'active')
                                            <span class="badge badge-success">Active</span>
                                        @else
                                            <span class="badge badge-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{ route('product.destroy', $product->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ url('admin/product/'. $product->id) }}" class="btn btn-default waves-effect waves-float waves-green"><i class="zmdi zmdi-eye"></i></a>
                                            <a href="{{ url('admin/product/'. $product->id) }}/edit" class="btn btn-default waves-effect waves-float waves-green"><i class="zmdi zmdi-edit"></i></a>
                                            <button type="submit" onclick="return confirm('Are you sure..?')" class="btn btn-default waves-effect waves-float waves-red"><i class="zmdi zmdi-delete"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>

                    @if($data->total() > 14)
                    <div class="card">
                        <div class="body m-0">
                            {{ $data->links()  }}
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
@section('page_js')
    <script src="{{ asset('admin') }}/js/pages/tables/footable.js"></script><!-- Custom Js -->
@endsection
