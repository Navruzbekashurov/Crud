<?php

namespace App\Dtos\Restaurants\Branches;


use App\Http\Requests\Branches\UpdateBranchRequest;

class UpdateBranchesDto
{
    public function __construct(
        public string $name,
        public string $address,
        public int    $restaurant_id
    )
    {
    }

    public static function fromRequest(UpdateBranchRequest $request): UpdateBranchesDto
    {
        return new self(
            $request->validated('name'),
            $request->validated('address'),
            $request->validated('restaurant_id'),

        );
    }

}
