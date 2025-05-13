<?php

namespace App\Dtos\Restaurants;

use App\Http\Requests\Restaurant\StoreRestaurantRequest;
use App\Http\Requests\Restaurant\UpdateRestaurantRequest;
use Illuminate\Support\Carbon;

class UpdateRestaurantsDto
{

    public function __construct(
        public string $name,
        public string $address,
        public string $founded_at,
        public int $founder_id,
        public  int $employee_numbers,
    )
    {
    }


    public static function fromRequest(UpdateRestaurantRequest $request): UpdateRestaurantsDto
    {
        return new self(
            $request->validated('name'),
            $request->validated('address'),
            $request->validated('founded_at'),
            $request->validated('founder_id'),
            $request->validated('employee_numbers')
        );

    }

}
