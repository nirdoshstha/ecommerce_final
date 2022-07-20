<?php

namespace App\Http\Controllers\backend;

use Exception;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SubcategoryRequest;

class SubcategoryController extends BackendBaseController
{
    protected $base_route   = 'subcategory.';
    protected $view_path    = 'backend.subcategory.';
    protected $panel        = 'Sub Category';
    protected $img_path     = 'uploads/subcategory/';

    public function __construct()
    {
        $this->model = new Subcategory();
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
        return view($this->__loadDataToView($this->view_path.'show'),compact('data'));
    }

    public function create(){
        $data['category_id'] =Category::active()->pluck('name','id');
        return view($this->__loadDataToView($this->view_path.'create'),compact('data'));
    }

    public function store(SubcategoryRequest $request){
        try{
            if($request->hasFile('image_field')){
                // $this->deleteImage($data['row']->image);
                $image_name =$this->uploadImage($request);
                $request->request->add(['image'=>$image_name]);
            }
            $request->request->add(['created_by'=>auth()->user()->id]);
            $data['row'] = $this->model->create($request->all());
            session()->flash('success_message',$this->panel.'Stored Successfully');
        }
        catch(\Exception $e){
            session()->flash('error_message',$this->panel.'Something went wrong');
        }
        return redirect(route($this->base_route.'index'));

    }

    public function edit($id){
        $data = [];
        $data['row'] = $this->model::find($id);
        $data['category_id'] =Category::active()->pluck('name','id');
        return view($this->__loadDataToView($this->view_path.'edit'),compact('data'));
    }

    public function update(SubcategoryRequest $request, $id){
        $data = [];
        $data['row']    = $this->model::find($id);

        try{
            if($request->hasFile('image_field')){
                $this->deleteImage($data['row']->image);
                $image_name =$this->uploadImage($request);
                $request->request->add(['image'=>$image_name]);
            }
            $request->request->add(['updated_by'=> auth()->user()->id]);
            $data['row']->update($request->all());
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



}
