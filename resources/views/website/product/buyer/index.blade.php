@extends('website.website_master')
@section('website')
<div class="twelve columns" id="left-content">
    <div class="row mainwrapper">
        <h3 style="padding: 15px;">Product Lists</h3>
        <div class="row" style="padding-left: 15px;">
        @foreach($products as $product)
            <div id="box-1" class="three columns service-box products">
                <img src="{{ asset($product->product_image) }}" alt="product" height="129px" width="170px">

                <div class="product-details">
                    <h6 class="product-title"><strong>{{ $product->product_name }}</strong></h6>
                    <p><strong>Rate : </strong> Tk. {{$product->product_price}}/KG</p>
                    <p><strong>Quantity : </strong> 1 + KG</p>
                </div>
                <div class="product-footer">
                    <form action="{{ route('store.product.cart') }}" method="post" style="margin-bottom: 10px !important;">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <button type="submit" style="background-color: green; color: white">Add To Cart</button>
                    </form>
                </div>
            </div>
        @endforeach
        </div>
    </div>
</div>
<style>
    .products{
        margin-right: 45px;
    }
    .products img{
        width: 100%;
        margin: 0 auto;
        border-bottom: 5px solid #dedede;
        box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.2), 0 1px 3px 0 rgba(0, 0, 0, 0.19);
    }
    .products .product-details{
        text-align: center;
        padding-bottom: 10px;
    }

    .products .product-footer{
        text-align: center;
        font-weight: bold;
    }
    
</style>
    @endsection
