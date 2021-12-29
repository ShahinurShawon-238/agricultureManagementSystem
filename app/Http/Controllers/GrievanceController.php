<?php

namespace App\Http\Controllers;

use App\Models\Grievance;
use Illuminate\Http\Request;


class GrievanceController extends Controller
{
    public function grievance(){
        $grievance = Grievance::latest()->paginate(6);
        return view('admin.grievance.index', compact('grievance'));
    }
    public function addGrievance(){
        return view('admin.grievance.add');
    }
    public function storeGrievance(Request $request){
        $data = new Grievance();
        $file = $request->file;
        //$filename = time() . '.' . $file->getClientOriginalExtension();
        $filename =$request->name. '.' . $file->getClientOriginalExtension();
        $request->file->move('grievances', $filename);
        $data->file = $filename;
        $data->name = $request->name;
        $data->save();
        return redirect()->route('grievance')->with('success', 'File Uploaded Successfully');
    }


    public function deleteGrievance($id){
        $file = Grievance::find($id);
        $oldFile = $file->file;
        unlink(public_path('grievances/'.$oldFile));
        Grievance::find($id)->delete();
        return redirect()->route('grievance')->with('success', 'File deleted successfully');

    }
}
