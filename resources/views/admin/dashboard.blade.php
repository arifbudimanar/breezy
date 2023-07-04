<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="sm:py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8 sm:space-y-6">
            <x-card.app>
                <x-card.title>
                    {{ __("You're logged in as Admin, :Name", ['name' => Auth::user()->name]) }}
                </x-card.title>
                <x-card.description>
                    {{ __('Welcome to admin dashboard.') }}
                </x-card.description>
            </x-card.app>
            {{-- <x-card.app>
                <x-card.title>
                    {{ __('Your account is not verified') }}
                </x-card.title>
                <x-card.description>
                    {{ __('Please contact admin to verify your account.') }}
                </x-card.description>
            </x-card.app> --}}
            <x-card.app>
                <x-card.title>
                    {{ __('Users') }}
                </x-card.title>
                <x-card.description>
                    {{ __('This is summary of users.') }}
                </x-card.description>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 xl:grid-cols-6 gap-6 mt-6">
                    <x-subcard.dashboard>
                        <x-subcard.title>
                            {{ __("All Users") }}
                        </x-subcard.title>
                        <x-subcard.value>
                            {{ $allUsers }}
                        </x-subcard.value>
                    </x-subcard.dashboard>
                    <x-subcard.dashboard>
                        <x-subcard.title>
                            {{ __("Admin Users") }}
                        </x-subcard.title>
                        <x-subcard.value>
                            {{ $adminUsers }}
                        </x-subcard.value>
                    </x-subcard.dashboard>
                    <x-subcard.dashboard>
                        <x-subcard.title>
                            {{ __("Not Verified Account Users") }}
                        </x-subcard.title>
                        <x-subcard.value>
                            {{ $notVerifiedUsers }}
                        </x-subcard.value>
                    </x-subcard.dashboard>
                    <x-subcard.dashboard>
                        <x-subcard.title>
                            {{ __("Not Verified Email Users") }}
                        </x-subcard.title>
                        <x-subcard.value>
                            {{ $notVerifiedEmailUsers }}
                        </x-subcard.value>
                    </x-subcard.dashboard>
                </div>
            </x-card.app>
        </div>
    </div>
</x-admin-layout>
