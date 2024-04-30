<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVoyageRequest extends FormRequest
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
            'destination' => 'required|string',
            'depart' => 'required|string',
            'zone' => 'required|string',
            'prix' => 'required|numeric',
            'classe' => 'required|string',
            'date' => 'required|date',
            'train_id' => 'required|numeric',
            'user_id' => 'required|numeric'
        ];
    }

    function messages()
    {
        return [
            'destination.required' => 'La destination est obligatoire',
            'depart.required' => 'Le départ est obligatoire',
            'zone.required' => 'La zone est obligatoire',
            'prix.required' => 'Le prix est obligatoire',
            'classe.required' => 'La classe est obligatoire',
            'date.required' => 'La date est obligatoire',
            'train_id.required' => 'Le train est obligatoire',
            'user_id.required' => 'L\'utilisateur est obligatoire'
        ];
    }
}
