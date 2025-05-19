@php use Carbon\Carbon; @endphp
@extends('layouts.app')

@section('content')
    <div class="max-w-md mx-auto mt-10 bg-white p-6 rounded-lg shadow">
        <h1 class="text-2xl font-bold mb-6 text-center">Branch Details</h1>

        {{-- Basic Info --}}
        <div class="space-y-4">
            <div class="border-b pb-4">
                <h2 class="text-sm font-medium text-gray-500">Name</h2>
                <p class="mt-1 text-lg text-gray-900">{{ $branch->name }}</p>
            </div>

            <div class="border-b pb-4">
                <h2 class="text-sm font-medium text-gray-500">Address</h2>
                <p class="mt-1 text-lg text-gray-900">{{ $branch->address }}</p>
            </div>

            <div class="border-b pb-4">
                <h2 class="text-sm font-medium text-gray-500">Active</h2>
                <p class="mt-1 text-lg text-gray-900">{{ $branch->is_active ? 'Yes' : 'No' }}</p>
            </div>

            {{-- Phones --}}
            <div class="border-b pb-4">
                <div class="flex items-center justify-between mb-2">
                    <h2 class="text-sm font-medium text-gray-500">Phone Numbers</h2>
                    <a href="{{ route('restaurants.branches.phones.create', ['restaurant' => $branch->restaurant_id, 'branch' => $branch->id]) }}"
                       class="text-sm text-blue-600 hover:underline font-medium">➕ Add Phone</a>
                </div>

                @forelse ($branch->phones as $phone)
                    <div
                        class="flex justify-between items-center mt-1 bg-gray-50 px-3 py-2 rounded-md border border-gray-200">
                        <span class="text-gray-900 text-sm">{{ $phone->phone }}</span>

                        <form method="POST"
                              action="{{ route('restaurants.branches.phones.destroy', ['restaurant' => $branch->restaurant_id, 'branch' => $branch->id, 'phone' => $phone->id]) }}"
                              onsubmit="return confirm('Are you sure you want to delete this phone number?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="text-xs text-red-600 hover:text-red-800 font-semibold px-2 py-1 rounded hover:bg-red-100 transition">
                                🗑 Delete
                            </button>
                        </form>
                    </div>
                @empty
                    <p class="text-gray-400 mt-1">No phone numbers added.</p>
                @endforelse
            </div>


            {{-- Work Time --}}
            <div class="border-b pb-4">
                <div class="flex items-center justify-between">
                    <h2 class="text-sm font-medium text-gray-500">Weekly Schedule</h2>
                    {{--                    <a href="{{ route('restaurants.branches.work-times.create', ['restaurant' => $branch->restaurant_id, 'branch' => $branch->id]) }}"--}}
                    {{--                       class="text-sm text-blue-600 hover:underline font-medium">➕ Add Work Time</a>--}}
                </div>

                @forelse ($branch->branchWorkTime as $time)
                    <div class="mt-1 text-gray-900">
                        <span class="font-medium">{{ ucfirst($time->day) }}:</span>
                        @if ($time->day_off)
                            <span class="text-red-600">Day Off</span>
                        @else
                            {{ Carbon::parse($time->open_time)->format('H:i') }}
                            - {{ Carbon::parse($time->close_time)->format('H:i') }}
                        @endif
                    </div>
                @empty
                    <p class="text-gray-400">No work schedule set.</p>
                @endforelse
            </div>

            {{-- Back --}}
            <div class="flex justify-end mt-6">
                <a href="{{ route('restaurants.show', ['restaurant' => $branch->restaurant_id]) }}"
                   class="bg-gray-500 hover:bg-gray-600 text-white font-semibold py-2 px-4 rounded-lg transition duration-200">
                    ← Back to Restaurant
                </a>
            </div>
        </div>
    </div>
@endsection
