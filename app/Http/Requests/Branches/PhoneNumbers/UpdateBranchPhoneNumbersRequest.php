<?php

namespace App\Http\Requests\Branches\PhoneNumbers;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBranchPhoneNumbersRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'branch_id' => ['required', 'exists:branch_phone_numbers,branch_id'],
            'phone' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
