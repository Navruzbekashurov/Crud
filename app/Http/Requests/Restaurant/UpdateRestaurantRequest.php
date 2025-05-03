<?php

namespace App\Http\Requests\Restaurant;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRestaurantRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'address' => ['required'],
            'founded_at' => ['required', 'date'],
            'employee_numbers' => ['required', 'integer'],
            'founder_id' => ['required', 'exists:users,id'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
