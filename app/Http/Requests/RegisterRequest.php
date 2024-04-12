<?php

namespace App\Http\Requests;

use App\Utils\ApiResponse;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class RegisterRequest extends FormRequest
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
            'fullname' => 'required|string',
            'otp' => 'required|string|min:6',
            'adress' => 'required|string',
            'isSubscribe' => 'boolean',
            'cgu'=> 'required',
            'phone' => ['required', 'string', 'regex:/^(77|78|76|75|70)\d{7}$/', 'unique:users'],
        ];
    }
    public function messages(): array
    {
        return [
            'fullname.required' => 'Le prenom est obligatoire.',
            'otp.required' => 'Le code otp est obligatoire.',
            'cgu.required' => "confirmez les conditions générales d'utilisation.",
            'adress.required' => "L'adresse est obligatoire.",
            'otp.min' => "le code doit être de six chiffres.",
            'phone.required' => "Le numero de telephone est obligatoire",
            'phone.regex' => 'Le format du numéro de téléphone doit être valide.',
            'phone.unique' => 'Le numéro de téléphone existe deja',


        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $message = $validator->errors()->first();
        throw new HttpResponseException(ApiResponse::error($validator->errors()->toArray(), $message, 422));
    }
}
