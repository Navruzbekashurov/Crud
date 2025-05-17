<?php

namespace App\Services;

use App\Dtos\Restaurants\Branches\PhoneNumbers\StoreNumbersDto;
use App\Dtos\Restaurants\Branches\PhoneNumbers\UpdateNumbersDto;
use App\Models\BranchPhoneNumber;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class NumbersService
{
    public function create(StoreNumbersDto $dto): void
    {
        $number = new BranchPhoneNumber();

        $number->branch_id = $dto->branch_id;
        $number->phone = $dto->phone;
        $number->save();

    }

    public function update(int $id, UpdateNumbersDto $dto)
    {
        $number = BranchPhoneNumber::query()
            ->where('id', $id)
            ->first();
        if (!$number) {
            throw new ModelNotFoundException();
        }
        $number->branch_id = $dto->branch_id;
        $number->phone = $dto->phone;
        $number->save();

    }
}
