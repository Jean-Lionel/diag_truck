<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatientUpdateRequest extends FormRequest
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
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'birthday' => ['required'],
            'patient_id' => ['required', 'string'],
            'address' => ['nullable', 'string'],
            'sexe' => ['nullable','string'],
            'phone' => ['nullable', 'string'],
            'chef_famille' => ['nullable', 'string'],
        ];
    }
}
