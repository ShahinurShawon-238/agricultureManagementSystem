@extends('website.website_master')
@section('website')
<div id="contents" class="sixteen columns">
    <div class="twelve columns" id="left-content">
        <div class="row mainwrapper">
            <h3 style="padding: 15px 30px;">Product Create</h3>
            <div class="row">
                <div class="webform">
                    <div class="body">
                        <form class="frm-bldr" method="POST" action="{{ route('store.website.product') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="seller_name">Seller Name</label>
                                <input type="text" id="seller_name" class="form-control" name="seller_name"
                                    placeholder="Seller Name" required>
                            </div>
                            <div class="form-group">
                                <label for="city">City</label>
                                <input type="text" id="city" class="form-control" name="city" placeholder="City" required>
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
                                <textarea name="product_details" id="product_details" rows="2" required>Product Details</textarea>
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
                                <input type="number" id="quantity" class="form-control" name="quantity" placeholder="Quantity(Kg)" required>
                            </div>



                            <div class="form-group">
                                <label for="product_image">Add Image</label>
                                <input type="file" id="product_image" class="form-control" name="product_image" required>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-info">Submit</button>
                            </div>
                        </form>
                        <style>
                            form {
                                margin-left: 15px;
                            }

                            .frm-bldr input,
                            textarea {
                                width: 100%;
                                padding: 12px 20px;
                                margin: 8px 0;
                                display: inline-block;
                                border: 1px solid #ccc;
                                border-radius: 4px;
                                box-sizing: border-box;
                            }

                            button[type=submit] {
                                width: 100%;
                                background-color: #4CAF50;
                                color: white;
                                padding: 14px 20px;
                                font-size: 16px;
                                margin: 8px 0;
                                border: none;
                                border-radius: 4px;
                                cursor: pointer;
                            }

                            input[type=submit]:hover {
                                background-color: #45a049;
                            }

                        </style>
                    </div>
                    <div class="footer"></div>
                </div>
            </div>
        </div>
    </div>
    @endsection
