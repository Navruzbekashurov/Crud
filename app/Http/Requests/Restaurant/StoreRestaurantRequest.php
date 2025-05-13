<?php

namespace App\Http\Requests\Restaurant;

use Illuminate\Foundation\Http\FormRequest;

class StoreRestaurantRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'address' => ['required'],
            'founded_at' => ['required', 'date'],
            'employee_numbers' => ['required', 'integer'],
            'founder_id' => ['required', 'exists:users,id'],
            'phone_numbers'=>['required','unique:restaurants,phone_numbers']
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
