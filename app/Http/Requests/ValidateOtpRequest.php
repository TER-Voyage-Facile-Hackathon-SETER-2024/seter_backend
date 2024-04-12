<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateOtpRequest extends FormRequest
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
            'oldOtp' => 'required|string|min:6',
            'newOtp' => 'required|string|min:6'

        ];
    }

    public function messages(): array
    {
        return [
            'oldOtp.required' => 'Le code otp est obligatoire.',
            'oldOtp.min' => "le code doit être de six chiffres.",
            'newOtp.required' => 'Le code otp est obligatoire.',
            'newOtp.min' => "le code doit être de six chiffres.",


        ];
    }


}
