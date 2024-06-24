<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'min:3', 'max:255'],
            'slug' => ['required', 'unique:services,slug'],
            'description' => ['nullable'],
            'points' => ['required', 'integer', 'min:0', 'max:1024'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
