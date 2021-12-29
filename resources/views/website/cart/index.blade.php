@extends('website.website_master')
@section('website')
<div class="twelve columns" id="left-content">
    <div class="row mainwrapper">
        <h3 style="padding: 15px 30px;">Cart</h3>
        <div class="row">
            <div class="webform">
                <div class="body">
                    <table>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Quantity (Kg)</th>
                            <th>Unit Price</th>
                            <th>Total Price</th>
                            <th>Action</th>
                        </tr>
                        @foreach($carts as $product)
                        <tr>
                            <td><img src="{{ asset($product->product_image) }}" alt="" height="60px" width="70px"></td>
                            <td>{{ $product->product_name }}</td>
                            <td>{{ $product->quantity }}</td>
                            <td>{{ $product->product_price }}</td>
                            <td>{{ $product->quantity * $product->product_price }}</td>
                            <td><a href="{{ url('cart/product/delete/'.$product->id) }}"
                                    onclick="return confirm('Are you sure to delete?')" type="button">Remove</a></td>
                        </tr>
                        @endforeach
                    </table>
                    <style>
                        table,
                        td,
                        th {
                            border: 1px solid #ddd;
                            text-align: center;
                        }

                        table {
                            border-collapse: collapse;
                            width: 100%;
                            margin-left: 10px !important;
                        }

                        th,
                        td {
                            padding: 15px;
                        }

                        tr th {
                            font-weight: bold;
                        }
                        tr td a{
                            background-color: red ;
                            color: white !important;
                            padding: 8px;
                        }

                    </style>
                </div>
                <div class="footer"></div>
            </div>
        </div>
        <div style="text-align: center !important;">
            <a href="{{ route('order.now') }}" style="background-color: yellow; font-weight: bold; padding:10px" type="button">Checkout</a>
        </div>
    </div>
</div>
@endsection
