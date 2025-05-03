<?php

namespace App\Http\Controllers;

use App\Dtos\User\StoreUserDto;
use App\Dtos\User\UpdateUserDto;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Services\UserService;

class UserController extends Controller
{
    public function __construct(private readonly UserService $userService)
    {
    }

    public function index()
    {
       $users = User::all();
       return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(StoreUserRequest $request)
    {
        $this->userService->create(StoreUserDto::fromRequest($request));

        return redirect()->route('users.index');
    }

    public function show(User $user)
    {
        return view('users.show',compact('user'));

    }
    public function edit(User $user)
    {
        return view('users.edit',compact('user'));

    }
    public function update(UpdateUserRequest $request, int $id)
    {
        $this->userService->update($id, UpdateUserDto::fromRequest($request));

        return redirect()->route('users.index')->with('success');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success');
    }
}
