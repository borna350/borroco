@extends('admin.master')

@section('title')
    Admin / Administrators
@endsection

@section('page_title')
    <h2>All Administrator</h2>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="zmdi zmdi-view-dashboard"></i> Dashboard</a></li>
    <li class="breadcrumb-item active">Administrators</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            <a href="{{ route('administrator.create') }}" class="btn btn-raised btn-info -mt5 btn-sm btn-round waves-effect">
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
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                <tr>
                                    <th width="7%">S.NO</th>
                                    <th width="6%">Avatar</th>
                                    <th>Name</th>
                                    <th>Role</th>
                                    <th>Email</th>
                                    <th width="5%">Status</th>
                                    <th width="15%">Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($data as $key => $administrator)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>
                                            @if($administrator->avatar)
                                                <img src="{{ asset('media/admin/'. $administrator->avatar) }}" alt="" width="60">
                                            @endif
                                        </td>
                                        <td>{{ $administrator->name }}</td>
                                        <td>
                                            @if($administrator->role == 'admin')
                                                Admin (Manager)
                                            @else
                                                Craftsman
                                            @endif
                                        </td>
                                        <td>{{ $administrator->email }}</td>
                                        <td>
                                            @if($administrator->status == 'active')
                                                <span class="badge badge-success">Active</span>
                                            @else
                                                <span class="badge badge-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td class="p-1">

                                            <form action="{{ route('administrator.destroy', $administrator->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <span class="dropdown">
                                                    <a href="javascript:void(0);" class="dropdown-toggle btn btn-default btn-icon btn-simple btn-icon-mini btn-round" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more m-2"></i> </a>
                                                    <ul class="dropdown-menu dropdown-menu-right">
                                                        <li><a href="{{ url('admin/artisan-pending/'. $administrator->id) }}">Pending</a></li>
                                                        <li><a href="{{ url('admin/artisan-reject/'. $administrator->id) }}">Reject</a></li>
                                                    </ul>
                                                </span>
                                                <a href="{!! url('admin/administrator/'.$administrator->id) !!}/edit" class="btn btn-default btn-icon btn-simple btn-icon-mini btn-round">
                                                    <i class="zmdi zmdi-edit m-2"></i>
                                                </a>
                                                <button type="submit" onclick="return confirm('Are you sure...?')" class="btn btn-default btn-icon btn-simple btn-icon-mini btn-round"><i class="zmdi zmdi-delete"></i> </button>
                                            </form>

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
    </div>
@endsection
