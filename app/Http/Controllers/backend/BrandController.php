<?php

namespace App\Http\Controllers\backend;

use Exception;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Requests\BrandRequest;
use App\Http\Controllers\Controller;

class BrandController extends BackendBaseController
{
    protected $base_route   = 'brand.';
    protected $view_path    = 'backend.brand.';
    protected $panel        = 'Brand';
    protected $img_path     = 'uploads/brand/';

    public function __construct()
    {
        $this->model = new Brand();
    }


    public function index(){
        $data = [];
        $data['row'] = $this->model::all();
        return view($this->__loadDataToView($this->view_path.'index'),compact('data'));
    }

    public function show($id){
        $data = [];
        $data['row'] = $this->model::findOrFail($id);
        return view($this->__loadDataToView($this->view_path.'show'),compact('data'));
    }

    public function create(){
        return view($this->__loadDataToView($this->view_path.'create'));
    }

    public function store(BrandRequest $request){

        try{
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
        return view($this->__loadDataToView($this->view_path.'edit'),compact('data'));
    }

    public function update(BrandRequest $request, $id){
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
