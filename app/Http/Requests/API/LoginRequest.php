<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => 'required|email',
            'password' => 'required|string'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Email é obrigatório.',
            'email.email' => 'Email inválido.',
            'password.required' => 'Senha é obrigatória.'
        ];
    }
}
