<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        return[
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
        ];
    }
        public function messages(): array
        {
            return[
                'name.required' => 'o nome é obrigatório!',
                'email.required' => 'o email é obrigatório!',
                'email.email' => 'necessário um email válido!',
                'password.required' => 'campo de senha é obrigatório!', 
                'password.min' => 'senha com mínimo :min caracteres' ,
            ];
        }
    }
