<?php

namespace App\Http\Requests\Dashboard\State;

use Illuminate\Foundation\Http\FormRequest;

class StateSend extends FormRequest
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
            'country_id' => 'required',
            'name' => 'required',
        ];
    }

    public function messages()
    {
        return [];
    }
}
