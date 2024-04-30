<?php

namespace App\Http\Requests;

use App\Utils\ApiResponse;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class CodeOtpRequest extends FormRequest
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
            'phone' => ['required','string','regex:/^(77|78|76|75|70)\d{7}$/'],
        ];
    }

    public function messages():array
    {
        return [
            'phone.required' => "Le numero de telephone est obligatoire",
            'phone.regex' => 'Le format du numéro de téléphone doit être valide.',
        ];
        
    }
    protected function failedValidation(Validator $validator)
    {
        $message = $validator->errors()->first();
        throw new HttpResponseException(ApiResponse::errorValidation($validator->errors()->toArray(), $message, 422));
    }
}
