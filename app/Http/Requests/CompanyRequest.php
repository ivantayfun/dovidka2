<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
            'company' => 'required|unique:companies|min:5',

        ];
    }
    public function messages()
    {
        return [
            'company.required' => 'A title is required',
            'company.unique' => 'Данний запис вже існує',
        ];
    }
}
