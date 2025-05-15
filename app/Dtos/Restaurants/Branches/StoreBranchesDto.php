<?php

namespace App\Dtos\Restaurants\Branches;

class StoreBranchesDto
{
    public function __construct(
        public string $name,
        public string $address,
        public int $restaurantId
    )
    {
    }


}
