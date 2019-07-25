<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'email' => 'required|email|unique:users,email',
            'full_name' => 'required|max:50',
            'company_name' => 'required|max:50',
            'phone_number' => 'required|numeric|unique:users,phone_number|digits_between:10,12',
            'content' => 'required'
        ];
    }
}
