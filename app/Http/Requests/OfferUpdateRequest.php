<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OfferUpdateRequest extends FormRequest
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
            'code'=>['required'],
            // before:expires_at کمتر از تاریخ پایان
            'starts_at'=>['required','date','before:expires_at'],
            // after:starts_at بیشتر از تاریخ شروع
            'expires_at'=>['required','date','after:starts_at']
        ];
    }
}
