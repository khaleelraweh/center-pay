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
                    'section'       =>  'nullable', 
                    'start_date'    => 'nullable|date_format:Y-m-d',
                    'expire_date'   => 'required_with:start_date|date|date_format:Y-m-d',
                    'tags.*'        =>  'required', 
                    'images'        =>  'required',   
                    'images.*'      =>  'mimes:jpg,jpeg,png,gif|max:3000',  
                    


                    // used always 
                    'status'             =>  'required',
                    'featured'           =>  'nullable',
                    'published_on'       =>  'nullable',
                    'published_on_time'  =>  'nullable',
                    'view_in_main'       =>  'nullable',
                    'created_by'         =>  'nullable',
                    'updated_by'         =>  'nullable',
                    'deleted_by'         =>  'nullable',
                    // end of used always 
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
                    'section'           =>  'nullable',
                    'start_date'    => 'nullable|date_format:Y-m-d',
                    'expire_date'   => 'required_with:start_date|date|date_format:Y-m-d',
                    'tags.*'            =>  'required', 
                    'images'            =>  'nullable',
                    'images.*'          =>  'mimes:jpg,jpeg,png,gif|max:3000',

                    // used always 
                    'status'             =>  'required',
                    'featured'           =>  'nullable',
                    'published_on'       =>  'nullable',
                    'published_on_time'  =>  'nullable',
                    'view_in_main'       =>  'nullable',
                    'created_by'         =>  'nullable',
                    'updated_by'         =>  'nullable',
                    'deleted_by'         =>  'nullable',
                    // end of used always 
                ];
            }
            
            default: break;
                
        }
       
    }
}


