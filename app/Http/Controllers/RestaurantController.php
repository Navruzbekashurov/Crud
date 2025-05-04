<?php

namespace App\Http\Controllers;

use App\Dtos\Restaurants\StoreRestaurantsDto;
use App\Dtos\Restaurants\UpdateRestaurantsDto;
use App\Dtos\User\UpdateUserDto;
use App\Http\Requests\Restaurant\StoreRestaurantRequest;
use App\Http\Requests\Restaurant\UpdateRestaurantRequest;
use App\Models\Restaurant;
use App\Services\RestaurantService;
use App\Services\UserService;

class RestaurantController extends Controller
{
    public function __construct(private readonly RestaurantService $restaurantService)
    {
    }
    public function index()
    {
        $restaurants = Restaurant::all();

        return view('restaurants.index', compact('restaurants'));
    }

    public function store(StoreRestaurantRequest $request)
    {
        $this->restaurantService->create(StoreRestaurantsDto::fromRequest($request));

        return redirect()->route('restaurants.index');

    }

    public function create()
    {
        return view('restaurants.create');
    }

    public function show(Restaurant $restaurant)
    {
        return view('restaurants.show',compact('restaurant'));

    }

    public function edit(Restaurant $restaurant)
    {
        return view('restaurants.edit', compact('restaurant'));

    }

    public function update(UpdateRestaurantRequest $request, int $id )
    {
        $this->restaurantService->update($id, UpdateRestaurantsDto::fromRequest($request));

        return redirect()->route('restaurants.index')->with('success');
    }

    public function destroy(Restaurant $restaurant)
    {
        $restaurant->delete();
        return redirect()->route('restaurants.index')->with('success');

    }
}
