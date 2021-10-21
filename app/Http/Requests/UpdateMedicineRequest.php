<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMedicineRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check();
    }

    public function prepareForValidation()
    {
        $this->merge([
            'is_prescribed' => $this->is_prescribed ? 1 : 0,
        ]);
    }

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:200', 'unique:units,name'],
            'price' => ['required', 'numeric'],
            'selling_price' => ['required', 'numeric'],
            'quantity' => ['required', 'numeric'],
            'supplier_id' => ['required', 'exists:suppliers,id'],
            'type_id' => ['required', 'exists:medicine_types,id'],
            'unit_id' => ['required', 'exists:units,id'],
            'category_id' => ['required', 'exists:categories,id'],
            'measurement' =>  ['required', 'string'],
            'barcode_number' => ['required', 'max:12', 'min:12'],
            'expired_at' => ['required', 'date']
        ];
    }

    public function messages()
    {
        return [
            'name.unique' => 'Medicine you input already exist.',
        ];
    }
}
