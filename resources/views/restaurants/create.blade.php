@extends('layouts.app')

@section('content')
    <div class="max-w-md mx-auto mt-10 bg-white p-6 rounded-lg shadow">
        <h1 class="text-2xl font-bold mb-6 text-center">Create New Restaurant</h1>

        @if ($errors->any())
            <div class="mb-4 text-red-600 text-sm">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('restaurants.store') }}" method="POST" class="space-y-5">
            @csrf

            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Restaurant Name</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}"
                       class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200">
            </div>

            <div>
                <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                <textarea name="address" id="address" rows="3"
                          class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200">{{ old('address') }}</textarea>
            </div>

            <div>
                <label for="number" class="block text-sm font-medium text-gray-700">Founder Id</label>
                <input type="number" name="founder_id" id="founder_id" value="{{ old('founder_id') }}"
                       class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200">
            </div>

            <div>
                <label for="employee_numbers" class="block text-sm font-medium text-gray-700">EmployeeNumbers</label>
                <input type="number" name="employee_numbers" id="employee_numbers" value="{{ old('employee_numbers') }}"
                       class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200">
            </div>

            <div>
                <label for="founded_at" class="block text-sm font-medium text-gray-700">Founder At</label>
                <input type="date" name="founded_at" id="founded_at" value="{{ old('founded_at') }}"
                       class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200">
            </div>

            <div class="flex justify-between">
                <a href="{{ route('restaurants.index') }}"
                   class="bg-gray-500 hover:bg-gray-600 text-white font-semibold py-2 px-4 rounded-lg transition duration-200">
                    Back
                </a>
                <button type="submit"
                        class="bg-indigo-600 text-white font-semibold py-2 px-4 rounded-lg hover:bg-indigo-700 transition duration-200">
                    Create Restaurant
                </button>
            </div>
        </form>
    </div>
@endsection
