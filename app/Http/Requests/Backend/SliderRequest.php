<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
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
                    'title'         =>  'required|max:255', 
                    'content'       =>  'nullable',
                    'url'           =>  'nullable',
                    'target'        =>  'required',
                    'publish_date'  =>  'nullable|date_format:Y-m-d',
                    'publish_time'  =>  'nullable',
                    'featured'      =>  'required',
                    'status'        =>  'required',
                    'view_in_main'  =>  'nullable',
                    'views'         =>  'nullable',// عدد مرات العرض
                    'section'       =>  'nullable',
                    'tags.*'        =>  'required',
                    'images'        =>  'required',  
                    'images.*'      =>  'mimes:jpg,jpeg,png,gif|max:3000',
                    'created_by'    =>  'nullable',
                    'updated_by'    =>  'nullable',
                    'deleted_by'    =>  'nullable',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'title'             =>  'required|max:255', 
                    'content'           =>  'nullable',
                    'url'               =>  'nullable',
                    'target'            =>  'required',
                    'featured'          =>  'required',
                    'status'            =>  'required',
                    'publish_date'      =>  'nullable|date_format:Y-m-d',
                    'publish_time'      =>  'nullable',
                    'view_in_main'      =>  'nullable',
                    'views'             =>  'nullable', // عدد مرات العرض
                    'section'           =>  'nullable',
                    'tags.*'            =>  'required', 
                    'images'            =>  'nullable',
                    'images.*'          =>  'mimes:jpg,jpeg,png,gif|max:3000',
                    'created_by'        =>  'nullable',
                    'updated_by'        =>  'nullable',
                    'deleted_by'        =>  'nullable',
                ];
            }
            
            default: break;
                
        }
       
    }
}


