<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateLanguageRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'code_iso2' => 'required|unique:languages|size:2',
            'name' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'code_iso2.required' => 'A code_iso2 is required',
            'code_iso2.unique' => 'This code exists already',
            'name.required' => 'A language name is required'
        ];
    }
}
