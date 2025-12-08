<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewCategoryRequest extends FormRequest
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
            'title'=>['required','unique:categories,title'],

            // کتگوری که میاد سمت من باید حتما وجود داشته باشه  برای امنیتی
            'categiry_id'=>['nullable','exists:categories,id'],
        ];
    }
}
