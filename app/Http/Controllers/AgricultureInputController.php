<?php

namespace App\Http\Controllers;

use App\Models\Fertilizer;
use App\Models\Irrigation;
use App\Models\Seed;
use Illuminate\Http\Request;

class AgricultureInputController extends Controller
{
    //Fertilizer Function
    public function fertilizer(){
        $fertilizer = Fertilizer::latest()->paginate(6);
        return view('admin.agriculture.fertilizer.index', compact('fertilizer'));
    }
    public function addFertilizer(){
        return view('admin.agriculture.fertilizer.add');
    }
    public function storeFertilizer(Request $request){
        $data = new Fertilizer();
        $file = $request->file;
        //$filename = time() . '.' . $file->getClientOriginalExtension();
        $filename =$request->name. '.' . $file->getClientOriginalExtension();
        $request->file->move('agricultureInput/fertilizers', $filename);
        $data->file = $filename;
        $data->name = $request->name;
        $data->save();
        return redirect()->route('fertilizer')->with('success', 'File Uploaded Successfully');
    }


    public function deleteFertilizer($id){
        $file = Fertilizer::find($id);
        $oldFile = $file->file;
        unlink(public_path('agricultureInput/fertilizers/'.$oldFile));
        Fertilizer::find($id)->delete();
        return redirect()->route('fertilizer')->with('success', 'File deleted successfully');

    }

    //Seed Function
    public function seed(){
        $seed = Seed::latest()->paginate(6);
        return view('admin.agriculture.seed.index', compact('seed'));
    }
    public function addSeed(){
        return view('admin.agriculture.seed.add');
    }
    public function storeSeed(Request $request){
        $data = new Seed();
        $file = $request->file;
        //$filename = time() . '.' . $file->getClientOriginalExtension();
        $filename =$request->name. '.' . $file->getClientOriginalExtension();
        $request->file->move('agricultureInput/seeds', $filename);
        $data->file = $filename;
        $data->name = $request->name;
        $data->save();
        return redirect()->route('seed')->with('success', 'File Uploaded Successfully');
    }


    public function deleteSeed($id){
        $file = Seed::find($id);
        $oldFile = $file->file;
        unlink(public_path('agricultureInput/seeds/'.$oldFile));
        Seed::find($id)->delete();
        return redirect()->route('seed')->with('success', 'File deleted successfully');

    }

    //Irrigation Function
    public function irrigation(){
        $irrigation = Irrigation::latest()->paginate(6);
        return view('admin.agriculture.irrigation.index', compact('irrigation'));
    }
    public function addIrrigation(){
        return view('admin.agriculture.irrigation.add');
    }
    public function storeIrrigation(Request $request){
        $data = new Irrigation();
        $file = $request->file;
        //$filename = time() . '.' . $file->getClientOriginalExtension();
        $filename =$request->name. '.' . $file->getClientOriginalExtension();
        $request->file->move('agricultureInput/irrigations', $filename);
        $data->file = $filename;
        $data->name = $request->name;
        $data->save();
        return redirect()->route('irrigation')->with('success', 'File Uploaded Successfully');
    }


    public function deleteIrrigation($id){
        $file = Irrigation::find($id);
        $oldFile = $file->file;
        unlink(public_path('agricultureInput/irrigations/'.$oldFile));
        Irrigation::find($id)->delete();
        return redirect()->route('irrigation')->with('success', 'File deleted successfully');

    }
}
