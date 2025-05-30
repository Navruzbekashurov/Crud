<!-- show.blade.php -->

@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto mt-10 bg-white p-6 rounded-lg shadow">
    <h1 class="text-2xl font-bold mb-6 text-center">User Details</h1>

    @if($user)
        <div class="space-y-4">
            <div class="border-b pb-4">
                <h2 class="text-sm font-medium text-gray-500">Name</h2>
                <p class="mt-1 text-lg text-gray-900">{{ $user->name }}</p>
            </div>

            <div class="border-b pb-4">
                <h2 class="text-sm font-medium text-gray-500">Email</h2>
                <p class="mt-1 text-lg text-gray-900">{{ $user->email }}</p>
            </div>

            <div class="flex justify-end space-x-4 mt-6">
                <a href="{{ route('users.edit', $user->id) }}"
                   class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-2 px-4 rounded-lg transition duration-200">
                    Edit
                </a>
                <a href="{{ route('users.index') }}"
                   class="bg-gray-500 hover:bg-gray-600 text-white font-semibold py-2 px-4 rounded-lg transition duration-200">
                    Back to Users
                </a>
            </div>
        </div>
    @else
        <div class="text-center text-red-600">
            <p>User not found</p>
            <a href="{{ route('users.index') }}"
               class="mt-4 inline-block bg-gray-500 hover:bg-gray-600 text-white font-semibold py-2 px-4 rounded-lg transition duration-200">
                Back to Users
            </a>
        </div>
    @endif
</div>
@endsection

