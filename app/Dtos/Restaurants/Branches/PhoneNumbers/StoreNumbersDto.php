<?php

namespace App\Dtos\Restaurants\Branches\PhoneNumbers;

use App\Http\Requests\Branches\PhoneNumbers\StoreNumbersRequest;

class StoreNumbersDto
{
    public function __construct(

        public int    $branch_id,
        public string $phone
    )
    {
    }

    public function fromRequest(StoreNumbersRequest $request): StoreNumbersDto
    {
        return new self(
            $request->validated('branch_id'),
            $request->validated('phone')
        );
    }

}
