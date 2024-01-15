<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class CurrencyRequest extends FormRequest
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
                    'currency_name'    =>  'required|max:255|unique:currencies', 
                    'currency_symbol'  =>  'nullable',  
                    'currency_code'    =>  'nullable',  
                    'exchange_rate'    =>  'nullable',

                    // used always 
                    'status'             =>  'required',
                    'published_on'       =>  'nullable',
                    'published_on_time'  =>  'nullable',
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
                    'currency_name'     =>  'required|max:255|unique:currencies,currency_name,'.$this->route()->currency->id,
                    'currency_symbol'   =>  'nullable',  
                    'currency_code'     =>  'nullable',
                    'exchange_rate'     =>  'nullable',

                    // used always 
                    'status'             =>  'required',
                    'published_on'       =>  'nullable',
                    'published_on_time'  =>  'nullable',
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
