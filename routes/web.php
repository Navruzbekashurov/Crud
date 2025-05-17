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

Route::prefix('restaurants/{restaurant}/branches')
    ->as('restaurants.branches.')
    ->group(function () {
        Route::get('/', [BranchController::class, 'index'])->name('index');            // restaurants.branches.index
        Route::get('/create', [BranchController::class, 'create'])->name('create');    // restaurants.branches.create
        Route::post('/', [BranchController::class, 'store'])->name('store');           // restaurants.branches.store
        Route::get('/{branch}', [BranchController::class, 'show'])->name('show');      // restaurants.branches.show
        Route::get('/{branch}/edit', [BranchController::class, 'edit'])->name('edit'); // restaurants.branches.edit
        Route::match(['put', 'patch'], '/{branch}', [BranchController::class, 'update'])->name('update'); // restaurants.branches.update
        Route::delete('/{branch}', [BranchController::class, 'destroy'])->name('destroy');                // restaurants.branches.destroy
    });

