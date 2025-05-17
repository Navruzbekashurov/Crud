<?php

namespace App\Services;

use App\Dtos\Restaurants\Branches\PhoneNumbers\StoreBranchPhoneNumberDto;
use App\Dtos\Restaurants\Branches\PhoneNumbers\UpdateBranchPhoneNumberDto;
use App\Models\BranchPhoneNumber;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class NumbersService
{
    public function create(StoreBranchPhoneNumberDto $dto): void
    {
        $number = new BranchPhoneNumber();

        $number->branch_id = $dto->branch_id;
        $number->phone = $dto->phone;
        $number->save();

    }

    public function update(int $id, UpdateBranchPhoneNumberDto $dto): void
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
