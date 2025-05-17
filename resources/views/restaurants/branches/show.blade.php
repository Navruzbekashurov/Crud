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
                <p class="mt-1 text-lg text-gray-900">{{ $branch->is_active }}</p>
            </div>

            {{-- Phones --}}
            <div class="border-b pb-4">
                <h2 class="text-sm font-medium text-gray-500">Phone Numbers</h2>
                @forelse ($branch->phone as $phone)
                    <p class="mt-1 text-gray-900">{{ $phone->number }}</p>
                @empty
                    <p class="text-gray-400">No phone numbers added.</p>
                @endforelse
            </div>

            {{-- Work Time --}}
            <div class="border-b pb-4">
                <h2 class="text-sm font-medium text-gray-500">Weekly Schedule</h2>
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
                <a href=""
                   class="bg-gray-500 hover:bg-gray-600 text-white font-semibold py-2 px-4 rounded-lg transition duration-200">
                    ← Back to Restaurant
                </a>
            </div>
        </div>
    </div>
@endsection
