<?php

namespace App\Services;

use App\Dtos\Restaurants\Branches\WorkTime\StoreBranchWorkTimeDto;
use App\Dtos\Restaurants\Branches\WorkTime\UpdateBranchWorkTimeDto;
use App\Models\BranchWorkTime;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BranchWorkTimeService
{

    public function create(StoreBranchWorkTimeDto $dto): void
    {
        $workTime = new BranchWorkTime();

        $workTime->branch_id = $dto->branch_id;
        $workTime->day = $dto->day;
        $workTime->open_time = $dto->open_time;
        $workTime->close_time = $dto->close_time;
        $workTime->day_off = $dto->day_off;

        $workTime->save();

    }


    public function update(int $id, UpdateBranchWorkTimeDto $dto)
    {
        $workTime = BranchWorkTime::query()
            ->where('id', $id)
            ->first();
        if (!$workTime) {
            throw new ModelNotFoundException();
        }
        $workTime->branch_id = $dto->branch_id;
        $workTime->day = $dto->day;
        $workTime->open_time = $dto->open_time;
        $workTime->close_time = $dto->close_time;
        $workTime->day_off = $dto->day_off;

        $workTime->save();


    }


}
