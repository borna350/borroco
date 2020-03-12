@extends('admin.master')

@section('title')
    Admin / Category Edit
@endsection

@section('page_title')
    <h2>Edit Category</h2>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="zmdi zmdi-view-dashboard"></i> Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('category.index') }}"><i class="zmdi zmdi-apps"></i> Categories</a></li>
    <li class="breadcrumb-item active">Categories</li>
@endsection

@section('content')
    <form method="post" action="{{ route('category.update', $data->id) }}"enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <div class="row clearfix">
            <div class="col-lg-6 col-md-6 col-sm-12">
                @include('admin.category._form')
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12">
                @include('admin.category._web_form')
            </div>
        </div>

        <input type="submit" class="btn btn-raised btn-success btn-round waves-effect" value="Update">
    </form>

@endsection
