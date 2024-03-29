<?php

namespace App\Http\Requests\Dashboard\Country;

use Illuminate\Foundation\Http\FormRequest;

class CountryStore extends FormRequest
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
            'code' => 'required|max:3|unique:countries',
            'name' => 'required',
        ];
    }

    public function messages()
    {
        return [];
    }
}
