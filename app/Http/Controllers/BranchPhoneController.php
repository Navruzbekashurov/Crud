<?php

namespace App\Http\Controllers;

use App\Dtos\Restaurants\Branches\PhoneNumbers\StoreBranchPhoneNumberDto;
use App\Dtos\Restaurants\Branches\PhoneNumbers\UpdateBranchPhoneNumberDto;
use App\Http\Requests\Branches\PhoneNumbers\StoreNumbersRequest;
use App\Http\Requests\Branches\PhoneNumbers\UpdateNumbersRequest;
use App\Models\BranchPhoneNumber;
use App\Services\NumbersService;

class BranchPhoneController extends Controller
{
    public function __construct(private readonly NumbersService $numbersService)
    {
    }


    public function store(StoreNumbersRequest $request)
    {
        $this->numbersService->create(StoreBranchPhoneNumberDto::fromRequest($request));

        return redirect()->route('branches.edit', ['branch' => $request->branch_id])
            ->with('success', 'Phone number added.');
    }

    public function create(int $branchId)
    {
        return view('restaurants.branches.phones.create', compact('branchId'));
    }

    public function edit(BranchPhoneNumber $number)
    {
        return view('restaurants.branches.phones.edit', compact('number'));
    }

    public function update(UpdateNumbersRequest $request, int $id)
    {
        $this->numbersService->update($id, UpdateBranchPhoneNumberDto::fromRequest($request));
        return redirect()->route('restaurants.index')->with('success');
    }

    public function destroy(BranchPhoneNumber $number)
    {
        $branchId = $number->branch_id;
        $number->delete();

        return redirect()->route('branches.edit', ['branch' => $branchId])
            ->with('success', 'Phone number deleted.');
    }
}
