<?php

namespace App\Http\Controllers;

use App\Dtos\User\StoreUserDto;
use App\Dtos\User\UpdateUserDto;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(private readonly UserService $userService)
    {
    }

    public function index()
    {
       $users = User::all();
       return view('index', compact('users'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(StoreUserRequest $request)
    {
        $this->userService->create(StoreUserDto::fromRequest($request));

        return redirect()->route('user.index');
    }

    public function show(User $user)
    {
        return view('show',compact('user'));

    }
    public function edit(User $user)
    {
        return view('edit',compact('user'));

    }
    public function update(UpdateUserRequest $request, int $id)
    {
        //buniyam tepada qganinmga oxshatib qilin
        $dto = UpdateUserDto::fromRequest($request);
        $this->userService->update($id, $dto);
        return redirect()->route('user.index')->with('success');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index')->with('success');
    }
}
