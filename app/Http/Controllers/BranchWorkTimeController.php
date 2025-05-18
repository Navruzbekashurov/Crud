<?php

namespace App\Http\Controllers;

use App\Dtos\Restaurants\Branches\WorkTime\StoreBranchWorkTimeDto;
use App\Http\Requests\Branches\WorkTime\StoreBranchWorkTimeRequest;
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

    public function update()
    {
    }

    public function destroy()
    {
    }

}
