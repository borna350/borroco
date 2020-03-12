@extends('admin.master')

@section('title')
    Admin / Product Create
@endsection

@section('page_title')
    <h2>Create Product</h2>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="zmdi zmdi-view-dashboard"></i> Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('product.index') }}"><i class="zmdi zmdi-apps"></i> Products</a></li>
    <li class="breadcrumb-item active">Create Product</li>
@endsection

@section('content')
    <div class="container-fluid">
        <form method="post" action="{{ route('product.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row clearfix">
                <div class="col-lg-7 col-md-7 col-sm-12">
                    @include('admin.product._form_main')
                </div>

                <div class="col-lg-5 col-md-5 col-sm-12">
                    @include('admin.product._form_color')
                    @include('admin.product._form_size')
                    @include('admin.product._form_image')
                    @include('admin.product._form_shipping_returns')
                </div>
            </div>

            <input type="submit" class="btn btn-raised btn-success btn-round waves-effect" value="Submit">
        </form>
    </div>
@endsection

@section('page_js')
    <script src="{{ asset('admin') }}/plugins/ckeditor/custom.js"></script>
@endsection


