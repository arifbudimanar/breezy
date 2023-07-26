<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="sm:py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 sm:space-y-6">
            <x-card.app>
                <x-card.title>
                    {{ __("You're logged in, :Name", ['name' => Auth::user()->name]) }}
                </x-card.title>
                <x-card.description>
                    {{ __('Welcome to your dashboard. This is where your content will be summarized.') }}
                </x-card.description>
            </x-card.app>
            @if (Auth::user()->is_verified == false)
            <x-card.app>
                <x-card.title>
                    {{ __('Your account is not verified') }}
                </x-card.title>
                <x-card.description>
                    {{ __('Please contact admin to verify your account.') }}
                </x-card.description>
            </x-card.app>
            @else
            <x-card.app>
                <x-card.title>
                    {{ __('Summary') }}
                </x-card.title>
                <x-card.description>
                    {{ __('This is summary of your content.') }}
                </x-card.description>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6 mt-6">
                    <x-subcard.dashboard>
                        <x-subcard.title>
                            {{ __("Inbox") }}
                        </x-subcard.title>
                        <x-subcard.value>
                            {{ __('90') }}
                        </x-subcard.value>
                    </x-subcard.dashboard>
                </div>
            </x-card.app>
            @endif

        </div>
    </div>
</x-app-layout>