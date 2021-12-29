@extends('admin.dashboard_master')
@section('dashboard_content')
<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Warehouse Places</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Warehouse Places</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card mb-0">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Create Warehouse Place</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('store.warehouse.place') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="place">Warehouse Place</label>
                                <input type="text" class="form-control" id="place" placeholder="Enter Warehouse Place"
                                    name="place" required>
                            </div>
                            <div class="form-group">
                                <label for="image">Warehouse Place Image</label>
                                <input type="file" class="form-control" id="image" placeholder="Enter Image"
                                    name="image" required>
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
