<?php

namespace App\Services;

use App\Dtos\Restaurants\StoreRestaurantsDto;
use App\Dtos\Restaurants\UpdateRestaurantsDto;
use App\Models\Restaurant;

class RestaurantService
{

    public function create(StoreRestaurantsDto $dto): void
    {
        $company = new Restaurant();
        $company->name = $dto->name;
        $company->address = $dto->address;
        $company->founded_at = $dto->founded_at;
        $company->employee_numbers = $dto->employee_numbers;
        $company->founder_id = $dto->founder_id;
        $company->phone_number = $dto->phone_number;
        $company->save();
    }


    public function update(int $id, UpdateRestaurantsDto $dto): void
    {
        $company = Restaurant::findOrFail($id);
        $company->name = $dto->name;
        $company->address = $dto->address;
        $company->founded_at = $dto->founded_at;
        $company->employee_numbers = $dto->employee_numbers;
        $company->founder_id = $dto->founder_id;
        $company->phone_number = $dto->phone_number;
        $company->save();
    }

}

