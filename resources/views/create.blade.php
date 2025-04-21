@extends('layouts.app')

@section('content')
    <h1>Add New Users</h1>

    <form action="{{ route('user.store') }}" method="POST">
        @csrf
        <label>User:</label>
        <input type="text" name="name">
        <label>User email:</label>
        <input type="email" name="email">
        <label>User password:</label>
        <input type="password" name="password">
        <button type="submit">Save</button>
    </form>
@endsection
