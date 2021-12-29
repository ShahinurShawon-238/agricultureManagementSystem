<?php

namespace App\Http\Controllers;

use App\Models\WarehouseInfo;
use App\Models\WarehousePlace;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;


class WarehouseController extends Controller
{
    //Warehouse Place Function
    public function warehousePlace(){
        $place = WarehousePlace::latest()->paginate(4);
        return view('admin.warehouse.place.index', compact('place'));
    }
    public function addWarehousePlace(){
        return view('admin.warehouse.place.add');
    }
    public function storeWarehousePlace(Request $request){
        $validate = $request->validate([
            'image' => 'required|mimes:jpg,jpeg,png',
        ]);
        $image = $request->file('image');
        $imageNameGenerator = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->save('backend/img/' . $imageNameGenerator);
        $lastImage = 'backend/img/' . $imageNameGenerator;
        WarehousePlace::insert([
            'place' => $request->place,
            'image' => $lastImage,
            'created_at' => Carbon::now(),
        ]);
        
        return redirect()->route('warehouse.place')->with('success', 'Warehouse Place Added Successfully');

    }
    public function deleteWarehousePlace($id){
        $image = WarehousePlace::find($id);
        $oldImage = $image->image;
        unlink($oldImage);
        WarehousePlace::find($id)->delete();
        return redirect()->back()->with('success', 'Warehouse Place deleted successfully');

    }

    //Warehouse Info Function
    public function warehouseInfo(){
        $info = WarehouseInfo::latest()->paginate(4);
        return view('admin.warehouse.info.index', compact('info'));
    }
    public function addWarehouseInfo(){
        $place = DB::table('warehouse_places')->get();
        return view('admin.warehouse.info.add', compact('place'));
    }
    public function storeWarehouseInfo(Request $request){
        $validate = $request->validate([
            'place' => 'required',
        ]);

        WarehouseInfo::insert([
            'warehouse_place_id' => $request->place,
            'info' => $request->info,
            'created_at' => Carbon::now(),
        ]);
        
        return redirect()->route('warehouse.info')->with('success', 'Warehouse Info Added Successfully');

    }
    public function deleteWarehouseInfo($id){
        WarehouseInfo::find($id)->delete();
        return redirect()->back()->with('success', 'Warehouse Info deleted successfully');

    }
}
