<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <a href="{{ route('admin.users.index') }}" class="hover:underline">{{ __('User') }}</a> / {{ $user->name }}
        </h2>
    </x-slot>

    <div class="sm:py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8 sm:space-y-6">
            <x-card.app>
                <div class="flex">
                    <x-card.title>
                        {{ __('User Information') }}
                    </x-card.title>
                    <div class="ml-auto">
                        @include('admin.users.partials.action')
                    </div>
                </div>
                <x-card.description>
                    {{ __('Manage user account, update user profile information and email address.') }}
                </x-card.description>
                <div class="mt-6">
                    <div class="space-y-3 sm:space-y-1 min-w-max">
                        <div class="block font-medium text-sm text-gray-700 dark:text-gray-300 sm:flex">
                            <div class="w-48">ID</div>
                            <div>{{ $user->id }}</div>
                        </div>
                        <div class="block font-medium text-sm text-gray-700 dark:text-gray-300 sm:flex">
                            <div class="w-48">{{ __('Name') }}</div>
                            <div>{{ $user->name }}</div>
                        </div>
                        <div class="block font-medium text-sm text-gray-700 dark:text-gray-300 sm:flex">
                            <div class="w-48">{{ __('Email') }}</div>
                            <div>{{ $user->email }}</div>
                        </div>
                        <div class="block font-medium text-sm text-gray-700 dark:text-gray-300 sm:flex">
                            <div class="w-48">{{ __('Verified Email') }}</div>
                            <div>{{ $user->email_verified_at ? __('Yes') : __('No') }}</div>
                        </div>
                        <div class="block font-medium text-sm text-gray-700 dark:text-gray-300 sm:flex">
                            <div class="w-48">{{ __('Verified Account') }}</div>
                            @if ($user->is_verified)
                            <p class="flex items-center">
                                <x-badge.verified-account />
                            </p>
                            @else
                            <p class="flex items-center">
                                <x-badge.unverified-account />
                            </p>
                            @endif
                        </div>
                        <div class="block font-medium text-sm text-gray-700 dark:text-gray-300 sm:flex">
                            <div class="w-48">{{ __('Role') }}</div>
                            <div>
                                @if ($user->is_admin)
                                <x-badge.admin />
                                @else
                                <x-badge.user />
                                @endif
                            </div>
                        </div>
                        <div class="block font-medium text-sm text-gray-700 dark:text-gray-300 sm:flex">
                            <div class="w-48">{{ __('Created At') }}</div>
                            <div>{{ $user->created_at }} - {{ $user->created_at->diffForHumans() }}</div>
                        </div>
                        <div class="block font-medium text-sm text-gray-700 dark:text-gray-300 sm:flex">
                            <div class="w-48">{{ __('Updated At') }}</div>
                            <div>{{ $user->updated_at }} - {{ $user->updated_at->diffForHumans() }}</div>
                        </div>
                    </div>
                </div>
            </x-card.app>
        </div>
    </div>
</x-admin-layout>