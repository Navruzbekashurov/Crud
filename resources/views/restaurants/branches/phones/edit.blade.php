@extends('layouts.app')

@section('content')
    <div class="max-w-md mx-auto mt-10 bg-white p-6 rounded-lg shadow">
        <h1 class="text-2xl font-bold mb-6 text-center">Edit Phone Number</h1>

        <form method="POST" action="{{ route('phones.update', ['id' => $number->id]) }}">
            @csrf
            @method('PUT')

            {{-- Phone --}}
            <div class="mb-4">
                <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number</label>
                <input type="text" name="phone" id="phone" value="{{ old('phone', $number->phone) }}"
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200">
                @error('phone')
                <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Hidden Branch ID --}}
            <input type="hidden" name="branch_id" value="{{ $number->branch_id }}">

            {{-- Buttons --}}
            <div class="flex justify-between mt-6">
                <a href="{{ route('branches.edit', ['branch' => $number->branch_id]) }}"
                   class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-md text-sm">Cancel</a>
                <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md text-sm">Update
                </button>
            </div>
        </form>
    </div>
@endsection
