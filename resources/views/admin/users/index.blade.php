<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="sm:py-6">
        <div class="max-w-full mx-auto sm:px-6 sm:space-y-6">
            <x-card.app>
                <x-card.title>
                    {{ __("All Users") }}
                </x-card.title>
                @if (request('search'))
                <x-card.description>
                    {{ __("Search results for : ") }}{{ request('search') }}
                </x-card.description>
                @else
                <x-card.description>
                    {{ __('Manage all user, search by name or email.') }}
                </x-card.description>
                @endif
                {{-- Search --}}
                <div class="mt-6 lg:w-1/2 2xl:w-1/3">
                    <form class="flex items-center gap-2">
                        <x-text-input id="search" name="search" type="text" class="w-full"
                            placeholder="{{ __('Name or email') }}" value="{{ request('search') }}" autofocus />
                        <x-button.primary type="submit">
                            {{ __('Search') }}
                        </x-button.primary>
                    </form>
                </div>
                <div class="gap-5 mt-6 grid grid-cols-1 lg:grid-cols-2 2xl:grid-cols-3">
                    @forelse ($users as $user)
                    <x-subcard.app>
                        <x-subcard.title>
                            <div class="flex justify-between">
                                <div class="flex items-center">
                                    <a href="{{ route('admin.users.show', $user) }}"
                                        class="text-lg font-medium text-gray-900 dark:text-gray-100 hover:underline">
                                        {{$user->name }}
                                    </a>
                                    @if ($user->is_verified)
                                    <p class="ml-1 flex items-center">
                                        <x-badge.verified-account />
                                    </p>
                                    @else
                                    <p class="ml-1 flex items-center">
                                        <x-badge.unverified-account />
                                    </p>
                                    @endif
                                </div>
                                <div class="ml-auto">
                                    @include('admin.users.partials.action')
                                </div>
                            </div>
                        </x-subcard.title>
                        <p class="mt-2 text-sm text-gray-500 dark:text-gray-400 flex items-center">
                            {{ $user->email }}
                            @if ($user->email_verified_at)
                            <x-badge.verified-email />
                            @endif
                        </p>
                        <p class="mt-2 text-sm text-gray-500 dark:text-gray-400 flex items-center">
                            @if ($user->is_admin)
                            <x-badge.admin />
                            @else
                            <x-badge.user />
                            @endif
                        </p>
                    </x-subcard.app>
                    @empty
                    <div>
                        <p class="text-gray-500 dark:text-gray-400">
                            {{ __('Data Not Found') }}
                        </p>
                    </div>
                    @endforelse
                </div>
                {{-- Pagination --}}
                @if ($users->hasPages())
                <div class="mt-6">
                    {{-- The default pagination view is pagination.custom-tailwind blade component.
                    You can change the default pagination view using the AppServiceProvider
                    or by passing the pagination view as parameter to the links method. --}}
                    {{ $users->links() }}
                    {{-- {{ $users->links('vendor.pagination.tailwind') }} --}}
                    {{-- {{ $users->links('vendor.pagination.simple-tailwind') }} --}}
                    {{-- {{ $users->links('vendor.pagination.custom-tailwind') }} --}}
                </div>
                @endif
            </x-card.app>
        </div>
    </div>
</x-admin-layout>