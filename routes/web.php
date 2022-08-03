<?php

use App\Models\Setting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\backend\BrandController;
use App\Http\Controllers\frontend\CartController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\vendor\VendorController;
use App\Http\Controllers\backend\BackendController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\backend\SettingController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\SubcategoryController;



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

 //Frontend
 //Cart


Route::get('/',[HomeController::class,'index'])->name('frontend.home');
Route::get('/category/{cat_slug}/{sub_slug}',[HomeController::class,'subCategoriesDetails'])->name('subcategory_details');
Route::get('/product/{slug}',[HomeController::class,'productDetails'])->name('product_details');



Auth::routes();



//Admin Auth Middleware
Route::middleware(['auth', 'isAdmin'])->group(function () {
    //Dashboard Admin
    Route::get('/admin',[BackendController::class,'index'])->name('backend.dashboard');

    //User
    Route::get('/user',[UserController::class,'index'])->name('user.index');
    Route::get('/user/show/{id}',[UserController::class,'show'])->name('user.show');
    Route::get('/user/edit/{id}',[UserController::class,'edit'])->name('user.edit');
    Route::put('/user/update/{id}',[UserController::class,'update'])->name('user.update');
    Route::delete('/user/destroy/{id}',[UserController::class,'destroy'])->name('user.destroy');

    //Category
    Route::get('/category',[CategoryController::class,'index'])->name('category.index');
    Route::get('/category/show/{id}',[CategoryController::class,'show'])->name('category.show');
    Route::get('/category/create',[CategoryController::class,'create'])->name('category.create');
    Route::post('/category/store',[CategoryController::class,'store'])->name('category.store');
    Route::get('/category/edit/{id}',[CategoryController::class,'edit'])->name('category.edit');
    Route::put('/category/update/{id}',[CategoryController::class,'update'])->name('category.update');
    Route::delete('/category/destroy/{id}',[CategoryController::class,'destroy'])->name('category.destroy');

    //Sub Category
    Route::get('/subcategory',[SubcategoryController::class,'index'])->name('subcategory.index');
    Route::get('/subcategory/show/{id}',[SubcategoryController::class,'show'])->name('subcategory.show');
    Route::get('/subcategory/create',[SubcategoryController::class,'create'])->name('subcategory.create');
    Route::post('/subcategory/store',[SubcategoryController::class,'store'])->name('subcategory.store');
    Route::get('/subcategory/edit/{id}',[SubcategoryController::class,'edit'])->name('subcategory.edit');
    Route::put('/subcategory/update/{id}',[SubcategoryController::class,'update'])->name('subcategory.update');
    Route::delete('/subcategory/destroy/{id}',[SubcategoryController::class,'destroy'])->name('subcategory.destroy');

    //Product
    Route::get('/product',[ProductController::class,'index'])->name('product.index');
    Route::get('/product/show/{id}',[ProductController::class,'show'])->name('product.show');
    Route::get('/product/create',[ProductController::class,'create'])->name('product.create');
    Route::post('/product/store',[ProductController::class,'store'])->name('product.store');
    Route::get('/product/edit/{id}',[ProductController::class,'edit'])->name('product.edit');
    Route::put('/product/update/{id}',[ProductController::class,'update'])->name('product.update');
    Route::delete('/product/destroy/{id}',[ProductController::class,'destroy'])->name('product.destroy');
    Route::post('/product',[ProductController::class,'getSubCategory'])->name('product.get_sub_category');

    //Brand
    Route::get('/brand',[BrandController::class,'index'])->name('brand.index');
    Route::get('/brand/show/{id}',[BrandController::class,'show'])->name('brand.show');
    Route::get('/brand/create',[BrandController::class,'create'])->name('brand.create');
    Route::post('/brand/store',[BrandController::class,'store'])->name('brand.store');
    Route::get('/brand/edit/{id}',[BrandController::class,'edit'])->name('brand.edit');
    Route::put('/brand/update/{id}',[BrandController::class,'update'])->name('brand.update');
    Route::delete('/brand/destroy/{id}',[BrandController::class,'destroy'])->name('brand.destroy');

     //Setting
     Route::get('/setting/create',[SettingController::class,'create'])->name('setting.create');
     Route::post('/setting/store/',[SettingController::class,'store'])->name('setting.store');
     Route::get('/setting/edit/{id}',[SettingController::class,'edit'])->name('setting.edit');
     Route::put('/setting/update/{id}',[SettingController::class,'update'])->name('setting.update');

     //User Profile
    Route::get('/user-profile',[BrandController::class,'index'])->name('user_profile.index');
    Route::get('/user-profile/show/{id}',[BrandController::class,'show'])->name('user_profile.show');
    Route::get('/user-profile/create',[BrandController::class,'create'])->name('use_profile.create');
    Route::post('/user-profile/store',[BrandController::class,'store'])->name('user_profile.store');
    Route::get('/user-profile/edit/{id}',[BrandController::class,'edit'])->name('user_profile.edit');
    Route::put('/user-profile/update/{id}',[BrandController::class,'update'])->name('user_profile.update');
    Route::delete('/user-profile/destroy/{id}',[BrandController::class,'destroy'])->name('user_profile.destroy');



});


//Vendor  Auth Group Middleware
Route::middleware(['auth', 'isVendor'])->group(function () {
     Route::get('/vendor',function(){
         return view('vendor.index');
     });



});

//User Role Banned /Unbanned
Route::middleware(['auth', 'isUser'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/cart',[CartController::class,'index'])->name('cart.index');
Route::post('/product/add-to-cart',[CartController::class,'addToCart'])->name('product.add_to_cart');
Route::post('/cart/update',[CartController::class, 'cartUpdate'])->name('product.cart_update');
Route::post('/cart/delete',[CartController::class,'cartDelete'])->name('product.cart_delete');

});

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


