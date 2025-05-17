<?php

use App\Http\Controllers\BranchController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('users.index')->with('success');
});

Route::resource('users', UserController::class);
Route::resource('restaurants', RestaurantController::class)->middleware(['simple', 'simple1']);
Route::put('/restaurants/{id}/toggle-active', [RestaurantController::class, 'toggleActive']);

Route::prefix('restaurants/{restaurant}/branches')->name('restaurants.branches.')->group(function () {
    Route::get('/', [BranchController::class, 'index'])->name('index');
    Route::get('/create', [BranchController::class, 'create'])->name('create');
    Route::post('/', [BranchController::class, 'store'])->name('store');
    Route::get('/{branch}', [BranchController::class, 'show'])->name('show');
    Route::get('/{branch}/edit', [BranchController::class, 'edit'])->name('edit');
    Route::put('/{branch}', [BranchController::class, 'update'])->name('update');
    Route::patch('/{branch}', [BranchController::class, 'update']);
    Route::delete('/{branch}', [BranchController::class, 'destroy'])->name('destroy');

});
