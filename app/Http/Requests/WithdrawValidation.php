<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WithdrawValidation extends FormRequest
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
            
            'amount'=>'integer|required',
            'withdraw_address'=>'string|max:500',
            'withdrawal_method_id'=>'integer',
            'transaction_id' => 'string|max:500',
        ];
    }
}
