<?php

namespace App\Http\Controllers;

use App\Models\CardDetails;
use App\Models\CardList;
use App\Models\HomeBanner;
use App\Models\Instruction;
use App\Models\RecentNews;
use App\Models\ImageGallery;
use App\Models\VideoGallery;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    //Home Banner Function
    public function homeBanner(){
        $banner = HomeBanner::latest()->paginate(4);
        return view('admin.home.banner.index', compact('banner'));
    }
    public function addHomeBanner(){
        return view('admin.home.banner.add');
    }
    public function storeHomeBanner(Request $request){
        $validate = $request->validate([
            'image' => 'required|mimes:jpg,jpeg,png',
        ]);
        $image = $request->file('image');
        $imageNameGenerator = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->save('backend/img/' . $imageNameGenerator);
        $lastImage = 'backend/img/' . $imageNameGenerator;
        HomeBanner::insert([
            'image' => $lastImage,
            'created_at' => Carbon::now(),
        ]);
        
        return redirect()->route('home.banner')->with('success', 'Home Banner Added Successfully');

    }
    public function deleteHomeBanner($id){
        $image = HomeBanner::find($id);
        $oldImage = $image->image;
        unlink($oldImage);
        HomeBanner::find($id)->delete();
        return redirect()->back()->with('success', 'Home Banner deleted successfully');

    }

    //Recent News Function
    public function recentNews(){
        $recent = RecentNews::latest()->paginate(4);
        return view('admin.home.recentNews.index', compact('recent'));
    }
    public function addRecentNews(){
        return view('admin.home.recentNews.add');
    }
    public function storeRecentNews(Request $request){
        RecentNews::insert([
            'news' => $request->news,
            'created_at' => Carbon::now(),
        ]);
        
        return redirect()->route('recent.news')->with('success', 'News Added Successfully');

    }
    public function editRecentNews($id){
        $recent = RecentNews::find($id);
        return view('admin.home.recentNews.edit', compact('recent'));
    }
    public function updateRecentNews(Request $request, $id){
        RecentNews::find($id)->update([
            'news' => $request->news,
        ]);
        return redirect()->route('recent.news')->with('success', 'News Updated Successfully');
    }
    
    public function deleteRecentNews($id){
        RecentNews::find($id)->delete();
        return redirect()->back()->with('success', 'News deleted successfully');
    }

    //Instruction Function
    public function instruction(){
        $instruction = Instruction::latest()->paginate(4);
        return view('admin.home.instruction.index', compact('instruction'));
    }
    public function addInstruction(){
        return view('admin.home.instruction.add');
    }
    public function storeInstruction(Request $request){
        Instruction::insert([
            
            'created_at' => Carbon::now(),
        ]);
        
        return redirect()->route('instruction')->with('success', 'Notice Added Successfully');

    }
        public function editInstruction($id){
        $instruction = Instruction::find($id);
        return view('admin.home.instruction.edit', compact('instruction'));
    }
    public function updateInstruction(Request $request, $id){
        Instruction::find($id)->update([
            'instruction' => $request->instruction,
        ]);
        return redirect()->route('instruction')->with('success', 'Notice Updated Successfully');
    }
    public function deleteInstruction($id){
        Instruction::find($id)->delete();
        return redirect()->back()->with('success', 'Notice deleted successfully');
    }

    //Card Details Function
    public function cardDetails(){
        $details = CardDetails::latest()->paginate(4);
        return view('admin.home.card.details.index', compact('details'));
    }
    public function addCardDetails(){
        return view('admin.home.card.details.add');
    }
    public function storeCardDetails(Request $request){
        $validate = $request->validate([
            'image' => 'required|mimes:jpg,jpeg,png',
        ]);
        $image = $request->file('image');
        $imageNameGenerator = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->save('backend/img/' . $imageNameGenerator);
        $lastImage = 'backend/img/' . $imageNameGenerator;
        CardDetails::insert([
            'title' => $request->title,
            'image' => $lastImage,
            'created_at' => Carbon::now(),
        ]);
        
        return redirect()->route('card.details')->with('success', 'Card Details Added Successfully');

    }
    public function deleteCardDetails($id){
        $image = CardDetails::find($id);
        $oldImage = $image->image;
        unlink($oldImage);
        CardDetails::find($id)->delete();
        return redirect()->back()->with('success', 'Card Details deleted successfully');

    }

    //Card List Function
    public function cardList(){
        $list = CardList::latest()->paginate(4);
        return view('admin.home.card.list.index', compact('list'));
    }
    public function addCardList(){
        $details = DB::table('card_details')->get();
        return view('admin.home.card.list.add', compact('details'));
    }
    public function storeCardList(Request $request){
        $validate = $request->validate([
            'title' => 'required',
        ]);

        CardList::insert([
            'card_details_id' => $request->title,
            'list' => $request->list,
            'created_at' => Carbon::now(),
        ]);
        
        return redirect()->route('card.list')->with('success', 'Card List Added Successfully');

    }
    public function deleteCardList($id){
        CardList::find($id)->delete();
        return redirect()->back()->with('success', 'Card List deleted successfully');

    }

    //Image gallery Function
    public function imageGallery(){
        $images = ImageGallery::latest()->paginate(4);
        return view('admin.home.imageGallery.index', compact('images'));
    }
    public function addImageGallery(){
        return view('admin.home.imageGallery.add');
    }
    public function storeImageGallery(Request $request){
        $validate = $request->validate([
            'image' => 'required|mimes:jpg,jpeg,png',
        ]);
        $image = $request->file('image');
        $imageNameGenerator = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->save('backend/img/' . $imageNameGenerator);
        $lastImage = 'backend/img/' . $imageNameGenerator;
        ImageGallery::insert([
            'image' => $lastImage,
            'created_at' => Carbon::now(),
        ]);
        
        return redirect()->route('image.gallery')->with('success', 'Gallery Image Added Successfully');

    }
    public function deleteImageGallery($id){
        $image = ImageGallery::find($id);
        $oldImage = $image->image;
        unlink($oldImage);
        ImageGallery::find($id)->delete();
        return redirect()->back()->with('success', 'Gallery Image deleted successfully');

    }

    //Video gallery Function
    public function videoGallery(){
        $videos = VideoGallery::latest()->paginate(4);
        return view('admin.home.videoGallery.index', compact('videos'));
    }
    public function addVideoGallery(){
        return view('admin.home.videoGallery.add');
    }
    public function storeVideoGallery(Request $request){
        VideoGallery::insert([
            'name' => $request->name,
            'link' => $request->link,
            'created_at' => Carbon::now(),
        ]);
        
        return redirect()->route('video.gallery')->with('success', 'Gallery Video Added Successfully');

    }
    public function deleteVideoGallery($id){
        VideoGallery::find($id)->delete();
        return redirect()->back()->with('success', 'Gallery Video deleted successfully');

    }
}
