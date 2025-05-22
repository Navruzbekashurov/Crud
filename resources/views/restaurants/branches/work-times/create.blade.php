@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto mt-10 bg-white p-6 rounded-lg shadow">
        <h1 class="text-2xl font-bold mb-6 text-center">Set Weekly Work Time</h1>

        <form method="POST"
              action="{{ route('restaurants.branches.work-time.store', ['restaurant' => $restaurant->id, 'branch' => $branch->id]) }}">
            @csrf

            @php
                $days = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];
            @endphp

            @foreach($days as $index => $day)
                <div class="border-b pb-4 mb-4">
                    <h2 class="text-sm font-semibold capitalize text-gray-600 mb-2">{{ ucfirst($day) }}</h2>

                    <input type="hidden" name="work_times[{{ $index }}][day]" value="{{ $day }}">
                    <input type="hidden" name="work_times[{{ $index }}][branch_id]" value="{{ $branch->id }}">

                    <div class="grid grid-cols-2 md:grid-cols-3 gap-4 items-center">
                        <div>
                            <label for="open_time_{{ $index }}" class="block text-xs text-gray-500">Open Time</label>
                            <input type="time" name="work_times[{{ $index }}][open_time]" id="open_time_{{ $index }}"
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200">
                        </div>

                        <div>
                            <label for="close_time_{{ $index }}" class="block text-xs text-gray-500">Close Time</label>
                            <input type="time" name="work_times[{{ $index }}][close_time]" id="close_time_{{ $index }}"
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200">
                        </div>

                        <div class="flex items-center mt-5">
                            <input type="checkbox" name="work_times[{{ $index }}][day_off]" id="day_off_{{ $index }}"
                                   value="1" class="mr-2">
                            <label for="day_off_{{ $index }}" class="text-sm text-red-600">Day Off</label>
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="flex justify-end">
                <a href="{{ route('restaurants.branches.show', [$restaurant->id, $branch->id]) }}"
                   class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-md text-sm mr-2">Cancel</a>
                <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md text-sm">Save Schedule
                </button>
            </div>
        </form>
    </div>
@endsection
