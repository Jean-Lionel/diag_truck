<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AssignationUpdateRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'patient_id' => ['required', 'integer', 'exists:patients,id'],
            'infirmier_id' => ['required', 'integer', 'exists:infirmiers,id'],
            'docteur_id' => ['required', 'integer', 'exists:docteurs,id'],
            'date_assignation' => ['required'],
        ];
    }
}
