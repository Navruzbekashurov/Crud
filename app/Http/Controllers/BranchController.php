<?php

namespace App\Http\Controllers;

use App\Dtos\Restaurants\Branches\StoreBranchDto;
use App\Dtos\Restaurants\Branches\UpdateBranchDto;
use App\Http\Requests\Branches\StoreBranchRequest;
use App\Http\Requests\Branches\UpdateBranchRequest;
use App\Models\Branch;
use App\Models\Restaurant;
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
        $branch = $this->branchService->create(StoreBranchDto::fromRequest($request));

        return redirect()->route('restaurants.show', ['restaurant' => $branch->restaurant_id]);
    }

    public function create(Restaurant $restaurant)
    {
        return view('restaurants.branches.create', compact('restaurant'));
    }

    public function edit(Restaurant $restaurant, Branch $branch)
    {
        return view('restaurants.branches.edit', compact('branch'));
    }

    public function show(Restaurant $restaurant, Branch $branch)
    {
        return view('restaurants.branches.show', compact('branch'));
    }

    public function update(UpdateBranchRequest $request, Restaurant $restaurant, Branch $branch)
    {
        $this->branchService->update($branch->id, UpdateBranchDto::fromRequest($request));
        return redirect()->route('restaurants.show', ['restaurant' => $restaurant->id]);
    }

    public function destroy(Restaurant $restaurant, Branch $branch): RedirectResponse
    {
        $branch->delete();

        return redirect()->route('restaurants.show', ['restaurant' => $restaurant->id])
            ->with('success', 'Branch deleted successfully.');
    }

}
