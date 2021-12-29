@extends('admin.dashboard_master')
@section('dashboard_content')
<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Warehouse Info</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Warehouse Info</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card mb-0">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Create Warehouse Info</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('store.warehouse.info') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="place">Warehouse Place </label>
                                <select class="custom-select" id="place" name="place" required>
                                    <option selected disabled>Select Card Title</option>
                                    @foreach ($place as $item)
                                    <option value="{{$item->id}}">{{$item->place}}</option>
                                    @endforeach
                                </select>
                                <spis class="text-muted">(Warehouse Place is required)</span>
                            </div>
                            <div class="form-group">
                                <label for="info">Warehouse Info</label>
                                <input type="info" class="form-control" id="info" placeholder="Enter Warehouse Info"
                                    name="info" required>
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
