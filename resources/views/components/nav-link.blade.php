@props(['route', 'icon', 'text'])

<div class="hidden sm:ml-6 sm:flex sm:space-x-8">
    <a href="{{ route($route) }}"
       class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium
       {{ request()->routeIs($route) ? 'border-indigo-500 text-gray-900' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }}">
        <i class="fas {{ $icon }} mr-1"></i> {{ $text }}
    </a>
</div> 