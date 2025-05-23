<?php

namespace App\Services;

use App\Dtos\Restaurants\Branches\WorkTime\StoreBranchWorkTimeDto;
use App\Dtos\Restaurants\Branches\WorkTime\UpdateBranchWorkTimeDto;
use App\Models\BranchWorkTime;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Collection;

class BranchWorkTimeService
{

    public function update(int $id, UpdateBranchWorkTimeDto $dto): void
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

    public function storeMultiple(Collection $workDays): void
    {
        $workDays->map(function (StoreBranchWorkTimeDto $workDay) {
            BranchWorkTime::create([
                'branch_id' => $workDay->branch_id,
                'day' => $workDay->day,
                'open_time' => $workDay->open_time,
                'close_time' => $workDay->close_time,
                'day_off' => $workDay->day_off ?? false
            ]);
        });
    }

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


}
