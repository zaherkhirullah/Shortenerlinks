<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LinkValidation extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
         'user_id'=>  'required|integer';
         'domain_id'=>  'required|integer';
         'ad_id'=>  'required|integer';
         'status'=>  'required|string';
         'url'=>  'required|string';
         'alias'=>  'string';
         'title'=>  'string';
         'description'=>  'string';
         'hits'=>  'string';
         'isDeleted' =>  'required';
        ];
    }
}
