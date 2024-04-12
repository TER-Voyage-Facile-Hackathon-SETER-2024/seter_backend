<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            //
            'id' => 'required|numeric',
            'fullname' => 'required|string',
            'adress' => 'required|string',
            'phone' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'id.required' => 'L\'id est obligatoire',
            'fullname.required' => 'Le nom est obligatoire',
            'adress.required' => 'L\'adresse est obligatoire',
            'phone.required' => 'Le numéro de téléphone est obligatoire',
        ];
    }
}
