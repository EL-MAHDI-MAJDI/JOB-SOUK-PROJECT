<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OffreEmploiRequest extends FormRequest
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
            'intitule_offre_emploi' => 'required|string|max:100',
            'description_offre_emploi' => 'required|string',
            'type_contrat' => 'required|string|max:50',
            'salaire_offre_emploi' => 'nullable|string|max:50',
            'niveau_experience_demander' => 'required|string|max:50',
            'avantage_offre_emploi' => 'nullable|string',
            'date_limite_candidature' => 'required|date|after_or_equal:today',
            'email_contact' => 'nullable|email|max:100',
            'telephone_contact' => 'nullable|string|max:30',
            'localisation' => 'required|string|max:100',
            'competences_requises' => 'required|string',
        ];
    }
    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'date_limite_candidature.after_or_equal' => 'La date limite de candidature doit être une date postérieure ou égale à aujourd\'hui.',
        ];
    }        
}
