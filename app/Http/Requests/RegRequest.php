<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class RegRequest extends FormRequest
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
            "login" => "min:6|regex:/^[a-z\d]+$/ui|unique:users,login|required",
            "password" => "min:8|regex:/^[a-z\d]+$/ui|required|confirmed",
            "email" => "required|email",

        ];
    }
    public function messages(): array
    {
        return [
            'login.required' => 'Поле Логин обязательно для ввода',
            'password.required' => 'Поле Пароль обязательно для ввода',
            'email.required' => 'Поле Email обязательно для ввода',

            'login.min' => 'Мин. значение поля Логин: 6',
            'password.min' => 'Мин. значение поля Пароль: 8',

            'login.regex' => 'Допустимые символы для поля Логин a-z 0-9',
            'password.regex' => 'Допустимые символы для поля Пароль a-z 0-9',

            'login.unique' => 'Логин занят',
            'password.confirmed' => 'Пароли не совпадают',
            'email.email' => 'Некорректный Email',
        ];
    }
}
