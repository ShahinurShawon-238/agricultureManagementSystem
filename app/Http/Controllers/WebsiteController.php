<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Complain;
use App\Models\Customer;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\WarehousePlace;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;


class WebsiteController extends Controller
{
    
    public function websiteLogin(){
        $slides = DB::table('slides')->get();
        $logos = DB::table('logos')->first();
        $one = DB::table('sidebar_ones')->first();
        $two = DB::table('sidebar_twos')->first();
        $three = DB::table('sidebar_threes')->get();
        $four = DB::table('sidebar_fours')->first();
        $five = DB::table('sidebar_fives')->first();
        $social = DB::table('social_media')->get();
        if(!session()->has('customer')){
            return view('website.customer_login.login.index', compact('slides', 'logos', 'one', 'two', 'three', 'four', 'five', 'social'));
        }else{
            return redirect('/');
        }

    }
    public function websiteRegister(){
        $slides = DB::table('slides')->get();
        $logos = DB::table('logos')->first();
        $one = DB::table('sidebar_ones')->first();
        $two = DB::table('sidebar_twos')->first();
        $three = DB::table('sidebar_threes')->get();
        $four = DB::table('sidebar_fours')->first();
        $five = DB::table('sidebar_fives')->first();
        $social = DB::table('social_media')->get();
        if (!session()->has('customer')) {
           return view('website.customer_login.register.index', compact('slides', 'logos', 'one', 'two', 'three', 'four', 'five', 'social'));
        } else {
            return redirect('/');
        }
    }
    public function storeWebsiteLogin(Request $request){
        $customers = Customer::where(['email' => $request->email, 'password'=>$request->password])->first();
        if(!$customers)
        {
            return "Email or password is not valid";
        }
        else{
            $request->session()->put('customer', $customers);
            return redirect('/');
        }
    }

    public function storeProductCart(Request $request){
        if(session()->has('customer')){
            Cart::insert([
                'product_id' => $request->product_id,
                'customer_id' => $request->session()->get('customer')['id'],
                'created_at' => Carbon::now(),
            ]);
            return redirect()->route('website.product.buyer');
        }else{
            return redirect()->route('websiteLogin');
        }
    }
    public function showCart(){
        if (session()->has('customer')) {
        $slides = DB::table('slides')->get();
        $logos = DB::table('logos')->first();
        $one = DB::table('sidebar_ones')->first();
        $two = DB::table('sidebar_twos')->first();
        $three = DB::table('sidebar_threes')->get();
        $four = DB::table('sidebar_fours')->first();
        $five = DB::table('sidebar_fives')->first();
        $social = DB::table('social_media')->get();
        $customer_id = session()->get('customer')['id'];
        $carts = DB::table('carts')
                ->join('products', 'carts.product_id', 'products.id')
                ->select('products.*')
                ->where('carts.customer_id', $customer_id)
                ->get();
        return view('website.cart.index', compact('slides', 'logos', 'one', 'two', 'three', 'four', 'five', 'social', 'carts'));
        } else {
            return "Cart is empty. Please login to see your cart product";
        }
    }

    public function deleteCartProduct($id){
        Cart::find($id)->delete();
        return redirect()->route('show.cart');
    }
    public function orderNow(){
        $slides = DB::table('slides')->get();
        $logos = DB::table('logos')->first();
        $one = DB::table('sidebar_ones')->first();
        $two = DB::table('sidebar_twos')->first();
        $three = DB::table('sidebar_threes')->get();
        $four = DB::table('sidebar_fours')->first();
        $five = DB::table('sidebar_fives')->first();
        $social = DB::table('social_media')->get();
        $customer_id = session()->get('customer')['id'];
        $carts = DB::table('carts')
            ->join('products', 'carts.product_id', 'products.id')
            ->select('products.*')
            ->where('carts.customer_id', $customer_id)
            ->get();
        return view('website.cart.order', compact('slides', 'logos', 'one', 'two', 'three', 'four', 'five', 'social', 'carts'));

    }

