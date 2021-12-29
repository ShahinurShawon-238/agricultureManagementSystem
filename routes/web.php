<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\AgricultureInputController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\ComplainController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\GrievanceController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\MarketingController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\SidebarController;
use App\Http\Controllers\WarehouseController;
use App\Http\Controllers\ProductController;
use App\Models\CardDetails;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Email Routes
Route::get('/complain-answer-email/{id}', [MailController::class, 'complainEmail']);

//Website Routes
Route::get('/', function () {
    $slides = DB::table('slides')->get();
    $logos = DB::table('logos')->first();
    $one = DB::table('sidebar_ones')->first();
    $two = DB::table('sidebar_twos')->first();
    $three = DB::table('sidebar_threes')->get();
    $four = DB::table('sidebar_fours')->first();
    $five = DB::table('sidebar_fives')->first();
    $social = DB::table('social_media')->get();
    $banner = DB::table('home_banners')->first();
    $recent = DB::table('recent_news')->orderBy('id', 'DESC')->first();
    $instruction = DB::table('instructions')->first();
    $news = DB::table('recent_news')->get();
    $notice = DB::table('instructions')->get();
    $details = CardDetails::with('list')->get();
    $images = DB::table('image_galleries')->get();
    $videos = DB::table('video_galleries')->get();
    return view('welcome', compact('slides', 'logos', 'one', 'two', 'three', 'four', 'five', 'social', 'banner', 'recent', 'instruction', 'news',
    'details', 'notice', 'images', 'videos'));
});
//Login and Register routes
Route::get('websiteLogin', [WebsiteController::class, 'websiteLogin'])->name('websiteLogin');
Route::post('storeWebsiteLogin', [WebsiteController::class, 'storeWebsiteLogin'])->name('storeWebsiteLogin');

Route::get('websiteRegister', [WebsiteController::class, 'websiteRegister'])->name('websiteRegister');
Route::post('storeWebsiteRegister', [WebsiteController::class, 'storeWebsiteRegister'])->name('storeWebsiteRegister');

Route::get('websiteLogout', [WebsiteController::class, 'websiteLogout'])->name('websiteLogout');

//Cart route
Route::post('store/product/cart', [WebsiteController::class, 'storeProductCart'])->name('store.product.cart');
Route::get('show/cart', [WebsiteController::class, 'showCart'])->name('show.cart');
Route::get('/cart/product/delete/{id}', [WebsiteController::class, 'deleteCartProduct']);
Route::get('order/now', [WebsiteController::class, 'orderNow'])->name('order.now');
Route::post('store/order', [WebsiteController::class, 'storeOrder'])->name('store.order');
//Mission and vision route
Route::get('about/mission', [WebsiteController::class, 'mission'])->name('about.mission');
Route::get('about/vision', [WebsiteController::class, 'vision'])->name('about.vision');

//Office route
Route::get('website/office', [WebsiteController::class, 'office'])->name('website.office');

//Grievance route
Route::get('website/grievance', [WebsiteController::class, 'grievance'])->name('website.grievance');
Route::get('/grievance/download/{file}', [WebsiteController::class, 'downloadGrievance']);

//Product route
Route::get('website/product/seller', [WebsiteController::class, 'productSeller'])->name('website.product.seller');
Route::post('website/product/store', [WebsiteController::class, 'storeWebsiteProduct'])->name('store.website.product');

Route::get('website/product/buyer', [WebsiteController::class, 'productBuyer'])->name('website.product.buyer');

//Recent Price route
Route::get('website/recent/price', [WebsiteController::class, 'recentPrice'])->name('website.recent.price');

//Agriculture Input route
Route::get('website/fertilizer', [WebsiteController::class, 'fertilizer'])->name('website.fertilizer');
Route::get('/fertilizer/download/{file}', [WebsiteController::class, 'downloadFertilizer']);

Route::get('website/seed', [WebsiteController::class, 'seed'])->name('website.seed');
Route::get('/seed/download/{file}', [WebsiteController::class, 'downloadSeed']);

Route::get('website/irrigation', [WebsiteController::class, 'irrigation'])->name('website.irrigation');
Route::get('/irrigation/download/{file}', [WebsiteController::class, 'downloadIrrigation']);

//Warehouse route
Route::get('warehouse', [WebsiteController::class, 'warehouse'])->name('warehouse');

