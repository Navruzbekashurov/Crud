<!-- show.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>About user</h1>

    @if($user)
        <div>
            <p><strong>Name:</strong> {{ $user->name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
        </div>
    @else
        <p>User not found</p>
    @endif
@endsection

