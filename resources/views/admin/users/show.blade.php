<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight flex">
            {{ $user->name }} @if ($user->is_verified)
            <p class="flex items-center ml-1">
                <x-badge.verified-account />
            </p>
            @else
            <p class="flex items-center ml-1">
                <x-badge.unverified-account />
            </p>
            @endif
        </h2>
    </x-slot>

    <div class="sm:py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8 sm:space-y-6">
            <x-card.app>
                <div class="flex">
                    <x-card.title>
                        {{ __('Detail User') }}
                    </x-card.title>
                    <div class="ml-auto">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button
                                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white ring-1 ring-black ring-opacity-5 shadow-md dark:bg-gray-700 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                    <div>{{ __('Option') }}</div>
                                    <div class="ml-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                @if ($user->is_admin == true)
                                <form action="{{ route('admin.users.removeadmin', $user) }}" method="Post">
                                    @csrf
                                    @method('PATCH')
                                    <x-dropdown-link :href="route('admin.users.removeadmin', $user)"
                                        onclick="event.preventDefault(); this.closest('form').submit();">
                                        {{ __('Remove Admin') }}
                                    </x-dropdown-link>
                                </form>
                                @else
                                <form action="{{ route('admin.users.makeadmin', $user) }}" method="Post">
                                    @csrf
                                    @method('PATCH')
                                    <x-dropdown-link :href="route('admin.users.makeadmin', $user)"
                                        onclick="event.preventDefault(); this.closest('form').submit();">
                                        {{ __('Make Admin') }}
                                    </x-dropdown-link>
                                </form>
                                @endif
                                @if ($user->is_verified)
                                <form action="{{ route('admin.users.unverify', $user) }}" method="Post">
                                    @csrf
                                    @method('PATCH')
                                    <x-dropdown-link :href="route('admin.users.unverify', $user)"
                                        onclick="event.preventDefault(); this.closest('form').submit();">
                                        {{ __('Unverify Account') }}
                                    </x-dropdown-link>
                                </form>
                                @else
                                <form action="{{ route('admin.users.verify', $user) }}" method="Post">
                                    @csrf
                                    @method('PATCH')
                                    <x-dropdown-link :href="route('admin.users.verify', $user)"
                                        onclick="event.preventDefault(); this.closest('form').submit();">
                                        {{ __('Verify Account') }}
                                    </x-dropdown-link>
                                </form>
                                @endif
                                <form action="{{ route('admin.users.resetpassword', $user) }}" method="Post">
                                    @csrf
                                    @method('PATCH')
                                    <x-dropdown-link :href="route('admin.users.resetpassword', $user)"
                                        onclick="event.preventDefault(); this.closest('form').submit();">
                                        {{ __('Reset Password') }}
                                    </x-dropdown-link>
                                </form>
                                <form action="{{ route('admin.users.destroy', $user) }}" method="Post">
                                    @csrf
                                    @method('DELETE')
                                    <x-dropdown-link :href="route('admin.users.destroy', $user)"
                                        onclick="event.preventDefault(); this.closest('form').submit();">
                                        {{ __('Delete Account') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                </div>
                <x-card.description>
                    <div class="space-y-3 sm:space-y-1 min-w-max">
                        <div class="text-gray-600 dark:text-gray-400 sm:flex">
                            <div class="w-48">ID</div>
                            <div>{{ $user->id }}</div>
                        </div>
                        <div class="text-gray-600 dark:text-gray-400 sm:flex">
                            <div class="w-48">{{ __('Email') }}</div>
                            <div>{{ $user->email }}</div>
                        </div>
                        <div class="text-gray-600 dark:text-gray-400 sm:flex">
                            <div class="w-48">{{ __('Verified Email') }}</div>
                            <div>{{ $user->email_verified_at ? __('Yes') : __('No') }}</div>
                        </div>
                        <div class="text-gray-600 dark:text-gray-400 sm:flex">
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
                        <div class="text-gray-600 dark:text-gray-400 sm:flex">
                            <div class="w-48">{{ __('Role') }}</div>
                            <div>
                                @if ($user->is_admin)
                                <x-badge.admin />
                                @else
                                <x-badge.user />
                                @endif
                            </div>
                        </div>
                        <div class="text-gray-600 dark:text-gray-400 sm:flex">
                            <div class="w-48">{{ __('Created At') }}</div>
                            <div>{{ $user->created_at }} - {{ $user->created_at->diffForHumans() }}</div>
                        </div>
                        <div class="text-gray-600 dark:text-gray-400 sm:flex">
                            <div class="w-48">{{ __('Updated At') }}</div>
                            <div>{{ $user->updated_at }} - {{ $user->updated_at->diffForHumans() }}</div>
                        </div>
                    </div>
                </x-card.description>
            </x-card.app>
        </div>
    </div>
</x-admin-layout>