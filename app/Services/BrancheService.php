<?php

namespace App\Services;

use App\Dtos\Restaurants\Branches\StoreBranchesDto;
use App\Dtos\Restaurants\Branches\UpdateBranchesDto;
use App\Dtos\Restaurants\StoreRestaurantsDto;
use App\Models\Branch;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BrancheService
{
    public function create(StoreBranchesDto $dto)
    {
        $branch = new Branch();
        $branch->restaurant_id=$dto->restaurant_id;
        $branch->name=$dto->name;
        $branch->address=$dto->address;
        $branch->save();

    }
    public function update(int $id, UpdateBranchesDto $dto)
    {
        $branch= Branch::query()
            ->where('id',$id)
            ->first();
        if (!$branch){
            throw new ModelNotFoundException();
        }

        $branch->restaurant_id = $dto->restaurant_id;
        $branch->name = $dto->name;
        $branch->address = $dto->address;
        $branch->save();
    }

}
