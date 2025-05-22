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

    public function storeMultiple(Collection $dtos): void
    {
        //Bunaqasiga array qabul qmen, dto kere
        foreach ($dtos as $dto) {
            BranchWorkTime::create([
                'branch_id' => $dto->branch_id,
                'day' => $dto->day,
                'open_time' => $dto->open_time,
                'close_time' => $dto->close_time,
                'day_off' => $dto->day_off ?? false
            ]);
        }

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
