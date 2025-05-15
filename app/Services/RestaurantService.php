<?php

namespace App\Services;

use App\Dtos\Restaurants\StoreRestaurantsDto;
use App\Dtos\Restaurants\UpdateRestaurantsDto;
use App\Events\RestaurantCreatedEvent;
use App\Models\Restaurant;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class RestaurantService
{

    public function create(StoreRestaurantsDto $dto): void
    {
        $restaurant = new Restaurant();
        $restaurant->name = $dto->name;
        $restaurant->address = $dto->address;
        $restaurant->founded_at = $dto->founded_at;
        $restaurant->employee_numbers = $dto->employee_numbers;
        $restaurant->founder_id = $dto->founder_id;
        $restaurant->phone_number = $dto->phone_number;
        $restaurant->save();

        // background bir ikki ish qilishim kere
        // email jonatish, banner ni kichiklashtirish

        RestaurantCreatedEvent::dispatch($restaurant->id);
    }


    public function update(int $id, UpdateRestaurantsDto $dto): void
    {
        $restaurant = Restaurant::query()
            ->where('id', $id)
            ->first();

        if (!$restaurant) {
            throw new ModelNotFoundException();
        }

        $restaurant->name = $dto->name;
        $restaurant->address = $dto->address;
        $restaurant->founded_at = $dto->founded_at;
        $restaurant->employee_numbers = $dto->employee_numbers;
        $restaurant->founder_id = $dto->founder_id;
        $restaurant->phone_number = $dto->phone_number;
        $restaurant->save();
    }

}

