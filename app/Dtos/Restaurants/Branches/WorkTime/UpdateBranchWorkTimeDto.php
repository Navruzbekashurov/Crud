<?php

namespace App\Dtos\Restaurants\Branches\WorkTime;

use App\Http\Requests\Branches\WorkTime\UpdateBranchWorkTimeRequest;

class UpdateBranchWorkTimeDto
{
    public function __construct(
        public int    $branch_id,
        public string $day,
        public string $open_time,
        public string $close_time,
        public bool   $day_off
    )
    {
    }


    public static function fromRequest(UpdateBranchWorkTimeRequest $request): UpdateBranchWorkTimeDto
    {
        return new self(
            $request->validated('branch_id'),
            $request->validated('day'),
            $request->validated('open_time'),
            $request->validated('close_time'),
            $request->validated('day_off')
        );
    }
}
