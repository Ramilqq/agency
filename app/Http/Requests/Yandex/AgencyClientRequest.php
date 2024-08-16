<?php

namespace App\Http\Requests\Yandex;

use Illuminate\Foundation\Http\FormRequest;

class AgencyClientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->guest();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'email', /*'unique:users,email'*/],
            'login' => ['required', 'string', 'min:3', 'max:30'],
            'type' => ['required', 'string', 'min:3', 'max:30'],
            'inn' => ['required', 'integer', 'min:3'],
            'firstname' => ['required', 'string', 'min:3', 'max:30'],
            'lastname' => ['required', 'string', 'min:3', 'max:30'],
        ];
    }
}
