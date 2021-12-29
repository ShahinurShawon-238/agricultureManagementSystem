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
        <div class="row">
            <div class="col-sm-12">
                <div class="card mb-0">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Update Office</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('office/update/'.$office->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Office Name</label>
                                <input type="text" class="form-control" id="name" value="{{$office->name}}" name="name">
                            </div>
                            <div class="form-group">
                                <label for="address">Office Address</label>
                                <input type="text" class="form-control" id="address" value="{{$office->address}}" name="address">
                            </div>
                            <div class="form-group">
                                <label for="employee_name">Employee Name</label>
                                <input type="text" class="form-control" id="employee_name" value="{{$office->employee_name}}" name="employee_name">
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone Number</label>
                                <input type="text" class="form-control" id="phone" value="{{$office->phone}}" name="phone">
                            </div>
                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input type="email" class="form-control" id="email" value="{{$office->email}}" name="email">
                            </div>
                            <div class="form-footer pt-4 pt-5 mt-4 border-top">
                                <button type="submit" class="btn btn-primary btn-default">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
