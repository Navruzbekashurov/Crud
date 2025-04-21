@extends('layouts.app')

@section('content')
    <h1>Edit User</h1>

    <form action="{{ route('user.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label>Papka nomi:</label>
        <input type="text" name="name" value="{{ $user->nomi }}">
        <button type="submit">Update</button>
    </form>
@endsection

