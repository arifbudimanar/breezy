<div class="bg-white dark:bg-gray-800">
    <div class="sm:w-40 lg:w-56">
        <x-sidebar-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
            {{ __('Dashboard') }}
        </x-sidebar-nav-link>
        <x-sidebar-nav-link :href="route('admin.users.index')" :active="request()->routeIs('admin.users.*')">
            {{ __('Users') }}
        </x-sidebar-nav-link>
        <x-sidebar-nav-link :href="route('user.dashboard')" :active="request()->routeIs('user.dashboard')">
            {{ __('Other Sidebar') }}
        </x-sidebar-nav-link>
    </div>
</div>