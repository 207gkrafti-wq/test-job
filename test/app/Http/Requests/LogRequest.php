<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class LogRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "login" => "regex:/^[a-z\d_-]+$/ui|exists:users,login|required",
            "password" => "regex:/^[a-z\d]+$/ui|required",
        ];
    }
    public function messages(): array
    {
        return [
            'login.required' => 'Поле Логин обязательно для ввода',
            'password.required' => 'Поле Пароль обязательно для ввода',

            'login.regex' => 'Допустимые символы для поля Логин a-z 0-9',
            'password.regex' => 'Допустимые символы для поля Пароль a-z 0-9',

            'login.exists' => 'Неправильный логин или пароль',
        ];
    }
}
