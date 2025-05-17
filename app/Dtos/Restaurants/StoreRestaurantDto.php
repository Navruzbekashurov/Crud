<?php

namespace App\Dtos\Restaurants;

use App\Http\Requests\Restaurant\StoreRestaurantRequest;

class StoreRestaurantDto
{

    public function __construct(
        public string $name,
        public string $address,
        public string $founded_at,
        public int    $employee_numbers,
        public int    $founder_id,
        public string $phone_number
    )
    {
    }

    public static function fromRequest(StoreRestaurantRequest $request): StoreRestaurantDto
    {
        return new self(
            $request->validated('name'),
            $request->validated('address'),
            $request->validated('founded_at'),
            $request->validated('employee_numbers'),
            $request->validated('founder_id'),
            $request->validated('phone_number')
        );

    }

}
