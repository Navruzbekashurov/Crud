<?php

namespace App\Http\Controllers;

use App\Dtos\Restaurants\Branches\WorkTime\StoreBranchWorkTimeDto;
use App\Dtos\Restaurants\Branches\WorkTime\UpdateBranchWorkTimeDto;
use App\Http\Requests\Branches\WorkTime\StoreBranchWorkTimeRequest;
use App\Http\Requests\Branches\WorkTime\UpdateBranchWorkTimeRequest;
use App\Models\BranchWorkTime;
use App\Services\BranchWorkTimeService;

class BranchWorkTimeController extends Controller
{
    public function __construct(private readonly BranchWorkTimeService $branchWorkTimeService)
    {

    }

    public function store(StoreBranchWorkTimeRequest $request)
    {
        $this->branchWorkTimeService->create(StoreBranchWorkTimeDto::fromRequest($request));

        return redirect()->route('restaurants.index');
    }

    public function create()
    {
        return view('restaurants.branches.work-times.create');
    }

    public function edit()
    {
        return view('restaurants.branches.work-times.edit');
    }

    public function update(UpdateBranchWorkTimeRequest $request)
    {
        $this->branchWorkTimeService->update(UpdateBranchWorkTimeDto::fromRequest($request));

        return redirect()->route('restaurants.index');
    }

    public function destroy(BranchWorkTime $workTime)
    {
        $workTime->delete();

        return redirect()->route('restaurants.index');
    }

    public function storeMultiple(StoreBranchWorkTimeRequest $request)
    {
        $day = $request->validated();

        $this->branchWorkTimeService->storeMultiple($day);

        return response()->json();
    }

}

