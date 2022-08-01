<?php

namespace App\Http\Controllers\frontend;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Subcategory;

class HomeController extends Controller
{

    public function index(){
        $data=[];
         
        //  $data['categories'] = active()->has('subCategories.products')->latest()->get();

         $data['popular_products'] = Product::where('popular_products','1')->active()->latest()->get();
         $data['featured_products'] = Product::where('featured_products','1')->active()->latest()->limit(4)->get();
         $data['offer_products'] = Product::where('offer_products','1')->active()->latest()->limit(3)->get();
         $data['new_arrival'] = Product::where('new_arrival','1')->active()->latest()->limit(3)->get();

        return view('frontend.index',compact('data'));
    }


    public function subCategoriesDetails($cat_slug, $sub_slug){
        $data =[];
        $data['subcategories'] = Subcategory::where('slug',$sub_slug)->first();
        $sub_id = $data['subcategories']->id;

        $data['product'] = Product::where('subcategory_id',$sub_id)->get();
        session()->flash('success_message','Successfully');
        return view('frontend.product.subcategory_details',compact('data',$data['subcategories']));
    }

    public function productDetails($slug){
        $data['product'] = Product::where('slug',$slug)->first(); 
        $subcat_id = $data['product']->subcategory_id;
        $data['related_products'] = Product::where('subcategory_id', $subcat_id)->get(); 

        return view('frontend.product.product-details',compact('data'));
    }

    
}
