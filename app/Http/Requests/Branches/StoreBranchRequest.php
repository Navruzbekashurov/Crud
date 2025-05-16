<?php

namespace App\Http\Requests\Branches;

use Illuminate\Foundation\Http\FormRequest;

class StoreBranchRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'restaurant_id' => ['required','exists:restaurant_id'],
            'name' => ['required'],
            'address' => ['required'],
            'is_active' => ['required', 'boolean']
        ];

    }


    public function authorize(): bool
    {
        return true;
    }

}
