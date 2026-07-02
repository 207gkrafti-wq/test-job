<?php

namespace App\Http\Requests;

use App\Models\Link;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LinkDelRequest extends FormRequest
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
            'link_del' => [
                'required',
                'exists:links,id',
                Rule::exists('links', 'id')->where(function($query){
                    $query->where('user_id', auth()->id());
                }),

            ]
        ];
    }
    public function messages(): array
    {
        return [
            'link_del.required' => 'Что-то пошло не так :(',
            'link_del.exists' => 'Ссылки не существует или она не принадлежит вам!',
        ];
    }
}
