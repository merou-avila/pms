<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMedicineTypeRequest extends FormRequest
{
     public function authorize()
    {
        return auth()->check();
    }

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:200', 'unique:medicine_types,name'],
        ];
    }
}
