<?php

namespace App\Http\Requests\Branches\WorkTime;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBranchWorkTimeRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'work_times' => ['required', 'array'],
            'work_times.*.branch_id' => ['required', 'exists:branches,id'],
            'work_times.*.day' => ['required', 'string', 'max:255'],
            'work_times.*.open_time' => ['required', 'date_format:H:i'],
            'work_times.*.close_time' => ['required', 'date_format:H:i'],
            'work_times.*.day_off' => ['sometimes', 'boolean'],
        ];
    }


    public function authorize(): bool
    {
        return true;
    }
}
