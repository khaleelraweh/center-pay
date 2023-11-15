<?php

namespace App\Http\Requests\Backend;

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
     * @return array<string, mixed>
     */
    public function rules()
    {
        switch ($this->method()) {
            case 'POST':
            {
                return [
                    'name'                  =>  'required|max:255', 
                    'description'           =>  'nullable',
                    'quantity'              =>  'nullable|numeric',
                    'price'                 =>  'required|numeric',
                    'offer_price'           =>  'nullable|numeric',
                    'offer_ends'            =>  'nullable|date_format:Y-m-d',
                    'sku'                   =>  'nullable',
                    'max_order'             =>  'nullable|numeric',
                    'publish_date'          =>  'nullable|date_format:Y-m-d',
                    'publish_time'          =>  'nullable',
                    'view_in_main'          =>  'nullable',
                    'product_category_id'   =>  'required',
                    'tags.*'                =>  'required',
                    'featured'              =>  'required',
                    'status'                =>  'required',
                    'views'                 =>  'nullable',// عدد مرات العرض
                    'images'                =>  'required',  
                    'images.*'              =>  'mimes:jpg,jpeg,png,gif|max:3000',
                    'created_by'            =>  'nullable',
                    'updated_by'            =>  'nullable',
                    'deleted_by'            =>  'nullable',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'name'                  =>  'required|max:255', 
                    'description'           =>  'nullable',
                    'quantity'              =>  'nullable|numeric',
                    'price'                 =>  'required|numeric',
                    'offer_price'           =>  'nullable|numeric',
                    'offer_ends'            =>  'nullable|date_format:Y-m-d',
                    'sku'                   =>  'nullable',
                    'max_order'             =>  'nullable|numeric',
                    'publish_date'          =>  'nullable|date_format:Y-m-d',
                    'publish_time'          =>  'nullable',
                    'view_in_main'          =>  'nullable',
                    'product_category_id'   =>  'required',
                    'tags.*'                =>  'required', 
                    'featured'              =>  'required',
                    'status'                =>  'required',
                    'views'                 =>  'nullable', // عدد مرات العرض
                    'images'                =>  'nullable',
                    'images.*'              =>  'mimes:jpg,jpeg,png,gif|max:3000',
                    'created_by'            =>  'nullable',
                    'updated_by'            =>  'nullable',
                    'deleted_by'            =>  'nullable',
                ];
            }
            
            default: break;
                
        }
    }
}
