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
                <x-nav-link route="users.index" icon="fa-list" text="Users"/>
                <x-nav-link route="restaurants.index" icon="fa-list" text="Restaurants"/>
            </div>
        </div>
    </div>
</nav>
