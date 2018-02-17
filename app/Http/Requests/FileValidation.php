<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Auth;
use App\Http\Models\file;
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
        $file = file::find($this->file);

        switch($this->method())
        {
            case 'GET':
            case 'DELETE':
            {
                return [];
            }
            case 'POST':
            {
                return [
                    'domain_id'=>  'required|integer',
                    'folder_id'=>  'required|integer',
                    'path'  => 'required|min:10|max:15000'   ,
                    'description'  =>'required|min:10|string|max:1000',
                    'url'=>  'string|unique:files,shorted_url,NULL,id,user_id,' . Auth::id(),
                    

                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'domain_id'=>  'required|integer',
                    'folder_id'=>  'required|integer',
                    'path'  => 'required|min:10|max:15000',
                    'title'=>  'unique:files,slug,' .$this->file->id,
                ];
            }
            default:break;
        }

       
    }
}
