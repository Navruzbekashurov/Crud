@extends('layouts.app')

@section('content')
    <h1>Users</h1>
    <a href="{{ route('user.create') }}">Add New Users</a>

    <ul>
        @foreach($users as $user)
            <li>
                {{ $user->name }}
                <a href="{{ route('user.edit', $user->id) }}">Edit</a>
                <form action="{{ route('user.destroy', $user->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
