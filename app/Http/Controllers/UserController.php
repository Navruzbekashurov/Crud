<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use function Laravel\Prompts\text;

class UserController extends Controller
{
    public function index()
    {
       $users = User::all();
       return view('index', compact('users'));

    }

    public function create()
    {
        return view('create');

    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required||email',
            'password'=>'required'
        ]);

        User::create($request->post());
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
