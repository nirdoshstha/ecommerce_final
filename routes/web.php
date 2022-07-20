<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\vendor\VendorController;
use App\Http\Controllers\backend\BackendController;
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

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

// Route::get('/vendor', function () {
//     return view('vendor.index');
// });

// Route::get('/admin', function () {
//     return view('backend.layouts.master');
// });
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



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

});




