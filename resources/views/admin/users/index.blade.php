<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="sm:py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8 sm:space-y-6">
            <x-card.app>
                <x-card.title>
                    {{ __("All User") }}
                </x-card.title>
                <x-card.description>
                    {{ __('Manage all user, search by name or email.') }}
                </x-card.description>
            </x-card.app>
        </div>
    </div>
</x-admin-layout>
