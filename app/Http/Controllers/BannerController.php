<?php

namespace App\Http\Controllers;

use App\Models\Logo;
use Illuminate\Http\Request;
use App\Models\Slides;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Carbon;

class BannerController extends Controller
{
    //Slide Function
    public function slides(){
        $slider = Slides::latest()->paginate(4);
        return view('admin.banner.slides.index', compact('slider'));
    }
    public function addSlider(){
        return view('admin.banner.slides.add');
    }
    public function storeSlider(Request $request){
        $validate = $request->validate([
            'image' => 'required|mimes:jpg,jpeg,png',
        ]);
        $image = $request->file('image');
        $imageNameGenerator = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(960, 370)->save('backend/img/' . $imageNameGenerator);
        $lastImage = 'backend/img/' . $imageNameGenerator;
        Slides::insert([
            'image' => $lastImage,
            'created_at' => Carbon::now(),
        ]);
        
        return redirect()->route('slides')->with('success', 'Slider Added Successfully');

    }
    public function delete($id){
        $image = Slides::find($id);
        $oldImage = $image->image;
        unlink($oldImage);
        Slides::find($id)->delete();
        return redirect()->back()->with('success', 'Slider deleted successfully');

    }


    //Logo Function
    public function logo(){
        $logo = Logo::latest()->paginate(4);
        return view('admin.banner.logo.index', compact('logo'));
    }
    public function addLogo(){
        return view('admin.banner.logo.add');
    }
    public function storeLogo(Request $request){
        $validate = $request->validate([
            'image' => 'required|mimes:jpg,jpeg,png',
        ]);
        $image = $request->file('image');
        $imageNameGenerator = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(100, 100)->save('backend/img/' . $imageNameGenerator);
        $lastImage = 'backend/img/' . $imageNameGenerator;
        Logo::insert([
            'image' => $lastImage,
            'created_at' => Carbon::now(),
        ]);
        
        return redirect()->route('logo')->with('success', 'Logo Added Successfully');

    }
    public function deleteLogo($id){
        $image = Logo::find($id);
        $oldImage = $image->image;
        unlink($oldImage);
        Logo::find($id)->delete();
        return redirect()->back()->with('success', 'Logo deleted successfully');

    }
}
