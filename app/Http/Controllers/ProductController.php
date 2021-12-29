<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Carbon;
use App\Models\Product;


class ProductController extends Controller
{
    public function productSeller(){
        $product = Product::latest()->paginate(4);
        return view('admin.product.seller.index', compact('product'));
    }
    public function addProductSeller(){
        return view('admin.product.seller.add');
    }
    public function storeProductSeller(Request $request){
        $validate = $request->validate([
            'product_image' => 'required|mimes:jpg,jpeg,png',
        ]);
        $image = $request->file('product_image');
        $imageNameGenerator = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->save('backend/product/' . $imageNameGenerator);
        $lastImage = 'backend/product/' . $imageNameGenerator;
        Product::insert([
            'seller_name' => $request->seller_name,
            'city' => $request->city,
            'address' => $request->address,
            'number' => $request->number,
            'product_name' => $request->product_name,
            'product_details' => $request->product_details,
            'product_price' => $request->product_price,
            'discount' => $request->discount,
            'quantity' => $request->quantity,
            'product_image' => $lastImage,
            'created_at' => Carbon::now(),
        ]);
        return redirect()->route('product.seller')->with('success', 'Product Added Successfully');

    }
    public function editProductSeller($id){
        $product = Product::find($id);
        return view('admin.product.seller.edit', compact('product'));

    }
    public function updateProductSeller(Request $request , $id){
        $image = $request->file('product_image');
        if ($image) {
            $imageNameGenerator = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save('backend/product/' . $imageNameGenerator);
            $lastImage = 'backend/product/' . $imageNameGenerator;
            Product::find($id)->update([
                'seller_name' => $request->seller_name,
                'city' => $request->city,
                'address' => $request->address,
                'number' => $request->number,
                'product_name' => $request->product_name,
                'product_details' => $request->product_details,
                'product_price' => $request->product_price,
                'discount' => $request->discount,
                'quantity' => $request->quantity,
                'product_image' => $lastImage,
            ]);
            return redirect()->route('product.seller')->with('success', 'Product Updated Successfully');

        } else {
            Product::find($id)->update([
                'seller_name' => $request->seller_name,
                'city' => $request->city,
                'address' => $request->address,
                'number' => $request->number,
                'product_name' => $request->product_name,
                'product_details' => $request->product_details,
                'product_price' => $request->product_price,
                'discount' => $request->discount,
                'quantity' => $request->quantity,
            ]);
            return redirect()->route('product.seller')->with('success', 'Product Updated Successfully');
}

    }
    public function deleteProductSeller($id){
        $image = Product::find($id);
        $oldImage = $image->product_image;
        unlink($oldImage);
        Product::find($id)->delete();
        return redirect()->back()->with('success', 'Product deleted successfully');

    }


    public function productBuyer(){
        $product = OrderProduct::latest()->paginate(4);
        return view('admin.product.buyer.index', compact('product'));
    }
}
