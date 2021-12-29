<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Complain;

class ComplainController extends Controller
{
    public function complain(){
        $complains = Complain::latest()->paginate(4);
        return view('admin.complain.index', compact('complains'));
    }
        public function giveAnswer($id){
        $complain = Complain::find($id);
        return view('admin.complain.ans', compact('complain'));
    }
    public function storeAnswer(Request $request, $id){
        Complain::find($id)->update([
            'message' => $request->message,
            'answer' => $request->answer,
            'status' => 1,
        ]);
        return redirect()->route('complain')->with('success', 'Gave Answer Successfully');
    }
    public function editAnswer($id){
        $complain = Complain::find($id);
        return view('admin.complain.editAns', compact('complain'));
    }
    public function updateAnswer(Request $request, $id){
        Complain::find($id)->update([
            'message' => $request->message,
            'answer' => $request->answer,
        ]);
        return redirect()->route('complain')->with('success', 'Answer Updated Successfully');
    }
    public function delete($id)
    {
        Complain::find($id)->delete();
        return redirect()->back()->with('success', 'Message deleted successfully');

    }

}
