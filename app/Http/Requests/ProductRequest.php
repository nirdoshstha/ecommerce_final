<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'category_id'       =>'required|integer',
            'subcategory_id'    =>'required|integer',
            'name'              =>'required|max:191',
            'slug'              =>'required|string|unique:products,slug,'.$this->id,
            'code'              =>'required|integer|min:1|unique:products,code,'.$this->id,
            'short_description' =>'nullable|max:1000',
            'long_description'  =>'nullable|max:2000',
            'offer_price'       =>'required',
            'meta_title'        =>'required',
        ];
    }

    public function messages()
    {
        return [
            'category_id.required'      => 'Please Select Category',
            'subcategory_id.required'   => 'Please Select Sub Category'
        ];
    }

}
