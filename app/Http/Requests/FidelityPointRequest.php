<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FidelityPointRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'client_id' => ['required', 'exists:clients'],
            'balance' => ['required', 'integer', 'min:0', `100`],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