//Complain Box route
Route::get('complain/box', [WebsiteController::class, 'complain'])->name('complain.box');
Route::post('complain/store', [WebsiteController::class, 'storeComplain'])->name('store.complain');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


//Sidebar Route
Route::get('sidebar/one', [SidebarController::class, 'sidebarOne'])->name('sidebar.one');
Route::get('add/sidebar/one', [SidebarController::class, 'addSidebarOne'])->name('add.sidebar.one');
Route::post('store/sidebar/one', [SidebarController::class, 'storeSidebarOne'])->name('store.sidebar.one');
Route::get('/sidebar/one/delete/{id}', [SidebarController::class, 'deleteSidebarOne']);


Route::get('sidebar/two', [SidebarController::class, 'sidebarTwo'])->name('sidebar.two');
Route::get('add/sidebar/two', [SidebarController::class, 'addSidebarTwo'])->name('add.sidebar.two');
Route::post('store/sidebar/two', [SidebarController::class, 'storeSidebarTwo'])->name('store.sidebar.two');
Route::get('/sidebar/two/delete/{id}', [SidebarController::class, 'deleteSidebarTwo']);


Route::get('sidebar/three', [SidebarController::class, 'sidebarThree'])->name('sidebar.three');
Route::get('add/sidebar/three', [SidebarController::class, 'addSidebarThree'])->name('add.sidebar.three');
Route::post('store/sidebar/three', [SidebarController::class, 'storeSidebarThree'])->name('store.sidebar.three');
Route::get('/sidebar/three/delete/{id}', [SidebarController::class, 'deleteSidebarThree']);


Route::get('sidebar/four', [SidebarController::class, 'sidebarFour'])->name('sidebar.four');
Route::get('add/sidebar/four', [SidebarController::class, 'addSidebarFour'])->name('add.sidebar.four');
Route::post('store/sidebar/four', [SidebarController::class, 'storeSidebarFour'])->name('store.sidebar.four');
Route::get('/sidebar/four/delete/{id}', [SidebarController::class, 'deleteSidebarFour']);


Route::get('sidebar/five', [SidebarController::class, 'sidebarFive'])->name('sidebar.five');
Route::get('add/sidebar/five', [SidebarController::class, 'addSidebarFive'])->name('add.sidebar.five');
Route::post('store/sidebar/five', [SidebarController::class, 'storeSidebarFive'])->name('store.sidebar.five');
Route::get('/sidebar/five/delete/{id}', [SidebarController::class, 'deleteSidebarFive']);


Route::get('social/media', [SidebarController:: class, 'socialMedia'])->name('social.media');
Route::get('add/social/media', [SidebarController::class, 'addSocialMedia'])->name('add.social.media');
Route::post('store/social/media', [SidebarController::class, 'storeSocialMedia'])->name('store.social.media');
Route::get('/social/media/delete/{id}', [SidebarController::class, 'deleteSocialMedia']);

//Banner Route
Route::get('slides', [BannerController::class, 'slides'])->name('slides');
Route::get('add/slider', [BannerController::class, 'addSlider'])->name('add.slider');
Route::post('store/slider', [BannerController::class, 'storeSlider'])->name('store.slider');
Route::get('/slider/delete/{id}', [BannerController::class, 'delete']);
//Logo
Route::get('logo', [BannerController::class, 'logo'])->name('logo');
Route::get('add/logo', [BannerController::class, 'addLogo'])->name('add.logo');
Route::post('store/logo', [BannerController::class, 'storeLogo'])->name('store.logo');
Route::get('/logo/delete/{id}', [BannerController::class, 'deleteLogo']);

//Home route
Route::get('home/banner', [HomeController::class, 'homeBanner'])->name('home.banner');
Route::get('add/home/banner', [HomeController::class, 'addHomeBanner'])->name('add.home.banner');
Route::post('store/home/banner', [HomeController::class, 'storeHomeBanner'])->name('store.home.banner');
Route::get('/home/banner/delete/{id}', [HomeController::class, 'deleteHomeBanner']);

Route::get('recent/news', [HomeController::class, 'recentNews'])->name('recent.news');
Route::get('add/recent/news', [HomeController::class, 'addRecentNews'])->name('add.recent.news');
Route::post('store/recent/news', [HomeController::class, 'storeRecentNews'])->name('store.recent.news');
Route::get('/recent/news/edit/{id}', [HomeController::class, 'editRecentNews']);
Route::post('/recent/news/update/{id}', [HomeController::class, 'updateRecentNews']);
Route::get('/recent/news/delete/{id}', [HomeController::class, 'deleteRecentNews']);

