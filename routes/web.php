<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ColorController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Livewire\Admin\Brand\Index;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\WishlistController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\OrderController;
//use AdminOrderController
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Frontend\UserController as FrontendUserController;
use App\Http\Controllers\StripeController;


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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/',[FrontendController::class,'index']);
Route::get('/collections',[FrontendController::class,'categories']);
Route::get('/collections/{category_slug}',[FrontendController::class,'products']);
Route::get('/collections/{category_slug}/{product_slug}',[FrontendController::class,'productView']);
Route::get('/new-arrivals',[FrontendController::class,'newArrivals']);
Route::get('/trending-products',[FrontendController::class,'trendingProducts']);
Route::get('search',[FrontendController::class,'searchProduct']);

Route::middleware(['auth'])->group(function(){

        Route::get('wishlist',[WishlistController::class,'index']);
        Route::get('cart',[CartController::class,'index']);
        Route::get('checkout',[CheckoutController::class,'index']);

        Route::get('orders',[OrderController::class,'index']);
        Route::get('orders/{orderId}',[OrderController::class,'show']);


        Route::get('profile',[FrontendUserController::class,'index']);
        Route::post('profile',[FrontendUserController::class,'updateUserDetails']);

        Route::get('change-password',[FrontendUserController::class,'createPassword']);
        Route::post('change-password',[FrontendUserController::class,'changePassword']);

        Route::get('/stripe-payment', [StripeController::class, 'handleGet']);
        Route::post('/stripe-payment', [StripeController::class, 'handlePost'])->name('stripe.payment');


});

Route::get('thank-you',[FrontendController::class,'thankyou']);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware((['auth','isAdmin']))->group(function(){

        
        // Setting Controller 

        Route::get('settings',[SettingController::class,'index']);
        Route::post('settings',[SettingController::class,'store']);

        // Dashboard Controller

        Route::get('dashboard',[DashboardController::class,'index']);

        //category controller

        Route::get('category',[CategoryController::class,'index']);
        Route::get('category/create',[CategoryController::class,'create']);
        Route::post('category',[CategoryController::class,'store']);
        Route::get('category/{category}/edit',[CategoryController::class,'edit']);
        Route::put('category/{category}',[CategoryController::class,'update']);

        // Product Controller
        Route::get('products',[ProductController::class,'index']);
        Route::get('products/create',[ProductController::class,'create']);
        Route::post('products',[ProductController::class,'store']);
        Route::get('products/{product}/edit',[ProductController::class,'edit']);
        Route::put('products/{product}',[ProductController::class,'update']);
        Route::get('products/{product_id}/delete',[ProductController::class,'destroyProduct']);

        Route::get('product-image/{product_image_id}/delete',[ProductController::class,'destroyImage']);

        Route::post('product-color/{prod_color_id}',[ProductController::class,'UpdateProdColorQty']);
        Route::get('product-color/{prod_color_id}/delete',[ProductController::class,'DeleteProdColorQty']);
        
        // Color Controller 
        Route::get('colors',[ColorController::class,'index']);
        Route::get('colors/create',[ColorController::class,'create']);
        Route::post('colors/create',[ColorController::class,'store']);
        Route::get('colors/{color_id}/edit',[ColorController::class,'edit']);
        Route::put('colors/{colors}',[ColorController::class,'update']);
        Route::get('colors/{colors_id}/delete',[ColorController::class,'destroyColor']);


        // Brands LivewireController

        Route::get('/brands',Index::class);

        // Slider Controllers

        Route::get('sliders',[SliderController::class,'index']);
        Route::get('sliders/create',[SliderController::class,'create']);
        Route::post('sliders/create',[SliderController::class,'store']);
        Route::get('sliders/{slider}/edit',[SliderController::class,'edit']);
        Route::put('sliders/{slider}',[SliderController::class,'update']);
        Route::get('sliders/{slider}/delete',[SliderController::class,'destroySlider']);

        // Order Controller 

        Route::get('orders',[AdminOrderController::class,'index']);
        Route::get('orders/{OrderId}',[AdminOrderController::class,'show']);
        Route::put('orders/{OrderId}',[AdminOrderController::class,'updateOrderStatus']);
        Route::get('invoice/{OrderId}',[AdminOrderController::class,'viewInvoice']);
        Route::get('invoice/{OrderId}/generate',[AdminOrderController::class,'generateInvoice']);
        Route::get('invoice/{orderId}/mail',[AdminOrderController::class,'mailInvoice']);


        // User Controller
        Route::get('/users',[UserController::class,'index']);
        Route::get('users/create',[UserController::class,'create']);
        Route::post('users',[UserController::class,'store']);

        Route::get('/users/{userId}/edit',[UserController::class,'edit']);
        Route::put('/user/{userId}',[UserController::class,'update']);
        Route::get('/users/{userId}/delete',[UserController::class,'delete']);
       
       
});

