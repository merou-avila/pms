<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePasswordRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check();
    }

    public function validationData()
    {
        $this['current_password'] = Hash::check($this->current_password, auth()->user()->password)
            ? 1 : 0;

        return $this->all();
    }

    public function rules()
    {
        return [
            'current_password' => ['required', 'in:1'],
            'password' => ['required', 'min:8', 'string', 'confirmed'],
        ];
    }

    public function messages()
    {
        return [
            'current_password.in' => 'Invalid current password.',
        ];
    }
}
