<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Users')</title>

    <!-- Tailwind CSS (via Vite) -->
    @vite('resources/css/app.css')

    <!-- Optional: Add a font or favicon -->
    <link rel="icon" href="/favicon.ico">
</head>
<body class="bg-gray-100 text-gray-800 min-h-screen">

<!-- Navbar (optional) -->
<header class="bg-white shadow">
    <div class="max-w-7xl mx-auto px-4 py-4">
        <h1 class="text-xl font-semibold">User Management</h1>
    </div>
</header>

<!-- Page Content -->
<main class="max-w-4xl mx-auto mt-10 px-4">
    @yield('content')
</main>

<!-- Optional Footer -->
<footer class="text-center text-sm text-gray-500 mt-10 py-6">
    &copy; {{ now()->year }} My Laravel App. All rights reserved.
</footer>

</body>
</html>
