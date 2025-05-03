<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'User Management System')</title>

    <!-- Tailwind CSS (via Vite) -->
    @vite('resources/css/app.css')

    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-50 text-gray-800 min-h-screen flex flex-col">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <div class="flex-shrink-0 flex items-center">
                        <a href="{{ route('users.index') }}" class="text-xl font-bold text-indigo-600">
                            <i class="fas fa-users mr-2"></i>User Management
                        </a>
                    </div>
                    <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                        <a href="{{ route('users.index') }}"
                           class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium
                           {{ request()->routeIs('users.index') ? 'border-indigo-500 text-gray-900' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }}">
                            <i class="fas fa-list mr-1"></i> Users
                        </a>
                    </div>
                    <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                        <a href="{{ route('companies.index') }}"
                           class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium
                           {{ request()->routeIs('companies.index') ? 'border-indigo-500 text-gray-900' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }}">
                            <i class="fas fa-list mr-1"></i> Companies
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <main class="flex-grow">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            @yield('content')
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white shadow mt-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <div class="text-center text-sm text-gray-500">
                <p>&copy; {{ now()->year }} User Management System. All rights reserved.</p>
                <p class="mt-1">Built with <i class="fas fa-heart text-red-500"></i> using Laravel and Tailwind CSS</p>
            </div>
        </div>
    </footer>

</body>
</html>
