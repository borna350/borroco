@extends('admin.master')

@section('title')
    Admin / Customer Support
@endsection

@section('page_title')
    <h2>All Customer Support</h2>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="zmdi zmdi-view-dashboard"></i> Dashboard</a></li>
    <li class="breadcrumb-item active">Customer Support</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
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
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                            <thead>
                            <tr>
                                <th width="10%">S.NO</th>
                                <th>Name</th>
                                <th>Surname</th>
                                <th>Email</th>
                                <th>Order Number</th>
                                <th>Reason</th>
                                <th width="15%">Action</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($data as $key => $customer)
                            <tr>
                                <td>{{ ++$key }}</td>
                                
                                <td>{{ $customer->name }}</td>
                                <td>{{ $customer->lastname }}</td>
                                <td>{{ $customer->email }}</td>
                                <td>{{ $customer->order }}</td>
                                <td>{{ $customer->message }}</td>
                               
                                <td class="p-1">

                                    <form action="{{ route('customer-support.destroy', $customer->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Are you sure...?')"  class="btn btn-default btn-icon btn-simple btn-icon-mini btn-round"><i class="zmdi zmdi-delete"></i></button>
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
@endsection
