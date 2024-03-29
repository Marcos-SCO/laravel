<?php

namespace App\Http\Requests\Dashboard\User;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdate extends FormRequest
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
            'username' => 'string|required',
            'first_name' => 'string|required',
            'last_name' => 'string|required',
            'email' => 'string|required',
            // 'password' => 'string|min:8|required',
        ];
    }

    public function messages()
    {
        return [
            'password.min' => 'Your password need to have a minimum of 8 characters...'
        ];
    }
}
