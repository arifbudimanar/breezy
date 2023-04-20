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
                    {{ __("All User") }}
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
                        <x-text-input id="search" name="search" type="text" class="w-full" placeholder="Search"
                            value="{{ request('search') }}" autofocus />
                        <x-primary-button type="submit">
                            {{ __('Search') }}
                        </x-primary-button>
                    </form>
                </div>
                {{-- Table User --}}
                <div class="relative overflow-x-auto mt-6">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 mb-6 sm:mb-0">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    No.
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Email
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Verified
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Role
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
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
                                        <span class="inline-flex ml-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-green-500">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z" />
                                            </svg>
                                        </span>
                                        @endif
                                    </p>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <p>
                                        @if ($user->is_verified)
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-indigo-500">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z" />
                                        </svg>
                                        @else
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                                        </svg>
                                        @endif
                                    </p>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if ($user->is_admin)
                                        <p class="text-indigo-500">Admin</p>
                                    @else
                                        <p>User</p>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex space-x-3">
                                        {{-- Action here --}}
                                        {{-- @if ($user->is_admin)
                                        <form action="{{ route('user.removeadmin', $user) }}" method="Post">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit"
                                                class="text-blue-600 dark:text-blue-400 whitespace-nowrap">
                                                Remove Admin
                                            </button>
                                        </form>
                                        @else
                                        <form action="{{ route('user.makeadmin', $user) }}" method="Post">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit"
                                                class="text-red-600 dark:text-red-400 whitespace-nowrap">
                                                Make Admin
                                            </button>
                                        </form>
                                        @endif --}}
                                        {{-- <form action="{{ route('user.destroy', $user) }}" method="Post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit"
                                                class="text-red-600 dark:text-red-400 whitespace-nowrap">
                                                Delete
                                            </button>
                                        </form> --}}
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr class="bg-white dark:bg-gray-800">
                                <td scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                    Empty
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
                    {{-- {{ $users->links('vendor.pagination.simple-tailwind') }} --}}
                    {{-- {{ $users->links('vendor.pagination.custom-tailwind') }} --}}
                </div>
                @endif
            </x-card.app>
        </div>
    </div>
</x-admin-layout>
