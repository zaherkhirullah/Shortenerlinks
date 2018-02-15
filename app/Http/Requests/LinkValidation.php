<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

use Auth;
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
            'url'=>  'required|url|string|unique:links,url,NULL,id,user_id,' . Auth::id(),
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
