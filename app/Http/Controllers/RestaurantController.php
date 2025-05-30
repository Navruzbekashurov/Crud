<?php

namespace App\Http\Controllers;

use App\Dtos\Restaurants\StoreRestaurantDto;
use App\Dtos\Restaurants\UpdateRestaurantDto;
use App\Http\Requests\Restaurant\StoreRestaurantRequest;
use App\Http\Requests\Restaurant\UpdateRestaurantRequest;
use App\Models\Restaurant;
use App\Services\RestaurantService;
use Exception;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function __construct(private readonly RestaurantService $restaurantService)
    {
    }

    public function index(Request $request)
    {
        $restaurants = Restaurant::query()
            ->when($request->name, fn($query, $name) => $query->where('name', 'like', "%$name%"))
            ->when($request->phone, fn($query, $phone_numbers) => $query->where('phone_number', 'like', "%$phone_numbers%"))
            ->when($request->address, fn($query, $address) => $query->where('address', 'like', "%$address%"))
//            ->when($request->address, fn($query, $address) => $query->where('address', $address))
            ->when($request->active !== null, fn($query, $active) => $query->where('is_active', $request->active))
            ->get();


        return view('restaurants.index', compact('restaurants'));
    }

    public function store(StoreRestaurantRequest $request)
    {
        $this->restaurantService->create(StoreRestaurantDto::fromRequest($request));

        return redirect()->route('restaurants.index');
    }

    public function create()
    {
        return view('restaurants.create');
    }

    public function show(Restaurant $restaurant)
    {
        $restaurant->load('branches');
        return view('restaurants.show', compact('restaurant'));
    }

    public function edit(Restaurant $restaurant)
    {
        return view('restaurants.edit', compact('restaurant'));
    }

    public function update(UpdateRestaurantRequest $request, int $id)
    {
        $this->restaurantService->update($id, UpdateRestaurantDto::fromRequest($request));

        return redirect()->route('restaurants.index')->with('success');
    }

    public function destroy(Restaurant $restaurant)
    {
        $restaurant->delete();

        return redirect()->route('restaurants.index')->with('success');
    }

    /**
     * @throws Exception
     */
    public function toggleActive(int $id)
    {
        $this->restaurantService->toggleActive($id);

        return redirect()->route('restaurants.index')->with('success');
    }

}
