@extends('layouts.app')

@section('content')
    <div class="max-w-md mx-auto mt-10 bg-white p-6 rounded-lg shadow">
        <h1 class="text-2xl font-bold mb-6 text-center">Create Branch</h1>
        
        <form method="POST" action="{{ route('restaurants.branches.store', ['restaurant' => $restaurant->id]) }}">
            @csrf

            {{-- Name --}}
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}"
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200">
                @error('name')
                <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Address --}}
            <div class="mb-4">
                <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                <input type="text" name="address" id="address" value="{{ old('address') }}"
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200">
                @error('address')
                <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <input type="hidden" name="restaurant_id" value="{{ $restaurant->id }}">

            {{-- Is Active --}}
            <div class="mb-6">
                <label for="is_active" class="flex items-center cursor-pointer">
                    <!-- Hidden input for unchecked value -->
                    <input type="hidden" name="is_active" value="0">

                    <!-- Toggle input -->
                    <div class="relative">
                        <input type="checkbox" name="is_active" id="is_active" value="1"
                               class="sr-only peer">

                        <div
                            class="w-11 h-6 bg-gray-300 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-blue-400 rounded-full peer peer-checked:bg-blue-600 transition-colors"></div>
                        <div
                            class="absolute left-1 top-1 bg-white w-4 h-4 rounded-full transition-transform peer-checked:translate-x-5"></div>
                    </div>

                    <span class="ml-3 text-sm font-medium text-gray-700">Active</span>
                </label>
            </div>

            {{-- Buttons --}}
            <div class="flex justify-between">
                <a href="{{ route('restaurants.show', $restaurant->id) }}"
                   class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-md text-sm">Cancel</a>
                <button type="submit"
                        class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-md text-sm">Create Branch
                </button>
            </div>
        </form>
    </div>
@endsection
