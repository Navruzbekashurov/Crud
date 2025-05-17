<?php

namespace App\Http\Controllers;

use App\Dtos\Restaurants\Branches\PhoneNumbers\StoreNumbersDto;
use App\Dtos\Restaurants\Branches\PhoneNumbers\UpdateNumbersDto;
use App\Http\Requests\Branches\PhoneNumbers\StoreNumbersRequest;
use App\Http\Requests\Branches\PhoneNumbers\UpdateNumbersRequest;
use App\Models\BranchPhoneNumber;
use App\Services\NumbersService;

class PhonesController extends Controller
{
    public function __construct(private readonly NumbersService $numbersService)
    {
    }

    public function index()
    {
        $phones = BranchPhoneNumber::all();

        return view('restaurants.index', compact('phones'));
    }

    public function store(StoreNumbersRequest $request)
    {
        $this->numbersService->create(StoreNumbersDto::fromRequest($request));

        return redirect()->route('restaurants.index');
    }

    public function create()
    {
        return view('restaurants.index');
    }

    public function edit(BranchPhoneNumber $number)
    {
        return redirect()->route('restaurants.edit', compact('number'));
    }

    public function update(UpdateNumbersRequest $request, int $id)
    {
        $this->numbersService->update($id, UpdateNumbersDto::fromRequest($request));
        return redirect()->route('restaurants.index')->with('success');
    }

    public function destroy(BranchPhoneNumber $number)
    {
        $number->delete();
        return redirect()->route('restaurants.index');
    }
    //
}
