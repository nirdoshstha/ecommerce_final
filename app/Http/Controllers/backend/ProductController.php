<?php

namespace App\Http\Controllers\backend;

use Exception;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\ProductImage;
use App\Models\Brand;


class ProductController extends BackendBaseController
{
    protected $base_route   = 'product.';
    protected $view_path    = 'backend.product.';
    protected $panel        = 'Product';
    protected $img_path     = 'uploads/product/';

    public function __construct()
    {
        $this->model = new Product();
    }


    public function index(){
        $data = [];
        $data['row'] = $this->model::all();

        // return view('backend.category.index',compact('user'));
        return view($this->__loadDataToView($this->view_path.'index'),compact('data'));
    }

    public function show($id){
        $data = [];
        $data['row'] = $this->model::findOrFail($id);
        // $data['product_images'] = ProductImage::where('product_id',$data['row']->id)->first();
        return view($this->__loadDataToView($this->view_path.'show'),compact('data'));
    }

    public function create(){
        $data['category_id'] =Category::active()->pluck('name','id');
        $data['subcategory_id'] = Subcategory::active()->pluck('name','id');
        $data['brands'] = Brand::active()->pluck('name','id');
        return view($this->__loadDataToView($this->view_path.'create'),compact('data'));
    }

    public function store(ProductRequest $request){

        // try{
            $request->request->add(['created_by'=>auth()->user()->id]);
            $data['row'] = $this->model->create($request->all());

            foreach($request['image_field'] as $index=>$image){
                if($request->hasFile('image_field'))
                {
                    $image_name = time().'_'.$image->getClientOriginalName();
                    $image->move($this->img_path, $image_name);

                //Multible Image Save
                ProductImage::create([
                    'product_id'    =>$data['row']->id,
                    'name'          =>$request['image_name'][$index],
                    'image'         =>$image_name,
                    'created_by'    =>auth()->user()->id,
                ]);
                }
            }

            session()->flash('success_message',$this->panel.'Stored Successfully');
        // }
        // catch(\Exception $e){
        //     session()->flash('error_message',$this->panel.'Something went wrong');
        // }
        return redirect(route($this->base_route.'index'));

    }

    public function edit($id){
        $data = [];
        $data['row'] = $this->model::find($id);
        $data['category_id'] =Category::active()->pluck('name','id');
        $data['subcategory_id']=Subcategory::active()->pluck('name','id');
        $data['product_images'] =ProductImage::where('product_id',$data['row']->id)->first();
        $data['brands'] = Brand::active()->pluck('name','id');
        return view($this->__loadDataToView($this->view_path.'edit'),compact('data'));
    }

    public function update(ProductRequest $request, $id){
        $data = [];
        $data['row']    = $this->model::find($id);
        $data['product_image'] = ProductImage::where('product_id',$id)->first();

        try{
            if($request->hasFile('image_field')){
                $this->deleteImage($data['row']->image);
                $image_name =$this->uploadImage($request);
                $request->request->add(['image'=>$image_name]);
            }

            $request->request->add(['updated_by'=> auth()->user()->id]);
            $data['row']->update($request->all());
            $data['product_image']->update($request->all());
            session()->flash('success_message',$this->panel.' updated successfully');

        }
        catch(\Exception $e){
            session()->flash('error_message',$this->panel.' Something went wrong');
        }
        return redirect()->route($this->base_route.'index');

    }

    public function destroy($id){
        $data['row'] = $this->model::findOrFail($id);

        try{
            $this->deleteImage($data['row']->image);
            $data['row']->delete();
            session()->flash('success_message',$this->panel.' You have successfully deleted data..');
        }
        catch(\Exception $e){
            session()->flash('error_message',$this->panel.' Something went wrong');
        }
        return redirect(route($this->base_route.'index'));
    }

    public function getSubCategory(){
        $sub_categories = Subcategory::where('category_id',request('category_id'))->pluck('name','id');
        return response()->json($sub_categories);
    }



}
