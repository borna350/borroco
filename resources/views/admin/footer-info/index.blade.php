@extends('admin.master')

@section('title')
    Admin / Footer Informations
@endsection

@section('page_title')
    <h2>All Footer Informations</h2>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="zmdi zmdi-view-dashboard"></i> Dashboard</a></li>
    <li class="breadcrumb-item active">Footer Informations</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            <a href="{{ route('footer-info.create') }}" class="btn btn-raised btn-info -mt5 btn-sm btn-round waves-effect">
                                <i class="zmdi zmdi-plus-circle"></i> {{ !empty($data) ? 'Add New':'Add New' }}
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
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                            <thead>
                            <tr>
                                <th width="10%">S.NO</th>
                                <th>Shipping Text</th>
                                <th>Payments Text</th>
                                <th>Returns Text</th>
                                <th>Contacts Text</th>
                                <th>Resi e Remborsi Text</th>
                                <th>Company Info</th>
                               
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($data as $key => $info)
                            <tr>
                                <td>{{ ++$key }}</td>
                                
                                <td>{{ $info->shipping_text }}</td>
                                <td>{{ $info->payments_text }}</td>
                                <td>{{ $info->returns_text }}</td>
                                <td>{{ $info->contacts_text }}</td>
                                <td>{{ $info->resi_text }}</td>
                                <td>{{ $info->company_text }}</td>
                                
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
