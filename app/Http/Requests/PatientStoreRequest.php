<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatientStoreRequest extends FormRequest
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
            'address' => ['nullable', 'string'],
            'phone' => ['nullable', 'string'],
            'sexe' => ['required','string'],
            'chef_famille' => ['nullable', 'string'],
        ];
    }
}
