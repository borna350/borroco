@extends('admin.master')

@section('title')
    Admin / Administrator Create
@endsection

@section('page_title')
    <h2>Create Administrator</h2>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="zmdi zmdi-view-dashboard"></i> Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('administrator.index') }}"><i class="zmdi zmdi-apps"></i> Administrators</a></li>
    <li class="breadcrumb-item active">Administrator Create</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-7 col-md-7 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            <a href="{{ route('administrator.index') }}" class="btn btn-raised btn-info btn-sm btn-round waves-effect -mt5">
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
                        <form method="post" action="{{ route('administrator.store') }}" enctype="multipart/form-data">
                            @csrf
                            @include('admin.administrator._form')

                            <div class="mb-3">
                                <label for="password">Password<span class="text-danger">*</span></label>
                                <div class="form-group">
                                    <input type="password" id="password" name="password" value="{{ old('password', isset($data->password) ? $data->password:'') }}" class="form-control @error('password') is-invalid @enderror" placeholder=" Password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="password">Confirm Password<span class="text-danger">*</span></label>
                                <div class="form-group">
                                    <input type="password" id="password_confirmation" class="form-control" name="password_confirmation" placeholder=" Confirm Password">
                                    @error('password_confirmation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <button type="submit" class="btn btn-raised btn-success btn-round waves-effect">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
