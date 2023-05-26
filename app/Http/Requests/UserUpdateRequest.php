<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'name' => ['required'],
            'lastName' => ['required'],
            'sexe' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'role_name' => ['required'],
        ];
    }
}
