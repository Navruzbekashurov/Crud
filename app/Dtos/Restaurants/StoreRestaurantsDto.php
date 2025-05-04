<?php

namespace App\Dtos\Restaurants;

use App\Http\Requests\Restaurant\StoreRestaurantRequest;
use Illuminate\Support\Carbon;

class StoreRestaurantsDto
{

    public function __construct(
        public string $name,
        public string $address,
        public string $founded_at,
        public  int $employee_numbers,
        public int $founder_id,
    )
    {
    }

    public static function fromRequest(StoreRestaurantRequest $request): StoreRestaurantsDto
    {
        return new self(
            $request->validated('name'),
            $request->validated('address'),
            $request->validated('founded_at'),
            $request->validated('employee_numbers'),
            $request->validated('founder_id'),
        );

    }

}
