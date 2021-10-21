<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check();
    }

    public function prepareForValidation()
    {
        $this->merge([
            'current_password' => Hash::check($this->current_password, auth()->user()->password) ? 1 : 0,
        ]);
    }

    public function rules()
    {
        return [
            'current_password' => ['required', 'in:1'],
            'first_name' => ['required', 'string', 'max:100'],
            'last_name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:100', 'unique:users,email,' . auth()->id()],
        ];
    }

    public function messages()
    {
        return [
            'current_password.in' => 'Invalid current password.',
        ];
    }
}
