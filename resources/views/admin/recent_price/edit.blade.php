@extends('admin.dashboard_master')
@section('dashboard_content')
<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Recent Price</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Recent Price</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card mb-0">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Update Recent Price</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('recent/price/update/'.$recent->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Product Name</label>
                                <input type="text" class="form-control" id="name" value="{{ $recent->name }}"
                                    name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="dhakaKg">Dhaka Price</label>
                                <input type="number" class="form-control" id="dhakaKg" value="{{ $recent->dhakaKg }}"
                                    name="dhakaKg" required>
                                    <hr>
                                <input type="number" class="form-control" value="{{ $recent->dhakaQuintal }}"
                                    name="dhakaQuintal" required>
                            </div>
                            <div class="form-group">
                                <label for="chittagongKg">Chittagong Price</label>
                                <input type="number" class="form-control" id="chittagongKg" value="{{ $recent->chittagongKg }}"
                                    name="chittagongKg" required>
                                    <hr>
                                <input type="number" class="form-control" value="{{ $recent->chittagongQuintal }}"
                                    name="chittagongQuintal" required>
                            </div>
                            <div class="form-group">
                                <label for="khulnaKg">Khulna Price</label>
                                <input type="number" class="form-control" id="khulnaKg" value="{{ $recent->khulnaKg }}"
                                    name="khulnaKg" required>
                                    <hr>
                                <input type="number" class="form-control" value="{{ $recent->khulnaQuintal }}"
                                    name="khulnaQuintal" required>
                            </div>
                            <div class="form-group">
                                <label for="rajshahiKg">Rajshahi Price</label>
                                <input type="number" class="form-control" id="rajshahiKg" value="{{ $recent->rajshahiKg }}"
                                    name="rajshahiKg" required>
                                    <hr>
                                <input type="number" class="form-control" value="{{ $recent->rajshahiQuintal }}"
                                    name="rajshahiQuintal" required>
                            </div>
                            <div class="form-group">
                                <label for="rangpurKg">Rangpur Price</label>
                                <input type="number" class="form-control" id="rangpurKg" value="{{ $recent->rangpurKg }}"
                                    name="rangpurKg" required>
                                    <hr>
                                <input type="number" class="form-control" value="{{ $recent->rangpurQuintal }}"
                                    name="rangpurQuintal" required>
                            </div>
                            <div class="form-group">
                                <label for="sylhetKg">Sylhet Price</label>
                                <input type="number" class="form-control" id="sylhetKg" value="{{ $recent->sylhetKg }}"
                                    name="sylhetKg" required>
                                    <hr>
                                <input type="number" class="form-control" value="{{ $recent->sylhetQuintal }}"
                                    name="sylhetQuintal" required>
                            </div>
                            <div class="form-group">
                                <label for="barishalKg">Barishal Price</label>
                                <input type="number" class="form-control" id="barishalKg" value="{{ $recent->barishalKg }}"
                                    name="barishalKg" required>
                                    <hr>
                                <input type="number" class="form-control" value="{{ $recent->barishalQuintal }}"
                                    name="barishalQuintal" required>
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
