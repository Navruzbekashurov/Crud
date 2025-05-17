<?php

namespace App\Services;

use App\Dtos\Restaurants\Branches\StoreBranchDto;
use App\Dtos\Restaurants\Branches\UpdateBranchDto;
use App\Models\Branch;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BranchService
{
    public function create(StoreBranchDto $dto): Branch
    {
        $branch = new Branch();
        $branch->restaurant_id = $dto->restaurant_id;
        $branch->name = $dto->name;
        $branch->address = $dto->address;
        $branch->save();
        return $branch;
    }

    public function update(int $id, UpdateBranchDto $dto): void
    {
        $branch = Branch::query()
            ->where('id', $id)
            ->first();
        if (!$branch) {
            throw new ModelNotFoundException();
        }

        $branch->restaurant_id = $dto->restaurant_id;
        $branch->name = $dto->name;
        $branch->address = $dto->address;
        $branch->save();
    }

}
