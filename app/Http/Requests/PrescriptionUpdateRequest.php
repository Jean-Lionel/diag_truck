<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PrescriptionUpdateRequest extends FormRequest
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
            'diag_id' => ['required', 'integer', 'exists:diags,id'],
            'med_id' => ['required', 'integer', 'exists:meds,id'],
            'dose' => ['required', 'string'],
        ];
    }
}
