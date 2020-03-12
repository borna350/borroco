@extends('admin.master')

@section('title')
    Admin / Subcategory Create
@endsection

@section('page_title')
    <h2>Create Subcategory</h2>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="zmdi zmdi-view-dashboard"></i> Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('subcategory.index') }}"><i class="zmdi zmdi-apps"></i> Categories</a></li>
    <li class="breadcrumb-item active">Subcategories</li>
@endsection

@section('content')

    <div class="container-fluid">
        <form method="post" action="{{ route('subcategory.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row clearfix">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    @include('admin.subcategory._form')
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12">
                    @include('admin.subcategory._feature_form')
                </div>
            </div>

            <input type="submit" class="btn btn-raised btn-success btn-round waves-effect" value="Submit">
        </form>
    </div>
@endsection
