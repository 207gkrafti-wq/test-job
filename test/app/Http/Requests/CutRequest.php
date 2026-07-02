<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CutRequest extends FormRequest
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
            'old_url' => 'required|url'
        ];
    }

    public function messages(): array
    {
        return [
            'old_url.required' => 'Для начала заполните поле',
            'old_url.url' => 'Не является ссылкой',
            // 'old_url.active_url' => 'Ссылка нерабочая',
        ];
    }
}