Route::get('instruction', [HomeController::class, 'instruction'])->name('instruction');
Route::get('add/instruction', [HomeController::class, 'addInstruction'])->name('add.instruction');
Route::post('store/instruction', [HomeController::class, 'storeInstruction'])->name('store.instruction');
Route::get('/instruction/edit/{id}', [HomeController::class, 'editInstruction']);
Route::post('/instruction/update/{id}', [HomeController::class, 'updateInstruction']);
Route::get('/instruction/delete/{id}', [HomeController::class, 'deleteInstruction']);

Route::get('card/details', [HomeController::class, 'cardDetails'])->name('card.details');
Route::get('add/card/details', [HomeController::class, 'addCardDetails'])->name('add.card.details');
Route::post('store/card/details', [HomeController::class, 'storeCardDetails'])->name('store.card.details');
Route::get('/card/details/delete/{id}', [HomeController::class, 'deleteCardDetails']);

Route::get('card/list', [HomeController::class, 'cardList'])->name('card.list');
Route::get('add/card/list', [HomeController::class, 'addCardList'])->name('add.card.list');
Route::post('store/card/list', [HomeController::class, 'storeCardList'])->name('store.card.list');
Route::get('/card/list/delete/{id}', [HomeController::class, 'deleteCardList']);

Route::get('image/gallery', [HomeController::class, 'imageGallery'])->name('image.gallery');
Route::get('add/image/gallery', [HomeController::class, 'addImageGallery'])->name('add.image.gallery');
Route::post('store/image/gallery', [HomeController::class, 'storeImageGallery'])->name('store.image.gallery');
Route::get('/image/gallery/delete/{id}', [HomeController::class, 'deleteImageGallery']);

Route::get('video/gallery', [HomeController::class, 'videoGallery'])->name('video.gallery');
Route::get('add/video/gallery', [HomeController::class, 'addVideoGallery'])->name('add.video.gallery');
Route::post('store/video/gallery', [HomeController::class, 'storeVideoGallery'])->name('store.video.gallery');
Route::get('/video/gallery/delete/{id}', [HomeController::class, 'deleteVideoGallery']);

//Mission route
Route::get('mission', [AboutUsController::class, 'mission'])->name('mission');
Route::get('add/mission', [AboutUsController::class, 'addMission'])->name('add.mission');
Route::post('store/mission', [AboutUsController::class, 'storeMission'])->name('store.mission');
Route::get('/mission/edit/{id}', [AboutUsController::class, 'editMission']);
Route::post('/mission/update/{id}', [AboutUsController::class, 'updateMission']);
Route::get('/mission/delete/{id}', [AboutUsController::class, 'deleteMission']);

//Vision route
Route::get('vision', [AboutUsController::class, 'vision'])->name('vision');
Route::get('add/vision', [AboutUsController::class, 'addVision'])->name('add.vision');
Route::post('store/vision', [AboutUsController::class, 'storeVision'])->name('store.vision');
Route::get('/vision/edit/{id}', [AboutUsController::class, 'editVision']);
Route::post('/vision/update/{id}', [AboutUsController::class, 'updateVision']);
Route::get('/vision/delete/{id}', [AboutUsController::class, 'deleteVision']);

//Office route
Route::get('office', [OfficeController::class, 'office'])->name('office');
Route::get('add/office', [OfficeController::class, 'addOffice'])->name('add.office');
Route::post('store/office', [OfficeController::class, 'storeOffice'])->name('store.office');
Route::get('/office/edit/{id}', [OfficeController::class, 'editOffice']);
Route::post('/office/update/{id}', [OfficeController::class, 'updateOffice']);
Route::get('/office/delete/{id}', [OfficeController::class, 'deleteOffice']);

//Grievance route
Route::get('grievance', [GrievanceController::class, 'grievance'])->name('grievance');
Route::get('add/grievance', [GrievanceController::class, 'addGrievance'])->name('add.grievance');
Route::post('store/grievance', [GrievanceController::class, 'storeGrievance'])->name('store.grievance');
Route::get('/grievance/delete/{id}', [GrievanceController::class, 'deleteGrievance']);

