<?php

use App\Http\Controllers\BranchController;
use App\Http\Controllers\BranchPhoneController;
use App\Http\Controllers\BranchWorkTimeController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('users.index')->with('success');
});

Route::resource('users', UserController::class);
Route::put('/restaurants/{id}/toggle-active', [RestaurantController::class, 'toggleActive']);
Route::post('/restaurants/{restaurant}/branches/{branch}/work-time', [BranchWorkTimeController::class, 'storeMultiple']);
Route::delete('/restaurants/{restaurant}/branches/{branch}/work-time/delete', [BranchWorkTimeController::class, 'delete'])
    ->name('restaurants.branches.work-time.destroyAll');

Route::resource('restaurants', RestaurantController::class);

Route::resource('restaurants.branches', BranchController::class);

Route::resource('restaurants.branches.phones', BranchPhoneController::class);

Route::resource('restaurants.branches.work-time', BranchWorkTimeController::class);
