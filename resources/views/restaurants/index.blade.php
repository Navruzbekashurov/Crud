@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Restaurants</h1>
        <a href="{{ route('restaurants.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg transition duration-200">
            Create New Restaurant
        </a>
    </div>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Address</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Phone</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($restaurants as $restaurant)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $restaurant->id }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $restaurant->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $restaurant->address }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $restaurant->phone }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            <div class="flex justify-end space-x-2">
                                <a href="{{ route('restaurants.show', $restaurant->id) }}" 
                                   class="bg-green-500 hover:bg-green-600 text-white font-semibold py-1 px-3 rounded-lg transition duration-200 text-sm">
                                    View
                                </a>
                                <a href="{{ route('restaurants.edit', $restaurant->id) }}" 
                                   class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-1 px-3 rounded-lg transition duration-200 text-sm">
                                    Edit
                                </a>
                                <form action="{{ route('restaurants.destroy', $restaurant->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="bg-red-500 hover:bg-red-600 text-white font-semibold py-1 px-3 rounded-lg transition duration-200 text-sm"
                                            onclick="return confirm('Are you sure you want to delete this restaurant?')">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection 