<?php

namespace App\Http\Requests;

use Illuminate\Support\Str;
use Illuminate\Foundation\Http\FormRequest;

class UpdateSupplierRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check();
    }

    public function prepareForValidation()
    {
        $this->merge([
            'is_active' => $this->is_active ? 0 : 1,
            'contact_number' => str_replace('-', '', Str::slug($this->contact_number)),
        ]);
    }

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:200', 'unique:suppliers,name,' . $this->route('supplier')->id],
            'contact_number' => ['required', 'string'],
            'address' => ['required', 'string', 'max:200'],
            'is_active' => ['required', 'in:0,1'],
        ];
    }
}
