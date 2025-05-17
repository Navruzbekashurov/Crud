<?php

namespace App\Dtos\Restaurants\Branches\PhoneNumbers;


use App\Http\Requests\Branches\PhoneNumbers\UpdateBranchPhoneNumbersRequest;

class UpdateBranchPhoneNumberDto
{
    public function __construct(
        public int    $branch_id,
        public string $phone
    )
    {
    }

    public static function fromRequest(UpdateBranchPhoneNumbersRequest $request): UpdateBranchPhoneNumberDto
    {
        return new self(
            $request->validated('branch_id'),
            $request->validated('phone')
        );
    }
}
