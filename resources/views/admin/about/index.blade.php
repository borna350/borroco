@extends('admin.master')

@section('title')
    Admin /About
@endsection

@section('page_title')
    <h2>All Abouts</h2>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="zmdi zmdi-view-dashboard"></i> Dashboard</a></li>
    <li class="breadcrumb-item active">Abouts</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            <a href="{{ route('about.create') }}" class="btn btn-raised btn-info -mt5 btn-sm btn-round waves-effect">
                                <i class="zmdi zmdi-plus-circle"></i> {{ !empty($data) ? 'Add New':'Add New' }}
                            </a>
                        </h2>

                    </div>
                    <div class="body">
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                            <thead>
                            <tr>
                                <th width="10%">S.NO</th>
                                <th width="6%">About Logo</th>
                                <th>About Description</th>
                                <th>Based In</th>
                                <th>Founded</th>
                                <th>About Banner Image</th>
                                <th>Banner Title</th>
                                <th>Banner Description</th>
                                <th>Address</th>
                                <th>Email</th>

                            </tr>
                            </thead>

                            <tbody>
                            @foreach($data as $key => $about)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>
                                    @if($about->about_logo)
                                        <img src="{{ asset('media/about/'. $about->about_logo) }}" width="50">
                                    @endif
                                </td>
                                <td>{{ $about->about_description }}</td>
                                <td>{{ $about->based_in }}</td>
                                <td>{{ $about->founded }}</td>
                                <td>
                                    @if($about->about_banner_image)
                                        <img src="{{ asset('media/about/'. $about->about_banner_image) }}" width="50">
                                    @endif
                                </td>
                                <td>{{ $about->banner_title }}</td>
                                <td>{{ $about->banner_description }}</td>
                                <td>{{ $about->address }}</td>
                                <td>{{ $about->email }}</td>

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
