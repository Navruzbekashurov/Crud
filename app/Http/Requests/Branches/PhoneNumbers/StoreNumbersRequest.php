<?php

namespace App\Http\Requests\Branches\PhoneNumbers;

use Illuminate\Foundation\Http\FormRequest;

class StoreNumbersRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'branch_id' => ['required', 'exists:branches'],
            'phone' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
