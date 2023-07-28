<div class="hidden sm:flex border-r border-gray-100 dark:border-gray-700">
    <div class="bg-white dark:bg-gray-800">
        <div class="sm:w-40 lg:w-56">
            <x-sidebar-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
                {{ __('Dashboard') }}
            </x-sidebar-nav-link>
            <x-sidebar-nav-link :href="route('admin.users.index')" :active="request()->routeIs('admin.users.*')">
                {{ __('Users') }}
            </x-sidebar-nav-link>
        </div>
    </div>
</div>