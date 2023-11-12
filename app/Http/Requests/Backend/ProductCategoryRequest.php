<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class ProductCategoryRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        switch ($this->method()) {
            case 'POST':
            {
                return [
                    'name'          =>'required|max:255|unique:product_categories',
                    'parent_id'     =>  'nullable',
                    'status'        =>'required',
                    'publish_date'  => 'nullable|date_format:Y-m-d',
                    'publish_time'  => 'nullable',
                    'view_in_main'  =>  'required',
                    'description'   => 'nullable',
                    'images'        =>  'required',  
                    'images.*'      =>  'mimes:jpg,jpeg,png,gif|max:3000',
                    
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [ 
                    'name'          =>'required|max:255|unique:product_categories,name,'.$this->route()->product_category->id,
                    'parent_id'     =>  'nullable',
                    'status'        =>'required',
                    'publish_date'  => 'nullable|date_format:Y-m-d',
                    'publish_time'  => 'nullable',
                    'view_in_main'  =>  'required',
                    'description'   => 'nullable',
                    'images'        =>  'required',  
                    'images.*'      =>  'mimes:jpg,jpeg,png,gif|max:3000',
                    
                    
                ];
            }
            
            default: break;
                
        }
    }
}


