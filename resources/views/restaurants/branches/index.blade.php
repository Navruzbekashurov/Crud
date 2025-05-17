{{-- Branches --}}
<div class="max-w-3xl mx-auto mt-12">
    <div class="flex items-center justify-between mb-6 border-b pb-2">
        <h2 class="text-2xl font-bold text-gray-800">Branches</h2>
        <a href="/restaurants/{{ $restaurant->id }}/branches/create"
           class="inline-block bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-md text-sm font-medium">
            ➕ Add Branch
        </a>
    </div>

    @forelse($restaurant->branches as $branch)
        <div class="bg-white border border-gray-200 rounded-lg p-5 mb-4 shadow-sm">
            <div class="flex justify-between items-center mb-2">
                <h3 class="text-lg font-semibold text-gray-800">{{ $branch->name }}</h3>
                <div class="flex gap-2">
                    <a href="/restaurants/{{ $restaurant->id }}/branches/{{$branch->id}}"
                       class="bg-blue-500 hover:bg-blue-600 text-white text-xs px-3 py-1 rounded-md">View</a>
                    <a href="/restaurants/{{ $restaurant->id }}/branches/{{$branch->id}}/edit"
                       class="bg-yellow-500 hover:bg-yellow-600 text-white text-xs px-3 py-1 rounded-md">Edit</a>
                    <form action="/restaurants/{{ $restaurant->id }}/branches/{{$branch->id}}" method="POST"
                          onsubmit="return confirm('Delete this branch?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="bg-red-500 hover:bg-red-600 text-white text-xs px-3 py-1 rounded-md">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
            <div class="text-sm text-gray-600 space-y-1">
                <p><strong>Address:</strong> {{ $branch->address }}</p>
                <p><strong>Phone:</strong> {{ $branch->phone ?? '-' }}</p>
                <p><strong>Opening Hours:</strong> {{ $branch->open_time ?? '-' }}
                    - {{ $branch->close_time ?? '-' }}</p>
            </div>
        </div>
    @empty
        <p class="text-center text-gray-500 mt-6">No branches found.</p>
    @endforelse
</div>
