@extends('admin.master')

@section('title')
    Admin / Material Edit
@endsection

@section('page_title')
    <h2>Edit Material</h2>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="zmdi zmdi-view-dashboard"></i> Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('material.index') }}"><i class="zmdi zmdi-apps"></i> Materials</a></li>
    <li class="breadcrumb-item active">Edit</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-7 col-md-7 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            <a href="{{ route('material.index') }}" class="btn btn-raised btn-info btn-sm btn-round waves-effect -mt5">
                                <i class="zmdi zmdi-arrow-back"></i> Back
                            </a>
                        </h2>
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
                        <form method="post" action="{{ route('material.update', $data->id) }}" enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf
                            @include('admin.material._form')
                            <button type="submit" class="btn btn-raised btn-success btn-round waves-effect">Update</button>
                        </form>
                    </div>
                </div>
            </div>

            @if( $data->image)
                <div class="col-lg-5 col-md-5 col-sm-12">
                    <div id="aniimated-thumbnials" class="list-unstyled row clearfix">
                        <a href="{{ asset('media/material/'. $data->image) }}">
                            <img class="img-fluid img-thumbnail" src="{{ asset('media/material/'. $data->image) }}" width="300">
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
