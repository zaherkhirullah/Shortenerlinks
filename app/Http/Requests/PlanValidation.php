<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlanValidation extends FormRequest
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
            'name'=>'required|string|min:3',
            'display_name'=>'required|string|min:3',
            'space_size'=>'required|integer',
            // 'description'=>'required|string|min:3',
            'yearly_price'=>'required|integer',
            'monthly_price'=>'required|integer',
        ];
    }
}
