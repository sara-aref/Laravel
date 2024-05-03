<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePostRequest extends FormRequest
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
            'title' => ['required',
                        'min:3',
                        Rule::unique('posts')->ignore($this->post)
                    ],
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'title is required',
            'title.unique' => 'title should be unique',
            'title.min' => 'title should not be less than 3 character',
        ];
    }
}
