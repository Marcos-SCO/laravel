<?php

namespace App\Http\Requests\Dashboard\State;

use Illuminate\Foundation\Http\FormRequest;

class StateUpdate extends FormRequest
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
            'country_id' => 'required|min:1',
            'name' => 'required',
        ];
    }

    public function messages()
    {
        return [];
    }
}
