@extends('admin.dashboard_master')
@section('dashboard_content')
<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Office</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Office</li>
                    </ul>
                </div>
            </div>
        </div>
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('success') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <div class="row">
            <div class="col-sm-12">
                <div class="card mb-0">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Office</h4>
                        <div class="float-right">
                            <a href="{{route('add.office')}}"><button class="btn btn-success"
                                    style="margin-top: -25px;">Add Office</button></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="datatable table table-stripped mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center">Name</th>
                                        <th scope="col" class="text-center">Address</th>
                                        <th scope="col" class="text-center">Employee Name</th>
                                        <th scope="col" class="text-center">Phone</th>
                                        <th scope="col" class="text-center">Email</th>
                                        <th scope="col" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($office as $sc)
                                    <tr>
                                        <td class="text-center">{{$sc->name}}</td>
                                        <td class="text-center">{{$sc->address}}</td>
                                        <td class="text-center">{{$sc->employee_name}}</td>
                                        <td class="text-center">{{$sc->phone}}</td>
                                        <td class="text-center">{{$sc->email}}</td>
                                        <td class="text-center">
                                            <a href="{{url('office/edit/'.$sc->id)}}"
                                                class="btn btn-info">Edit</a>
                                            <a href="{{ url('office/delete/'.$sc->id) }}"
                                                onclick="return confirm('Are you sure to delete?')"
                                                class="btn btn-danger">Delete</a>
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
        <div class="float-right">{{ $office->links() }}</div>
    </div>
</div>
@endsection
