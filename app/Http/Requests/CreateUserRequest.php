<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'last_name' => 'required',
            'first_name' => 'required',
            'birthdate' => 'required|date',
            'religion' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'last_name.required' => 'Required',
            'first_name.required' => 'Required',
            'birthdate.required' => 'Required',
            'religion.required' => 'Required'
        ];
    }
}
