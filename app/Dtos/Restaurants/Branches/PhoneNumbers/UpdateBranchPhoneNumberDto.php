<?php

namespace App\Dtos\Restaurants\Branches\PhoneNumbers;


use App\Http\Requests\Branches\PhoneNumbers\UpdateNumbersRequest;

class UpdateBranchPhoneNumberDto
{
    public function __construct(
        public int    $branch_id,
        public string $phone
    )
    {
    }

    public function fromRequest(UpdateNumbersRequest $request): UpdateBranchPhoneNumberDto
    {
        return new self(
            $request->validated('branch_id'),
            $request->validated('phone')
        );
    }
}
