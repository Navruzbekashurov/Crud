<?php

namespace App\Http\Controllers;

use App\Dtos\Restaurants\Branches\WorkTime\UpdateBranchWorkTimeDto;
use App\Http\Requests\Branches\WorkTime\StoreBranchWorkTimeRequest;
use App\Http\Requests\Branches\WorkTime\UpdateBranchWorkTimeRequest;
use App\Models\Branch;
use App\Models\BranchWorkTime;
use App\Models\Restaurant;
use App\Services\BranchWorkTimeService;

class BranchWorkTimeController extends Controller
{
    public function __construct(private readonly BranchWorkTimeService $branchWorkTimeService)
    {

    }

    public function store(StoreBranchWorkTimeRequest $request, Restaurant $restaurant, Branch $branch)
    {
        $day = $request->validated();
        //DTO ni ichiga olin
        $this->branchWorkTimeService->storeMultiple($day);

        return redirect()->route('restaurants.branches.show', ['restaurant' => $restaurant, 'branch' => $branch]);
    }

    public function create(Restaurant $restaurant, Branch $branch)
    {
        return view('restaurants.branches.work-times.create', ['restaurant' => $restaurant, 'branch' => $branch]);
    }

    public function edit(Restaurant $restaurant, Branch $branch)
    {
        return view('restaurants.branches.work-times.edit', ['restaurant' => $restaurant, 'branch' => $branch]);
    }

    public function update(UpdateBranchWorkTimeRequest $request, int $workTime)
    {
        $this->branchWorkTimeService->update($workTime, UpdateBranchWorkTimeDto::fromRequest($request));

        return redirect()->route('restaurants.index');
    }

    public function destroy(Restaurant $restaurant, Branch $branch, BranchWorkTime $workTime)
    {
        $workTime->delete();

        return redirect()->route('restaurants.branches.show', ['restaurant' => $restaurant, 'branch' => $branch]);
    }
}

