<?php

namespace App\Http\Controllers;

use App\Dtos\User\StoreUserDto;
use App\Http\Requests\StoreUserRequest;
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
    public function update(Request $request, User $user)
    {
        //buniyam tepada qganinmga oxshatib qilin
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users,email',
            'password'=>'required'
        ]);
        $user->fill($request->post())->save();

        return redirect()->route('user.index')->with('success');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index')->with('success');

    }
    //
}
