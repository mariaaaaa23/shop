<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VerifyOtpRequest extends FormRequest
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
            // gte:11111  بزرگتر مساوی 5 تا یک باشه    lte:99999 کوچتر مساوی 5تا 9     
            'otp'=>['required','max:5','min:5','gte:11111','lte:99999']
        ];
    }
}
