<?php

namespace App\Http\Requests;

use App\Models\Translation;
use Illuminate\Database\Query\Builder;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Nette\Schema\ValidationException;

class CreateTranslationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'language_code' => 'required|exists:languages,code_iso2',
            'locale_key' => [
                'required',
                'exists:locales,key',
                Rule::unique('translations')->where(
                    fn(Builder $query) => $query->where('language_code', $this->input('language_code'))
                )
            ],
            'value' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'language_code.required' => 'A language is required',
            'language_code.unique' => 'This language combination exists already',
            'locale_key.required' => 'A locale is required',
            'locale_key.unique' => 'This locale combination exists already',
            'value.required' => 'A value is required'
        ];
    }
}
