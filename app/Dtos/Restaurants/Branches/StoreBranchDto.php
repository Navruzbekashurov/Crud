<?php

namespace App\Dtos\Restaurants\Branches;

use App\Http\Requests\Branches\StoreBranchRequest;

class StoreBranchDto
{
    public function __construct(
        public string $name,
        public string $address,
        public int    $restaurant_id,
        public bool   $is_active
    )
    {
    }

    public static function fromRequest(StoreBranchRequest $request): StoreBranchDto
    {
        return new self(
            $request->validated('name'),
            $request->validated('address'),
            $request->validated('restaurant_id'),
            $request->validated('is_active')
        );
    }
}
