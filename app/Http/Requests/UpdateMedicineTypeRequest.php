<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMedicineTypeRequest extends FormRequest
{
     public function authorize()
    {
        return auth()->check();
    }

    public function prepareForValidation()
    {
        $this->merge([
            'is_active' => $this->is_active ? 0 : 1,
        ]);
    }

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:200', 'unique:medicine_types,name,' . $this->route('medicineType')->id],
            'is_active' => ['required', 'in:0,1'],
        ];
    }
}
