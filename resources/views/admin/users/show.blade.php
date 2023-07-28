<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <a href="{{ route('admin.users.index') }}" class="hover:text-indigo-600 hover:dark:text-indigo-400">{{
                __('User')
                }}</a> / {{
            $user->name }}
        </h2>
    </x-slot>

    <div class="sm:py-6">
        <div class="max-w-full mx-auto sm:px-6 sm:space-y-6">
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
                    <div class="space-y-3 sm:space-y-1 min-w-full">
                        <div class="block font-medium text-sm text-gray-700 dark:text-gray-300 sm:flex">
                            <p class="w-36">ID</p>
                            <p>{{ $user->id }}</p>
                        </div>
                        <div class="block font-medium text-sm text-gray-700 dark:text-gray-300 sm:flex">
                            <p class="w-36">{{ __('Name') }}</p>
                            <p>{{ $user->name }}</p>
                        </div>
                        <div class="block font-medium text-sm text-gray-700 dark:text-gray-300 sm:flex">
                            <p class="w-36">{{ __('Email') }}</p>
                            <p class="truncate break-normal hover:break-all">{{ $user->email }}</p>
                        </div>
                        <div class="block font-medium text-sm text-gray-700 dark:text-gray-300 sm:flex">
                            <p class="w-36">{{ __('Verified Email') }}</p>
                            <p>{{ $user->email_verified_at ? __('Yes') : __('No') }}</p>
                        </div>
                        <div class="block font-medium text-sm text-gray-700 dark:text-gray-300 sm:flex">
                            <p class="w-36">{{ __('Verified Account') }}</p>
                            @if ($user->is_verified)
                            <div class="flex items-center">
                                <x-badge.verified-account />
                            </div>
                            @else
                            <div class="flex items-center">
                                <x-badge.unverified-account />
                            </div>
                            @endif
                        </div>
                        <div class="block font-medium text-sm text-gray-700 dark:text-gray-300 sm:flex">
                            <p class="w-36">{{ __('Role') }}</p>
                            <div>
                                @if ($user->is_admin)
                                <x-badge.admin />
                                @else
                                <x-badge.user />
                                @endif
                            </div>
                        </div>
                        <div class="block font-medium text-sm text-gray-700 dark:text-gray-300 sm:flex">
                            <p class="w-36">{{ __('Created At') }}</p>
                            <div>
                                <p>{{ $user->created_at }}</p>
                                <p>{{ $user->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                        <div class="block font-medium text-sm text-gray-700 dark:text-gray-300 sm:flex">
                            <p class="w-36">{{ __('Updated At') }}</p>
                            <div>
                                <p>{{ $user->updated_at }}</p>
                                <p>{{ $user->updated_at->diffForHumans() }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </x-card.app>
        </div>
    </div>
</x-admin-layout>