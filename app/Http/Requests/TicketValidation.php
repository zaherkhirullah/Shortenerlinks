<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TicketValidation extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'subject'=>'string|required|min:4|max:50',
            'message'=>'string|required|min:10|max:2000',
            'path' => 'mimes:jpeg,bmp,png,pdf,xls,docx,doc'
        ];
    }
}
