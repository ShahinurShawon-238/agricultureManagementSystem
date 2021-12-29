<?php

namespace App\Http\Controllers;

use App\Models\Office;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;



class OfficeController extends Controller
{
    public function office(){
        $office = Office::latest()->paginate(4);
        return view('admin.office.index', compact('office'));
    }
    public function addOffice(){
        return view('admin.office.add');
    }
    public function storeOffice(Request $request){
        Office::insert([
            'name' => $request->name,
            'address' => $request->address,
            'employee_name' => $request->employee_name,
            'phone' => $request->phone,
            'email' => $request->email,
            'created_at' => Carbon::now(),
        ]);
        return redirect()->route('office')->with('success', 'Office Added Successfully');

    }
    public function editOffice($id){
        $office = Office::find($id);
        return view('admin.office.edit', compact('office'));
    }
    public function updateOffice(Request $request, $id){
        Office::find($id)->update([
            'name' => $request->name,
            'address' => $request->address,
            'employee_name' => $request->employee_name,
            'phone' => $request->phone,
            'email' => $request->email,
        ]);
        return redirect()->route('office')->with('success', 'Office Updated Successfully');
    }
    public function deleteOffice($id){
        Office::find($id)->delete();
        return redirect()->back()->with('success', 'Office deleted successfully');

    }
}
