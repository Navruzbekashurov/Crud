@extends('layouts.app')

@section('content')
    <h1>Add New Users</h1>

    <form action="{{ route('user.store') }}" method="POST">
        @csrf
        <label>Users:</label>
        <input type="text" name="name">
        <button type="submit">Save</button>
    </form>
@endsection
