<div class="hidden md:flex border-r border-gray-100 dark:border-gray-700">
    <div class="bg-white dark:bg-gray-800">
        <div class="px-4 pt-4">
            <div class="flex pl-2 items-center">
                <div class="font-medium text-base text-gray-800 dark:text-gray-200">
                    {{ config('app.name', 'Laravel') }}
                </div>
            </div>
        </div>
        <div class="sm:w-40 lg:w-56 space-y-1 mt-3">
            <x-sidebar-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
                {{ __('Dashboard') }}
            </x-sidebar-nav-link>
            <x-sidebar-nav-link :href="route('admin.users.index')" :active="request()->routeIs('admin.users.*')">
                {{ __('Users') }}
            </x-sidebar-nav-link>
        </div>
    </div>
</div>
