@extends('admin.dashboard_master')
@section('dashboard_content')
<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Card Lists</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Card Lists</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card mb-0">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Create Card List</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('store.card.list') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="title">Card Title </label>
                                <select class="custom-select" id="title" name="title" required>
                                    <option selected disabled>Select Card Title</option>
                                    @foreach ($details as $item)
                                    <option value="{{$item->id}}">{{$item->title}}</option>
                                    @endforeach
                                </select>
                                <span class="text-muted">(Card Title is required)</span>
                            </div>
                            <div class="form-group">
                                <label for="list">Card List</label>
                                <input type="text" class="form-control" id="title" placeholder="Enter Card List"
                                    name="list" required>
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
