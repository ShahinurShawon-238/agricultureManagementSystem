<?php

namespace App\Http\Controllers;

use App\Models\SidebarFive;
use App\Models\SidebarFour;
use App\Models\SidebarOne;
use App\Models\SidebarThree;
use App\Models\SidebarTwo;
use Illuminate\Http\Request;
use App\Models\SocialMedia;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Carbon;


class SidebarController extends Controller
{
    //sidebar One Function
    public function sidebarOne(){
        $one = SidebarOne::latest()->paginate(4);
        return view('admin.systemSidebar.one.index', compact('one'));
    }
    public function addSidebarOne(){
        return view('admin.systemSidebar.one.add');
    }
    public function storeSidebarOne(Request $request){
        $validate = $request->validate([
            'image' => 'required|mimes:jpg,jpeg,png',
        ]);
        $image = $request->file('image');
        $imageNameGenerator = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(800, 500)->save('backend/img/' . $imageNameGenerator);
        $lastImage = 'backend/img/' . $imageNameGenerator;
        SidebarOne::insert([
            'name'=>$request->name,
            'image' => $lastImage,
            'link'=>$request->link,
            'created_at' => Carbon::now(),
        ]);
        return redirect()->route('sidebar.one')->with('success', 'Sidebar One Added Successfully');

    }
    public function deleteSidebarOne($id){
        $image = SidebarOne::find($id);
        $oldImage = $image->image;
        unlink($oldImage);
        SidebarOne::find($id)->delete();
        return redirect()->back()->with('success', 'Sidebar One deleted successfully');

    }
    //sidebar Two Function
    public function sidebarTwo(){
        $two = SidebarTwo::latest()->paginate(4);
        return view('admin.systemSidebar.two.index', compact('two'));
    }
    public function addSidebarTwo(){
        return view('admin.systemSidebar.two.add');
    }
    public function storeSidebarTwo(Request $request){
        $validate = $request->validate([
            'image' => 'required|mimes:jpg,jpeg,png',
        ]);
        $image = $request->file('image');
        $imageNameGenerator = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(800, 500)->save('backend/img/' . $imageNameGenerator);
        $lastImage = 'backend/img/' . $imageNameGenerator;
        SidebarTwo::insert([
            'name'=>$request->name,
            'image' => $lastImage,
            'link'=>$request->link,
            'created_at' => Carbon::now(),
        ]);
        return redirect()->route('sidebar.two')->with('success', 'Sidebar Two Added Successfully');

    }
    public function deleteSidebarTwo($id){
        $image = SidebarTwo::find($id);
        $oldImage = $image->image;
        unlink($oldImage);
        SidebarTwo::find($id)->delete();
        return redirect()->back()->with('success', 'Sidebar Two deleted successfully');

    }
    //sidebar Three Function
    public function sidebarThree(){
        $three = SidebarThree::latest()->paginate(4);
        return view('admin.systemSidebar.three.index', compact('three'));
    }
    public function addSidebarThree(){
        return view('admin.systemSidebar.three.add');
    }
    public function storeSidebarThree(Request $request){
        SidebarThree::insert([
            'name' => $request->name,
            'link' => $request->link,
            'created_at' => Carbon::now(),
        ]);
        return redirect()->route('sidebar.three')->with('success', 'Sidebar Three Added Successfully');

    }
    public function deleteSidebarThree($id){
        SidebarThree::find($id)->delete();
        return redirect()->back()->with('success', 'Sidebar Three deleted successfully');

    }
    //sidebar Four Function
    public function sidebarFour(){
        $four = SidebarFour::latest()->paginate(4);
        return view('admin.systemSidebar.four.index', compact('four'));
    }
    public function addSidebarFour(){
        return view('admin.systemSidebar.four.add');
    }
    public function storeSidebarFour(Request $request){
        $validate = $request->validate([
            'image' => 'required|mimes:jpg,jpeg,png',
        ]);
        $image = $request->file('image');
        $imageNameGenerator = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(800, 500)->save('backend/img/' . $imageNameGenerator);
        $lastImage = 'backend/img/' . $imageNameGenerator;
        SidebarFour::insert([
            'image' => $lastImage,
            'created_at' => Carbon::now(),
        ]);
        return redirect()->route('sidebar.four')->with('success', 'Sidebar Four Added Successfully');

    }
    public function deleteSidebarFour($id){
        $image = SidebarFour::find($id);
        $oldImage = $image->image;
        unlink($oldImage);
        SidebarFour::find($id)->delete();
        return redirect()->back()->with('success', 'Sidebar Four deleted successfully');

    }
    //sidebar Five Function
    public function sidebarFive(){
        $five = SidebarFive::latest()->paginate(4);
        return view('admin.systemSidebar.five.index', compact('five'));
    }
    public function addSidebarFive(){
        return view('admin.systemSidebar.five.add');
    }
    public function storeSidebarFive(Request $request){
        $validate = $request->validate([
            'image' => 'required|mimes:jpg,jpeg,png',
        ]);
        $image = $request->file('image');
        $imageNameGenerator = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(800, 500)->save('backend/img/' . $imageNameGenerator);
        $lastImage = 'backend/img/' . $imageNameGenerator;
        SidebarFive::insert([
            'image' => $lastImage,
            'created_at' => Carbon::now(),
        ]);
        return redirect()->route('sidebar.five')->with('success', 'Sidebar Five Added Successfully');

    }
    public function deleteSidebarFive($id){
        $image = SidebarFive::find($id);
        $oldImage = $image->image;
        unlink($oldImage);
        SidebarFive::find($id)->delete();
        return redirect()->back()->with('success', 'Sidebar Five deleted successfully');

    }
    //Social Media Function
    public function socialMedia(){
        $socials = SocialMedia::latest()->paginate(4);
        return view('admin.systemSidebar.social.index', compact('socials'));
    }
    public function addSocialMedia(){
        return view('admin.systemSidebar.social.add');
    }
    public function storeSocialMedia(Request $request){
        $validate = $request->validate([
            'image' => 'required|mimes:jpg,jpeg,png',
        ]);
        $image = $request->file('image');
        $imageNameGenerator = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(800, 500)->save('backend/img/' . $imageNameGenerator);
        $lastImage = 'backend/img/' . $imageNameGenerator;
        SocialMedia::insert([
            'image' => $lastImage,
            'link' => $request->link,
            'created_at' => Carbon::now(),
        ]);
        return redirect()->route('social.media')->with('success', 'Social Media Added Successfully');

    }
    public function deleteSocialMedia($id){
        $image = SocialMedia::find($id);
        $oldImage = $image->image;
        unlink($oldImage);
        SocialMedia::find($id)->delete();
        return redirect()->back()->with('success', 'Social Media deleted successfully');

    }
}
