<?php

namespace App\Http\Requests\Dashboard\City;

use Illuminate\Foundation\Http\FormRequest;

class CitySend extends FormRequest
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
            'state_id' => 'required',
            'name' => 'required',
        ];
    }

    public function messages()
    {
        return [];
    }
}
