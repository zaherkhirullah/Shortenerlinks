<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FileValidation extends FormRequest
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
            'domain_id'=>  'required|integer',
            'folder_id'=>  'required|integer',
            'path'  => 'required|min:10|max:15000'   ,
            'description'  =>'required|min:10|string|max:1000',
        ];
    }
}
