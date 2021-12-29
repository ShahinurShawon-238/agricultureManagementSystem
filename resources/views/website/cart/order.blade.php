@extends('website.website_master')
@section('website')
<div class="twelve columns" id="left-content">
    <div class="row mainwrapper">
        <h3 style="padding: 15px 30px;">Order Now</h3>
        <div class="row">
            <div class="webform">
                <div class="body">
                    <table>
                        <tr>
                            <th>Name</th>
                            <th>Quantity (Kg)</th>
                            <th>Unit Price</th>
                            <th>Total Price</th>
                        </tr>
                        <?php
                            $grandTotal = 0;
                        ?>
                        @foreach($carts as $product)
                        <tr>
                            <td>{{ $product->product_name }}</td>
                            <td>{{ $product->quantity }}</td>
                            <td>{{ $product->product_price }}</td>
                            <td>{{ $product->quantity * $product->product_price }}</td>
                            <?php $grandTotal =  ($product->quantity * $product->product_price) +  $grandTotal ?>
                        </tr>
                        @endforeach
                    </table>
                    <hr>
                    <span style="float: right; font-size: 16px; margin-right: 50px !important;">Total:
                        <?php echo $grandTotal ?> Tk</span>
                    <br>
                    <span style="float: right; font-size: 16px; margin-right: 50px !important;">Delivery Charge: 100
                        Tk</span>
                    <br>
                    <span style="float: right; font-size: 16px; margin-right: 50px !important;">Grand Total:
                        <?php echo $grandTotal+100?> Tk</span>
                    <style>
                        table,
                        td,
                        th {
                            border: 0 !important;
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

                        tr td a {
                            background-color: red;
                            color: white !important;
                            padding: 8px;
                        }

                    </style>
                </div>
                <div class="footer"></div>
            </div>
        </div>
        <div class="row">
            <div class="webform">
                <div class="body">
                    <form class="frm-bldr" method="POST" action="{{ route('store.order') }}">
                        @csrf
                        <input type="hidden" name="totalAmount" value="<?php echo $grandTotal + 100 ?>">
                        <div class="form-group">
                            <label for="address">Address: </label>
                            <input type="text" class="form-control" id="address" name="address"
                                placeholder="Enter Your Address" required>
                        </div>
                        <div class="form-group">
                            <label>Payment Method: </label>
                            <input type="radio" id="cashOnDelivery" name="cashOnDelivery" value="cashOnDelivery"
                                required>
                            <label for="cashOnDelivery">Cash On Delivery</label> 
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-info">Order Now</button>
                        </div>
                    </form>
                    <style>
                        form {
                            margin-left: 15px;
                        }

                        .frm-bldr input[type="text"],
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
