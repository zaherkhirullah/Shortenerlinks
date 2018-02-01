<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlbumValidation extends FormRequest
{
  
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
           'title' => 'required|string',
           'about' => 'required|string|max:1000',
           'video' => 'mimetypes:video/avi,video/mpeg,video/quicktime',
        ];
    }
 public function messages()
    {
        return [
             'title.required' => 'this filed is Required',
          
        ];
    }
}
