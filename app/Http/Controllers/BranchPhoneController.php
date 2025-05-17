<?php

namespace App\Http\Controllers;

use App\Dtos\Restaurants\Branches\PhoneNumbers\StoreBranchPhoneNumberDto;
use App\Dtos\Restaurants\Branches\PhoneNumbers\UpdateBranchPhoneNumberDto;
use App\Http\Requests\Branches\PhoneNumbers\StoreNumbersRequest;
use App\Http\Requests\Branches\PhoneNumbers\UpdateBranchPhoneNumbersRequest;
use App\Models\BranchPhoneNumber;
use App\Services\BranchPhoneNumbersService;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BranchPhoneController extends Controller
{
    public function __construct(private readonly BranchPhoneNumbersService $numbersService)
    {
    }


    public function store(StoreNumbersRequest $request, int $restaurant, int $branch)
    {
        $this->numbersService->create(StoreBranchPhoneNumberDto::fromRequest($request));

        return redirect()->route('restaurants.branches.show', ['restaurant' => $restaurant, 'branch' => $branch])
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

    public function update(UpdateBranchPhoneNumbersRequest $request, int $restaurant, int $branch, int $phone)
    {
        $this->numbersService->update($phone, UpdateBranchPhoneNumberDto::fromRequest($request));
        return redirect()->route('restaurants.branches.show', ['restaurant' => $restaurant, 'branch' => $branch])->with('success');
    }

    public function destroy(int $restaurant, int $branch, int $phone)
    {
        $phoneNumber = BranchPhoneNumber::query()
            ->where('id', $phone)
            ->first();
        if (!$phoneNumber) {
            throw new ModelNotFoundException();
        }
        $phoneNumber->delete();

        return redirect()->route('restaurants.branches.show', ['restaurant' => $restaurant, 'branch' => $branch])
            ->with('success', 'Phone number deleted.');
    }

    
}
