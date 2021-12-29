<?php

namespace App\Http\Controllers;

use App\Models\RecentPrice;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;


class MarketingController extends Controller
{
    public function recentPrice(){
        $recent = RecentPrice::latest()->paginate(4);
        return view('admin.recent_price.index', compact('recent'));
    }
    public function addRecentPrice(){
        return view('admin.recent_price.add');
    }
    public function storeRecentPrice(Request $request){
        RecentPrice::insert([
            'name' => $request->name,
            'dhakaKg' => $request->dhakaKg,
            'dhakaQuintal' => $request->dhakaQuintal,
            'chittagongKg' => $request->chittagongKg,
            'chittagongQuintal' => $request->chittagongQuintal,
            'khulnaKg' => $request->khulnaKg,
            'khulnaQuintal' => $request->khulnaQuintal,
            'rajshahiKg' => $request->rajshahiKg,
            'rajshahiQuintal' => $request->rajshahiQuintal,
            'rangpurKg' => $request->rangpurKg,
            'rangpurQuintal' => $request->rangpurQuintal,
            'sylhetKg' => $request->sylhetKg,
            'sylhetQuintal' => $request->sylhetQuintal,
            'barishalKg' => $request->barishalKg,
            'barishalQuintal' => $request->barishalQuintal,
            'created_at' => Carbon::now(),
        ]);
        
        return redirect()->route('recent.price')->with('success', 'Recent Price Added Successfully');

    }
    public function editRecentPrice($id){
        $recent = RecentPrice::find($id);
        return view('admin.recent_price.edit', compact('recent'));
    }
    public function updateRecentPrice(Request $request, $id){
        RecentPrice::find($id)->update([
            'name' => $request->name,
            'dhakaKg' => $request->dhakaKg,
            'dhakaQuintal' => $request->dhakaQuintal,
            'chittagongKg' => $request->chittagongKg,
            'chittagongQuintal' => $request->chittagongQuintal,
            'khulnaKg' => $request->khulnaKg,
            'khulnaQuintal' => $request->khulnaQuintal,
            'rajshahiKg' => $request->rajshahiKg,
            'rajshahiQuintal' => $request->rajshahiQuintal,
            'rangpurKg' => $request->rangpurKg,
            'rangpurQuintal' => $request->rangpurQuintal,
            'sylhetKg' => $request->sylhetKg,
            'sylhetQuintal' => $request->sylhetQuintal,
            'barishalKg' => $request->barishalKg,
            'barishalQuintal' => $request->barishalQuintal,
        ]);
            return redirect()->route('recent.price')->with('success', 'Recent Price Updated Successfully');
    }
    public function deleteRecentPrice($id){
        RecentPrice::find($id)->delete();
        return redirect()->back()->with('success', 'Recent Price deleted successfully');

    }
}
