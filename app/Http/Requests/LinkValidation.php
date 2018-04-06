<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

use Auth;
use App\Http\Models\link;
class LinkValidation extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {

        $link = link::find($this->link);

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
                    'ad_id'=>  'required|integer',
                    'folder_id'=>  'required|integer',
                    'slug'=>  'string|max:7|unique:links',
                    'alias'=>  'string|max:7',
                    'url'=>  'required|url|string|unique:links,url,NULL,id,user_id,' . Auth::id(),
                ];
            }
            case 'PUT':
            return [
                'domain_id'=>  'required|integer',
                'ad_id'=>  'required|integer',
                'folder_id'=>  'required|integer',
                'alias'=>  'string|max:7',                
                'slug'=>  'string|max:7|unique:links,slug,' .$this->link->id,            
                'url'=>  'required|url|string|unique:links,url,NULL,id,user_id,'.$this->link->id,
            ];
            case 'PATCH':
            {
                return [
                    'domain_id'=>  'required|integer',
                    'ad_id'=>  'required|integer',
                    'folder_id'=>  'required|integer',
                    'alias'=>  'string|max:7',                    
                    'slug'=>  'string|max:7|unique:links,slug,' .$this->link->id,
                    'url'=>  'required|url|string|unique:links,url,NULL,id,user_id,'.$this->link->user_id ,
                ];
            }
            default:break;
        }

        
    }
     public function messages()
    {
        return [
             'url.required' => 'Please add a URL.',
        
        ];
    }
    
}
