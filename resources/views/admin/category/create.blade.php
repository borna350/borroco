@extends('admin.master')

@section('title')
    Admin / Category Create
@endsection

@section('page_title')
    <h2>Create Category</h2>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="zmdi zmdi-view-dashboard"></i> Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('category.index') }}"><i class="zmdi zmdi-apps"></i> Categories</a></li>
    <li class="breadcrumb-item active">Categories</li>
@endsection

@section('content')
<div class="container-fluid">
    <form method="post" action="{{ route('category.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="row clearfix">
            <div class="col-lg-6 col-md-6 col-sm-12">
                @include('admin.category._form')
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12">
                @include('admin.category._web_form')
            </div>
        </div>

        <input type="submit" class="btn btn-raised btn-success btn-round waves-effect" value="Submit">
    </form>
</div>


@endsection
