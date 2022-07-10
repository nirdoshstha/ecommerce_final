<?php

namespace App\Http\Controllers\backend;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Http\Controllers\Controller;

class CategoryController extends BackendBaseController
{
    protected $base_route   = 'category.';
    protected $view_path    = 'backend.category.';
    protected $panel        = 'Category';
    protected $img_path     = 'uploads/category/';

    public function __construct()
    {
        $this->model = new Category();
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

    public function edit($id){
        $data = [];
        $data['row'] = $this->model::find($id);
        return view($this->__loadDataToView($this->view_path.'edit'),compact('data'));
    }

    public function update(CategoryRequest $request, $id){
        $data = [];
        $data['row']    = $this->model::find($id);

        try{

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
            $data['row']->delete();
            session()->flash('success_message',$this->panel.' You have successfully deleted data..');
        }
        catch(\Exception $e){
            session()->flash('error_message',$this->panel.' Something went wrong');
        }
        return redirect(route($this->base_route.'index'));

    }



}
