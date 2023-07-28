<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Header Here') }}
        </h2>
    </x-slot>

    <div class="sm:py-6">
        <div class="max-w-full mx-auto sm:px-6 sm:space-y-6">
            <x-card.app>
                <x-card.title>
                    {{ __('Title Card Here') }}
                </x-card.title>
                <x-card.description>
                    {{ __('Description Card Here') }}
                </x-card.description>
            </x-card.app>
        </div>
    </div>
</x-admin-layout>