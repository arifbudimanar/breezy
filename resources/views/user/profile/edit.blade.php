<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="sm:py-6">
        <div class="max-w-7xl mx-auto sm:px-6 sm:space-y-6">
            <x-card.app>
                <div class="max-w-xl">
                    @include('user.profile.partials.update-profile-information-form')
                </div>
            </x-card.app>

            <x-card.app>
                <div class="max-w-xl">
                    @include('user.profile.partials.update-password-form')
                </div>
            </x-card.app>

            <x-card.app>
                <div class="max-w-xl">
                    @include('user.profile.partials.delete-user-form')
                </div>
            </x-card.app>
        </div>
    </div>
</x-app-layout>