    public function storeOrder(Request $request){
        $customer_id = session()->get('customer')['id'];
        $cartData = Cart::where('customer_id', $customer_id)->get();
        foreach ($cartData as $cart){
            $order = new OrderProduct();
            $order->product_id=$cart['product_id'];
            $order->customer_id=$cart['customer_id'];
            $order->address=$request->address;
            $order->payment_method=$request->cashOnDelivery;
            $order->totalAmount=$request->totalAmount;
            $order->save();
        }
        $details = [
            'title' => 'Response from AgricultureManagementSystem',
            'body' => 'Your Order Has Been Completed. Your amount is: ' . $request->totalAmount,
        ];
        Mail::to(session()->get('customer')['email'])->send(new SendMail($details));
        Cart::where('customer_id', $customer_id)->delete();
        return redirect('/');
    }

    public function websiteLogout(Request $request){
        header("cache-Control: no-store, no-cache, must-revalidate");
        header("cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
        header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
        Session::flush();
        $request->session()->regenerate();
        return redirect('/');
    }
    public function storeWebsiteRegister(Request $request){
        Customer::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'created_at' => Carbon::now(),
        ]);
        return redirect()->route('websiteLogin');
    }
    public function mission(){
        $slides = DB::table('slides')->get();
        $logos = DB::table('logos')->first();
        $one = DB::table('sidebar_ones')->first();
        $two = DB::table('sidebar_twos')->first();
        $three = DB::table('sidebar_threes')->get();
        $four = DB::table('sidebar_fours')->first();
        $five = DB::table('sidebar_fives')->first();
        $social = DB::table('social_media')->get();
        $mission = DB::table('missions')->first();
        return view('website.mission.index', compact('slides', 'logos', 'mission', 'one', 'two', 'three', 'four', 'five', 'social'));
    }    
    public function vision(){
        $slides = DB::table('slides')->get();
        $logos = DB::table('logos')->first();
        $vision = DB::table('visions')->first();
        $one = DB::table('sidebar_ones')->first();
        $two = DB::table('sidebar_twos')->first();
        $three = DB::table('sidebar_threes')->get();
        $four = DB::table('sidebar_fours')->first();
        $five = DB::table('sidebar_fives')->first();
        $social = DB::table('social_media')->get();
        return view('website.vision.index', compact('slides', 'logos', 'vision', 'one', 'two', 'three', 'four', 'five', 'social'));
    }
    public function office(){
        $slides = DB::table('slides')->get();
        $logos = DB::table('logos')->first();
        $offices = DB::table('offices')->get();
        $one = DB::table('sidebar_ones')->first();
        $two = DB::table('sidebar_twos')->first();
        $three = DB::table('sidebar_threes')->get();
        $four = DB::table('sidebar_fours')->first();
        $five = DB::table('sidebar_fives')->first();
        $social = DB::table('social_media')->get();
        return view('website.office.index', compact('slides', 'logos', 'offices', 'one', 'two', 'three', 'four', 'five', 'social'));
    }

    public function grievance(){
        $slides = DB::table('slides')->get();
        $logos = DB::table('logos')->first();
        $grievances = DB::table('grievances')->get();
        $one = DB::table('sidebar_ones')->first();
        $two = DB::table('sidebar_twos')->first();
        $three = DB::table('sidebar_threes')->get();
        $four = DB::table('sidebar_fours')->first();
        $five = DB::table('sidebar_fives')->first();
        $social = DB::table('social_media')->get();
        return view('website.grievance.index', compact('slides', 'logos', 'grievances', 'one', 'two', 'three', 'four', 'five', 'social'));
    }
    public function downloadGrievance(Request $request, $file){
        return response()->download(public_path('grievances/'.$file));
    }
    public function productSeller(){
        $slides = DB::table('slides')->get();
        $logos = DB::table('logos')->first();
        $one = DB::table('sidebar_ones')->first();
        $two = DB::table('sidebar_twos')->first();
        $three = DB::table('sidebar_threes')->get();
        $four = DB::table('sidebar_fours')->first();
        $five = DB::table('sidebar_fives')->first();
        $social = DB::table('social_media')->get();
        return view('website.product.seller.index', compact('slides', 'logos', 'one', 'two', 'three', 'four', 'five', 'social'));
    }

