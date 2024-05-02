<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAbonnementRequest extends FormRequest
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
            'numero_carte' => 'required|string',
            'zone' => 'required|string',
            'classe' => 'required|string',
            'montant' => 'required|numeric',
            'duree' => 'required|string',
            'date_validite' => 'required|date',
            'user_id' => 'required|integer'
        ];
    }

    public function messages(): array
    {
        return [
            'numero_carte.required' => 'Le numéro de carte est obligatoire',
            'zone.required' => 'La zone est obligatoire',
            'classe.required' => 'La classe est obligatoire',
            'montant.required' => 'Le montant est obligatoire',
            'duree.required' => 'La durée est obligatoire',
            'date_validite.required' => 'La date de validité est obligatoire',
            'user_id.required' => 'L\'utilisateur est obligatoire'
        ];
    }
}
