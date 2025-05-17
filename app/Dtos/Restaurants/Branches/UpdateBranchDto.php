<?php

namespace App\Dtos\Restaurants\Branches;


use App\Http\Requests\Branches\UpdateBranchRequest;

class UpdateBranchDto
{
    public function __construct(
        public string $name,
        public string $address,
        public int    $restaurant_id,
        public bool   $is_active
    )
    {
    }

    public static function fromRequest(UpdateBranchRequest $request): UpdateBranchDto
    {
        return new self(
            $request->validated('name'),
            $request->validated('address'),
            $request->validated('restaurant_id'),
            $request->validated('is_active')
        );
    }

}