public function productBuyer(){
        $slides = DB::table('slides')->get();
        $logos = DB::table('logos')->first();
        $products = DB::table('products')->get();
        $one = DB::table('sidebar_ones')->first();
        $two = DB::table('sidebar_twos')->first();
        $three = DB::table('sidebar_threes')->get();
        $four = DB::table('sidebar_fours')->first();
        $five = DB::table('sidebar_fives')->first();
        $social = DB::table('social_media')->get();
        return view('website.product.buyer.index', compact('slides', 'logos', 'products', 'one', 'two', 'three', 'four', 'five', 'social'));
    }

    public function storeWebsiteProduct(Request $request){
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
        return redirect()->back();

    }
    public function recentPrice(){
        $recent = DB::table('recent_prices')->get();
        return view('website.recent_price.index', compact('recent'));
    }
    public function fertilizer(){
        $slides = DB::table('slides')->get();
        $logos = DB::table('logos')->first();
        $fertilizers = DB::table('fertilizers')->get();
        $one = DB::table('sidebar_ones')->first();
        $two = DB::table('sidebar_twos')->first();
        $three = DB::table('sidebar_threes')->get();
        $four = DB::table('sidebar_fours')->first();
        $five = DB::table('sidebar_fives')->first();
        $social = DB::table('social_media')->get();
        return view('website.fertilizer.index', compact('slides', 'logos', 'fertilizers', 'one', 'two', 'three', 'four', 'five', 'social'));
    }
    public function downloadFertilizer(Request $request, $file){
        return response()->download(public_path('agricultureInput/fertilizers/'.$file));
    }

    public function seed(){
        $slides = DB::table('slides')->get();
        $logos = DB::table('logos')->first();
        $seeds = DB::table('seeds')->get();
        $one = DB::table('sidebar_ones')->first();
        $two = DB::table('sidebar_twos')->first();
        $three = DB::table('sidebar_threes')->get();
        $four = DB::table('sidebar_fours')->first();
        $five = DB::table('sidebar_fives')->first();
        $social = DB::table('social_media')->get();
        return view('website.seed.index', compact('slides', 'logos', 'seeds', 'one', 'two', 'three', 'four', 'five', 'social'));
    }
    public function downloadSeed(Request $request, $file){
        return response()->download(public_path('agricultureInput/seeds/'.$file));
    }

    public function irrigation(){
        $slides = DB::table('slides')->get();
        $logos = DB::table('logos')->first();
        $irrigations = DB::table('irrigations')->get();
        $one = DB::table('sidebar_ones')->first();
        $two = DB::table('sidebar_twos')->first();
        $three = DB::table('sidebar_threes')->get();
        $four = DB::table('sidebar_fours')->first();
        $five = DB::table('sidebar_fives')->first();
        $social = DB::table('social_media')->get();
        return view('website.irrigation.index', compact('slides', 'logos', 'irrigations', 'one', 'two', 'three', 'four', 'five', 'social'));
    }
    public function downloadIrrigation(Request $request, $file){
        return response()->download(public_path('agricultureInput/irrigations/'.$file));
    }

    public function warehouse(){
        $slides = DB::table('slides')->get();
        $logos = DB::table('logos')->first();
        $warehouse = WarehousePlace::with('info')->get();
        $one = DB::table('sidebar_ones')->first();
        $two = DB::table('sidebar_twos')->first();
        $three = DB::table('sidebar_threes')->get();
        $four = DB::table('sidebar_fours')->first();
        $five = DB::table('sidebar_fives')->first();
        $social = DB::table('social_media')->get();
        return view('website.warehouse.index', compact('slides', 'logos', 'warehouse', 'one', 'two', 'three', 'four', 'five', 'social'));
    }

    public function complain(){
        $slides = DB::table('slides')->get();
        $logos = DB::table('logos')->first();
        $one = DB::table('sidebar_ones')->first();
        $two = DB::table('sidebar_twos')->first();
        $three = DB::table('sidebar_threes')->get();
        $four = DB::table('sidebar_fours')->first();
        $five = DB::table('sidebar_fives')->first();
        $social = DB::table('social_media')->get();
        return view('website.complain.index', compact('slides', 'logos', 'one', 'two', 'three', 'four', 'five', 'social'));
    }
    public function storeComplain(Request $request){
        Complain::insert([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
            'status' => 0,
            'created_at' => Carbon::now(),
        ]);
        return redirect()->back();
    }
}
