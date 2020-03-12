@extends('admin.master')

@section('title')
    Admin / Home banner
@endsection

@section('page_title')
    <h2>All Home Banners</h2>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="zmdi zmdi-view-dashboard"></i> Dashboard</a></li>
    <li class="breadcrumb-item active">Home Banners</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            <a href="{{ route('home-banner.create') }}" class="btn btn-raised btn-info -mt5 btn-sm btn-round waves-effect">
                                <i class="zmdi zmdi-plus-circle"></i> {{ !empty($data) ? 'Add New':'Add New' }}
                            </a>
                        </h2>

                    </div>
                    <div class="body">
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                            <thead>
                            <tr>
                                <th width="10%">S.NO</th>
                                <th width="6%">Logo</th>
                                <th>Title</th>
                                <th>Subtitle</th>
                                <th>Banner Image</th>

                            </tr>
                            </thead>

                            <tbody>
                            @foreach($data as $key => $banner)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>
                                    @if($banner->logo)
                                        <img src="{{ asset('media/home-banner/'. $banner->logo) }}" width="50">
                                    @endif
                                </td>
                                <td>{{ $banner->title }}</td>
                                <td>{{ $banner->subtitle }}</td>
                                <td>
                                    @if($banner->banner_image)
                                        <img src="{{ asset('media/home-banner/'. $banner->banner_image) }}" width="50">
                                    @endif
                                </td>

                                <td class="p-1">


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
