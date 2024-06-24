<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PointsHistoryRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'client_id' => ['required', 'exists:clients'],
            'transaction_type' => ['required'],
            'points' => ['required', 'integer', 'min:1'],
            'transaction_date' => ['required', 'date'],
            'description' => ['nullable'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
