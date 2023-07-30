<x-main-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <div class="sm:py-6">
        <div class="max-w-7xl mx-auto sm:px-6 sm:space-y-6">
            <x-card.app>
                <x-card.title>
                    {{ __("Home") }}
                </x-card.title>
                <x-card.description>
                    {{ __('Welcome to your dashboard. This is where your content will be summarized.') }}
                </x-card.description>
            </x-card.app>
        </div>
    </div>
</x-main-layout>