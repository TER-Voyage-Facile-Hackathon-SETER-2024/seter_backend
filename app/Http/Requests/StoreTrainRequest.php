<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTrainRequest extends FormRequest
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
            'title' => 'required|string',
            'number' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Le nom de train est obligatoire',
            'number.required' => 'Le numéro est obligatoire',
            'number.numeric' => 'Le numéro est un nombre',
        ];
    }
}
