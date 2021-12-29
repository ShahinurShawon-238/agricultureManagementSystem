<?php

namespace App\Http\Controllers;

use App\Models\mission;
use App\Models\Vision;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Carbon;


class AboutUsController extends Controller
{
    //Mission Function
    public function mission(){
        $mission = mission::latest()->paginate(4);
        return view('admin.about.mission.index', compact('mission'));
    }
    public function addMission(){
        return view('admin.about.mission.add');
    }
    public function storeMission(Request $request){
        $validate = $request->validate([
            'image' => 'required|mimes:jpg,jpeg,png',
        ]);
        $image = $request->file('image');
        $imageNameGenerator = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(800, 500)->save('backend/img/' . $imageNameGenerator);
        $lastImage = 'backend/img/' . $imageNameGenerator;
        mission::insert([
            'image' => $lastImage,
            'details' => $request->details,
            'created_at' => Carbon::now(),
        ]);
        return redirect()->route('mission')->with('success', 'Mission Added Successfully');

    }
    public function editMission($id){
        $mission = mission::find($id);
        return view('admin.about.mission.edit', compact('mission'));
    }
    public function updateMission(Request $request, $id){
        $image = $request->file('image');
        if($image){
            $imageNameGenerator = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(800, 500)->save('backend/img/' . $imageNameGenerator);
            $lastImage = 'backend/img/' . $imageNameGenerator;
            mission::find($id)->update([
                'image' => $lastImage,
                'details' => $request->details,
            ]);
            return redirect()->route('mission')->with('success', 'Mission Updated Successfully');

        }else{
            mission::find($id)->update([
                'details' => $request->details,
            ]);
                return redirect()->route('mission')->with('success', 'Mission Updated Successfully');
        }
    }
    public function deleteMission($id){
        $image = mission::find($id);
        $oldImage = $image->image;
        unlink($oldImage);
        mission::find($id)->delete();
        return redirect()->back()->with('success', 'Mission deleted successfully');

    }

    //Vision Function
    public function vision(){
        $vision = Vision::latest()->paginate(4);
        return view('admin.about.vision.index', compact('vision'));
    }
    public function addVision(){
        return view('admin.about.vision.add');
    }
    public function storeVision(Request $request){
        $validate = $request->validate([
            'image' => 'required|mimes:jpg,jpeg,png',
        ]);
        $image = $request->file('image');
        $imageNameGenerator = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(800, 500)->save('backend/img/' . $imageNameGenerator);
        $lastImage = 'backend/img/' . $imageNameGenerator;
        Vision::insert([
            'image' => $lastImage,
            'details' => $request->details,
            'created_at' => Carbon::now(),
        ]);
        return redirect()->route('vision')->with('success', 'Vision Added Successfully');

    }
    public function editVision($id){
        $vision = Vision::find($id);
        return view('admin.about.vision.edit', compact('vision'));
    }
    public function updateVision(Request $request, $id){
        $image = $request->file('image');
        if($image){
            $imageNameGenerator = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(800, 500)->save('backend/img/' . $imageNameGenerator);
            $lastImage = 'backend/img/' . $imageNameGenerator;
            Vision::find($id)->update([
                'image' => $lastImage,
                'details' => $request->details,
            ]);
            return redirect()->route('vision')->with('success', 'Vision Updated Successfully');

        }else{
            Vision::find($id)->update([
                'details' => $request->details,
            ]);
                return redirect()->route('vision')->with('success', 'Vision Updated Successfully');
        }
    }
    public function deleteVision($id){
        $image = Vision::find($id);
        $oldImage = $image->image;
        unlink($oldImage);
        Vision::find($id)->delete();
        return redirect()->back()->with('success', 'Vision deleted successfully');

    }
}
