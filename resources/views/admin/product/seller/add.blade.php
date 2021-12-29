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
        <div class="row">
            <div class="col-sm-12">
                <div class="card mb-0">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Create Product</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('store.product.seller') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="seller_name">Seller Name</label>
                                <input type="text" id="seller_name" class="form-control" name="seller_name"
                                    placeholder="Seller Name" required>
                            </div>
                            <div class="form-group">
                                <label for="city">City</label>
                                <input type="text" id="city" class="form-control" name="city" placeholder="City"
                                    required>
                            </div>

                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" id="address" class="form-control" name="address"
                                    placeholder="Address" required>
                            </div>
                            <div class="form-group">
                                <label for="number">Phone Number</label>
                                <input type="text" id="number" class="form-control" name="number"
                                    placeholder="Phone Number" required>
                            </div>


                            <div class="form-group">
                                <label for="product_name">Product Name</label>
                                <input type="text" id="product_name" class="form-control" name="product_name"
                                    placeholder="Product Name" required>
                            </div>
                            <div class="form-group">
                                <label for="product_details">Product Details</label>
                                <textarea name="product_details" id="product_details" rows="2" class="form-control"
                                    required>Product Details</textarea>
                            </div>



                            <div class="form-group">
                                <label for="product_price">Product Price</label>
                                <input type="number" id="product_price" class="form-control" name="product_price"
                                    placeholder="Product Price" required>
                            </div>
                            <div class="form-group">
                                <label for="discount">Discount</label>
                                <input type="number" id="discount" class="form-control" name="discount"
                                    placeholder="Product Discount" required>
                            </div>



                            <div class="form-group">
                                <label for="quantity">Available Quantity</label>
                                <input type="number" id="quantity" class="form-control" name="quantity"
                                    placeholder="Quantity(Kg)" required>
                            </div>



                            <div class="form-group">
                                <label for="product_image">Add Image</label>
                                <input type="file" id="product_image" class="form-control" name="product_image"
                                    required>
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
