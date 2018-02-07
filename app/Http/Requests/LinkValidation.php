<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;


class LinkValidation extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [

      'status','alias','title','description','isDeleted',

         'user_id'=>  'required|integer',
         'domain_id'=>  'required|integer',
         'ad_id'=>  'required|integer',
         'folder_id'=>  'required|integer',
         'url'=>  'required|url|string',
         'shorted_url'=>'required|string',
         'alias'=>  'max:30|string',
         'slug'=>  'required|unique:links|string',

        ];
    }
     public function messages()
    {
        return [
             'url.required' => 'Please add a URL.',
             'alias.max' => 'Maximum alias length is 30 characters.',
        ];
    }
    
}
