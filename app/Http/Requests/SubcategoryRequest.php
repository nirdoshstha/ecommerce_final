<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubcategoryRequest extends FormRequest
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
            'category_id'   =>'required|integer',
            'name'      =>'required|max:191',
            'slug'      =>'required|string|unique:subcategories,slug,'.$this->id,
            'image'     =>'nullable',
            'rank'      =>'required|integer|min:1|unique:subcategories,rank,'.$this->id,
        ];
    }

    public function messages()
    {
        return [
            'category_id.required'   => 'Please Select Category',
        ];
    }

}
