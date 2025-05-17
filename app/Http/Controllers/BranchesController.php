<?php

namespace App\Http\Controllers;

use App\Dtos\Restaurants\Branches\StoreBranchesDto;
use App\Dtos\Restaurants\Branches\UpdateBranchesDto;
use App\Http\Requests\Branches\StoreBranchRequest;
use App\Http\Requests\Branches\UpdateBranchRequest;
use App\Models\Branch;
use App\Services\BranchService;
use Illuminate\Http\RedirectResponse;

class BranchesController extends Controller
{
    public function __construct(private readonly BranchService $branchService)
    {
    }

    public function index()
    {
        $branches = Branch::all();
        return view('restaurants.index', compact('branches'));
    }

    public function store(StoreBranchRequest $request): RedirectResponse
    {
        $this->branchService->create(StoreBranchesDto::fromRequest($request));

        return redirect()->route('restaurants.index');
    }

    public function create()
    {
        return view('restaurants.create');
    }

    public function edit(Branch $branch)
    {
        return view('restaurants.edit', compact('branch'));
    }

    public function update(UpdateBranchRequest $request, int $id)
    {
        $this->branchService->update($id, UpdateBranchesDto::fromRequest($request));
        return redirect()->route('restaurants.index')->with('success');
    }

    public function destroy(Branch $branch): RedirectResponse
    {
        $branch->delete();
        return redirect()->route('restaurants.index')->with('success');
    }
}
