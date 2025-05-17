<?php

namespace App\Http\Requests\Branches\WorkTime;

use Illuminate\Foundation\Http\FormRequest;

class StoreBranchWorkTimeRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'branch_id' => ['required', 'exists:branches'],
            'day' => ['required'],
            'open_time' => ['required', 'date'],
            'close_time' => ['required', 'date'],
            'day_off' => ['boolean'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
