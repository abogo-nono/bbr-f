<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'first_name' => ['required', 'min:3', 'max:50'],
            'first_name_slug' => ['required', 'unique:clients,first_name_slug'],
            'last_name' => ['required', 'min:3', 'max:50'],
            'last_name_slug' => ['required', 'unique:clients,last_name_slug'],
            'email' => ['required', 'email', 'max:254', 'unique:clients,email'],
            'phone' => ['required', 'unique:clients,phone', 'min:9', 'max:25'],
            'avatar' => ['nullable'],
            'registration_date' => ['required', 'date'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
