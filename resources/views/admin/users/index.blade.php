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
                        <x-text-input id="search" name="search" type="text" class="w-full" placeholder="{{ __('Name or email') }}"
                            value="{{ request('search') }}" autofocus />
                        <x-button.primary type="submit">
                            {{ __('Search') }}
                        </x-button.primary>
                    </form>
                </div>
                {{-- Table User --}}
                <div class="relative overflow-x-auto mt-6">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 mb-6 sm:mb-0">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    {{ __('No') }}
                                </th>
                                <th scope="col" class="px-6 py-3">
                                     {{ __('Name') }}
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    {{ __('Email') }}
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    {{ __('Verified') }}
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    {{ __('Role') }}
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    {{ __('Actions') }}
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                            <tr class="odd:bg-white odd:dark:bg-gray-800 even:bg-gray-50 even:dark:bg-gray-700">
                                <td scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <p>
                                        {{ $users->firstItem() + $loop->index }}
                                    </p>
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <p>{{ $user->name }}</p>
                                </td>
                                <td class="px-6 py-4">
                                    <p class="flex items-center">{{ $user->email }}
                                        @if ($user->email_verified_at)
                                        <x-badge.verified-email />
                                        @endif
                                    </p>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if ($user->is_verified)
                                    <p class="flex items-center">
                                        <x-badge.verified-account />
                                    </p>
                                    @else
                                    <p class="flex items-center">
                                        <x-badge.unverified-account />
                                    </p>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if ($user->is_admin)
                                    <x-badge.admin />
                                    @else
                                    <x-badge.user />
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex space-x-3">
                                        {{-- Action here --}}
                                        @if ($user->is_admin)
                                        <form action="{{ route('admin.users.removeadmin', $user) }}" method="Post">
                                            @csrf
                                            @method('PATCH')
                                            <x-action.red>
                                                {{ __('Remove Admin') }}
                                            </x-action.red>
                                        </form>
                                        @else
                                        <form action="{{ route('admin.users.makeadmin', $user) }}" method="Post">
                                            @csrf
                                            @method('PATCH')
                                            <x-action.indigo>
                                                {{ __('Make Admin') }}
                                            </x-action.indigo>
                                        </form>
                                        @endif
                                        @if ($user->is_verified)
                                        <form action="{{ route('admin.users.unverify', $user) }}" method="Post">
                                            @csrf
                                            @method('PATCH')
                                            <x-action.red>
                                                {{ __('Unverify') }}
                                            </x-action.red>
                                        </form>
                                        @else
                                        <form action="{{ route('admin.users.verify', $user) }}" method="Post">
                                            @csrf
                                            @method('PATCH')
                                            <x-action.indigo>
                                                {{ __('Verify') }}
                                            </x-action.indigo>
                                        </form>
                                        @endif
                                        <form action="{{ route('admin.users.resetpassword', $user) }}" method="Post">
                                            @csrf
                                            @method('PATCH')
                                            <x-action.indigo>
                                                {{ __('Reset Password') }}
                                            </x-action.indigo>
                                        </form>
                                        <form action="{{ route('admin.users.destroy', $user) }}" method="Post">
                                            @csrf
                                            @method('DELETE')
                                            <x-action.red>
                                                {{ __('Delete') }}
                                            </x-action.red>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr class="bg-white dark:bg-gray-800">
                                <td scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                    {{ __('Data Not Found') }}
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                {{-- Pagination --}}
                @if ($users->hasPages())
                <div class="mt-6">
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
