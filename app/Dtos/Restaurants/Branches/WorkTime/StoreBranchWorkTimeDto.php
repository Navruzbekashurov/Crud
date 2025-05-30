<?php

namespace App\Dtos\Restaurants\Branches\WorkTime;

use App\Http\Requests\Branches\WorkTime\StoreBranchWorkTimeRequest;

class StoreBranchWorkTimeDto
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


    public static function fromRequest(StoreBranchWorkTimeRequest $request): StoreBranchWorkTimeDto
    {
        return new self(
            $request->validated('branch_id'),
            $request->validated('day'),
            $request->validated('open_time'),
            $request->validated('close_time'),
            $request->validated('day_off')
        );
    }

    public static function fromArray(array $data): StoreBranchWorkTimeDto
    {
        return new self(
            $data['branch_id'],
            $data['day'],
            $data['open_time'],
            $data['close_time'],
            $data['day_off'] ?? false,
        );
    }

}
