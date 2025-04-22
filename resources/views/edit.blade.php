@extends('layouts.app')

@section('content')
    <h1>Edit User</h1>

    <form action="{{ route('user.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label>User name:</label>
        <input type="text" name="name">
        <label>User email:</label>
        <input type="email" name="email">
        <button type="submit">Update</button>

    </form>
@endsection

