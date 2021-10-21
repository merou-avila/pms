<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadMedicinePhotoRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check();
    }

    public function rules()
    {
        return [
            'photo' => ['required', 'file', 'mimes:png,jpg,jpeg'],
        ];
    }
}
