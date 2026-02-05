<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateReques extends FormRequest
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
            'name'=>['required'],
            // alpha_dash یعنی اسلاگ باید شامل دش و حروف الفبا باشه
            'slug'=>['required','alpha_dash'],
            // exists:categories,id یعنی معتبر باشن حتما وجود داشته باشن
            'category_id'=>['required','exists:categories,id'],
            'brand_id'=>['required','exists:brands,id'],
            'cost'=>['required','min:1000','integer'],
            'image'=>['nullable','mimes:png,jpg,jpeg,mpeg','min:5','max:1024'],
            'description'=>['required'],
        ];
    }
}
