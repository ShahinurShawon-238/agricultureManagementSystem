@extends('admin.dashboard_master')
@section('dashboard_content')
<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Product</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Product</li>
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
                        <h4 class="card-title mb-0">Order List</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="datatable table table-stripped mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center">Order Id</th>
                                        <th scope="col" class="text-center">Customer Name</th>
                                        <th scope="col" class="text-center">Customer Address</th>
                                        <th scope="col" class="text-center">Product</th>
                                        <th scope="col" class="text-center">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($product as $sc)
                                    <tr>
                                        <td class="text-center">{{$sc->id}}</td>
                                        <td class="text-center">{{$sc->customer->name}}</td>
                                        <td class="text-center">{{$sc->address}}</td>
                                        <td class="text-center">{{$sc->product->product_name}}</td>
                                        <td class="text-center">{{$sc->totalAmount}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="float-right">{{ $product->links() }}</div>
    </div>
</div>
@endsection
