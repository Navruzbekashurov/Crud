<?php

namespace App\Http\Controllers;

use App\Dtos\Restaurants\Branches\StoreBranchDto;
use App\Dtos\Restaurants\Branches\UpdateBranchDto;
use App\Http\Requests\Branches\StoreBranchRequest;
use App\Http\Requests\Branches\UpdateBranchRequest;
use App\Models\Branch;
use App\Services\BranchService;
use Illuminate\Http\RedirectResponse;

class BranchController extends Controller
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
        $this->branchService->create(StoreBranchDto::fromRequest($request));

        return redirect()->route('restaurants.show', ['restaurant' => $request->restaurant_id]);
    }

    public function create()
    {
        return view('restaurants.branches.create');
    }

    public function edit(Branch $branch)
    {
        return view('restaurants.branches.edit', compact('branch'));
    }

    public function show(Branch $branch)
    {
        return view('restaurants.branches.show', compact('branch'));
    }

    public function update(UpdateBranchRequest $request, int $id)
    {
        $this->branchService->update($id, UpdateBranchDto::fromRequest($request));
        return redirect()->route('restaurants.show', ['restaurant' => $request->restaurant_id]);
    }

    public function destroy(Branch $branch): RedirectResponse
    {
        $restaurantId = $branch->restaurant_id;
        $branch->delete();

        return redirect()->route('restaurants.show', ['restaurant' => $restaurantId])
            ->with('success', 'Branch deleted successfully.');
    }
}
