<?php

namespace App\Dtos\Restaurants\Branches\PhoneNumbers;

use App\Http\Requests\Branches\PhoneNumbers\StoreNumbersRequest;

class StoreBranchPhoneNumberDto
{
    public function __construct(
        public int    $branch_id,
        public string $phone
    )
    {
    }

    public static function fromRequest(StoreNumbersRequest $request): StoreBranchPhoneNumberDto
    {
        return new self(
            $request->validated('branch_id'),
            $request->validated('phone')
        );
    }

}
