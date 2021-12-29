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
                        <h4 class="card-title mb-0">Product</h4>
                        <div class="float-right">
                            <a href="{{route('add.product.seller')}}"><button class="btn btn-success"
                                    style="margin-top: -25px;">Add Product</button></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="datatable table table-stripped mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center">Seller Name</th>
                                        <th scope="col" class="text-center">Seller City</th>
                                        <th scope="col" class="text-center">Seller Address</th>
                                        <th scope="col" class="text-center">Seller Phone Number</th>
                                        <th scope="col" class="text-center">Product Name</th>
                                        <th scope="col" class="text-center">Product Details</th>
                                        <th scope="col" class="text-center">Product Price</th>
                                        <th scope="col" class="text-center">Product Quantity</th>
                                        <th scope="col" class="text-center">Product Discount</th>
                                        <th scope="col" class="text-center">Product Image</th>
                                        <th scope="col" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($product as $sc)
                                    <tr>
                                        <td class="text-center">{{$sc->seller_name}}</td>
                                        <td class="text-center">{{$sc->city}}</td>
                                        <td class="text-center">{{$sc->address}}</td>
                                        <td class="text-center">{{$sc->number}}</td>
                                        <td class="text-center">{{$sc->product_name}}</td>
                                        <td class="text-center">{{$sc->product_details}}</td>
                                        <td class="text-center">{{$sc->product_price}}</td>
                                        <td class="text-center">{{$sc->quantity}}</td>
                                        <td class="text-center">{{$sc->discount}}</td>
                                        <td class="text-center"><img src="{{ asset($sc->product_image) }}" alt="" width="80px"
                                                height="80px"></td>
                                        
                                        <td class="text-center">
                                            <a href="{{url('product/seller/edit/'.$sc->id)}}" class="btn btn-info">Edit</a>
                                            <a href="{{ url('product/seller/delete/'.$sc->id) }}"
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
        <div class="float-right">{{ $product->links() }}</div>
    </div>
</div>
@endsection
