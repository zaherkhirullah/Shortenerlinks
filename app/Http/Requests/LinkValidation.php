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
            'domain_id'=>  'required|integer',
            'ad_id'=>  'required|integer',
            'folder_id'=>  'required|integer',
            'slug'=>  'unique:links',
            'url'=>  'required|unique:links|url|string',
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
