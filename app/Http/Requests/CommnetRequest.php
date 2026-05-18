<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class CommnetRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'content' => 'required|string',
            'author' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'content.required' => 'mandatory field',
            'author.required' => 'mandatory field',
        ];
    }
}