//Product route
Route::get('product/seller', [ProductController::class, 'productSeller'])->name('product.seller');
Route::get('add/product/seller', [ProductController::class, 'addProductSeller'])->name('add.product.seller');
Route::post('store/product/seller', [ProductController::class, 'storeProductSeller'])->name('store.product.seller');
Route::get('/product/seller/edit/{id}', [ProductController::class, 'editProductSeller']);
Route::post('/product/seller/update/{id}', [ProductController::class, 'updateProductSeller']);
Route::get('/product/seller/delete/{id}', [ProductController::class, 'deleteProductSeller']);

Route::get('product/buyer', [ProductController::class, 'productBuyer'])->name('product.buyer');

//Recent Price route
Route::get('recent/price', [MarketingController::class, 'recentPrice'])->name('recent.price');
Route::get('add/recent/price', [MarketingController::class, 'addRecentPrice'])->name('add.recent.price');
Route::post('store/recent/price', [MarketingController::class, 'storeRecentPrice'])->name('store.recent.price');
Route::get('/recent/price/edit/{id}', [MarketingController::class, 'editRecentPrice']);
Route::post('/recent/price/update/{id}', [MarketingController::class, 'updateRecentPrice']);
Route::get('/recent/price/delete/{id}', [MarketingController::class, 'deleteRecentPrice']);

//Agriculture Input routes
Route::get('fertilizer', [AgricultureInputController::class, 'fertilizer'])->name('fertilizer');
Route::get('add/fertilizer', [AgricultureInputController::class, 'addFertilizer'])->name('add.fertilizer');
Route::post('store/fertilizer', [AgricultureInputController::class, 'storeFertilizer'])->name('store.fertilizer');
Route::get('/fertilizer/delete/{id}', [AgricultureInputController::class, 'deleteFertilizer']);

Route::get('seed', [AgricultureInputController::class, 'seed'])->name('seed');
Route::get('add/seed', [AgricultureInputController::class, 'addSeed'])->name('add.seed');
Route::post('store/seed', [AgricultureInputController::class, 'storeSeed'])->name('store.seed');
Route::get('/seed/delete/{id}', [AgricultureInputController::class, 'deleteSeed']);

Route::get('irrigation', [AgricultureInputController::class, 'irrigation'])->name('irrigation');
Route::get('add/irrigation', [AgricultureInputController::class, 'addIrrigation'])->name('add.irrigation');
Route::post('store/irrigation', [AgricultureInputController::class, 'storeIrrigation'])->name('store.irrigation');
Route::get('/irrigation/delete/{id}', [AgricultureInputController::class, 'deleteIrrigation']);


//Warehouse route
Route::get('warehouse/place', [WarehouseController::class, 'warehousePlace'])->name('warehouse.place');
Route::get('add/warehouse/place', [WarehouseController::class, 'addWarehousePlace'])->name('add.warehouse.place');
Route::post('store/warehouse/place', [WarehouseController::class, 'storeWarehousePlace'])->name('store.warehouse.place');
Route::get('/warehouse/place/delete/{id}', [WarehouseController::class, 'deleteWarehousePlace']);

Route::get('warehouse/info', [WarehouseController::class, 'warehouseInfo'])->name('warehouse.info');
Route::get('add/warehouse/info', [WarehouseController::class, 'addWarehouseInfo'])->name('add.warehouse.info');
Route::post('store/warehouse/info', [WarehouseController::class, 'storeWarehouseInfo'])->name('store.warehouse.info');
Route::get('/warehouse/info/delete/{id}', [WarehouseController::class, 'deleteWarehouseInfo']);

//Complain box route
Route::get('complain', [ComplainController::class, 'complain'])->name('complain');
Route::get('/complain/answer/give/{id}', [ComplainController::class, 'giveAnswer']);
Route::get('/complain/answer/edit/{id}', [ComplainController::class, 'editAnswer']);
Route::post('/complain/answer/store/{id}', [ComplainController::class, 'storeAnswer']);
Route::post('/complain/answer/update/{id}', [ComplainController::class, 'updateAnswer']);
Route::get('/complain/delete/{id}', [ComplainController::class, 'delete']);

//Customer route
Route::get('customer', [CustomerController::class, 'customer'])->name('customer');
Route::get('/customer/delete/{id}', [CustomerController::class, 'delete']);
