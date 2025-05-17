<?php

namespace App\Http\Controllers;

use App\Dtos\Restaurants\Branches\WorkTime\StoreBranchWorkTimeDto;
use App\Http\Requests\Branches\WorkTime\StoreBranchWorkTimeRequest;
use App\Models\BranchWorkTime;
use App\Services\BranchWorkTimeService;

class BranchWorkTimeController extends Controller
{
    public function __construct(private readonly BranchWorkTimeService $branchWorkTimeService)
    {

    }

    public function index()
    {
        $time = BranchWorkTime::all();
        return redirect()->route('restaurants.index');
    }

    public function store(StoreBranchWorkTimeRequest $request)
    {
        $this->branchWorkTimeService->create(StoreBranchWorkTimeDto::fromRequest($request));

        return redirect()->route('restaurants.index');
    }

    public function create()
    {
        return redirect()->route('restaurants.index');
    }

    public function edit()
    {
    }

    public function show()
    {
    }

    public function update()
    {
    }

    public function destroy()
    {
    }

}
