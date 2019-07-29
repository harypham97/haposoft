<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
        switch ($this->method()) {
            case 'POST':
                {
                    return [
                        'full_name' => 'required|max:50',
                        'email' => 'required|email|max:255|unique:users,email',
                        'phone_number' => 'required|numeric|digits_between:10,12',
                        'company_name' => 'required|max:50',
                        'content' => 'required'
                    ];
                }
            case 'PATCH':
            case 'PUT':
                {
                    return [
                        'full_name' => 'required|max:50',
                        'phone_number' => 'required|numeric|digits_between:10,12',
                        'company_name' => 'required|max:50',
                        'content' => 'required',
                        'email' => Rule::unique('users')->ignore($this->route()->user->id)
                    ];
                }
            default:
                break;
        }


    }
}
